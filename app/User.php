<?php

namespace App;

use Collective\Annotations\Database\Eloquent\Annotations\Annotations\Bind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App
 * @mixin \Eloquent
 */
class User extends Authenticatable
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
        'password', 'remember_token'
    ];

    public $timestamps = true;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
