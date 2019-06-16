<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;

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

        \Session::regenerate();
        //var_dump(\Session::getId());
        // Alert::info('You are logged in!', 'Welcome!');
        $tests = \App\Tests::all()->where('is_active', '=', '1')->take(5);

        return view('home', ['tests' => $tests]);
    }
}
