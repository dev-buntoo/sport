@extends('root')
@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Edit Income</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Income</li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- /Page Header -->

                <!-- Row -->
                <div class="row">
                    <div class="col-sm-12 mb-3">
                        <div class="card mb-0">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Edit Income</h5>
                            </div>
                            <div class="card-body">

                                    <form method="POST" action="{{route('member.income.update')}}">
                                        @csrf
                                        <input type="hidden" value="{{ $memin->id }}" name="id">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Member Name</label>
                                                    <select class="js-example-basic-single" name="member_id" required style="width: 100%;">
                                                    @foreach($members as $mem)
                                                        <option @if($mem->id == $memin->member_id) selected @endif value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Amount</label>
                                                    <input class="form-control" name="amount" value="{{ $memin->amount }}" required type="number">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="col-form-label">Date (DD-MM-YYYY)</label>
                                                    <input class="form-control datetimepicker" required name="date" value="{{ $memin->date }}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="col-form-label">Income</label>
                                                <select class="select" name="income">
                                                    <option @if($memin->income =="Games through referee") selected @endif value="Games through referee">Games through referee</option>
                                                    <option @if($memin->income =="coach, MISC") selected @endif value="coach, MISC">coach, MISC</option>
                                                    <option @if($memin->income =="Executive role") selected @endif value="Executive role">Executive role</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="col-form-label">Description</label>
                                                    <textarea rows="4" class="form-control "
                                                        placeholder="Enter your message here" required name="description">{{ $memin->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center mt-1">
                                            <button class="btn btn-primary submit-btn">Update</button>
                                        </div>
                                    </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- /Page Wrapper -->

@endsection
