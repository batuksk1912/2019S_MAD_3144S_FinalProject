@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Tests Management</div>

                    <div class="card-body">
                        <table class="table table-striped display data-table" id="studentsTable">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Creator</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date of creation</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($test_data as $test)
                                <tr>
                                    <td>{{ $test->id}}</td>
                                    <td>{{ $test->name}}</td>
                                    <td>{{ $test->user->name. " ".$test->user->last_name}}</td>
                                    @if ($test->is_active == "1")
                                        <td><span class="text-success font-weight-bold"> Active </span>
                                        </td>
                                    @else
                                        <td><span class="text-danger font-weight-bold"> Inactive </span>
                                        </td>
                                    @endif
                                    <td>{{ $test->created_at}}</td>
                                    <td><a href="{{ URL::to('/edit-tests/'.$test->id)}}">
                                            <button class='btn btn-default btn-lg'>
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a></td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
