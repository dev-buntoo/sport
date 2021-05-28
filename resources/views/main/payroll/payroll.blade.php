@extends('root')
@section( 'content')

    <!-- Page Wrapper -->
    <div class="page-wrapper" style="min-height: 789px;">

        <!-- Page Content -->
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h2 class="page-title">Members Payroll</h2>
                        <h3 class="page-title">${{$total}}</h3>
                        <div class="small text-muted">2021 TOTAL GAMES COST</div>
                    </div>
                    <div class="col">
                        <div class="text-newpay" style="border-left:4px solid #00c5fb;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">${{ $reftj }}</h2>
                            <div class="small text-muted"> REFEREES & TJ'S</div>
                        </div>
                        <div class="text-newpay" style="border-left:4px solid #00c5fb;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">${{ $couchTotal }}</h2>
                            <div class="small text-muted"> COACHES</div>
                        </div>


                    </div>
                    <div class="col">
                        <div class="text-newpay" style="border-left:4px solid #74a515;padding-left:10px;margin-bottom: 10px;">
                           <h2 class="page-title">${{ $incomeTotal }}</h2>
                           <div class="small text-muted"> OTHER INCOME</div>
                        </div>
                         <div class="text-newpay" style="border-left:4px solid #74a515;padding-left:10px;margin-bottom: 10px;">
                            <h2 class="page-title">${{ $expenseTotal }}</h2>
                               <div class="small text-muted"> EXPENCES</div>
                        </div>

                    </div>
                    <div class="col-auto float-right ml-auto">
                        <button class="btn btn-primary add-btn" type="button" data-toggle="modal" data-target="#add_addition"><i class="fa fa-plus"></i> New Pay Run</button><br /><br />
                        <button class="btn btn-primary add-btn" type="button" id="toexcel"><i class="fa fa-plus"></i> Export</button>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Page Tab -->
            <div class="page-menu">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs nav-tabs-bottom">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tab_member">Members</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tab_payrun">Pay Runs</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Tab -->

            <!-- Tab Content -->
            <div class="tab-content">

                <!-- Additions Tab -->
                <div class="tab-pane active" id="tab_member">
                    <!-- Payroll Additions Table -->
                    <div class="payroll-table">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <!--<button onclick=""> Click Me!</button>-->
                                <table class="datatable table table-stripped mb-0" id="export">
                                    <thead>
                                    <tr>
                                        <th>MEMBER</th>
                                        <th>ROLE</th>
                                        <th>PAY SCHEDULE</th>
                                        <th>LAST PAID</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                    @foreach($payrolls as $pay)


                                    <tr>
                                        <td> <a href="{{route('member.edit',$pay->member->id)}}">{{$pay->member->fname.' '.$pay->member->lname}}</a></td>
                                        <td>{{$pay->member->role}}</td>
                                        <td>{{$pay->member->payment_frequency}}</td>
                                        <td>01/01/2021 </td>
                                    </tr>
                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Payroll Additions Table -->

                </div>
                <!-- Additions Tab -->

                <!-- Overtime Tab -->
                <div class="tab-pane" id="tab_payrun">
                    <!-- Payroll Overtime Table -->
                    <div class="payroll-table">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                    <tr>
                                        <th>PAY PERIOD</th>
                                        <th>DATE PROCESSED</th>
                                        <th>PAY SCHEDULE</th>
                                        <th>MEMBERS</th>
                                        <th>GROSS</th>
                                        <th>DEDUCTIONS</th>
                                        <th>NET</th>
                                    </tr>
                                    </thead>
                                    <!--<tbody>-->

                                    <!--@forelse($payruns as $payrun)-->

                                    <!--<tr>-->
                                    <!--    <td><strong>{{date('F Y',strtotime(str_replace('/', '-', $payrun->startDate)))}}</strong></td>-->
                                    <!--</tr>-->
                                    <!--<tr>-->
                                    <!--    <td><a href="{{route('payrun.complete',$payrun->id)}}">{{$payrun->startDate}} to {{$payrun->endDate}}  </a></td>-->
                                    <!--    <td>{{$payrun->payrunDate}}</td>-->
                                    <!--    <td>{{$payrun->schedule}}</td>-->
                                    <!--    <td>{{$payrun->countmember}}</td>-->
                                    <!--    <td> ${{$payrun->payslip->sum('credit')}}</td>-->
                                    <!--    <td>${{$payrun->payslip->sum('debit')}}</td>-->
                                    <!--    <td>${{$payrun->payslip->sum('credit') - $payrun->payslip->sum('debit')}}</td>-->
                                    <!--</tr>-->
                                    <!--@empty-->
                                    <!--    <tr>Not user</tr>-->
                                    <!--@endforelse-->

                                    <!--</tbody>-->
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /Payroll Overtime Table -->

                </div>
                <!-- /Overtime Tab -->

            </div>
            <!-- Tab Content -->

        </div>
        <!-- /Page Content -->

        <!-- Add Addition Modal -->
        <div id="add_addition" class="modal custom-modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">New pay run</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('payrun.process')}}">
                            @csrf
                            <input class="displayDatePickerh" type="hidden" name="startDate" value="1/03/2021">
                            <div class="form-group">
                                <label
                                >Pay schedule <span class="text-danger">*</span></label
                                >
                                <select class="select optionlist" name="schedule">
                                    <option selected>Select</option>
                                    <option value="End of Season" onclick="end()">End Of Season</option>
                                    <option value="Fortnightly">Fortnightly</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label
                                >Pay Period Starting
                                    <span class="text-danger">*</span></label
                                >
                                <br/>
                                <textarea class="displayDatePicker"  rows="1" cols="15">12/07/2021</textarea>
                            </div>
                            <div class="form-group">
                                <label
                                >Pay period ending
                                    <span class="text-danger">*</span></label
                                >
                                <div class="cal-icon">
                                    <!--<p id="datepicker"></p>-->
                                    <!-- ppp -->
                                    <input

                                        class="form-control datetimepicker"
                                        id="datepicker"
                                        name="endDate"
                                        type="text"
                                    />
                                    <!-- /// -->
                                </div>
                            </div>
                            <div class="form-group">
                                <label
                                >Date pay run will be paid<span class="text-danger"
                                    >*</span
                                    ></label
                                >
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="payrunDate" type="text" />
                                </div>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">
                                    <i class="fa fa-plus"></i> Create
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Add Addition Modal -->
    </div>
    <!-- /Page Wrapper -->

