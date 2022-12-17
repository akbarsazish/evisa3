<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Response;
use Session;

class Documents extends Controller
{
    public function registrationForm(Request $request){
        $countries=DB::table("country")->get();

        return view("documents.registrationForm",['countries'=>$countries]);
    }
    public function docsList(Request $request){
        $documents=DB::table("document")->where("UserSn",1)->get();
        return view("documents.docsList",["documents"=>$documents]);
    }
    public function addDoc(Request $request)
    {

        $userSn=1;


        $tazkiraImg=$request->file("tazkiraImage");
        $personImg=$request->file("personImage");
        $passImg=$request->file("passImage");


         $name=$request->post("name");
         $lastName=$request->post("lastName");
         $fatherName=$request->post("fatherName");
         $passNo=$request->post("passNo");
         $birthDate=$request->post("birthDate");
         $birthPlace=$request->post("birthPlace");
         $gender=$request->post("gender");
         $passEndDate=$request->post("passEndDate");
         $cellPhone=$request->post("cellPhone");
         $otherPhone=$request->post("otherPhone");
         $refCode=$request->post("refCode");
         $userAddress=$request->post("userAddress");
         $referDate=$request->post("referDate");
         $isSent=1;
         $isCounted=0;
         $isOke=0;
         
         $sex=0;
         if($gender==1){
            $sex=1;
         }

        DB::table("document")->insert(["Name"=>"$name", "LastName"=>"$lastName", "FatherName"=>"$fatherName", "PassNo"=>"$passNo", "BirthDate"=>"$birthDate",
         "BirthPlace"=>"".$birthPlace."", "Gender"=>$sex, "PassEndDate"=>"$passEndDate", "CellPhone"=>"$cellPhone", "OtherPhone"=>"$otherPhone", "RefCode"=>"$refCode",
          "UserAddress"=>"$userAddress", "referDate"=>" $referDate", "isSent"=>$isSent, "isCounted"=>$isCounted, "isOke"=>$isOke, "UserSn"=>$userSn]);
                  //عکس تذکره
        $lastDocSn=DB::table("document")->max("DocSn");
        if(!$lastDocSn){
            $lastDocSn=1;
        }
        if($tazkiraImg){
            $fileName=$lastDocSn.'.jpg';
            $picture->move("resources/assets/images/tazkira/",$fileName);
        }
        //عکس فرد
        if($personImg){
            $fileName=$lastDocSn.'.jpg';
            $picture->move("resources/assets/images/person/",$fileName);
        }
        //عکس پاسپورت
        if($passImg){
            $fileName=$lastDocSn.'.jpg';
            $picture->move("resources/assets/images/passport/",$fileName);
        }

        $documents=DB::table("document")->where("UserSn",1)->get();
        return redirect("/docsList");
    }
    public function deleteDocs(Request $request)
    {
        $userSn=1;


        $docId=$request->get("docID");
        DB::table("document")->where("DocSn",$docId)->delete();
        $documents=DB::table("document")->where("UserSn",1)->get();
        return Response::json($documents);
    }
    public function getDocument(Request $request)
    {
        $docId=$request->get("docID");
        $document=DB::table("document")->where("DocSn",$docId)->get();
        $countries=DB::table("country")->get();
        return Response::json([$document[0],$countries]);
    }
    public function editDoc(Request $request)
    {
       //گرفتن داده ها
       
       $tazkiraImg=$request->file("tazkiraImage");
       $personImg=$request->file("personImage");
       $passImg=$request->file("passImage");

       $docId=$request->post("docID");
        $name=$request->post("name");
        $lastName=$request->post("lastName");
        $fatherName=$request->post("fatherName");
        $passNo=$request->post("passNo");
        $birthDate=$request->post("birthDate");
        $birthPlace=$request->post("birthPlace");
        $gender=$request->post("gender");
        $passEndDate=$request->post("passEndDate");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        $refCode=$request->post("refCode");
        $userAddress=$request->post("userAddress");
        $referDate=$request->post("referDate");
        
        $sex=0;
        if($gender==1){
           $sex=1;
        }

       DB::table("document")->where("DocSn",$docId)->update(["Name"=>"$name", "LastName"=>"$lastName", "FatherName"=>"$fatherName", "PassNo"=>"$passNo", "BirthDate"=>"$birthDate",
        "BirthPlace"=>"".$birthPlace."", "Gender"=>$sex, "PassEndDate"=>"$passEndDate", "CellPhone"=>"$cellPhone", "OtherPhone"=>"$otherPhone", "RefCode"=>"$refCode",
         "UserAddress"=>"$userAddress", "referDate"=>" $referDate"]);
                 //عکس تذکره
       $lastDocSn=DB::table("document")->max("DocSn");
       if(!$lastDocSn){
           $lastDocSn=1;
       }
       if($tazkiraImg){
           $fileName=$lastDocSn.'.jpg';
           $picture->move("resources/assets/images/tazkira/",$fileName);
       }
       //عکس فرد
       if($personImg){
           $fileName=$lastDocSn.'.jpg';
           $picture->move("resources/assets/images/person/",$fileName);
       }
       //عکس پاسپورت
       if($passImg){
           $fileName=$lastDocSn.'.jpg';
           $picture->move("resources/assets/images/passport/",$fileName);
       }

       $documents=DB::table("document")->where("UserSn",1)->get();
       return redirect("/docsList");

    }
}
