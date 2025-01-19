<?php

namespace App\Http\Controllers\frontend\users;

use App\Http\Controllers\Controller;
use App\Models\LoginPage;
use Illuminate\Http\Request;
use App\Models\management;

class users_frontend_accounts_controller extends Controller
{
    //users_accounts_controller
    public function users_accounts_controller()
    {
        $login = LoginPage::where('login_page', 1) -> orderByDesc("id") -> first();
        if(LoginPage::where('login_page', 1) -> orderByDesc("id") -> exists()){
            return view('users.pages.accounts.login') -> with(compact('login'));
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
}
