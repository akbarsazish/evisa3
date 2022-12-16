<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Finance extends Controller
{
  public function adminDashboardFinance(){
    return view("finance.reportFinance");
  }
}
