<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends BaseModel
{
    protected $fillable = [
        'users_id',
        'detail'
    ];

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
