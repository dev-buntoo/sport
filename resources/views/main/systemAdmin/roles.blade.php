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
                            <h3 class="page-title">System Admins</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Roles</li>
                            </ul>
                        </div>
                        <div class="col float-right ml-auto">
                            <a href="#"  data-toggle="modal" data-target="#roles" data-original-title="Edit" class="btn add-btn"><i class="fa fa-plus"></i> Create</a>
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
                                        <th>Roles</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>

                                        @if($role->view_member == 1)
                                            <span class="badge bg-inverse-danger">View Member</span>
                                        @endif
                                        @if($role->create_member == 1)
                                            <span class="badge bg-inverse-danger">Create Member</span>
                                        @endif
                                        @if($role->edit_member == 1)
                                            <span class="badge bg-inverse-danger">Edit Member</span>
                                        @endif
                                        @if($role->delete_member == 1)
                                            <span class="badge bg-inverse-danger">Delete Member</span>
                                        @endif
                                        @if($role->view_payroll == 1)
                                            <span class="badge bg-inverse-danger">View Payroll</span>
                                        @endif
                                        @if($role->edit_payroll == 1)
                                            <span class="badge bg-inverse-danger">Edit Payroll</span>
                                        @endif
                                        @if($role->view_appointments == 1)
                                            <span class="badge bg-inverse-danger">View Appointments</span>
                                        @endif
                                        @if($role->edit_appointments == 1)
                                            <span class="badge bg-inverse-danger">Edit Appointments</span>
                                        @endif
                                        @if($role->manage_documents == 1)
                                            <span class="badge bg-inverse-danger">Manage Documents</span>
                                        @endif
                                        @if($role->view_roles == 1)
                                            <span class="badge bg-inverse-danger">View Roles</span>
                                        @endif
                                        @if($role->edit_roles == 1)
                                            <span class="badge bg-inverse-danger">Edit Roles</span>
                                        @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('system.role.edit',$role->id) }}" data-toggle="tooltip" data-placement="top" title=""
                                                class="bell-icon" data-original-title="Edit">
                                                <i class="fa fa-pencil fa-lg"></i>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                class="trash-icon" data-original-title="Delete">
                                                <i class="fa fa-trash-o fa-lg"></i>
                                            </a>
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


                    <!-- Manage Roles Modal -->
                    <div id="roles" class="modal custom-modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Roles</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('role.create') }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Name</label>
                                                    <input class="form-control" name="name" value="" type="text">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="table-responsive m-t-15">
                                            <table class="table table-striped custom-table">
                                                <thead>
                                                    <tr>
                                                        <th>Module Permission</th>
                                                        <th class="text-center">Read</th>
                                                        <th class="text-center">Create</th>
                                                        <th class="text-center">Edit</th>
                                                        <th class="text-center">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Member</td>
                                                        <td class="text-center">
                                                            <input  name="view_member" type="checkbox" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            <input  name="create_member" type="checkbox" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            <input  name="edit_member" type="checkbox" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            <input  name="delete_member" type="checkbox" value="1">
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Pay Roll</td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="view_payroll" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            {{--  <input type="checkbox" name="" value="1">  --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="edit_payroll" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            {{--  <input type="checkbox" name="" value="1">  --}}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Appointment</td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="view_appointments" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="manage_documents" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="edit_appointments" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            {{--  <input type="checkbox" name="" value="1">  --}}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>Role</td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="view_roles" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            {{--  <input type="checkbox" name="" value="1">  --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="edit_roles" value="1">
                                                        </td>
                                                        <td class="text-center">
                                                            {{--  <input type="checkbox" name="" value="1">  --}}
                                                        </td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Manage Roles Modal -->


@endsection
