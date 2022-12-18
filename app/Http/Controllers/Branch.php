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
        $branches=DB::table("branches")->where("deleted",0)->get();
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

    $branchExist=DB::table("branches")->where("username",$request->post("username"))->where("password",$request->post("password"))->count();
    if($branchExist>0){
        $branch=DB::table("branches")->where("username",$request->post("username"))->get();
        Session::put("userSession","branch");
        Session::put("username",$request->post("username"));
        Session::put("name",$branch[0]->Name);
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
        $name=$request->post("name");
        $username=$request->post("username");
        $password=$request->post("password");
        $code=$request->post("code");
        $picture=$request->file("picture");
        $address=$request->post("Address");
        $username=$request->post("username");
        $password=$request->post("password");
        $cellPhone=$request->post("cellPhone");
        $otherPhone=$request->post("otherPhone");
        DB::table("branches")->insert(["Name"=>"".$name."", "Address"=>"".$address."", "BranchCode"=>"".$code."","username"=>"$username","password"=>"$password"
        ,"CellPhone"=>"$cellPhone","OtherPhone"=>"$otherPhone"]);

        $lastBranchSn=DB::table("branches")->max("BranchSn");

        if($picture){
            $fileName=$lastBranchSn.'.jpg';
            $picture->move("resources/assets/images/branches/",$fileName);
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
}