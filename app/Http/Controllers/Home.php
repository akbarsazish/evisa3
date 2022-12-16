<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use BrowserDetect;
use Carbon\Carbon;
use \Morilog\Jalali\Jalalian;
class Home extends Controller{

     public function index(){
        return view("home.home");
    }


    public function login(Request $reques)
    {
        return view("login.login");
    }
}
