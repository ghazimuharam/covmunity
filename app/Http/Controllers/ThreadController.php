<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Replies;

class ThreadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $thread = Thread::findorfail($request->id);
        if($thread->user->id != $user->id){
            $thread->increment('views');
        }
        return view('panel.thread', ['user' => $user, 'thread' => $thread, 'replies' => $thread->replies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'thread' => 'required|min:25',
        ]);

        $user = Auth::user();
        $thread = Thread::create([
                                'subject' => $request->subject,
                                'thread' => $request->thread,
                                'views' => 0,
                                'type' => 'thread',
                                'user_id' => $user->id
                            ]);
        if($thread->save()){
            return redirect(route('forum'))->with('success','Thread successfully posted!');
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $user = Auth::user();
        return view('panel.addthread', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        $thread = Thread::findorfail($request->id);
        if(($user->id == $thread->user->id)){
            return view('panel.editthread',['user' => $user, 'thread' => $thread, 'type' => 'Thread']);
        }
        return back()->with('danger','delete failed!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'thread' => 'required|min:25',
        ]);

        $user = Auth::user();
        $thread = Thread::findorfail($request->id);

        if($user->id == $thread->user->id){
            $update = $thread->update([
                'subject' => $request->subject,
                'thread' => $request->thread,
            ]);
            if($update){
                return redirect(route('thread',$thread->id))->with('success','Thread edited successfully!');
            }else{
                return back()->with('danger','edit failed!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $thread = Thread::findorfail($request->id);

        if($user->id == $thread->user->id){
            if($thread->delete()){
                return redirect(route('forum'))->with('success','Thread successfully deleted!');
            }
        }else{
            return back();
        }
    }
}
