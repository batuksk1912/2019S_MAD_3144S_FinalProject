@extends('layouts.app')

@section('content')
    <main role="main" class="container">
        <div class="col-lg-8 offset-lg-2">
            <!-- form card  -->
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3 class="mb-0">User Profile Update</h3>
                </div>
                <div class="card-body">
                    <div class="form-horizontal">
                        @if (isset($user))
                            {!! Form::model($user, ['files' => true, 'method' => 'PUT','autocomplete'=>'off', 'route' => ['profile.update', $user->id],'id'=>'form-profile']) !!}
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
                                {!! Form::label('last_name', 'Surname:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('last_name', null, ['class' => 'form-control required']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('email', 'Email:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::email('email', null, ['class' => 'form-control','readonly']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password', 'Password:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::password('password', null, ['class' => 'form-control',]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::password('password_confirmation', null, ['class' => 'form-control',]) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('phone_number', 'Phone:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::text('phone_number', null, ['class' => 'form-control phone required', 'placeholder'=>'(___)___-____', 'data-mask'=>'(000) 000-0000']) !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('address', 'Address:', ['class' => 'col-md-2 control-label']) !!}
                                <div class="col-sm-9">
                                    {!! Form::textarea('address', null, ['class' => 'form-control required','rows'=>'3']) !!}
                                </div>
                            </div>

                            <div class="form-group row m-t-2">
                                <label class="col-lg-6 control-label"></label>
                                <div class="col-lg-6">
                                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
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
