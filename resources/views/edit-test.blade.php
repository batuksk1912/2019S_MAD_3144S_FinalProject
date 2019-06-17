@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="col-lg-8 offset-lg-2">
            <!-- form card  -->
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">Test Edit</h3>
                </div>
                <div class="card-body">
                    <div class="form-horizontal">
                        @if (isset($test))
                            {!! Form::model($test, ['files' => true, 'method' => 'PUT','autocomplete'=>'off', 'route' => ['update-tests', $test->id],'id'=>'form-test']) !!}
                        @endif
                        <br>
                        <div class="form-body">

                            <div class="form-group row">
                                {!! Form::label('name', 'Name:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('name', null, ['class' => 'form-control required']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('description', 'Description:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('description', null, ['class' => 'form-control required','rows'=>3]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('passing_score', 'Passing Score:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::number('passing_score', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('Status:', '', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {{ Form::radio('is_active', '1',true) }} Active <br>
                                    {{ Form::radio('is_active', '0') }} Inactive
                                </div>
                            </div>

                            <div class="form-group row m-t-1">
                                <label class="col-lg-4 control-label"></label>
                                <div class="col-lg-4">
                                    {!! Form::button('Cancel', ['class' => 'btn btn-primary','onClick'=>"window.location='/manage-tests';"]) !!}
                                    {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
