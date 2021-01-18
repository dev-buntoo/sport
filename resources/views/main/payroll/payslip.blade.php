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
                                <li class="breadcrumb-item"><a href="./payrun.html">Pay Run</a></li>
                                <li class="breadcrumb-item active">View Pay Run</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <th>Memeber Name</th>
                                        <td>David Test</td>
                                    </tr>
                                    <tr>
                                        <th>Member Number</th>
                                        <td>2311101</td>
                                    </tr>
                                    <tr>
                                        <th>Pay Roll Year</th>
                                        <td>2021</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">

                        <div class="card mb-0">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Payment for: <strong>2021</strong></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="gross_amount">Gross Amount</label>
                                                    <input type="number" class="form-control" id="gross_amount"
                                                        name="gross_amount" value="214.00">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="total_deduction">Total Deduction</label>
                                                    <input type="number" class="form-control" id="total_deduction"
                                                        name="total_deduction" value="214.00">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="net_amount">Net Amount</label>
                                                    <input type="number" class="form-control" id="net_amount"
                                                        name="net_amount" value="214.00">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="col-form-label">Payment Type</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="1"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option value="Bannk Payment" data-select2-id="3">Bannk Payment
                                                        </option>
                                                        <option value="Cheque”">Cheque”</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="bank_reference" class="col-form-label">Bank
                                                        Reference</label>
                                                    <input type="text" class="form-control" id="bank_reference"
                                                        name="bank_reference">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="payment_date">Payment Date</label>
                                                    <input type="text" class="form-control datetimepicker"
                                                        id="payment_date" name="payment_date" value="" required>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Note</label>
                                                        <textarea class="form-control" rows="4" name="note"
                                                            id="name"></textarea>
                                                    </div>
                                                </div>
                                                <div class="submit-section">
                                                    <button class="btn btn-primary submit-btn">Save</button>
                                                    <button class="btn btn-info submit-btn"> Generate Payslip</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8 mb-3">

                        <div class="card mb-0">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Payment Summary for: <strong>David Test 2021</strong></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-striped mb-0">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>#</th>
                                                    <th>Item Name</th>
                                                    <th>Debits</th>
                                                    <th>Credits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Trials Week 1</td>
                                                    <td>$200.00</td>
                                                    <td>$36</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Trials Week 1</td>
                                                    <td>$200.00</td>
                                                    <td>$36</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Trials Week 1</td>
                                                    <td>$200.00</td>
                                                    <td>$36</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Trials Week 1</td>
                                                    <td>$200.00</td>
                                                    <td>$36</td>
                                                </tr>
                                            </tbody>
                                            <thead>
                                                <tr class="table-info">
                                                    <th colspan="2">Total</th>
                                                    <th>$500.00</th>
                                                    <th>$200.00</th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->


@endsection