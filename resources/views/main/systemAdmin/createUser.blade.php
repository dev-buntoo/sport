@extends('root')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">System Admins</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- /Page Header -->

                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Add User</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.save') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="fname" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="lname" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="email" type="email" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Role <span
                                                        class="text-danger">*</span></label>
                                                        <select class='select' name="role_id" required style="width: 100%;">
                                                            <option value=''>Select Role</option>
                                                            @foreach($role as $rol)
                                                            <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                            @endforeach

                                                        </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="password" type="password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Confirm Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="password_confirmation" type="password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Profile Pic </label>
                                                <input class="form-control" name="photo" type="file" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-1">
                                        <button class="btn btn-primary submit-btn">Create</button>
                                        <button class="btn btn-secondary submit-btn"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- /Page Wrapper -->


@endsection
