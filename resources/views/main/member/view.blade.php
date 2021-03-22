@extends('root')
@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 class="page-title">Manage Members</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Members</li>
                            </ul>
                        </div>


                            <div class="col-md-3 float-right ml-auto">
                        <form action="{{ route('member.import') }}" method="POST" name="importform" enctype="multipart/form-data">
                            @csrf
                            
                            </div>

                            <div class="col-md-3 d-flex float-right">
                                
                                <a href="{{ route('member.create') }}" class="btn add-btn"><i class="fa fa-plus"></i> Create</a>
                            </div>

                        </form>

                    </div>

                </div>
                <!-- /Page Header -->



                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">

                            <table class="table table-striped custom-table mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Member Number</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email #1</th>
                                        <th>Phone #1</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Date of joining</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($members as $member)
                                    <tr>
                                        <td class="default-color"><span class="border-default p-2">{{ $member->member_number }}</span> </td>
                                        <td>{{ $member->fname }}</td>
                                        <td>{{ $member->lname }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->phone_1 }}</td>
                                        <td>{{ $member->status }}</td>
                                        <td>{{ $member->role }}</td>
                                        <td>{{ $member->date_of_joining }} </td>
                                        <td>
                                            <a href="{{ route('member.edit',$member->id) }}" data-toggle="tooltip"
                                                data-placement="top" title="View Member" class="bell-icon">
                                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->

@endsection
