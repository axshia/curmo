<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @package App
 */
class User extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'addresses_id',
        'name',
        'email',
        'password',
        'picture',
        'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    public $timestamps = true;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
