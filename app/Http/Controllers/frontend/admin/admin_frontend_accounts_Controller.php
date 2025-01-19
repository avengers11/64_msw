<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use App\Models\users;
use Illuminate\Http\Request;

class admin_frontend_accounts_Controller extends Controller
{
    //admin_accounts_controller
    public function admin_accounts_controller(Request $request)
    {
        return view('admin.pages.accounts.login');
    }
}
