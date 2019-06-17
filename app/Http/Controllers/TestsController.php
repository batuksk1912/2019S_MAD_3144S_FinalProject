<?php

namespace App\Http\Controllers;

use App\Questions;
use App\Tests;
use App\UsersQuestionAnswers;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = \App\Tests::with('user')->get();

        return view('show-tests', ['test_data' => $tests]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $currentSession = \Session::getId();

        $currentTestId = $request['test_id'];

        //\Session::regenerate();


        if ($request['answer_id']) {

            $aux = explode("-", base64_decode($request['aux-' . $request['answer_id']]));
            $wasRight = end($aux);

            UsersQuestionAnswers::firstOrCreate(['user_id' => \Auth::id(), 'session_id' => $currentSession, 'test_id' => $currentTestId, 'was_right' => $wasRight, 'question_id' => $request['question_id'], 'answer_id' => $request['answer_id']]);
        }

        //check if the user has previous answered questions...
        $history = UsersQuestionAnswers::where('test_id', '=', $currentTestId)
            ->where('user_id', '=', \Auth::id())
            ->where('session_id', '=', \Session::getId())
            ->get()->pluck('question_id')->toArray();


        if (count($history) >= 10) {
            $score_data = UsersQuestionAnswers::where('test_id', '=', $currentTestId)
                ->where('user_id', '=', \Auth::id())
                ->where('was_right', '=', 1)
                ->get()->count();

            $testData = Tests::where('id', '=', $currentTestId)->get()->toArray();
            return view('show-score', ['score_data' => $score_data, 'test' => $testData]);
            exit();

        } else {


            $stepCount = count($history) + 1;
            $questions = Questions::with('answers', 'test')
                ->where('test_id', '=', $currentTestId)
                ->where('is_active', '=', 1)
                ->whereNotIn('id', $history)
                ->get()->shuffle()->take(1);

            return view('show-questions', ['questions' => $questions, 'step' => $stepCount]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Tests::findOrFail($id);

        return view('edit-test')->with('test', $test);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test = Tests::findOrFail($id);

        if (!$test->update($request->all())) {
            \Alert::error('Please try again.', 'Error');
            return redirect()->back();
        }
        \Alert::success('Test updated successfully!', 'Success');
        return redirect()->route('manage-tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
