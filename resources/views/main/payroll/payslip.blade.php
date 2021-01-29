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
                                        <td>{{ $payslip->member->fname.' '.$payslip->member->lname }}</td>
                                    </tr>
                                    <tr>
                                        <th>Member Number</th>
                                        <td>{{ $payslip->member->member_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pay Roll Year</th>
                                        <td>{{ $payslip->date }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">

                        <div class="card mb-0">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Payment for: <strong>{{ $payslip->date }}</strong></h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="POST" action="{{ route('payroll.update') }}">
                                           @csrf
                                           <input type="hidden" value="{{ $payslip->id }}" name="id">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="gross_amount">Gross Amount</label>
                                                    <input type="number" class="form-control" id="gross_amount"
                                                        name="gross_amount" value="{{ $payslip->gross_amount }}">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="total_deduction">Total Deduction</label>
                                                    <input type="number" class="form-control" id="total_deduction"
                                                        name="deduction" value="{{ $payslip->deduction }}">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="net_amount">Net Amount</label>
                                                    <input type="number" class="form-control" id="net_amount"
                                                        name="net_amount" value="{{ $payslip->net_amount }}">
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label class="col-form-label">Payment Type</label>
                                                    <select class="select select2-hidden-accessible" data-select2-id="1"
                                                        tabindex="-1" aria-hidden="true" name="bank_pay">
                                                        <option value="Bannk Payment" data-select2-id="3">Bank Payment
                                                        </option>
                                                        <option value="Cheque”">Cheque”</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label for="bank_reference" class="col-form-label">Bank
                                                        Reference</label>
                                                    <input type="text" class="form-control" id="bank_reference"
                                                        name="bank_ref">
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="payment_date">Payment Date</label>
                                                    <input type="text" class="form-control datetimepicker"
                                                        id="payment_date" name="payment_date" value="" required>
                                                </div>
@if(!Auth::user()->is_member)
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Note</label>
                                                        <textarea class="form-control" rows="4" name="description"
                                                            id="name"></textarea>
                                                    </div>
                                                </div>
@endif
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
                                <h5 class="card-title mb-0">Payment Summary for: <strong>{{ $payslip->member->fname.' '.$payslip->member->lname.' '.$payslip->date }}</strong></h5>
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
                                            @foreach($payslip->record as $rec)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $rec->name }}</td>
                                                    <td>{{ $rec->debit }} </td>
                                                    <td>{{ $rec->credit }} </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <thead>
                                                <tr class="table-info">
                                                    <th colspan="2">Total</th>
                                                    <th>{{ $payslip->record->sum('debit') }} $</th>
                                                    <th>{{ $payslip->record->sum('credit') }} $</th>

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
