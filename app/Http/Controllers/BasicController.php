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

    public function store(Request $request)
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
            return redirect(route('forum'))->with('success','Basic successfully posted!');
        }else{
            return back();
        }
    }

    public function show(Thread $thread)
    {
        $user = User::find(Auth::user()->id);
        return view('panel.addthread', ['user' => $user]);
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

    public function update(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'thread' => 'required|min:25',
        ]);

        $user = User::find(Auth::user()->id);
        $thread = Thread::findorfail($request->id);

        if($user->id == $thread->user->id){
            $update = $thread->update([
                'subject' => $request->subject,
                'thread' => $request->thread,
            ]);
            if($update){
                return redirect(route('thread',$thread->id))->with('success','Basic edited successfully!');
            }else{
                return back()->with('danger','edit failed!');
            }
        }
    }

    public function destroy(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::findorfail($request->id);

        if($user->id == $thread->user->id){
            if($thread->delete()){
                return redirect(route('forum'))->with('success','Basic successfully deleted!');
            }
        }else{
            return back();
        }
    }
}
