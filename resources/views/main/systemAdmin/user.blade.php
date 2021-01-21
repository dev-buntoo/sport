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
                                <li class="breadcrumb-item"><a href="system-users.html">System Admins</a></li>
                                <li class="breadcrumb-item active">System Users</li>
                            </ul>
                        </div>
                        <div class="col float-right ml-auto">
                            <a href="#" class="btn add-btn"><i class="fa fa-plus"></i> Create</a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row staff-grid-row">
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-02.jpg"
                                        alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Doe</a></h4>
                            <span class="badge bg-inverse-info mt-2 mb-2">Super Admin</span>
                            <div class="small text-muted">superadmin@gmail.com</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-09.jpg"
                                        alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Richard Miles</a>
                            </h4>
                            <span class="badge bg-inverse-info mt-2 mb-2">Admin</span>
                            <div class="small text-muted">admin@gmail.com</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-10.jpg"
                                        alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">John Smith</a></h4>
                           <span class="badge bg-inverse-info mt-2 mb-2">Admin</span>
                            <div class="small text-muted">admin@gmail.com</div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
                        <div class="profile-widget">
                            <div class="profile-img">
                                <a href="profile.html" class="avatar"><img src="assets/img/profiles/avatar-05.jpg"
                                        alt=""></a>
                            </div>
                            <div class="dropdown profile-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#edit_employee"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete_employee"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                            <h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">Mike Litorus</a></h4>
                            <span class="badge bg-inverse-info mt-2 mb-2">View Only</span>
                            <div class="small text-muted">viewonly@gmail.com</div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->

@endsection
