<?php 
function admin_data($username){
    return \App\Models\users::where("username", $username)-> first();
}
function user(){
    return \App\Models\users::where('username', session()->get('username'))->first();
}