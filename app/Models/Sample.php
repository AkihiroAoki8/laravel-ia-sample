<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    // Model::createでまとめて登録するときに記載必要
    protected $fillable = [
        'name', 'email'
    ];
}
