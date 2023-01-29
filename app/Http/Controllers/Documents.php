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

        return view("home.registrationForm",['countries'=>$countries]);
    }

    public function docsList(Request $request){
        $documents;
        if(Session::get("userSession")==1 or Session::get("userSession")==2){
            $documents=DB::select("SELECT *,document.Name AS dName,branches.Name AS bName,branches.CellPhone AS bCellPhone,document.CellPhone AS dCellPhone,branches.OtherPhone AS bOtherPhone,document.OtherPhone AS dOtherPhone,branches.Name AS branchName,country.Name AS countryName FROM document JOIN branches ON userSn=branchSn JOIN country ON document.BirthPlace=country.countrySn ORDER BY document.TimeStamp DESC");
        }
        if(Session::get("userSession")=="branch"){
            $documents=DB::select("SELECT *,document.Name AS dName,branches.Name AS bName,branches.CellPhone AS bCellPhone,document.CellPhone AS dCellPhone,branches.OtherPhone AS bOtherPhone,document.OtherPhone AS dOtherPhone,branches.Name AS branchName,country.Name AS countryName from document JOIN branches ON userSn=branchSn JOIN country ON document.BirthPlace=country.countrySn WHERE userSn=".Session::get("userId")." ORDER BY document.TimeStamp DESC");
        }
        return view("documents.docsList",["documents"=>$documents]);
    }
    public function addDoc(Request $request)
    {

        $userSn=Session::get("userId");


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
            $tazkiraImg->move("resources/assets/images/document/tazkira/",$fileName);
        }
        //عکس فرد
        if($personImg){
            $fileName=$lastDocSn.'.jpg';
            $personImg->move("resources/assets/images/document/person/",$fileName);
        }
        //عکس پاسپورت
        if($passImg){
            $fileName=$lastDocSn.'.jpg';
            $passImg->move("resources/assets/images/document/passport/",$fileName);
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
        $province=$request->post("province");
        $visaType=$request->post("visaType");
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
         "UserAddress"=>"$userAddress", "referDate"=>" $referDate",'visaType'=>"$visaType",'province'=>"$province"]);
                 //عکس تذکره
       
       if($tazkiraImg){
           $fileName=$docId.'.jpg';
           $tazkiraImg->move("resources/assets/images/document/tazkira/",$fileName);
       }
       //عکس فرد
       if($personImg){
           $fileName=$docId.'.jpg';
           $personImg->move("resources/assets/images/document/person/",$fileName);
       }
       //عکس پاسپورت
       if($passImg){
           $fileName=$docId.'.jpg';
           $passImg->move("resources/assets/images/document/passport/",$fileName);
       }

       $documents=DB::table("document")->where("UserSn",1)->get();
       return redirect("/docsList");

    }

    //برای رد کردن سند
    public function rejectDocument(Request $request)
    {
        $docSn=$request->get("DocSn");
        DB::table("document")->where("DocSn",$docSn)->where("isOke",0)->update(["isOke"=>2]);
        $documents=DB::select("select *,document.Name as dName,branches.Name as bName,branches.CellPhone as bCellPhone,document.CellPhone as dCellPhone,branches.OtherPhone as bOtherPhone,document.OtherPhone as dOtherPhone,branches.Name as branchName from document join branches on userSn=branchSn order by document.TimeStamp desc");
        return Response::json($documents);
    }
    public function okeDocument(Request $request)
    {
        $docSn=$request->get("DocSn");
        DB::table("document")->where("DocSn",$docSn)->where("isOke",0)->update(["isOke"=>1]);
      //  $uesr=DB::select("select userSn from document where userSn=".$docSn);
       // $Money = DB::select("SELECT Money FROM bonus WHERE TimeStamp=(SELECT max(TimeStamp) FROM Bonus");
       // DB::table("accountHistory")->insert(["UserId"=>$uesr[0]->userSn, "Money"=>$Money[0]->Money, "countDocs"=>1, "isCounted"=>0]);
        $documents=DB::select("select *,document.Name as dName,branches.Name as bName,branches.CellPhone as bCellPhone,document.CellPhone as dCellPhone,branches.OtherPhone as bOtherPhone,document.OtherPhone as dOtherPhone,branches.Name as branchName from document join branches on userSn=branchSn order by document.TimeStamp desc");
        return Response::json($documents);
    }

    public function listBranchDocs(Request $request)
    {
        $branchID=$request->get("branchID");
        $branChName=DB::table("branches")->where("BranchSn",$branchID)->get()[0]->Name;
        $documents;
        $documents=DB::select("select *,document.Name as dName,branches.Name as bName,branches.CellPhone as bCellPhone,document.CellPhone as dCellPhone,branches.OtherPhone as bOtherPhone,document.OtherPhone as dOtherPhone,branches.Name as branchName from document join branches on userSn=branchSn where userSn=".$branchID." order by document.TimeStamp desc");
        return view("documents.docsList",['documents'=>$documents,'flag'=>1,'branChName'=>$branChName]);
        
    }
    public function docsDetails(Request $request)
    {
        $docId=$request->get("docID");
        $document=DB::select("select *,document.Name as dName,branches.Name as bName,branches.CellPhone as bCellPhone,document.CellPhone as dCellPhone,branches.OtherPhone as bOtherPhone,document.OtherPhone as dOtherPhone,branches.Name as branchName from document join branches on userSn=branchSn where DocSn=".$docId." order by document.TimeStamp desc")[0];

        return view("documents.docsInfo",['doc'=>$document]);

    }
}
