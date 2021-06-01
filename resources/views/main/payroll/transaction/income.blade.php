@extends('root')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">


<div class="row">
    <div class="col-6">
        <h3>Manage Income</h3>
        (${{ $income->sum('amount') }} total incomes)
    </div>
        <div class="col-6 float-right ml-auto mb-3">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#income-create" style="margin-bottom:10px; margin-left:10px;"><i class="fa fa-plus"></i> Create</a>
                <a href="#" class="btn add-btn" id="toexcel"><i class="fa fa-plus"></i> Export</a>
        </div>
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0 datatable" id="export">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Income</th>
                        <th>Amount</th>
                        <th>Notes</th>
                        <th>Date</th>
                        <th class="noExl">Payment</th>
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
                            <a href="{{ route('payroll.income.edit',$inc->id) }}" data-toggle="tooltip"
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

                	<!-- Add Client Modal -->
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
                            <form method="POST" action="{{route('member.income.save')}}" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Member Name</label>
                                            <select class="js-example-basic-single form-control" name="member_id" required style="width: 100%;">
                                            @foreach($members as $mem)
                                                <option  value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Amount</label>
                                            <input class="form-control" name="amount" required type="number" step="0.01">
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
                                        <select class="select form-control" name="income">
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

                    <!-- Add Client Modal -->
				<div id="edit" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
                                <h5 class="modal-title">Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
							<div class="modal-body">
								<form>
									<div class="row">
										<div class="col-md-6">

											<div class="form-group form-focus select-focus">
                                                <label class="col-form-label">Member Name<span class="text-danger">*</span></label>
                                                <select class="select floating">
                                                    <option>Select Member Name</option>
                                                    <option>Global Technologies</option>
                                                    <option>Delta Infotech</option>
                                                </select>
                                            </div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Expense<span class="text-danger">*</span></label>
												<input class="form-control" type="text" name="expense">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="col-form-label">Amount<span class="text-danger">*</span></label>
												<input class="form-control" type="number" name="amount">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
                                                <label> Date <span class="text-danger">*</span></label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text" name="date">
                                                </div>
                                            </div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
                                                <label>Description <span class="text-danger">*</span></label>
                                                <textarea rows="4" class="form-control"></textarea>
                                            </div>
										</div>
									</div>
                                    <div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
                                        <button class="btn btn-primary submit-btn">cancel</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="modal custom-modal fade" id="delete" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete </h3>
									<p>Are you sure want to Cancel this?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
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


@push('script')
<!--        <script src=-->
<!--"//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">-->
<!--</script>-->
<script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>

<script>
$(document).ready(function(){
    $("#toexcel").click(function(){

  $("#export").table2excel({
    exclude:".noExl",
    filename:"Income",//do not include extension
    fileext:".xlsx" // file extension
  });
});
});
</script>

@endpush
