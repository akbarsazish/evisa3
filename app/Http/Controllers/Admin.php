<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use Notification;
use App\Notifications\AlertNotification;
use App\Http\Controllers\Branch;

class Admin extends Controller{
    public function index(Request $request)
    {
		
    }
    public function login(Request $request)
    {
        return view("admin.login");
    }

    public function adminDashboard(Request $request){
        $elanat=DB::table("elanat")->get();
        $allMoney_of_Agency=0;//مال نمایندگی
        $allMoney_to_give=0;//مال مرکزی
        $allOkeOfCenter=0;//تایید شده مرکزی
        $allNotOkeOfCenter=0;//تایید نشده مرکزی
        $allOkeOfAgency=0;//تایید شده نمایندگی
        $allNotOkeOfAgency=0;//تایید نشده نمایندگی
        $allRejectedOfCenter=0;//رد شده ها
        $allRejectedOfAgency=0;//رد شده های شرکت
        $allBranches=0;//تعدتد شعبات
        $allFormsOfAgency=0;//تعدتد فورمهای نمایندگی
        $likeOfAgency=0;//امتیازات مثبت
        $disLikeOfAgency=0;//امتیازات منفی
        $likeOperator=(new Branch)->getLikeOperators()[0];//ضریب لایک
        $likeOperator=(new Branch)->getLikeOperators()[1];//ضریب نفرت
        $moneyEach=(new Branch)->getLikeOperators()[2];//ضریب هر سند از نگاه پول
        $moneyOfCenterEach=(new Branch)->getLikeOperators()[3];//ضریب هر سند از نگاه پول
        $allMoneyOfCenter=0;//مبلغ کل پول بدست آمده توسط مرکز
        $state=0;//برای نمایش درخواست تسویه
        $lastTimeEmpty="2022-12-10 20:49:10" ;//آخرین تاریخیکه تسویه پولی صورت گرفته است.

        $lastTimeEmpty=DB::select("SELECT MAX(TimeStamp) as lastTime FROM accounthistory WHERE UserId=".Session::get("userId")." GROUP BY UserId");
        if(count($lastTimeEmpty)>0){
            $lastTimeEmpty=$lastTimeEmpty[0]->lastTime;
        }else{
            $lastTimeEmpty="2022-12-10 20:49:10" ;
        }
        
        $requestState=DB::select("SELECT IsRequest  FROM tasviyahrequest WHERE BranchSn=".Session::get("userId"));
        if(count($requestState)>0){
            $state=$requestState[0]->IsRequest;
        }




        if(Session::get("userSession")=="branch"){
        $allMoney_of_Agency=DB::select("SELECT count(DocSn)*".$moneyEach." as allMoneyAgency FROM document where userSn=".Session::get("userId")." and TimeStamp>'$lastTimeEmpty' group by userSn");
        if(count($allMoney_of_Agency)>0){
            $allMoney_of_Agency=$allMoney_of_Agency[0]->allMoneyAgency;
        }else{
            $allMoney_of_Agency=0;
        }
        $allRejectedOfAgency=DB::select("SELECT count(DocSn) as allRecjectOfAgency FROM document where userSn=".Session::get("userId")." and TimeStamp>'$lastTimeEmpty' and isCounted=0 and isOke=2 group by userSn");
        if(count($allRejectedOfAgency)>0){
            $allRejectedOfAgency=$allRejectedOfAgency[0]->allRecjectOfAgency;
        }else{
            $allRejectedOfAgency=0;
        }
        
        $allOkeOfAgency=DB::select("SELECT count(DocSn) as allOkeOfAgency FROM document where userSn=".Session::get("userId")." and TimeStamp>'$lastTimeEmpty' and isCounted=0 and isOke=1 group by userSn");
        if(count($allOkeOfAgency)>0){
            $allOkeOfAgency=$allOkeOfAgency[0]->allOkeOfAgency;
        }else{
            $allOkeOfAgency=0;
        }
        
        $allNotOkeOfAgency=DB::select("SELECT count(DocSn) as allNotOkeOfAgency FROM document where userSn=".Session::get("userId")." and TimeStamp>'$lastTimeEmpty' and isCounted=0 and isOke=0 group by userSn");
        if(count($allNotOkeOfAgency)>0){
        $allNotOkeOfAgency=$allNotOkeOfAgency[0]->allNotOkeOfAgency;
        }else{
            $allNotOkeOfAgency=0;
        }

        $likesOfAgency=DB::table("branches")->where("BranchSn",Session::get("userId"))->get();
        if(count($likesOfAgency)>0){
            $likeOfAgency=$likesOfAgency[0]->doLike;
            $disLikeOfAgency=$likesOfAgency[0]->disLike;
        }
        $allFormsOfAgency=DB::select("SELECT count(DocSn) as allFormOfAgency FROM document where userSn=".Session::get("userId")." and TimeStamp>'$lastTimeEmpty' and isCounted=0 group by userSn");
        if(count($allFormsOfAgency)>0){
            $allFormsOfAgency=$allFormsOfAgency[0]->allFormOfAgency;
        }else{
            $allFormsOfAgency=0;
        }
        }
        if(Session::get("userSession")==1 or Session::get("userSession")==2){
            $allMoney_to_give=DB::select("SELECT count(DocSn)*".$moneyEach." as allMoneyToGive FROM document where isCounted=0 ");
            if(count($allMoney_to_give)>0){
                $allMoney_to_give=$allMoney_to_give[0]->allMoneyToGive;
            }else{
                $allMoney_to_give=0;
            }
            
            $allOkeOfCenter=DB::select("SELECT count(DocSn) as allOkeOfCenter FROM document where isOke=1   and isCounted=0");
            if(count( $allOkeOfCenter)>0){
                $allOkeOfCenter=$allOkeOfCenter[0]->allOkeOfCenter;
            }else{
                $allOkeOfCenter=0;
            }

            $allNotOkeOfCenter=DB::select("SELECT count(DocSn) as allNotOkeOfCenter FROM document where isOke=0  and isCounted=0");
            if(count($allNotOkeOfCenter)>0){
                $allNotOkeOfCenter=$allNotOkeOfCenter[0]->allNotOkeOfCenter;
            }else{
                $allNotOkeOfCenter=0;
            }
            
            $allBranches=DB::select("SELECT count(BranchSn) as countBranch FROM branches where deleted=0 ");
            if(count($allBranches)>0){
                $allBranches=$allBranches[0]->countBranch;
            }else{
                $allBranches=0;
            }
            $allRejectedOfCenter=DB::select("SELECT count(DocSn) as allRejectedOfCenter FROM document where isOke=2 and isCounted=0");
            if(count($allRejectedOfCenter)>0){
                $allRejectedOfCenter=$allRejectedOfCenter[0]->allRejectedOfCenter;
            }else{
                $allRejectedOfCenter=0;
            }

            

            $allMoneyOfCenter=DB::select("SELECT sum(moneyAmount) as allMoneyOfCenter,currency FROM centerdocmoney where isCounted=0 group by currency");

        
        }
        return view("admin.dashboard",['elan'=>$elanat[0],
        'allMoneyOfAgency'=>$allMoney_of_Agency,
        'allMoney_to_give'=>$allMoney_to_give,
        'allOkeOfCenter'=>$allOkeOfCenter,
        'allNotOkeOfCenter'=>$allNotOkeOfCenter,
        'allNotOkeOfAgency'=>$allNotOkeOfAgency,
        'allOkeOfAgency'=>$allOkeOfAgency,
        'allBranches'=>$allBranches,
        'allRejectedOfCenter'=>$allRejectedOfCenter,
        'allFormsOfAgency'=>$allFormsOfAgency,
        'likeOfAgency'=>$likeOfAgency,
        'disLikeOfAgency'=>$disLikeOfAgency,
        'allRejectedOfAgency'=>$allRejectedOfAgency,
        'allMoneyOfCenter'=>$allMoneyOfCenter,
        'requestState'=>$state
     ]);
    }

