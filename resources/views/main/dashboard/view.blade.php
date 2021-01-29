@extends('root')
@section('content')
		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<!-- Page Content -->
			<div class="content container-fluid">

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-md-6 d-flex">
						<div class="card card-table flex-fill card-height-90">
							<div class="card-header">
								<h3 class="card-title mb-0 mt-2 default-color float-left"> <span><i
											class="fa fa-share-alt"></i></span>
									ADMIN LOGS</h3>

								<div class="pull-right" id="search-box">
									<a href="javascript:void(0);"  class="responsive-search">
										<i class="fa fa-search"></i>
									</a>
								
									<input class="form-control" id="myInput" onkeyup="myFunction()" type="text" placeholder="Search">
									<button class="btn search-button" type="submit"><i
											class="fa fa-search"></i></button>
								
								</div>
							</div>

							<div class="card-body ">
								<div class="table-responsive overflow-auto card-height-90" id="overflow-style">
									<table class="table table-nowrap custom-table mb-0" id="myTable">

										<tbody>
                                            @foreach($audits as $audit)

                                            @if($audit->user->is_member != 1)
											<tr>
												<td class="overflow-auto">
													<a href="#"> <span class="float-left mr-2 mt-0 bell-icon"><i
																class="fa fa-bell-o fa-lg"></i></span>
														<h2 class="mt-2 admin-log">{{ $audit->user->fname.' '}} @if($audit->event == "created") {{$audit->event}} new {{ substr($audit->auditable_type, strrpos($audit->auditable_type, '\\') + 1) }}  @elseif(substr($audit->url, strrpos($audit->url, '/') + 1) == 'login') signed in at {{ date('g:i a',strtotime($audit->created_at)).' IP '.$audit->ip_address   }} @elseif(substr($audit->url, strrpos($audit->url, '/') + 1) == 'verify')has received Verification Code @else {{$audit->event}} {{ substr($audit->auditable_type, strrpos($audit->auditable_type, '\\') + 1) }} @endif
															({{ date('d-m-Y',strtotime($audit->created_at)) }})</h2>
													</a>
												</td>
                                            </tr>
                                            @endif
                                            @endforeach


										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
					<div class="col-md-6 d-flex">
						<div class="card card-table flex-fill card-height-90">
							<div class="card-header">
								<h3 class="card-title mb-0 mt-2 default-color float-left"> <span><i
											class="fa fa-share-alt"></i></span>
									MEMBER LOGS</h3>
								<div class="pull-right" id="search-box">
									<a href="javascript:void(0);" class="responsive-search">
										<i class="fa fa-search"></i>
									</a>
									<form action="search.html">
										<input class="form-control" id="myInput2" onkeyup="myFunction2()" type="text" placeholder="Search">
										<button class="btn search-button" type="submit"><i
												class="fa fa-search"></i></button>
									</form>
								</div>
							</div>

							<div class="card-body ">
								<div class="table-responsive overflow-auto card-height-90" id="overflow-style">
									<table class="table table-nowrap custom-table mb-0" id="myTable2">

										<tbody>
                                            @foreach($audits as $audit)
                                            @if($audit->user->is_member == 1)
											<tr>
												<td class="overflow-auto">
													<a href="#"> <span class="float-left mr-2 mt-0 bell-icon"><i
																class="fa fa-bell-o fa-lg"></i></span>
														<h2 class="mt-2 admin-log">Member {{ $audit->user->fname.' '}} @if($audit->event == "created") {{$audit->event}} new {{ substr($audit->auditable_type, strrpos($audit->auditable_type, '\\') + 1) }}  @elseif(substr($audit->url, strrpos($audit->url, '/') + 1) == 'login') signed in at {{ date('g:i a',strtotime($audit->created_at)).' IP '.$audit->ip_address   }} @elseif(substr($audit->url, strrpos($audit->url, '/') + 1) == 'verify')has received Verification Code @else {{$audit->event}} {{ substr($audit->auditable_type, strrpos($audit->auditable_type, '\\') + 1) }} @endif
															({{ date('d-m-Y',strtotime($audit->created_at)) }})</h2>
													</a>
												</td>
                                            </tr>
                                            @endif
                                            @endforeach


										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- /Page Content -->

		</div>
		<!-- /Page Wrapper -->

<!--Search in table 1-->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


<!--Search in table 2-->
<script>
function myFunction2() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput2");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable2");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
@endsection
