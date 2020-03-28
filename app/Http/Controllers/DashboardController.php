<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Thread;
use App\Replies;
class DashboardController extends Controller
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
        $user = Auth::user();
        return view('panel.dashboard', ['user' => $user]);
    }

    public function forum()
    {
        $user = Auth::user();
        $thread = Thread::get();
        return view('panel.forum', ['user' => $user, 'allThreads' => $thread]);
    }

}