@endsection
@push('script')

<script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>

 <script>
$(document).ready(function(){
    $("#toexcel").click(function(){

  $("#export").table2excel({
    exclude:".noExl",
    filename:"Payroll",//do not include extension
    fileext:".xlsx" // file extension
  });
});
});
</script>
<script>
        $(document).ready(function () {
            let val = "";
            $(".js-example-basic-single").select2();

            $("select.optionlist").change(function () {
                val = $(this).children("option:selected").val();

                if (val === "End of Season") {
                    var dt = new Date();
                    var year = dt.getFullYear();
                    $(".displayDatePicker").html(`01/01/${year}`);
                    $(".displayDatePickerh").val($(".displayDatePicker").html());
                }
            });

            $("#datepicker").focusout(function () {
                if (val === "Fortnightly") {
                    $(".displayDatePicker").html($(this).val());
                    var x = $(".displayDatePicker").html();
                    var newString = x.split("/");
                    var year = newString[2];
                    var day = newString[0];
                    var month = newString[1];
                    if (day.length < 2) day = "0" + day;
                    if (month.length < 2) month = "0" + month;
                    var dat = `${year}-${month}-${day}`;
                    var gp = new Date(dat);
                    var a1 = gp.getDate() - 13;
                    gp.setDate(a1);
                    var year1 = String(gp.getFullYear());
                    var day1 = String(gp.getDate());
                    var month1 = String(gp.getMonth() + 1);
                    if (day1.length < 2) day1 = "0" + day1;
                    if (month1.length < 2) month1 = "0" + month1;
                    $(".displayDatePicker").html(`${day1}/${month1}/${year1}`);
                    $(".displayDatePickerh").val($(".displayDatePicker").html());
                }
            });
        });
    </script>



@endpush
