<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositPackage extends Model
{
    use HasFactory;

    function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }
    function user(){
        return $this->belongsTo(users::class, 'user_id');
    }
}
