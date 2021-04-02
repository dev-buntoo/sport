@extends('root')
@section('content')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Appointment Games</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('appointment.show')}}">Appointment</a></li>
                                <li class="breadcrumb-item active">Edit Appointment</li>
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
                                <h5 class="card-title mb-0">Appointment Edit</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <form class="needs-validation" method="POST" action="{{ route('appointment.update') }}">
                                         @csrf
                                         <input type="hidden" value="{{ $app->id }}" name="id">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="home_team">Home Team</label>
                                                    <input type="text" class="form-control" id="home_team"
                                                        name="home_team" value="{{ $app->home_team }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="away-team">Away Team</label>
                                                    <input type="text" class="form-control" id="away-team"
                                                        name="away_team" value="{{ $app->away_team }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="grade">Grade</label>
                                                    <input type="text" class="form-control" id="grade" name="grade"
                                                        value="{{ $app->grade }}" required>
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="referee">Referee</label>
                                                    <input type="text" class="form-control" id="referee" name="referee"
                                                        value="{{ $app->referee }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="referee_rate">Referee Rate</label>
                                                    <input type="number" class="form-control" id="referee_rate"
                                                        name="referee_rate" value="{{ $app->rates->refree_rate }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="touch_judge_one">Touch Judge #1</label>
                                                    <input type="text" class="form-control" id="touch_judge_one"
                                                        name="touch_judge_one" value="{{ $app->touch_judge_one }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="touch_judge_two">Touch Judge #2</label>
                                                    <input type="text" class="form-control" id="touch_judge_two"
                                                        name="touch_judge_two" value="{{ $app->touch_judge_two }}">
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="touch_judge_rate" class="">Touch Judge
                                                        Rate</label>
                                                    <input type="number" class="form-control" id="touch_judge_rate"
                                                        name="touch_judge_rate" value="{{ $app->rates->touch_judge_rate }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="coach">Coach</label>
                                                    <input type="text" class="form-control" id="coach" name="coach"
                                                        value="{{ $app->coach }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="coach_rate">Coach Rate</label>
                                                    <input type="number" class="form-control" id="coach_rate"
                                                        name="coach_rate" value="{{ $app->rates->coach_rate }}" required>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="coach_rate">Ground</label>
                                                    <input type="text" class="form-control" id="ground"
                                                        name="ground" value="{{ $app->ground }}" required>
                                                </div>
                                            </div>
                                            <div class="submit-section">
                                                <button class="btn btn-primary submit-btn" type="submit">Update</button>
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

@endsection
