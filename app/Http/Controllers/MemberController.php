<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MemberController extends Controller
{
    function login() {
        // $request = new \stdClass();
        // $request->txtUserName = "在這裡輸入";
        // $request->txtPassword = "會直接在login中預設顯示";
        $request = (object) ["txtUserName" => "", "txtPassword" => ""];
        return view("member.login", compact("request"));
    }

    function post_login(Request $request) {
        // 以下這兩個if不該在controller中做，應該在model中做
        if($request->txtUserName == ''){
            return view("member.login", compact("request"));   // 沒輸入帳號的話停留在該畫面
        }
        if($request->txtPassword == ''){
            return view("member.login", compact("request"));   // 沒輸入密碼的話停留在該畫面
        }
        Session::put('username', $request->txtUserName);
        $goto = Session::get("returnto", "/home/index");
        Session::forget("returnto");
        // return redirect($goto);
        return redirect("/home/index");
    }

    function logout() {
        Session::forget("username");      // 把session洗掉
        return redirect("/home/index");
    }
}
