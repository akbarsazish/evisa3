<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Response;
use Session;
use Notification;
use App\Notifications\AlertNotification;
use App\Http\Controllers\Branch;

class Finance extends Controller
{
  public function adminDashboardFinance(Request $request){
    $moneyEach=(new Branch)->getLikeOperators()[2];
    $report=DB::select("SELECT *,countDocument*$moneyEach as debets from(
      SELECT * from(
            SELECT UserSn,count(DocSn) as countDocument FROM document GROUP BY UserSn)a
            RIGHT join branches on a.UserSn=branches.BranchSn)b
             left join (
      SELECT UserSn,count(DocSn) as countNotOkeDocument FROM document where  isOke=0 GROUP BY UserSn)c 
                on b.BranchSn=c.UserSn WHERE b.deleted=0");
    return view("finance.reportFinance",['reports'=>$report]);
  }
  public function getReport(Request $request){
    $startDate=$request->get("startDate");
    $endDate=$request->get("endDate");
    $report=DB::select("SELECT * from(
      SELECT UserSn,count(DocSn) as countDocument FROM document where DATE(TimeStamp)>='$startDate' and DATE(TimeStamp) <='$endDate' GROUP BY UserSn)a
      join branches on a.UserSn=branches.BranchSn");
    return view("finance.reportFinance",['reports'=>$report]);
  }
}
