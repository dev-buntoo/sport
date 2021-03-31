@extends('root')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Fortnighly</h3>
                        <p>Pay period 08/01/2021 to 22/02/2021  <span>Pay period 08/01/2021 </span>	</p>

                        <div class="leave-action">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> View pay slip</button>
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> Send pay slip</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0 table-bordered">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>GROSS EARNING</th>
                                        <th>DEDUCTIONS</th>
                                        <th>NET EARNING</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><a href="#"><i class="fa fa-chevron-right"></i> Tiger Nixon</a></td>
                                        <td>$500.00</td>
                                        <td>$100.00</td>
                                        <td>$400.00</td>
                                    </tr>
                                    <tr>
                                        <td><a href="#"><i class="fa fa-chevron-right"></i> Nixon</a></td>
                                        <td>$100.00</td>
                                        <td>$50.00</td>
                                        <td>$50.00</td>
                                    </tr>

                                    </tbody>
                                    <thead>
                                    <tr style="background: #f7f4f4;">
                                        <th>Totals <span>member</span></th>
                                        <th>$207</th>
                                        <th>$207</th>
                                        <th>$207</th>
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
    <!-- /Page Wrapper -->

@endsection
