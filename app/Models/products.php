<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
