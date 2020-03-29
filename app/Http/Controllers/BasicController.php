<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Replies;

class BasicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $thread = Thread::findorfail($request->id);
        if($thread->user->id != $user->id){
            $thread->increment('views');
        }
        return view('panel.thread', ['user' => $user, 'thread' => $thread]);
    }
}
