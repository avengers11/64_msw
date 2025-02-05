<?php

namespace App\Http\Controllers\frontend\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Device;
use App\Models\Package;
use App\Models\users;
use Illuminate\Http\Request;

class admin_frontend_users_Controller extends Controller
{
    //admin_users_all_controller
    public function admin_users_all_controller(Request $request)
    {
        $adminData = users::where("username", $request -> session() -> get('username'))-> first();
        $userData = users::orderBy('id', 'DESC') -> where('st', 'active') -> where('role', '0') -> where('creator_role', $adminData['id']) -> paginate(10);
        return view('admin.pages.users.all') -> with(compact('userData'));
    }

    // admin_users_ban_controller
    public function admin_users_ban_controller()
    {
        if(user()->role == 1){
            $userData = users::orderBy('id', 'DESC') -> where('st', 'ban') -> where('role', '0') -> paginate(10);
        }else{
            $userData = users::orderBy('id', 'DESC') -> where('st', 'ban')->where("creator_role", user()->id) -> where('role', '0') -> paginate(10);
        }
        return view('admin.pages.users.ban') -> with(compact('userData'));
    }

    // admin_users_add_controller
    public function admin_users_add_controller()
    {
        $category = Category::latest()->get();
        $packages = Package::where('type', 'reseller')->latest()->get();
        $user = user();
        
        return view('admin.pages.users.add', compact('category', 'packages', 'user'));
    }

    // admin_users_update_controller
    public function admin_users_update_controller($id)
    {
        $data = users::where('id', $id) -> first();
        $devices = Device::where('username', $data['username'])->latest()->get();
        $category = Category::latest()->get();
        $packages = Package::where('type', 'reseller')->latest()->get();

        return view('admin.pages.users.update') -> with(compact('data', 'id', 'devices', 'category', 'packages'));
    }

    // allExpiredUsers
    public function allExpiredUsers()
    {
        if(user()->role == 1){
            $userData = users::orderBy('id', 'DESC') -> where('st', 'active') -> where('expired', '<', time()) -> where('role', '0') -> paginate(10);
        }else{
            $userData = users::orderBy('id', 'DESC') -> where('st', 'active') -> where('expired', '<', time())->where("creator_role", user()->id) -> where('role', '0') -> paginate(10);
        }
        return view('admin.pages.users.all') -> with(compact('userData'));
    }
}
