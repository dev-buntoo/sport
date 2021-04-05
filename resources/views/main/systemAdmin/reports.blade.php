@extends('root')
@section('content')
@push('style')
<style>
    .card-body {
        padding: 1rem;
    }
    .label-small-text{
        font-size: 13px;
    }
</style>
@endpush
<!-- Page Wrapper -->
<div class="page-wrapper">

    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="page-title"> Members Match Reports</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                        <li class="breadcrumb-item active">Members Match Reports</li>
                    </ul>
                </div>


                <div class="col-md-3 float-right ml-auto">
                </div>

                <div class="col-md-3 d-flex float-right">

                    <button class="btn btn-primary add-btn" type="button" data-toggle="modal"
                        data-target="#addReport"><i class="fa fa-plus"></i> Create Report</button>
                </div>

            </div>

        </div>
        <!-- /Page Header -->



        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">

                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th>Match Report Date</th>
                                <th>Member Name</th>
                                <th>Home Team</th>
                                <th>Away Team</th>
                                <th>Grade</th>
                                <th>Owerall Grade</th>
                                <th>Viewed</th>
                                <th>View PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                            <tr>
                                <td>{{$report->date}}</td>
                                <td>{{$report->member->fname}} {{$report->member->lname}}</td>
                                <td>{{$report->homeTeam->team_name}}</td>
                                <td>{{$report->awayTeam->team_name}}</td>
                                <td>{{$report->grade_division}}</td>
                                <td>{{$report->overall_grade}}</td>
                                <td>--</td>
                                <td>
                                    <a target="_blank" href="{{asset('storage/reports/'.$report->pdf_name)}}" class="btn btn-sm btn-primary">View PDF</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->


</div>
<!-- /Page Wrapper -->

<!-- Create Project Modal -->
<div id="addReport" class="modal custom-modal  fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl	" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom">
                <h5 class="modal-title">Create Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reports.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-5 mb-3">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <div class="welcome-det">
                                        <h3>Parramatta District Rugby League Referees Association</h3>
                                        <p>Match Day Coaching Sheet  <span class="text-danger">*</span>

                                            <select name="format" id="" class="form-control select form-control-sm" required>
                                                <option value="" selected>Please Select Format</option>
                                                <option value="1">Under 15's – A Grade</option>
                                                <option value="2">Under 7’s – Under 14’s</option>
                                                <option value="3">Touch Judge</option>
                                            </select>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Date <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date" name="date" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Members Name  <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single" name="member" style="width: 100%;" required>
                                                            <option value="" selected>Please Select Member</option>
                                                            @foreach ($members as $member)
                                                            <option value="{{$member->id}}">{{$member->fname}} {{$member->lname}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Home Team  <span class="text-danger">*</span></label>
                                                        <select class="form-control select" name="home_team" required>
                                                            <option value="" selected> Please Select Home Team</option>
                                                            @foreach ($teams as $team)
                                                            <option value="{{$team->team_id}}">{{ $team->team_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team  <span class="text-danger">*</span></label>
                                                        <select class="form-control select" name="away_team" required>
                                                            <option value="" selected> Please Select Away Team</option>
                                                            @foreach ($teams as $team)
                                                            <option value="{{$team->team_id}}">{{ $team->team_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Home Team Penalties<span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="home_penalties" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team Penalties <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="away_penalties" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Home Team Score <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="home_score" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team Score <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="away_score" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Grade & Division <span
                                                                class="text-danger">*</span></label>
                                                                <select class="form-group select" name="grade_division" required>
                                                                    <option value="" selected>Grade</option>
                                                                    <option value="N">N</option>
                                                                    <option value="S">S</option>
                                                                    <option value="A">A</option>
                                                                    <option value="E">E</option>
                                                                </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Overall Grade <span class="text-danger">*</span></label>
                                                        <select class="form-group select" name="overall_grade" required>
                                                            <option value="" selected>Grade</option>
                                                            <option value="N">N</option>
                                                            <option value="S">S</option>
                                                            <option value="A">A</option>
                                                            <option value="E">E</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 mb-3">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h3>Grading</h3>
                                </div>
                                <div class="card-body">
                                    {{-- right side form grading section --}}
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Signals / Presentation </label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="signals_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Wistla Tone </label>
                                                    <select class="form-group select" name="wistla_tone_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Clear & Concise Signals </label>
                                                    <select class="form-group select" name="c_c_signal_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Prasentation</label>
                                                    <select class="form-group select" name="presentation_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Pre-Match Duties</label>
                                                    <select class="form-group select" name="pre_match_duties_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Law of the Game </label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="game_law_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5 pt-3">
                                                <div>
                                                    <label>Application and ID of Law</label>
                                                    <select class="form-group select" name="application_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Scrum</label>
                                                    <select class="form-group select" name="scrum_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Process</label>
                                                    <select class="form-group select" name="process_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Advantage</label>
                                                    <select class="form-group select" name="advantage_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Game Understanding/Awareness</label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="understandig_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Penalty Selection</label>
                                                    <select class="form-group select" name="penalty_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 pt-3">
                                                <div>
                                                    <label>Effective Ruck Communication</label>
                                                    <select class="form-group select" name="ruck_comm_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Effective Caution</label>
                                                    <select class="form-group select" name="effective_caution_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Movement Patterns</label>
                                                    <select class="form-group select" name="movement_patterns_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>10m, Marker & Ruck</label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="marker_ruck_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>10m Distance</label>
                                                    <select class="form-group select" name="ten_m_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>10m Complaince</label>
                                                    <select class="form-group select" name="ten_m_complaince_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label class="label-small-text">Marker Complaince</label>
                                                    <select class="form-group select" name="marker_complaince_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Ruck/PTB Speed</label>
                                                    <select class="form-group select" name="ruck_speed_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Communication & Tackle Id</label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="communication_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Ruck Vocab</label>
                                                    <select class="form-group select" name="ruck_vocab_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label class="label-small-text">Tackle Identification</label>
                                                    <select class="form-group select" name="tackle_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Player Rapport</label>
                                                    <select class="form-group select" name="player_rapport_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Com. Timing</label>
                                                    <select class="form-group select" name="comm_timming_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-bottom pt-2 pb-2 mb-2">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Positioning</label>
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="positioning_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>On 10m</label>
                                                    <select class="form-group select" name="ten_m_position_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>In-Goal</label>
                                                    <select class="form-group select" name="in_goal_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Start & Restart</label>
                                                    <select class="form-group select" name="start_restart_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label class="label-small-text">Kicks, Breaks & Attacting</label>
                                                    <select class="form-group select" name="kicks_breaks_grade" required>
                                                        <option value="" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- right side form end section --}}
                                    <div class="border-bottom pt-2 pb-2 mb-1">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Coaching Comments / Summary </label>
                                                    <textarea class="form-control" rows="4" name="coach_comments"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label> Overall Assesment <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label class="label-small-text">
                                                        <input type="radio" name="overall_assesment" value="Needing Improvements" required> Needing Improvements
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment" value="Meeting Expactations" required> Meeting Expactations
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment" value="Exeeding Expactations" required> Exeeding Expactations
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Comments </label>
                                                    <textarea class="form-control" rows="4" name="final_comments"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Additional File </label>
                                                    <input type="file" name="file">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="submit-section">
                        <button class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Create Project Modal -->

@endsection
