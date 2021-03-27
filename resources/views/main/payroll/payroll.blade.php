@extends('root')
@section( 'content')


    <!-- Page Wrapper -->
    <div class="page-wrapper" style="min-height: 789px;">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Members Payroll</h2>
                        <h3 class="page-title">${{$total}}</h3>
                        <div class="small text-muted">2021 TOTAL GAMES COST</div>
                    </div>
                    <div class="col">
                        <div class="text-newpay" style="border-left:4px solid #00c5fb;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">$3333.00</h2>
                            <div class="small text-muted"> TOTAL GAMES COST</div>
                        </div>
                        <div class="text-newpay" style="border-left:4px solid #00c5fb;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">$0.00</h2>
                            <div class="small text-muted"> TOTAL GAMES COST</div>
                        </div>
                        <div class="text-newpay" style="border-left:4px solid #74a515;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">$0.00</h2>
                            <div class="small text-muted"> TOTAL GAMES COST</div>
                        </div>

                    </div>
                    <div class="col">


                    </div>
                    <div class="col-auto float-right ml-auto">
                        <button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_addition"><i class="fa fa-plus"></i> New pay run</button>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Page Tab -->
            <div class="page-menu">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab_member">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_payrun">Pay Runs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Tab -->

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- Additions Tab -->
                <div class="tab-pane active" id="tab_member">
                    <!-- Payroll Additions Table -->
                    <div class="payroll-table">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                    <tr>
                                        <th>MEMBER</th>
                                        <th>ROLE</th>
                                        <th>PAY SCHEDULE</th>
                                        <th>LAST PAID</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <tr>
                                        <td> <a href="#">Syed Afeef</a></td>
                                        <td>Developer</td>
                                        <td>Monthly</td>
                                        <td>01/01/2021 </td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Payroll Additions Table -->

                </div>
                <!-- Additions Tab -->

                <!-- Overtime Tab -->
                <div class="tab-pane" id="tab_payrun">
                    <!-- Payroll Overtime Table -->
                    <div class="payroll-table">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                    <tr>
                                        <th>PAY PERIOD</th>
                                        <th>DATE PROCESSED</th>
                                        <th>PAY SCHEDULE</th>
                                        <th>MEMBERS</th>
                                        <th>GROSS</th>
                                        <th>DEDUCTIONS</th>
                                        <th>NET</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><strong>Feburary 2021</strong></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">01/01/2021 to 01/02/2021  </a></td>
                                        <td>01/01/2021</td>
                                        <td>Fornighly</td>
                                        <td>2</td>
                                        <td> $500.00</td>
                                        <td>$500.00</td>
                                        <td>$450.00</td>
                                    </tr>
                                    <tr>
                                        <td><strong>March 2021</strong></td>
                                    </tr>
                                    <tr>
                                        <td><a href="#">01/01/2021 to 01/02/2021  </a></td>
                                        <td>01/01/2021</td>
                                        <td>Fornighly</td>
                                        <td>2</td>
                                        <td> $500.00</td>
                                        <td>$500.00</td>
                                        <td>$450.00</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Payroll Overtime Table -->

                </div>
                <!-- /Overtime Tab -->

            </div>
            <!-- Tab Content -->

        </div>
        <!-- /Page Content -->

        <!-- Add Addition Modal -->
        <div id="add_addition" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New pay run</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('payroll.generate')}}">
                            @csrf
                            <div class="form-group">
                                <label>Pay schedule <span class="text-danger">*</span></label>
                                <select class="select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">

                                    <option value="Fortnightly" data-select2-id="45">Fortnightly</option>
                                    <option value="Monthly" data-select2-id="46">Monthly</option>
                                    <option selected="" value="End of Season" data-select2-id="27">End of Season</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Pay Period Starting <span class="text-danger">*</span></label>
                                <p>12/07/2021</p>
                            </div>
                            <div class="form-group">
                                <label>Pay period ending <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Date pay run will be paid<span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="date_pay_run" type="text">
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn"> <i class="fa fa-plus"></i> Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Addition Modal -->
    </div>
    <!-- /Page Wrapper -->

@endsection
