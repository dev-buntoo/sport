@extends('root')
@section( 'content')

      <!-- Page Wrapper -->
      <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <form action="">
                    <div class="row align-items-center">

                        <div class="col-md-6">
                            <h3 class="page-title">Memeber Payroll</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pay Run</li>
                            </ul>

                        </div>

                        <div class="col-md-3 float-right ml-auto">
                            <div class="form-group form-focus select-focus">
                                <select class="select floating">
                                    <option>2020</option>
                                    <option>2021</option>
                                    <option>2019</option>
                                    <option>2015</option>
                                </select>
                                <label class="focus-label">Choose Year</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="btn add-btn">Generate</a>
                        </div>

                    </div>

            </div>
            </form>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">

                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>Payroll Year</th>
                                    <th>Member Name</th>
                                    <th>Cross Amount</th>
                                    <th>Deductions</th>
                                    <th>Net Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>#264641645</td>
                                    <td>UserTest 1</td>
                                    <td>$1321.00</td>
                                    <td>$100.00</td>
                                    <td>$900.00</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="./view-payrun.html" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfooter>
                                <tr class="table-info">
                                    <th colspan="2">Totals</th>
                                    <th>$44654</th>
                                    <th>$15564</th>
                                    <th colspan="3">$15456</th>
                                </tr>
                            </tfooter>
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