@extends('root')
@section('content')
<style>
    @media screen and (min-width: 480px) {
 .mr-2, .mx-2 {
    margin-right: 0px !important;
}
}
</style>
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->

                <!-- /Page Header -->

             <div class="row">
    <div class="col-6">
        <h3>Manage Expenses</h3>
    </div>
        <div class="col-6 float-right ml-auto mb-3">
            <a href="#" class="btn add-btn" data-toggle="modal"
                data-target="#expence-create" style="margin-bottom:10px;"><i class="fa fa-plus"></i>
                Create</a>
                 <a href="#" class="btn add-btn" id="toexcel"
                ><i class="fa fa-plus"></i>
                Export</a>
        </div>
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0 datatable" id="export">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Expense</th>
                        <th>Amount</th>
                        <th>Notes</th>
                        <th>Dates</th>
                        <th class="noExl">Payment</th>
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
                            <a href="{{ route('payroll.expense.edit',$exp->id) }}" data-toggle="tooltip"
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
                            <form method="POST" action="{{route('payroll.expense.save')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-form-label">Member Name</label>
                                            <select class="js-example-basic-single form-control" name="condition" required  style="width: 100%;">

<option value="1"> Active members (No life members) </option>
<option value="2"> Active Member (Life members) </option>
<option value="3"> Non active members (No life members) </option>
<option value="4"> Non active members (Life members) </option>
                                                {{-- @foreach($members as $mem)
                                                <option  value="{{ $mem->id }}">{{ $mem->fname.' '.$mem->lname }} | {{ $mem->member_number }}</option>
                                                @endforeach
                                                --}}
                                             </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Amount</label>
                                            <input class="form-control" required name="amount" type="number" step="0.01">
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
                                        <select class="select form-control" name="expense" style="width:100%;">
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
        <script src=
"//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
</script>
<script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>

<script>
$(document).ready(function(){
    $("#toexcel").click(function(){

  $("#export").table2excel({
    exclude:".noExl",
    filename:"Expenses",//do not include extension
    fileext:".xlsx" // file extension
  });
});
});
</script>
        
@endpush
