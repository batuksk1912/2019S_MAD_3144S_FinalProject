@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tests history</div>

                    <div class="card-body">
                        <table class="table table-striped display data-table" id="studentsTable">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Passing Score</th>
                                <th scope="col">User Score</th>
                                <th scope="col">Final Result</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($historyData as $history)
                                <tr>
                                    <td>{{ $history->name}}</td>
                                    <td>{{ number_format($history->passing_score,1)}}</td>
                                    <td>{{ number_format($history->score,1)}}</td>
                                    @if ($history->final == "Pass")
                                        <td><span class="text-success font-weight-bold"> {{ $history->final}} </span>
                                        </td>
                                    @else
                                        <td><span class="text-danger font-weight-bold"> {{ $history->final}} </span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
