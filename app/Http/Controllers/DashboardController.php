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
        $user = User::find(Auth::user()->id);
        $json = json_decode(file_get_contents('https://ghzmhrm.dev/coronaTime.php'), true);
        $confirmed = $json['confirmed'];
        $date = $json['date'];

        return view('panel.dashboard', ['user' => $user, 'confirmed' => $confirmed, 'date' => $date]);
    }

    public function forum()
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::where('type','=','thread')->get();
        return view('panel.forum', ['user' => $user, 'allThreads' => $thread]);
    }

    public function basic()
    {
        $user = User::find(Auth::user()->id);
        $thread = Thread::where('type','=','static')->get();
        return view('panel.basic', ['user' => $user, 'allThreads' => $thread]);
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        $country = Country::get();
        return view('profile', ['user' => $user, 'countries' => $country]);
    }

    public function submitprofile(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'country' => 'required'
        ]);

        $auth = Auth::user();
        $user = User::findorfail($auth->id);

        $update = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'country_id' => $request->country
        ]);

        if($update){
            return redirect(route('profile'))->with('success','Information edited successfully!');
        }

        return back()->with('danger','edit failed!');

    }
}
