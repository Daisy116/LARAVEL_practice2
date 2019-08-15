<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    function index() {
        $username = Session::get("username", "Guest");
        return view("home.index", compact("username"));
    }

    function secret() {
        $username = Session::get("username", "Guest");
        if($username == "Guest"){
            // return "Guest";
            Session::put("returnto", "/home/secret");
            return redirect("/member/login");
        }else{
            return view("home.secret");
        }      
    }
}
