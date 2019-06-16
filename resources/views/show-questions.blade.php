@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@foreach($questions as $question)
                            {{$question->test->name}}
                        @endforeach
                        <div class="float-right">
                            {{$step}}/10
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-horizontal">
                            {!! Form::open(['method' => 'POST','route' => ['test'],'id'=>'formQuestions']) !!}
                            {{ Form::hidden('test_id',$question->test_id) }}
                            {{ Form::hidden('question_id',$question->answers->first()->question_id) }}
                            <div class="form-body">
                                <br>
                                <h4>{{$question->question}}</h4>
                                <br>
                                <div class="form-group row">
                                    <div class="col-lg-12" style="padding-left: 30px;">
                                        @foreach($questions as $question)
                                            @foreach($question->answers as $answer)
                                                {{ Form::radio('answer_id', $answer->id,false,array('id'=>$answer->id)) }}
                                                {{ Form::label($answer->id, $answer->answer) }}<br>
                                                {{ Form::hidden('aux-'.$answer->id,base64_encode(microtime()."-".$answer->is_right_answer))}}
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-block">
                        <div class="float-right">

                            @if ($step === 10)
                                <button class='btn btn-danger' onclick="checkForm()">See test results <i
                                            class="fa fa-play-circle"></i>
                                    @else
                                        <button class='btn btn-primary' onclick="checkForm()">Next <i
                                                    class="fa fa-play-circle"></i>
                                            @endif

                                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script type="text/javascript">
        function checkForm() {
            if ($("input:radio[name=answer_id]:checked").val() === undefined) {
                swal("Oops!", "Please select an option!", "error");
            } else {
                document.getElementById('formQuestions').submit();
            }
        }
    </script>
@stop
