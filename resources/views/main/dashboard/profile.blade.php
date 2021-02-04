@extends('root')
@section( 'content')
	<!-- Page Wrapper -->
    <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Profile</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form method="POST" action="{{ route('profile.save') }}" enctype="multipart/form-data">
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
                                        <label class="col-form-label">Profile Pic </label>
                                        <input class="form-control" name="photo" type="file" required>
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
                                </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Update</button>
                                
                            </div>
                            
                        </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Content -->

        <!-- Profile Modal -->
        <div id="profile_info" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Profile Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-img-wrap edit-img">
                                        <img class="inline-block" src="assets/img/profiles/avatar-02.jpg"
                                            alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">edit</span>
                                            <input class="upload" type="file">
                                        </div>
                                    </div>
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
                                                <input class="form-control" name="password" type="password"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Confirm Password <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" name="password_confirmation"
                                                    type="password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Profile Pic </label>
                                                <input class="form-control" name="photo" type="file" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </form> --}}

                        <form method="POST" action="{{ route('profile.save') }}" enctype="multipart/form-data">
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
        <!-- /Profile Modal -->



    </div>
    <!-- /Page Wrapper -->

@endsection
