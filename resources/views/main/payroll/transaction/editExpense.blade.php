@extends('root')
@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Edit Expense</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Expense</li>
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
                                <h5 class="card-title mb-0">Edit Expense</h5>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="{{route('payroll.expense.update')}}">
                                    @csrf
                                    <input type="hidden" value="{{ $memexp->id }}" name="id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Member Name</label>
                                                <select class="js-example-basic-single" name="member_id" required  style="width: 100%;">
                                                    @foreach($members as $mem)
                                                    <option  @if($mem->id == $memexp->member_id) selected @endif  value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Amount</label>
                                                <input class="form-control" required name="amount" value="{{ $memexp->amount }}" type="number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-form-label">Date (DD-MM-YYYY)</label>
                                                <input class="form-control datetimepicker" required value="{{ $memexp->date }}" name="date" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="col-form-label">Expense</label>
                                            <select class="select" name="expense">
                                                <option @if($memexp->expense =="Social levy") selected @endif  value="Social levy">Social levy</option>
                                                <option @if($memexp->expense =="Social events") selected @endif value="Social events">Social events</option>
                                                <option @if($memexp->expense =="Gear") selected @endif value="Gear">Gear</option>
                                                <option @if($memexp->expense =="Coaching Levy") selected @endif value="Coaching Levy">Coaching Levy</option>
                                                <option @if($memexp->expense =="Membership fee") selected @endif value="Membership fee">Membership fee</option>
                                                <option @if($memexp->expense =="MISC") selected @endif value="MISC">MISC</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-form-label" required>Description</label>
                                                <textarea rows="4" class="form-control "
                                                    placeholder="Enter your message here" name="description">{{ $memexp->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center mt-1">
                                        <button class="btn btn-primary submit-btn" >Update</button>
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
