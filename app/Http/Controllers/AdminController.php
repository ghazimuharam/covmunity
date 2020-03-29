<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;
use App\Thread;
use App\Replies;
use App\Country;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::where('type','=','static')->get();
        return view('admin.dashboard', ['user' => $user, 'allThreads' => $thread]);
    }

    public function basics()
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::where('type','=','static')->get();
        return view('admin.basic', ['user' => $user, 'allThreads' => $thread]);
    }

    public function addbasics()
    {
        $user = User::find(Auth::user()->id);
        return view('admin.addbasic', ['user' => $user]);
    }

    public function storebasics(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'thread' => 'required|min:25',
        ]);

        $user = User::find(Auth::user()->id);
        $thread = Thread::create([
                    'subject' => $request->subject,
                    'thread' => $request->thread,
                    'views' => 0,
                    'type' => 'static',
                    'user_id' => $user->id
                ]);
        if($thread->save()){
            return redirect(route('basicsManagement'))->with('success','Thread successfully posted!');
        }else{
            return back();
        }
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::findorfail($request->id);
        if(($user->id == $thread->user->id)){
            return view('panel.editthread',['user' => $user, 'thread' => $thread, 'type' => 'Basic']);
        }
        return back()->with('danger','delete failed!');
    }
}
