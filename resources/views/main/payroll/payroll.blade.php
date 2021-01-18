@extends('root')
@section( 'content')


        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Memeber Payroll</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pay Slip</li>
                            </ul>
                        </div>
                        <div class="col float-right ml-auto">

                            <a href="#" class="btn add-btn">Email All Pay slips</a>
                            <a href="#" class="btn add-btn mr-2"><span>&#8734;</span></a>
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
                                        <th>Payroll Year</th>
                                        <th>Member Name</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Viewed</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-danger">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-success">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-success">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-danger">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-success">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-success">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-danger">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-success">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-success">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-danger">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2021</td>
                                        <td>UserTest 1</td>
                                        <td>$1321.00</td>
                                        <td><span class="badge bg-inverse-success">Unpaid</span></td>
                                        <td><span class="badge bg-inverse-success">No</span></td>
                                        <td>
                                            <button type="button" class="btn btn-secondary">Email Payslip</button>
                                            <button type="button" class="btn btn-warning">View Payslip</button>
                                        </td>
                                    </tr>
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