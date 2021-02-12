@extends('root')
@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Appointment Games</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('appointment.show')}}">Appointments</a></li>
                                <li class="breadcrumb-item active">Appointment Games</li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>Documents</th>
                                        <th>Uploaded By</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($files as $file)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $file->filename }}</td>
                                        <td>{{ $file->user->fname.' '.$file->user->lname }}</td>
                                        <td>{{ date('d-m-Y', strtotime($file->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('appointment.game.delete',$file->id) }}"
                                              onclick="if(!confirm('Are you sure?')){return false;}"   class=" trash-icon"><i class="fa fa-trash fa-lg"></i></a>
                                            <a href="{{ asset('main/upload_files/').'/'.$file->linkname }}" class="" download><i class="fa fa-download fa-lg"></i></a>
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
