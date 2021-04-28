@extends('root')
@section( 'content')



			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Teams</h3>

							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Content Starts -->

						<!-- Add Addition Button -->
						<div class="text-right mb-4 clearfix">
							<button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_addition"><i class="fa fa-plus"></i> Create</button>
						</div>
						<!-- /Add Addition Button -->

						<!-- Payroll Additions Table -->
						<div class="payroll-table card">
							<div class="table-responsive">
								<table class="table table-hover table-radius">
									<thead>
										<tr>
											<th>#</th>
											<th>Name</th>
											<th>Date</th>
											<th class="text-right">Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($teams as $item)

										<tr>
											<th>{{ $loop->index+1 }}</th>
											<th>{{ $item->name }}</th>
											<td>{{ $item->created_at }}</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<a class="dropdown-item" href="javascript:showModel('{{ $item->name }}',{{ $item->id}})" ><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<a class="dropdown-item" href="{{ route('report.team.delete',$item->id) }}" onclick="if(!confirm('Are you sure?')){return false;}" ><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>

                                        @endforeach
									</tbody>
								</table>
							</div>
						</div>
						<!-- /Payroll Additions Table -->
							<!-- Add Addition Modal -->
							<div id="add_addition" class="modal custom-modal fade" role="dialog">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Create</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form method="POST" action="{{ route('report.team.save') }}">
                                                @csrf
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="name">
												</div>
												<div class="submit-section">
													<button class="btn btn-primary submit-btn">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /Add Addition Modal -->
							<!-- Edit Addition Modal -->
								<div id="edit_addition" class="modal custom-modal fade" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">Edit Name</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<form name="edit" action="{{ route('report.team.update') }}">
													<input name="id" type="hidden" value="">
                                                    <div class="form-group">
														<label>Name <span class="text-danger">*</span></label>
														<input class="form-control" name="name" type="text">
													</div>
													<div class="submit-section">
														<button class="btn btn-primary submit-btn">Update</button>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
				<!-- /Edit Addition Modal -->
					<!-- Delete Addition Modal -->
					<div class="modal custom-modal fade" id="delete_addition" role="dialog">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<div class="form-header">
										<h3>Delete Name</h3>
										<p>Are you sure want to delete?</p>
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
					<!-- /Delete Addition Modal -->
					</div>
					<!-- /Content End -->

				<!-- /Page Content -->

            </div>


@endsection
@push('script')
    <script>
            function showModel(name,id){
                edit.id.value=id;
                edit.name.value=name;
                $('#edit_addition').modal();
            }

    </script>
@endpush
