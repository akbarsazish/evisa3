<?php

namespace Omalizadeh\MultiPayment\Drivers\Mellat;

use SoapClient;
use Illuminate\Support\Str;
use Omalizadeh\MultiPayment\RedirectionForm;
use Omalizadeh\MultiPayment\Drivers\Contracts\Driver;
use Omalizadeh\MultiPayment\Exceptions\PaymentFailedException;
use Omalizadeh\MultiPayment\Exceptions\PurchaseFailedException;
use Omalizadeh\MultiPayment\Exceptions\InvalidConfigurationException;
use Omalizadeh\MultiPayment\Exceptions\PaymentAlreadyVerifiedException;
use Omalizadeh\MultiPayment\Receipt;

class Mellat extends Driver
{
    public function purchase(): string
    {
        $soapOptions = $this->getSoapOptions();
        $data = $this->getPurchaseData();
        $soap = new SoapClient($this->getPurchaseUrl(), $soapOptions);
        $response = $soap->bpPayRequest($data);
        $responseData = explode(',', $response->return);
        $responseCode = $responseData[0];
        if ($responseCode != $this->getSuccessResponseStatusCode()) {
            throw new PurchaseFailedException($this->getStatusMessage($responseCode), $responseCode);
        }
        $hashCode = $responseData[1];
        $this->getInvoice()->setTransactionId($hashCode);

        return $hashCode;
    }

    public function pay(): RedirectionForm
    {
        $paymentUrl = $this->getPaymentUrl();
        $mobileNo = $this->getInvoice()->getPhoneNumber();
        if (!empty($mobileNo)) {
            $mobileNo = $this->checkPhoneNumberFormat($mobileNo);
        }
        $data = [
            'RefId' => $this->getInvoice()->getTransactionId(),
            'mobileNo' => $mobileNo
        ];

        return $this->redirect($paymentUrl, $data);
    }

    public function verify(): Receipt
    {
        $responseCode = request('ResCode');
        if ($responseCode != $this->getSuccessResponseStatusCode()) {
            throw new PaymentFailedException($this->getStatusMessage($responseCode), $responseCode);
        }
        $soapOptions = $this->getSoapOptions();
        $data = $this->getVerificationData();
        $soap = new SoapClient($this->getVerificationUrl(), $soapOptions);
        $verificationResponse = $soap->bpVerifyRequest($data);
        $responseCode = $verificationResponse->return;
        if ($responseCode != $this->getSuccessResponseStatusCode()) {
            if ($responseCode != $this->getPaymentAlreadyVerifiedStatusCode()) {
                $soap->bpReversalRequest($data);
                throw new PaymentFailedException($this->getStatusMessage($responseCode), $responseCode);
            }
            throw new PaymentAlreadyVerifiedException($this->getStatusMessage($responseCode), $responseCode);
        }
        $settlingResponse = $soap->bpSettleRequest($data);
        $responseCode = $settlingResponse->return;
        if ($responseCode != $this->getSuccessResponseStatusCode()) {
            if ($responseCode != $this->getPaymentAlreadySettledStatusCode() || $responseCode != $this->getPaymentAlreadyReversedStatusCode()) {
                $soap->bpReversalRequest($data);
            }
            throw new PaymentFailedException($this->getStatusMessage($responseCode), $responseCode);
        }
        $this->getInvoice()->setTransactionId(request('RefId'));
        $this->getInvoice()->setInvoiceId(request('SaleOrderId'));

        return new Receipt($this->getInvoice(), $data['saleReferenceId'], request('RefId'), request('CardHolderPan'));
    }

    protected function getPurchaseData(): array
    {
        if (empty($this->settings['terminal_id'])) {
            throw new InvalidConfigurationException('Terminal id has not been set.');
        }
        if (empty($this->settings['username']) || empty($this->settings['password'])) {
            throw new InvalidConfigurationException('Username or password has not been set.');
        }
        if (!empty($this->getInvoice()->getDescription())) {
            $description = $this->getInvoice()->getDescription();
        } else {
            $description = $this->settings['description'];
        }

        return array(
            'terminalId' => $this->settings['terminal_id'],
            'userName' => $this->settings['username'],
            'userPassword' => $this->settings['password'],
            'callBackUrl' => $this->getInvoice()->getCallbackUrl() ?: $this->settings['callback_url'],
            'amount' => $this->getInvoice()->getAmount(),
            'localDate' => now()->format('Ymd'),
            'localTime' => now()->format('Gis'),
            'orderId' => (int)$this->getInvoice()->getInvoiceId(),
            'additionalData' => $description,
            'payerId' => $this->getInvoice()->getUserId()
        );
    }

    protected function getVerificationData(): array
    {
        $orderId = request('SaleOrderId', $this->getInvoice()->getInvoiceId());
        $verifySaleOrderId = request('SaleOrderId', $this->getInvoice()->getInvoiceId());
        $verifySaleReferenceId = request('SaleReferenceId', $this->getInvoice()->getTransactionId());

        return array(
            'terminalId' => $this->settings['terminal_id'],
            'userName' => $this->settings['username'],
            'userPassword' => $this->settings['password'],
            'orderId' => $orderId,
            'saleOrderId' => $verifySaleOrderId,
            'saleReferenceId' => $verifySaleReferenceId
        );
    }

