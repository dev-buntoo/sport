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
                                <li class="breadcrumb-item active">Edit User</li>
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
                                <h5 class="card-title mb-0">Edit User</h5>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">First Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="fname" type="text" value="{{ $user->fname }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Last Name <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="lname" type="text" value="{{ $user->lname }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="email" type="email" value="{{ $user->email }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Role <span
                                                        class="text-danger">*</span></label>
                                                <select class='select' name="role_id" required style="width: 100%;">
                                                    <option value=''>Select Role</option>
                                                    @foreach($role as $rol)
                                                    <option @if($user->role_id == $rol->id) selected @endif value="{{ $rol->id }}">{{ $rol->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Password </label>
                                                <input class="form-control" name="password" type="password" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Confirm Password </label>
                                                <input class="form-control" name="password_confirmation" type="password" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Profile Pic </label>
                                                <input class="form-control" name="photo" type="file" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-1">
                                        <button class="btn btn-primary submit-btn">Update</button>
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
