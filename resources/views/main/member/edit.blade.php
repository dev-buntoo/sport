@extends('root')
@section('content')
       <!-- Page Wrapper -->
       <div class="page-wrapper">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Memeber Profile David Test</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Members</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">David Test</h6>
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a class="nav-link active" href="#tab1"
                                        data-toggle="tab">Member Details</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab2"
                                        data-toggle="tab">Transactions</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab3" data-toggle="tab">Payroll</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#tab4" data-toggle="tab">Note</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane show active" id="tab1">
                                    @include('main.layout.include.memberTab')
                                </div>
                                <div class="tab-pane" id="tab2">
                                    @include('main.layout.include.transactionTab')
                                </div>
                                <div class="tab-pane" id="tab3">
                                    @include('main.layout.include.payrollTab')
                                </div>
                                <div class="tab-pane" id="tab4">
                                    @include('main.layout.include.noteTab')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->


        @stack('model')
         
    </div>
    <!-- /Page Wrapper -->

@endsection
