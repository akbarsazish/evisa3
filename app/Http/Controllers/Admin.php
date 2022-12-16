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
        return view("admin.dashboard");
    }

    public function registrationForm(Request $request){
        return view("admin.registrationForm");
    }

    public function docsList(Request $request){
        return view("admin.docsList");
    }
}
