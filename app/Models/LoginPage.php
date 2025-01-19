<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginPage extends Model
{
    use HasFactory;

    protected $casts = [
        'contact_us' => 'array',
        'buy_now' => 'boolean'
    ];
}
