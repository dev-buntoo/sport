@extends('root')
@section( 'content')


        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Appointment Games</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="appointments.html">Appointment</a></li>
                                <li class="breadcrumb-item active">Update Rates</li>
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
                                <h5 class="card-title mb-0">Update Rates</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form action="{{ route('appointment.saveRate') }}" method="POST">
                                            @csrf

                                            @foreach($rates as $rate)
                                            <input type="hidden" name="id[]" value="{{ $rate->id}}">
                                            <div class="form-row">
                                                <div class="col-md-3 col-md-offset-1 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade" name="grade[]"
                                                        value="{{ $rate->grade }}">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="refree_rate">Referee Rate</label>
                                                    <input type="text" class="form-control" id="refree_rate"
                                                        name="refree_rate[]" value="{{ $rate->refree_rate }}">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="touch_judge_rate">Touch Judge Rate</label>
                                                    <input type="text" class="form-control" id="touch_judge_rate"
                                                        name="touch_judge_rate[]" value="{{ $rate->touch_judge_rate }}">
                                                </div>
                                                <div class="col-md-3 mb-3">
                                                    <label for="coach_rate">Coach Rate</label>
                                                    <div class="d-flex">
                                                        <input type="text" w-75 class="form-control" id="coach_rate"
                                                        name="coach_rate[]" value="{{ $rate->coach_rate }}">
                                                        <a href="{{route('appointment.removeline',$rate->id)}}"  class="cross ml-2">&#10006;</a>
                                                    </div>
                                                </div>
                                                <!--<div class="col-md-3 mb-3 text-center" style="margin-top:40px">-->
                                                <!--    <a href="#" class="cross">&#10006;</a>-->
                                                <!--</div>-->
                                            </div>
                                            @endforeach
                                            <span id="items"></span>
                                            
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" id="add" type="button">Add New
                                                    Line</button>
                                                
                                                <button class="btn btn-warning text-light submit-btn" type="submit">Save
                                                    All</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Row -->
            </div>
        </div>
        <!-- /Page Wrapper -->

        @push('script')
        <script>
            $(document).ready(function () {
                $(".delete").hide();
                //when the Add Field button is clicked
                $("#add").click(function (e) {
                    $(".delete").fadeIn("1500");
                    //Append a new row of code to the "#items" div
                    $("#items").after(
                        '<input type="hidden" name="id[]" > <div class="form-row"><div class="col-md-3 mb-3"><label for="grade">Grade</label><input type="text" class="form-control" id="grade" name="grade[]"value=""></div><div class="col-md-3 mb-3"><label for="refree_rate">Referee Rate</label><input type="number" class="form-control" id="refree_rate"name="refree_rate[]" value=""></div><div class="col-md-3 mb-3"><label for="touch_judge_rate">Touch Judge Rate</label><input type="number" class="form-control" id="touch_judge_rate"name="touch_judge_rate[]" value=""></div><div class="col-md-3 mb-3"><label for="coach_rate">Coach Rate</label><div class="d-flex">\
                                                        <input type="number" w-75 class="form-control" id="coach_rate"\
                                                        name="coach_rate[]" value="">\
                                                        <a href="#"  class="cross ml-2">&#10006;</a>\
                                                    </div></div></div>'
                    );
                });
                $("body").on("click", ".cross", function (e) {
                    $(this).parents('.form-row').remove();
                });
            });
        </script>
        @endpush
@endsection
