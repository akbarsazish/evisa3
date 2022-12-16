<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cookie;
use BrowserDetect;
use Response;
class Logout extends controller{
    public function logout(Request $request)
    {
        return redirect('/login');
    }
    public function login(Request $request)
    {
        return  view('login.login');
    }
   
}
