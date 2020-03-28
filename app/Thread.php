<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    protected $fillable = [
        'subject', 'thread', 'views', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Replies');
    }

    public function joined(){
        $users = DB::table('users')->select('id AS uid','name');
        $allThreads = DB::table('threads')->joinSub($users,'user', function($join){$join->on('user_id','=','user.uid');})->get();
        return $allThreads;
    }

}