    public function siteSetting(Request $request){
        $lastSiteRules=DB::select("SELECT * FROM bonus where BonusSn=(select max(BonusSn) FROM bonus)");

        return view("admin.siteSetting",["siteRules"=>$lastSiteRules[0]]);
    }

    public function branchList(Request $request){
        return view("admin.branchList");
    }


    public function addingBranch(Request $request){
        return view("admin.addingBranch");
    }

    public function addingAdmin(Request $request){
        return view("admin.addingAdmin");
    }

    public function adminList(Request $request){
        $admins=DB::table("admin")->where("deleted",0)->get();
        return view("admin.adminList",["admins"=>$admins]);
    }

    public function karbarDetails(Request $request){
        $karbarId=$request->get("karbarId");
        $adminsDetails=DB::table("admin")->where("AdminSn",$karbarId)->get();
        return Response::json($adminsDetails);
    }


    public function addAdmin(Request $request)
    {
        $adminExist=DB::table("admin")->where("UserName",$request->post("username"))->count();
        if($adminExist>0){
            return view("admin.addingAdmin",['error'=>"کاربری با این نام کاربری قبلا ثبت شده است."]);
        }
        $name=$request->post("name");
        $username=$request->post("username");
        $password=$request->post("password");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        $address=$request->post("address");
        $adminType=$request->post("adminType");
        $gender=$request->post("gender");
        $picture=$request->file("picture");

        if($gender==1){
            $gender=1;
        }else{
            $gender=0;
        }
        
        DB::table("admin")->insert([ "Name"=>"".$name."", "UserName"=>"".$username."", "Password"=>"".$password."", "AdminType"=>$adminType, "CellPhone"=>"".$cellPhone."", "OtherPhone"=>"".$otherPhone."", "Address"=>"".$address."", "Gender"=>$gender]);
        
        $lastAdminSn=DB::table("admin")->max("AdminSn");
        
        if($picture){
            $fileName=$lastAdminSn.'.jpg';
            $picture->move("resources/assets/images/admins/",$fileName);
        }
        return redirect("/adminList");
    }
    public function getAdmin(Request $request)
    {
        $adminID=$request->get("adminID");
        $admin=DB::table("admin")->where("AdminSn",$adminID)->get();
        return Response::json($admin);
    }
    public function editAdmin(Request $request){
       
     $name=$request->post("name");
     $username=$request->post("username");
     $password=$request->post("password");
     $address=$request->post("address");
     $cellPhone=$request->post("cellPhone");
     $otherPhone=$request->post("otherPhone");
     $gender=$request->post("gender");
     $picture=$request->file("picture");
     if($gender==1){
        $gender=1;
     }else{
        $gender=0;
     }
     $adminType=$request->post("adminType");
     $adminID=$request->post("AdminID");

     DB::table("admin")->where("AdminSn",$adminID)->update([ "Name"=>"".$name."", "UserName"=>"".$username."",
      "Password"=>"".$password."", "AdminType"=>$adminType, "CellPhone"=>"".$cellPhone."", "OtherPhone"=>"".$otherPhone."",
       "Address"=>"".$address."", "Gender"=>$gender]);
       if($picture){
        $fileName=$adminID.'.jpg';
        $picture->move("resources/assets/images/admins/",$fileName);
    }
     return redirect("/adminList");

    }
    public function deleteAdmin(Request $request)
    {
       $adminID=$request->get("adminID");
       DB::table("admin")->where("AdminSn",$adminID)->update(['deleted'=>1]);
       $admins=DB::table("admin")->where("deleted",0)->get();
       return Response::json($admins);
    }

