<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeVisible($query)
    {
        return $query->where('is_visible', 1);
    }

    // 1つの商品が1人のuserに紐づくので
    // 単数形でかいてる
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        
}
