@extends('root')
@section( 'content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Appointment Games</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="appointments.html">Appointment</a></li>
                                <li class="breadcrumb-item active">Update Rates</li>
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
                                <h5 class="card-title mb-0">Update Rates</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade"
                                                        name="grade" value="U8" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade"
                                                        name="grade" value="U8" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade"
                                                        name="grade" value="U8" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade"
                                                        name="grade" value="U8" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rate">Rate</label>
                                                    <input type="number" value="$4.00" placeholder="$4.00" class="form-control" id="rate"
                                                        name="rate">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rate">Rate</label>
                                                    <input type="number" value="$4.00" placeholder="$4.00" class="form-control" id="rate"
                                                        name="rate">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rate">Rate</label>
                                                    <input type="number" value="$4.00" placeholder="$4.00" class="form-control" id="rate"
                                                        name="rate">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="rate">Rate</label>
                                                    <input type="number" value="$4.00" placeholder="$4.00" class="form-control" id="rate"
                                                        name="rate">
                                                </div>

                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit">Add New Line</button>
                                                <button class="btn btn-warning text-light submit-btn" type="submit">Save All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- /Page Wrapper -->

@endsection
