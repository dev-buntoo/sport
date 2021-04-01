@extends('root')
@section('content')

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">{{$request->schedule}}</h3>
                        <p>Pay period {{$request->startDate}} to {{$request->endDate}} </p>

                        <div class="leave-action">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_addition"><i class="fa fa-plus"></i> Process Pay Run</button>
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
                                    @php
                                    $tgross = $tdedution = $tnet =0;
                                    @endphp
                                   @foreach($req as $q)
                                    <tr>
                                        <td><i class="fa fa-chevron-right"></i>{{$q->member->fname.' '.$q->member->lname}}</td>
                                        <td>${{$q->gross_amount}}</td>
                                        <td>${{$q->deduction}}</td>
                                        <td>${{$q->net_amount}}</td>
                                    </tr>
                                       @php
                                           $tgross =  $tgross + $q->gross_amount;
                                           $tdedution = $tdedution + $q->deduction;
                                           $tnet = $tnet + $q->net_amount;
                                       @endphp
                                    @endforeach


                                    </tbody>
                                    <thead>
                                    <tr style="background: #f7f4f4;">
                                        <th>Totals {{count($req)}} <span>member</span></th>
                                        <th>{{$tgross}}</th>
                                        <th>{{$tdedution}}</th>
                                        <th>{{$tnet}}</th>
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
    <!-- Add Addition Modal -->
    <div id="add_addition" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">You are about to finalise this pay run</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('payroll.generate')}}">
                        @csrf
                        <input type="hidden" name="schedule" value="{{$request->schedule}}">
                        <input type="hidden" name="endDate" value="{{$request->endDate}}">
                        <input type="hidden" name="startDate" value="{{$request->startDate}}">
                        <input type="hidden" name="payrunDate" value="{{$request->payrunDate}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Date Paid</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" required name="paidDate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-t-20 text-center">
                            <button href="#" class="btn add-btn"><i class="fa fa-plus"></i>Finalize</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


