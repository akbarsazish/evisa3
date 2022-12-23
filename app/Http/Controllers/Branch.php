<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use Notification;
use App\Notifications\AlertNotification;

class Branch extends Controller{
    public function branchList(Request $request){
        $branches=DB::select("select *,countDoc from branches left join (select count(document.DocSn) as countDoc,userSn from document GROUP BY userSn) a on a.userSn =branches.BranchSn where branches.deleted=0");
        // $countAllDocs=DB::table("Docs")->where()->where()->count();
        // $countAllNotOkeDocs=DB::table()->where()->where()->count();
        // $countAllOkeDocs=DB::table()->where()->where()->count();
        // $countAllNewDocs=DB::table()->where()->where()->count();
       
        return view("branch.branchList",['branches'=>$branches]);
    }

    public function checkBranch(Request $request)
    {
        $this->validate($request,[
            'username'=>'string|required|max:2000|min:3',
            'password'=>'required|min:3|max:54',
        ],
        [
            'required' => 'فیلد نباید خالی بماند',
            'username.max'=>'متن طویل است طویل است',
            'username.min'=>'متن زیاد کوناه است'

        ]
    );

    $branchExist=DB::table("branches")->where("username",$request->post("username"))->where("deleted",0)->where("password",$request->post("password"))->count();
    if($branchExist>0){
        $branch=DB::table("branches")->where("username",$request->post("username"))->get();
        Session::put("userSession","branch");
        Session::put("username",$request->post("username"));
        Session::put("name",$branch[0]->Name);
        Session::put("userId",$branch[0]->BranchSn);
        return redirect("/adminDashboard");
    }else{
        $error="نام کاربری و یا رمز ورود اشتباه است";
        return view("login.login",['loginError'=>$error]);
    }

    }


    public function addingBranch(Request $request){
        
        return view("branch.addingBranch");
    }
    public function addBranch(Request $request)
    {
        $username=DB::table("branches")->where("username",$request->post("username"))->get();
        if(count($username)>0){
            return view("branch.addingBranch",['error'=>"نام کاربری با این نام قبلا وجود دارد"]);
        }
        $name=$request->post("name");
        $username=$request->post("username");
        $password=$request->post("password");
        $code=$request->post("code");
        $bossName=$request->post("BossName");
        $jawazNumber=$request->post("JawazNumber");
        $picture=$request->file("picture");
        $pictureT=$request->file("tazkiraPicture");
        $pictureJ=$request->file("jawazPicture");
        $address=$request->post("Address");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        DB::table("branches")->insert(["Name"=>"".$name."", "Address"=>"".$address."", "BranchCode"=>"".$code."","username"=>"$username","password"=>"$password"
        ,"CellPhone"=>"$cellPhone","OtherPhone"=>"$otherPhone","BossName"=>"".$bossName."","JawazNumber"=>"".$jawazNumber.""]);

        $lastBranchSn=DB::table("branches")->max("BranchSn");

        if($picture){
            $fileName=$lastBranchSn.'.jpg';
            $picture->move("resources/assets/images/branches/users/",$fileName);
        }
        if($pictureT){
            $fileName=$lastBranchSn.'.jpg';
            $pictureT->move("resources/assets/images/branches/tazkira/",$fileName);
        }
        if($pictureJ){
            $fileName=$lastBranchSn.'.jpg';
            $pictureJ->move("resources/assets/images/branches/jawaz/",$fileName);
        }
        return redirect('/branchList');
    }
    public function getBranch(Request $request)
    {
        $branchId=$request->get("BranchID");
        $branch=DB::table("branches")->where("BranchSn",$branchId)->get();
        return Response::json($branch[0]);
    }
    public function editBranch(Request $request)
    {
        $branchID=$request->post("BranchId");
        $name=$request->post("Name");
        $code=$request->post("BranchCode");
        $picture=$request->file("picture");
        $address=$request->post("Address");
        $username=$request->post("username");
        $password=$request->post("password");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        DB::table("branches")->where("BranchSn",$branchID)->update(["Name"=>"".$name."", "Address"=>"".$address."", "BranchCode"=>"".$code."","username"=>"$username","password"=>"$password"
        ,"CellPhone"=>"$cellPhone","OtherPhone"=>"$otherPhone"]);

        $lastBranchSn=DB::table("branches")->max("BranchSn");

        if($picture){
            $fileName=$lastBranchSn.'.jpg';
            $picture->move("resources/assets/images/branches/",$fileName);
        }
        return redirect('/branchList');
    }
    public function deleteBranch(Request $request)
    {
        $branchID=$request->get("BranchID");
        DB::table("branches")->where("BranchSn",$branchID)->update(["deleted"=>1]);
        $branches=DB::table("branches")->where("deleted",0)->get();
        return Response::json($branches);
    }
    public function showBranchDetails(Request $request)
    {
        $branchID=$request->get("branchID");
        $countAllDocs=DB::table("document")->where("userSn",$branchID)->count();
        $allMoneyToGive=DB::table("document")->where("userSn",$branchID)->count()* self::getLikeOperators()[2];
        $countAllNotOkeDocs=DB::table("document")->where("userSn",$branchID)->where("isOke",2)->count();
        $countAllOkeDocs=DB::table("document")->where("userSn",$branchID)->where("isOke",1)->count();
        $countAllNewDocs=DB::table("document")->where("userSn",$branchID)->where("isOke",0)->count();
        $branch=DB::table("branches")->where("BranchSn",$branchID)->get()[0];
        return view("branch.branchInfo",["branch"=>$branch,"countAllDocs"=>$countAllDocs,
        "allMoneyToGive"=>$allMoneyToGive,
        "countAllNotOkeDocs"=>$countAllNotOkeDocs,"countAllOkeDocs"=>$countAllOkeDocs,"countAllNewDocs"=>$countAllNewDocs]);
        
    }
    public function likeBranch(Request $request)
    {

        $branchID=$request->get("branchID");
        DB::table("branches")->where("BranchSn",$branchID)->increment('doLike', self::getLikeOperators()[0]);
        return Response::json(1);
        # code...
    }

