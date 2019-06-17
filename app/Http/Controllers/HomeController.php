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

    public function indexAdmin()
    {

        Alert::info('You are logged in!', 'Welcome Admin');

        $generalStatus = \DB::select('SELECT
                                CONCAT(users.name, " ", users.last_name) AS "full_name",
                                tests.NAME as test_name,
                                tests.passing_score,
                                sum( users_question_answers.was_right ) AS score,
                            CASE
                                    
                                    WHEN sum( users_question_answers.was_right ) >= tests.passing_score THEN
                                    "Passed" ELSE "Fail" 
                                END AS "final",
                                max(users_question_answers.created_at) as created_at
                            FROM
                                users_question_answers
                                JOIN tests ON users_question_answers.test_id = tests.id 
                                JOIN users ON users_question_answers.user_id = users.id
                            GROUP BY 1,2,3');


        return view('home-admin', ['generalData' => $generalStatus]);
    }
}
