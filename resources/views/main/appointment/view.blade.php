@extends('root')
@section('content')


        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 class="page-title">Appointment Games</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Appointments</li>
                            </ul>
                        </div>


                            <div class="col-md-3 float-right ml-auto">
                        <form action="{{ route('appointment.import') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                                 {{--<input type="file" name="import_file"  class="form-control">--}}
                            </div>

                            <div class="col-md-3 d-flex">
                               {{-- <button  type="file" class="btn add-btn "><i class="fa fa-plus"></i>  Import File</button> --}}
                                <button  type="button" class="btn add-btn " data-toggle="modal" data-target="#excel_file"> Select Excel File</button>
                            </div>
                        </form>
                    </div>

                    <!-- Search Filter -->
                    <form method="get" action="">
                    <div class="row filter-row mt-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="year" value="{{ app('request')->input('year') }}">
                                <label class="focus-label">Year</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group form-focus">
{{--                                <input type="text" class="form-control floating" name="round" value="{{ app('request')->input('round') }}">--}}
                                <select  class="select " name="round">
                                    @foreach(\App\Model\Appointment::select('round')->groupBy('round')->get() as $round  )
                                    <option @if( app('request')->input('round') == $round->round ) selected @endif>{{$round->round}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <button type="submit" class="btn btn-success btn-block"> Search </button>
                        </div>
                    </div>
                    </form>
                    <!-- Search Filter -->
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Round</th>
                                        <th>Home Team</th>
                                        <th>Away Team</th>
                                        <th>Grade</th>
                                        <th>Referee</th>
                                        <th>Touch Judge #1</th>
                                        <th>Touch Judge #2</th>
                                        <th>Coach</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appoints as $app)
                                    <tr>
                                        <td>{{ $app->round }}</td>
                                        <td>{{ $app->home_team }}</td>
                                        <td>{{ $app->away_team }}</td>
                                        <td @if(!$app->rates) style= " border: 1px solid red;" data-toggle="tooltip" data-placement="top" title="Can't find grade" @endif>{{ $app->grade }}</td>
                                        <td>{{ $app->referee }}</td>
                                        <td>{{ $app->touch_judge_one }}</td>
                                        <td>{{ $app->touch_judge_two }}</td>
                                        <td>{{ $app->coach }}</td>
                                        <td>
                                            <a href="{{ route('appointment.edit',$app->id) }}" type="button" class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

            <!-- Edit Expenses Modal -->
            <div id="excel_file" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Appointment Games</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('appointment.import') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Year</label>
                                            <input class="form-control" name="year" required type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Round</label>
                                            <input class="form-control" name="round" required type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Excel File</label>
                                            <input class="form-control" name="import_file" required type="file">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <button class="btn btn-primary submit-btn">Import</button>
                                    <button class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Expenses Modal -->

        </div>
        <!-- /Page Wrapper -->


@endsection
