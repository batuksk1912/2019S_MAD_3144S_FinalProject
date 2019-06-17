@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">General Status</div>

                    <div class="card-body">
                        <table class="table table-striped display data-table" id="studentsTable">
                            <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Test</th>
                                <th scope="col">User name</th>
                                <th scope="col">Passing Score</th>
                                <th scope="col">User Score</th>
                                <th scope="col">Final Result</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($generalData as $history)
                                <tr>
                                    <td style="font-size: 12px;">{{ $history->created_at}}</td>
                                    <td>{{ $history->test_name}}</td>
                                    <td>{{ $history->full_name}}</td>
                                    <td><span class="text-info ">{{ number_format($history->passing_score,1)}}</span>
                                    </td>
                                    <td>{{ number_format($history->score,1)}}</td>
                                    @if ($history->final == "Passed")
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
