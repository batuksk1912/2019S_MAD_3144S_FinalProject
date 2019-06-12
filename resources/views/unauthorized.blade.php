@extends('layouts.app')

@section('content')
    <div class="text-danger m-b-md text-center">
        You cannot access this page! It's allowed for {{$role}} roles only!
    </div>
@endsection