    protected function getStatusMessage($statusCode): string
    {
        $translations = [
            '0' => '???????????? ???? ???????????? ?????????? ????',
            '11' => '?????????? ???????? ?????????????? ??????',
            '12' => '???????????? ???????? ????????',
            '13' => '?????? ???????????? ??????',
            '14' => '?????????? ?????????? ???????? ???????? ?????? ?????? ???? ???? ???????? ??????',
            '15' => '???????? ?????????????? ??????',
            '16' => '?????????? ???????????? ?????? ?????? ???? ???? ???????? ??????',
            '17' => '?????????? ???? ?????????? ???????????? ?????????? ?????? ??????',
            '18' => '?????????? ???????????? ???????? ?????????? ??????',
            '19' => '???????? ???????????? ?????? ?????? ???? ???? ???????? ??????',
            '111' => '???????? ?????????? ???????? ?????????????? ??????',
            '112' => '???????? ?????????? ???????? ?????????? ????????',
            '113' => '?????????? ???? ???????? ?????????? ???????? ???????????? ??????',
            '114' => '???????????? ???????? ???????? ???? ?????????? ?????? ???????????? ????????',
            '21' => '?????????????? ?????????????? ??????',
            '23' => '???????? ???????????? ???? ???????? ??????',
            '24' => '?????????????? ???????????? ?????????????? ?????????????? ??????',
            '25' => '???????? ?????????????? ??????',
            '31' => '???????? ?????????????? ??????',
            '32' => '???????? ?????????????? ???????? ?????? ???????? ?????????????????',
            '33' => '???????? ?????????????? ??????',
            '34' => '???????? ????????????',
            '35' => '?????????? ?????????????? ??????',
            '41' => '?????????? ?????????????? ???????????? ??????',
            '42' => '???????????? Sale ???????? ??????',
            '43' => '???????? ?????????????? Verify ???????? ?????? ??????',
            '44' => '?????????????? Verify ???????? ??????',
            '45' => '???????????? Settle ?????? ??????',
            '46' => '???????????? Settle ???????? ??????',
            '47' => '???????????? Settle ???????? ??????',
            '48' => '???????????? Reverse ?????? ??????',
            '412' => '?????????? ?????? ???????????? ??????',
            '413' => '?????????? ???????????? ???????????? ??????',
            '414' => '???????????? ???????? ?????????? ?????? ?????????????? ??????',
            '415' => '???????? ???????? ???????? ???? ?????????? ?????????? ??????',
            '416' => '?????? ???? ?????? ??????????????',
            '417' => '?????????? ???????????? ?????????? ?????????????? ??????',
            '418' => '?????????? ???? ?????????? ?????????????? ??????????',
            '419' => '?????????? ?????????? ???????? ?????????????? ???? ???? ???????? ?????????? ??????',
            '421' => 'IP ?????????????? ??????',
            '51' => '???????????? ???????????? ??????',
            '54' => '???????????? ???????? ?????????? ????????',
            '55' => '???????????? ?????????????? ??????',
            '61' => '?????? ???? ??????????',
            '62' => '???????? ???????????? ???? ???????? ???? ?????????? ?????? ?????? ???????? ?????????????? ???????? ??????????',
            '98' => '?????? ?????????????? ???? ?????? ?????????? ???? ?????????? ?????????? ??????'
        ];
        $unknownError = '???????? ???????????????? ???? ???????? ??????.';

        return array_key_exists($statusCode, $translations) ? $translations[$statusCode] : $unknownError;
    }

    protected function getSuccessResponseStatusCode(): string
    {
        return "0";
    }

    private function getPaymentAlreadyVerifiedStatusCode(): string
    {
        return "43";
    }

    private function getPaymentAlreadySettledStatusCode(): string
    {
        return "45";
    }

    private function getPaymentAlreadyReversedStatusCode(): string
    {
        return "48";
    }

    protected function getPurchaseUrl(): string
    {
        return 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl';
    }

    protected function getPaymentUrl(): string
    {
        return 'https://bpm.shaparak.ir/pgwchannel/startpay.mellat';
    }

    protected function getVerificationUrl(): string
    {
        return 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl';
    }

    private function getSoapOptions(): array
    {
        return config('gateway_mellat.soap_options', [
            'encoding' => 'UTF-8'
        ]);
    }

    private function checkPhoneNumberFormat(string $phoneNumber): string
    {
        if (strlen($phoneNumber) === 12 and Str::startsWith($phoneNumber, '98')) {
            return $phoneNumber;
        }
        if (strlen($phoneNumber) === 11 and Str::startsWith($phoneNumber, '0')) {
            return Str::replaceFirst('0', '98', $phoneNumber);
        }
        if (strlen($phoneNumber) === 10) {
            return '98' . $phoneNumber;
        }
        return $phoneNumber;
    }
}
