<?php

namespace App\Http\Controllers;

use App\UsersQuestionAnswers;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {


        $history = \DB::select('SELECT
                                users_question_answers.session_id,
                                tests.name,
                                tests.passing_score,
                                sum(users_question_answers.was_right) as score,
                                CASE
                                    WHEN sum(users_question_answers.was_right) >= tests.passing_score THEN "Passed"
                                    ELSE "Fail"
                                END as "final",
                                max(users_question_answers.created_at) as created_at
                                FROM
                                users_question_answers
                                JOIN tests
                                ON users_question_answers.test_id = tests.id
                                WHERE
                                users_question_answers.user_id = ' . \Auth::id() . '
                                group by 1,2,3');


        return view('history')->with(['historyData' => $history]);
    }
}
