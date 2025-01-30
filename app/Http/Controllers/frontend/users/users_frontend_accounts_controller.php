<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use App\Models\LoginPage;
use App\Models\management;
use App\Models\users;
use Illuminate\Http\Request;

class users_frontend_accounts_controller extends Controller
{
    //users_accounts_controller
    public function users_accounts_controller(Request $request)
    {
        // if login 
        if(users::where('username', $request->session()->get('username'))->exists()){
            return redirect(route('users_home_web'));
        }

        $login = LoginPage::where('login_page', '!=', 0)->orderBy("id", "ASC")->first();

        if(LoginPage::where('login_page', 1) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login1') -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
    public function users_accounts2_controller()
    {
        $login = LoginPage::where('login_page', 2) -> orderByDesc("id") -> first();
        if(LoginPage::where('login_page', 2) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login2') -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
    public function users_accounts3_controller()
    {
        $login = LoginPage::where('login_page', 3) -> orderByDesc("id") -> first();
        if(LoginPage::where('login_page', 3) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login3') -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
    public function users_accounts4_controller()
    {
        $login = LoginPage::where('login_page', 4) -> orderByDesc("id") -> first();
        if(LoginPage::where('login_page', 4) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login4') -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
    public function users_accounts5_controller()
    {
        $login = LoginPage::where('login_page', 5) -> orderByDesc("id") -> first();
        if(LoginPage::where('login_page', 5) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login5') -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
    public function users_dynamic_login_controller($login, Request $request)
    {
        // if login 
        if(users::where('username', $request->session()->get('username'))->exists()){
            return redirect(route('users_home_web'));
        }

        $login = LoginPage::where('route', $login)->where('login_page', '!=', 0)->first();
        if(!empty($login)){
            return view('users.pages.accounts.login'.$login->login_page) -> with(compact('login'));
        }else{
            return "No Data Found";
        }
    }
}