    public function dislikeBranch(Request $request)
    {
        $branchID=$request->get("branchID");
        DB::table("branches")->where("BranchSn",$branchID)->increment('disLike', self::getLikeOperators()[1]);
        return Response::json(1);
        # code...
    }
    public function getLikeOperators(Type $var = null)
    {
        $likesOperators=DB::table("bonus")->get();// ضریب امتیازات مثبت و منفی 
        $likeOperator=$likesOperators[0]->ProblemMinus;
        $disLikeOperator=$likesOperators[0]->CorrectBonus;
        $moneyEach=$likesOperators[0]->money;
        $moneyOfCenterEach=$likesOperators[0]->totalOfCenter;
        return [$likeOperator,$disLikeOperator,$moneyEach,$moneyOfCenterEach];
        # code...
    }
    public function addingBranchOut(Request $request)
    {
        return view("branch.addingBranchOut");
    }
    public function addBranchOut(Request $request)
    {
        $username=DB::table("branches")->where("username",$request->post("username"))->get();
        if(count($username)>0){
            return view("branch.addingBranchOut",['error'=>"نام کاربری با این نام قبلا وجود دارد"]);
        }
        $name=$request->post("name");
        $username=$request->post("username");
        $password=$request->post("password");
        $code=$request->post("code");
        $bossName=$request->post("BossName");
        $jawazNumber=$request->post("JawazNumber");
        $picture=$request->file("picture");
        $pictureT=$request->file("tazkiraPicture");
        $pictureJ=$request->file("jawazPicture");
        $address=$request->post("Address");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        DB::table("branches")->insert(["Name"=>"".$name."", "Address"=>"".$address."", "BranchCode"=>"".$code."","username"=>"$username","password"=>"$password"
        ,"CellPhone"=>"$cellPhone","OtherPhone"=>"$otherPhone","BossName"=>"".$bossName."","JawazNumber"=>"".$jawazNumber.""]);

        $lastBranchSn=DB::table("branches")->max("BranchSn");

        if($picture){
            $fileName=$lastBranchSn.'.jpg';
            $picture->move("resources/assets/images/branches/",$fileName);
        }
        if($pictureT){
            $fileName=$lastBranchSn.'.jpg';
            $pictureT->move("resources/assets/images/branches/tazkira/",$fileName);
        }
        if($pictureJ){
            $fileName=$lastBranchSn.'.jpg';
            $pictureJ->move("resources/assets/images/branches/jawaz/",$fileName);
        }
        $branch =DB::table("branches")->where("BranchSn",$lastBranchSn)->get()[0];
        return redirect("/viewSuccess");
    }
    public function viewSuccess(Request $request)
    {
        # code...
        return view("branch.outBranchSuccess");
    }
    public function checkBranchUserName(Request $request)
    {
        $countExist=DB::table("branches")->where("username",$request->get("username"))->count();
        if($countExist>0){
            return Response::json(1);
        }else{
            return Response::json(0);
        }
    }

