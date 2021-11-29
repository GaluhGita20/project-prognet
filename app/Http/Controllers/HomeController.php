<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function add_user()
    {
        return view('pages.add-nasabah');
    }

    public function view_history()
    {
        $user = Auth::user();
        $histories = History::where('user_id', '=', $user->id)->get();
        return view('pages.history', compact('histories'));
    }
}
