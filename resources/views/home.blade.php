@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Available Tests</div>
                    <div class="card-body">
                        <div class="form-horizontal">
                            {!! Form::open(['method' => 'POST','route' => ['test'],'id'=>'formTests']) !!}
                            <div class="form-body">
                                <br>
                                <h4>Please select:</h4>
                                <br>
                                <div class="form-group row">
                                    <div class="col-lg-8" style="padding-left: 30px;">
                                        @foreach($tests as $test)
                                            {{ Form::radio('test_id', $test->id,false,array('id'=>$test->id)) }}
                                            {{ Form::label($test->id, $test->name) }}<br>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button class='btn btn-success' onclick="checkForm()">
                                Start <i class="fa fa-play-circle"></i>
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
            if ($("input:radio[name=test_id]:checked").val() === undefined) {
                swal("Oops!", "Please select an option!", "error");
            } else {
                document.getElementById('formTests').submit();
            }
        }
    </script>
@stop
