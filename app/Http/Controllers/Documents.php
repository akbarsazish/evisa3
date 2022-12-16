<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Documents extends Controller
{
    public function registrationForm(Request $request){
        return view("documents.registrationForm");
    }

    public function docsList(Request $request){
        return view("documents.docsList");
    }
}