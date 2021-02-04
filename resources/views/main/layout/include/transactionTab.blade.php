<div class="row">
    <div class="col-6">
        <h3>Manage Expenses</h3>
    </div>
    <div class="col-6">
        <div class="col-6 float-right ml-auto mb-3">
            <a href="#" class="btn add-btn" data-toggle="modal"
                data-target="#expence-create"><i class="fa fa-plus"></i>
                Create</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Expense</th>
                        <th>Amount</th>
                        <th>Notes</th>
                        <th>Dates</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expense as $exp)
                    <tr>
                        <td>{{$exp->member->fname}}</td>
                        <td>{{$exp->expense}}</td>
                        <td>$ {{$exp->amount}}</td>
                        <td>{{$exp->description}}</td>
                        <td>{{$exp->date}}</td>
                        <td>
                            <a href="{{ route('member.expense.edit',$exp->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Edit"
                                class="bell-icon mr-2">
                                <i class="fa fa-pencil fa-lg"
                                    aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('member.expense.delete',$exp->id) }}" onclick="if(!confirm('Are you sure?')){return false;}" data-toggle="tooltip"
                                data-placement="top" title="Delete"
                                class="trash-icon">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<hr>

<div class="row mt-3">
    <div class="col-6">
        <h3>Manage Income</h3>
    </div>
    <div class="col-6">
        <div class="col-6 float-right ml-auto mb-3">
            <a href="#" class="btn add-btn" data-toggle="modal"
                data-target="#income-create"><i class="fa fa-plus"></i>
                Create</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Income</th>
                        <th>Amount</th>
                        <th>Notes</th>
                        <th>Date</th>
                        <th>Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($income as $inc)
                    <tr>
                        <td>{{$inc->member->fname}}</td>
                        <td>{{$inc->income}}</td>
                        <td>$ {{$inc->amount}}</td>
                        <td>{{$inc->description}}</td>
                        <td>{{$inc->date}}</td>
                        <td>
                            <a href="{{ route('member.income.edit',$inc->id) }}" data-toggle="tooltip"
                                data-placement="top" title="Edit"
                                class="bell-icon mr-2">
                                <i class="fa fa-pencil fa-lg"
                                    aria-hidden="true"></i>
                            </a>

                            <a href="{{ route('member.income.delete',$inc->id) }}" onclick="if(!confirm('Are you sure?')){return false;}" data-toggle="tooltip"
                                data-placement="top" title="Delete"
                                class="trash-icon">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@push('model')

            <!-- Manage Expenses Modal -->
            <div id="expence-create" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New Expense</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('member.expense.save')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Member Name</label>
                                            <select class="js-example-basic-single" name="member_id" required  style="width: 100%;">
                                                @foreach($members as $mem)
                                                <option value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Amount</label>
                                            <input class="form-control" required name="amount" type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date (DD-MM-YYYY)</label>
                                            <input class="form-control datetimepicker" required name="date" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Expense</label>
                                        <select class="select" name="expense">
                                            <option value="Social levy">Social levy</option>
                                            <option value="Social events">Social events</option>
                                            <option value="Gear">Gear</option>
                                            <option value="Coaching Levy">Coaching levy</option>
                                            <option value="Membership fee">Membership fee</option>
                                            <option value="MISC">MISC</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label" required>Description</label>
                                            <textarea rows="4" class="form-control summernote1"
                                                placeholder="Enter your message here" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-1">
                                    <button class="btn btn-primary submit-btn" >Create</button>
                                    <button class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Manage Expenses Modal -->

            <!-- Manage Income Modal -->
            <div id="income-create" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create New Income</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{route('member.income.save')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Member Name</label>
                                            <select class="js-example-basic-single" name="member_id" required style="width: 100%;">
                                            @foreach($members as $mem)
                                                <option value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Amount</label>
                                            <input class="form-control" name="amount" required type="number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date (DD-MM-YYYY)</label>
                                            <input class="form-control datetimepicker" required name="date" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Income</label>
                                        <select class="select" name="income">
                                            <option value="Games through referee">Games through referee</option>
                                            <option value="Coach">Coach</option>
                                            <option value="Executive role">Executive role</option>
                                            <option value="MISC">MISC</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Description</label>
                                            <textarea rows="4" class="form-control summernote1"
                                                placeholder="Enter your message here" required name="description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-1">
                                    <button class="btn btn-primary submit-btn">Create</button>
                                    <button class="btn btn-secondary submit-btn" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endpush
