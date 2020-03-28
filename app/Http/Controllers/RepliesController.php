<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Replies;

class RepliesController extends Controller
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
    public function index()
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
            'replies' => 'required|min:9',
        ]);

        $user = Auth::user();
        $replies = Replies::create([
                                'reply' => $request->replies,
                                'user_id' => $user->id,
                                'thread_id' => $request->id
                            ]);
        if($replies->save()){
            return redirect(route('thread',$request->id))->with('success','Reply successfully posted!');
        }else{
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Replies  $replies
     * @return \Illuminate\Http\Response
     */
    public function edit(Replies $replies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Replies  $replies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replies $replies)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Replies  $replies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Auth::user();
        $replies = Replies::find($request->rid);
        if($user->id == $replies->user->id){
            if($replies->delete()){
                return back()->with('success','Reply deleted successfully!');
            }
        }
        return back()->with('danger','delete failed!');
    }
}
