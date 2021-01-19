@extends('root')
@section( 'content')

      <!-- Page Wrapper -->
      <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <form action="{{ route('payroll.generate') }}" method="POST">
                   @csrf
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
                                <select class="select floating" name="date">
                                    <option>2021</option>
                                    <option>2020</option>
                                    <option>2019</option>
                                    <option>2015</option>
                                </select>
                                <label class="focus-label">Choose Year</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn add-btn">Generate</button>
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
                                    <th>Gross Amount</th>
                                    <th>Deductions</th>
                                    <th>Net Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payrolls as $pay)
                                <tr>
                                    <td>{{ $pay->date }}</td>
                                    <td>{{ $pay->member->fname.' '.$pay->member->lname }}</td>
                                    <td>{{ $pay->gross_amount }} $</td>
                                    <td>{{ $pay->deduction }} $</td>
                                    <td>{{ $pay->net_amount }} $</td>
                                    <td><span class="badge bg-inverse-danger">Unpaid</span></td>
                                    <td>
                                        <a href="{{ route('payslip.show',$pay->id) }}" type="button"
                                            class="btn btn-secondary">View</a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfooter>
                                <tr class="table-info">
                                    <th colspan="2">Totals</th>
                                    <th>{{ $payrolls->sum('gross_amount') }} $</th>
                                    <th>{{ $payrolls->sum('deduction') }} $</th>
                                    <th colspan="3">{{ $payrolls->sum('net_amount') }} $</th>
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