    public function editAdminProfile(Request $request){
        return view("admin.userProfile");
    }




    public function checkAdmin(Request $request)
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


    $adminExist=DB::table("admin")->where("UserName",$request->post("username"))->where("Password",$request->post("password"))->where("deleted",0)->count();
    if($adminExist>0){
        
        $admin=DB::table("admin")->where("UserName",$request->post("username"))->get();
        if($admin[0]->AdminType==1){
            Session::put("userSession",1);
        }else{
            Session::put("userSession",2);
        }
        Session::put("username",$request->post("username"));
        Session::put("name",$admin[0]->Name);
        Session::put("userId",$admin[0]->AdminSn);
        return redirect("/adminDashboard");
    }else{
        $error="نام کاربری و یا رمز ورود اشتباه است";
        return view("admin.login",['loginError'=>$error]);
    }

    }
    public function logout(Request $request)
    {
       Session::forget("userSession");
       Session::forget("username");
       Session::forget("name");
       return redirect("/");
    }

    public function addNewMangageRuleMony(Request $request)
    {
        $problemMinus=$request->post("problemMinus");
        $correctBonus=$request->post("correctBonus");
        $totalOfCenter=$request->post("totalOfCenter");
        $docNum=1;
        $money=$request->post("money");

        DB::table("bonus")->update([ "ProblemMinus"=>$problemMinus,
                                     "CorrectBonus"=>$correctBonus,
                                    "docNum"=>$docNum, "money"=>$money,'totalOfCenter'=>$totalOfCenter]);

        return redirect("/siteSetting");
    }
    public function addElan(Request $request)
    {
        $elanExist=DB::table("elanat")->count();
        $content=$request->post("content");
        $title=$request->post("title");
        if($elanExist>0){
            DB::table("elanat")->update(["Title"=>"$title", "content"=>$content]);
        }else{
            DB::table("elanat")->insert(["Title"=>"$title", "content"=>$content]);
        }
        return redirect("/siteSettings");
    }
    public function checkAdminUserName(Request $request)
    {
        $existOrNot=DB::table("admin")->where("UserName",$request->get("username"))->count();
        if($existOrNot>0){
            return Response::json(1);
        }else{
            return Response::json(0);
        }
    }
    public function tasviyahWithEmbossy(Request $request)
    {
        DB::table("centerdocmoney")->where("isCounted",0)->update(["isCounted"=>1]);
        return Response::json(1);
    }

}
