<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ThreadReply;


class User extends Authenticatable
{
    use Notifiable;

    public function threads()
    {
        return $this->hasMany('App\Thread');
    }

    public function replies()
    {
        return $this->hasMany('App\Replies');
    }

    public function country()
    {
        return $this->hasOne('App\Country', 'id','country_id');
    }

    public function role()
    {
        return $this->hasOne('App\Role', 'id','roles_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_id','roles_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
