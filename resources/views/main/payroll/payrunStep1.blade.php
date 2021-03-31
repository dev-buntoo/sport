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
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#add_custom_policy"><i class="fa fa-plus"></i> Process Pay Run</button>
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
                                   @foreach($req as $q)
                                    <tr>
                                        <td><i class="fa fa-chevron-right"></i>{{$q->member->fname.' '.$q->member->lname}}</td>
                                        <td>${{$q->gross_amount}}</td>
                                        <td>${{$q->deduction}}</td>
                                        <td>${{$q->net_amount}}</td>
                                    </tr>
                                    @endforeach


                                    </tbody>
{{--                                    <thead>--}}
{{--                                    <tr style="background: #f7f4f4;">--}}
{{--                                        <th>Totals {{count($req)}} <span>member</span></th>--}}
{{--                                        <th>${{$req->sum('gross_amount')}}</th>--}}
{{--                                        <th>${{$req->sum('deduction')}}</th>--}}
{{--                                        <th>${{$req->sum('net_amount')}}</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
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
