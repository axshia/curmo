<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    protected $fillable = [
        'users_id',
        'detail'
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
