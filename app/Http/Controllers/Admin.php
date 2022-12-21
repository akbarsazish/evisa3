<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use Notification;
use App\Notifications\AlertNotification;

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
        $allBranches=0;//تعدتد شعبات

        if(Session::get("userSession")=="branch"){
        $allMoney_of_Agency=DB::select("select count(DocSn)*300 as allMoneyAgency from document where userSn=".Session::get("userId")." and isOke!=0 group by userSn");
        if(count($allMoney_of_Agency)>0){
            $allMoney_of_Agency=$allMoney_of_Agency[0]->allMoneyAgency;
        }else{
            $allMoney_of_Agency=0;
        }
        
        $allOkeOfAgency=DB::select("select count(DocSn) as allOkeOfAgency from document where userSn=".Session::get("userId")." and isOke=1 group by userSn");
        if(count($allOkeOfAgency)>0){
            $allOkeOfAgency=$allOkeOfAgency[0]->allOkeOfAgency;
        }else{
            $allOkeOfAgency=0;
        }
        
        $allNotOkeOfAgency=DB::select("select count(DocSn) as allNotOkeOfAgency from document where userSn=".Session::get("userId")." and isOke=0 group by userSn");
        if(count($allNotOkeOfAgency)>0){
        $allNotOkeOfAgency=$allNotOkeOfAgency[0]->allNotOkeOfAgency;
        }else{
            $allNotOkeOfAgency=0;
        }
        }
        if(Session::get("userSession")==1 or Session::get("userSession")==2){
            $allMoney_to_give=DB::select("select count(DocSn)*300 as allMoneyToGive from document where isOke!=0");
            if(count($allMoney_to_give)>0){
                $allMoney_to_give=$allMoney_to_give[0]->allMoneyToGive;
            }else{
                $allMoney_to_give=0;
            }
            
            $allOkeOfCenter=DB::select("select count(DocSn) as allOkeOfCenter from document where isOke=1");
            if(count( $allOkeOfCenter)>0){
            $allOkeOfCenter=$allOkeOfCenter[0]->allOkeOfCenter;
            }else{
                $allOkeOfCenter=0;
            }
            $allNotOkeOfCenter=DB::select("select count(DocSn) as allNotOkeOfCenter from document where isOke=0");
            if(count($allNotOkeOfCenter)>0){
                $allNotOkeOfCenter=$allNotOkeOfCenter[0]->allNotOkeOfCenter;
            }else{
                $allNotOkeOfCenter=0;
            }
            
            $allBranches=DB::select("select count(BranchSn) as countBranch from branches where deleted=0");
            if(count($allBranches)>0){
                $allBranches=$allBranches[0]->countBranch;
            }else{
                $allBranches=0;
            }
            $allRejectedOfCenter=DB::select("select count(DocSn) as allRejectedOfCenter from document where isOke=2");
            if(count($allRejectedOfCenter)>0){
                $allRejectedOfCenter=$allRejectedOfCenter[0]->allRejectedOfCenter;
            }else{
                $allRejectedOfCenter=0;
            }
        
        }
        return view("admin.dashboard",['elan'=>$elanat[0],
        'allMoneyOfAgency'=>$allMoney_of_Agency,
        'allMoney_to_give'=>$allMoney_to_give,
        'allOkeOfCenter'=>$allOkeOfCenter,
        'allNotOkeOfCenter'=>$allNotOkeOfCenter,
        'allNotOkeOfAgency'=>$allNotOkeOfAgency,
        'allOkeOfAgency'=>$allOkeOfAgency,
        'allBranches'=>$allBranches,
        'allRejectedOfCenter'=>$allRejectedOfCenter
     ]);
    }

    public function siteSetting(Request $request){
        $lastSiteRules=DB::select("SELECT * FROM bonus where BonusSn=(select max(BonusSn) from bonus)");

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
    public function addAdmin(Request $request)
    {
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
        $problems=$request->post("problems");
        $problemMinus=$request->post("problemMinus");
        $corrects=$request->post("corrects");
        $correctBonus=$request->post("correctBonus");
        $docNum=$request->post("docNum");
        $money=$request->post("money");

        DB::table("bonus")->insert(["Problems"=>$problems, "ProblemMinus"=>$problemMinus,
                                    "Corrects"=>$corrects, "CorrectBonus"=>$correctBonus,
                                    "docNum"=>$docNum, "money"=>$money]);

        return redirect("/siteSetting");
    }
    public function addElan(Request $request)
    {
        $elanExist=DB::table("elanat")->count();
        $content=$request->post("content");
        $title=$request->post("title");
        $picture=$request->file("img");
        if($elanExist>0){
            DB::table("elanat")->update(["Title"=>"$title", "content"=>$content]);
        }else{
            DB::table("elanat")->insert(["Title"=>"$title", "content"=>$content]);
        }
        $lastElanSn=DB::table("elanat")->max("elanSn");
        if($picture){
            $fileName=$lastElanSn.'.jpg';
            $picture->move("resources/assets/images/elanat/",$fileName);
        }
        return redirect("/siteSettings");
    }

}