    public function requestToBranch(Request $request)
    {
        $branchID=$request->get("branchID");
        $requestExist=DB::table("tasviyahrequest")->where("BranchSn",$branchID)->count();
        if($requestExist>0){
            DB::table("tasviyahrequest")->where("BranchSn",$branchID)->update(["BranchSn"=>$branchID, "IsRequest"=>1]);
        }else{
            DB::table("tasviyahrequest")->insert(["adminSn"=>Session::get("userId"), "BranchSn"=>$branchID, "IsRequest"=>1]); 
        }
        return Response::json(1);
    }

    public function acceptRequest(Request $request)
    {
        $branchID=$request->get("BranchID");
        DB::table("tasviyahrequest")->where("BranchSn",$branchID)->update(["IsRequest"=>2]);
        return Response::json(2);
    }
    
    public function getAllBranchInfo(Request $request)
    {
        $branchID=$request->get("BranchID");
        $state=0;
        $requestState=DB::select("SELECT IsRequest  FROM tasviyahrequest WHERE BranchSn=".$branchID);
        if(count($requestState)>0){
            $state=$requestState[0]->IsRequest;
        }
        return Response::json($state);
    }
    public function cancelRequest(Request $request)
    {
        $branchID=$request->get("BranchID");
        DB::table("tasviyahrequest")->where("BranchSn",$branchID)->update(["IsRequest"=>0]);
        return Response::json(0);
    }
    public function doTasviyahHisab(Request $request)
    {
        $branchID=$request->get("BranchID");
        $allOkeOfAgency=0;//تایید شده های شرکت
        $allNotOkeOfAgency=0;//تایید نشده های شرکت
        $moneyEach=self::getLikeOperators()[2];
        $allMoneyOfAgency=0;
        $countDocs=0;
        $lastTimeEmpty="2022-12-10 20:49:10" ;//آخرین تاریخیکه تسویه پولی صورت گرفته است.
        $lastTimeEmpty=DB::select("SELECT MAX(TimeStamp) as lastTime from accounthistory WHERE UserId=$branchID GROUP BY UserId");
        if(count($lastTimeEmpty)>0){
            $lastTimeEmpty=$lastTimeEmpty[0]->lastTime;
        }else{
            $lastTimeEmpty="2022-12-10 20:49:10";
        }
        
        $allMoney_of_Agency=DB::select("select count(DocSn)*".$moneyEach." as allMoneyAgency,count(DocSn) as countDocs from document where userSn=".$branchID." and TimeStamp>'$lastTimeEmpty' and isOke!=0 group by userSn");
        
        if(count($allMoney_of_Agency)>0){
            $allMoneyOfAgency=$allMoney_of_Agency[0]->allMoneyAgency;
            $countDocs=$allMoney_of_Agency[0]->countDocs;
        }else{
            $allMoney_of_Agency=0;
            $countDocs=0;
        }

        $allOkeOfAgency=DB::select("select count(DocSn) as allOkeOfAgency from document where userSn=".$branchID." and TimeStamp>'$lastTimeEmpty' and isOke=1 group by userSn");
        if(count($allOkeOfAgency)>0){
            $allOkeOfAgency=$allOkeOfAgency[0]->allOkeOfAgency;
        }else{
            $allOkeOfAgency=0;
        }
        
        $allNotOkeOfAgency=DB::select("select count(DocSn) as allNotOkeOfAgency from document where userSn=".$branchID." and TimeStamp>'$lastTimeEmpty' and isOke=0 group by userSn");
        if(count($allNotOkeOfAgency)>0){
        $allNotOkeOfAgency=$allNotOkeOfAgency[0]->allNotOkeOfAgency;
        }else{
            $allNotOkeOfAgency=0;
        }
        DB::table("accounthistory")->insert(["UserId"=>$branchID, "Money"=>$allMoneyOfAgency, "countDocs"=>$countDocs, "isCounted"=>1, "allOke"=>$allOkeOfAgency, "allNotOke"=>$allNotOkeOfAgency]);
        DB::table("tasviyahrequest")->where("BranchSn",$branchID)->update(["IsRequest"=>0]);
        DB::table("document")->where("UserSn",$branchID)->where("isOke","!=",0)->update(["isCounted"=>1]);
        return Response::json(1);
    }
}