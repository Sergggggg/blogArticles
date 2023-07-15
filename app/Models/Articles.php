<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [

        'id',
        'title',
        'article',
        'user_id',
        'created_at',
        'updated_at'

    ];
}
