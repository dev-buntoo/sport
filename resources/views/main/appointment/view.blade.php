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
                                 <input type="file" name="import_file"  class="form-control">
                            </div>

                            <div class="col-md-3 d-flex">
                                <button  type="file" class="btn add-btn "><i class="fa fa-plus"></i>  Import File</button>
                            </div>
                        </form>
                    </div>

                    <!-- Search Filter -->
                    <div class="row filter-row mt-3">
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name="year">
                                <label class="focus-label">Year</label>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group form-focus">
                                <input type="text" class="form-control floating" name round>
                                <label class="focus-label">Round</label>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <a href="#" class="btn btn-success btn-block"> Search </a>
                        </div>
                    </div>
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
                                        <th>Refree</th>
                                        <th>Touch Judge #1</th>
                                        <th>Touch Judge #2</th>
                                        <th>Coach</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($appoints as $app)
                                    <tr>
                                        <td>1</td>
                                        <td>{{ $app->home_team }}</td>
                                        <td>{{ $app->away_team }}</td>
                                        <td style= "@if(!$app->rates) border: 1px solid red; @endif">{{ $app->grade }}</td>
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

            <!-- Delete Leave Modal -->
            <div class="modal custom-modal fade" id="delete_approve" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="form-header">
                                <h3>Delete Leave</h3>
                                <p>Are you sure want to Cancel this leave?</p>
                            </div>
                            <div class="modal-btn delete-action">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
                                    </div>
                                    <div class="col-6">
                                        <a href="javascript:void(0);" data-dismiss="modal"
                                            class="btn btn-primary cancel-btn">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Delete Leave Modal -->

        </div>
        <!-- /Page Wrapper -->


@endsection
