@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{$test[0]['name']}}
                    </div>
                    <div class="card-body">
                        <div class="form-horizontal">
                            <div class="form-body">
                                <br>
                                <h4>Final Score:</h4>
                                <br>
                                <div class="form-group row">
                                    <div class="col-lg-12" style="padding-left: 30px;">
                                        @if ($score_data >= $test[0]['passing_score'])
                                            <span class="text-success font-weight-bold"> Congratulations! you successfully passed!</span>
                                        @else
                                            <h2 class="text-danger font-weight-bold"> Nice try! but you did not pass the
                                                test.</h2>
                                        @endif
                                        <br>
                                        You marked {{$score_data}} out of 10 or {{($score_data*10/100)*100}}%.

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-block">
                        <div class="text-center">
                            <a href="/home">
                                <button class='btn btn-primary'>Start Over <i class="fa fa-refresh"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection