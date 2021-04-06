@extends('root')
@section('content')
@push('style')
<style>
    .card-body {
        padding: 1rem;
    }

    .label-small-text {
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
                                    <a target="_blank" href="{{asset('storage/reports/'.$report->pdf_name)}}"
                                        class="btn btn-sm btn-primary">View PDF</a>
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
                                        <p>Match Day Coaching Sheet <span class="text-danger">*</span>

                                            <select name="format" id="" class="form-control select form-control-sm"
                                                required>
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
                                                        <input class="form-control" type="date" name="date"
                                                            value="{{old('date')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Members Name <span class="text-danger">*</span></label>
                                                        <select class="js-example-basic-single" name="member"
                                                            style="width: 100%;" required>
                                                            <option value="">Please Select Member</option>
                                                            @foreach ($members as $member)
                                                            <option value="{{$member->id}}"
                                                                {{old('member')==$member->id?'selected':''}}>
                                                                {{$member->fname}} {{$member->lname}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Home Team <span class="text-danger">*</span></label>
                                                        <select class="form-control select" name="home_team" required>
                                                            <option value=""> Please Select Home Team</option>
                                                            @foreach ($teams as $team)
                                                            <option value="{{$team->team_id}}"
                                                                {{old('home_team')==$team->team_id?'selected':''}}>
                                                                {{ $team->team_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team <span class="text-danger">*</span></label>
                                                        <select class="form-control select" name="away_team" required>
                                                            <option value="" selected> Please Select Away Team</option>
                                                            @foreach ($teams as $team)
                                                            <option value="{{$team->team_id}}"
                                                                {{old('away_team')==$team->team_id?'selected':''}}>
                                                                {{ $team->team_name }}</option>
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
                                                        <input class="form-control" type="number" name="home_penalties"
                                                            value="{{old('home_penalties')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team Penalties <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="away_penalties"
                                                            value="{{ old('away_penalties')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Home Team Score <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="home_score"
                                                            value="{{old('home_score')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Away Team Score <span
                                                                class="text-danger">*</span></label>
                                                        <input class="form-control" type="number" name="away_score"
                                                            value="{{old('away_score')}}" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Grade & Division <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-group select" name="grade_division"
                                                            required>
                                                            <option value="">Grade</option>
                                                            <option value="N"
                                                                {{old('grade_division')=="N"?'selected':''}}>N</option>
                                                            <option value="S"
                                                                {{old('grade_division')=="S"?'selected':''}}>S</option>
                                                            <option value="A"
                                                                {{old('grade_division')=="A"?'selected':''}}>A</option>
                                                            <option value="E"
                                                                {{old('grade_division')=="E"?'selected':''}}>E</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Overall Grade <span class="text-danger">*</span></label>
                                                        <select class="form-group select" name="overall_grade" required>
                                                            <option value="" selected>Grade</option>
                                                            <option value="N"
                                                                {{old('overall_grade')=="N"?'selected':''}}>N</option>
                                                            <option value="S"
                                                                {{old('overall_grade')=="S"?'selected':''}}>S</option>
                                                            <option value="A"
                                                                {{old('overall_grade')=="A"?'selected':''}}>A</option>
                                                            <option value="E"
                                                                {{old('overall_grade')=="E"?'selected':''}}>E</option>
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
                                                        name="signals_note" value="{{old('signals_note')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Wistla Tone </label>
                                                    <select class="form-group select" name="wistla_tone_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('wistla_tone_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('wistla_tone_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('wistla_tone_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('wistla_tone_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Clear & Concise Signals </label>
                                                    <select class="form-group select" name="c_c_signal_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('c_c_signal_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('c_c_signal_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('c_c_signal_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('c_c_signal_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Prasentation</label>
                                                    <select class="form-group select" name="presentation_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('presentation_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('presentation_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('presentation_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('presentation_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Pre-Match Duties</label>
                                                    <select class="form-group select" name="pre_match_duties_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('pre_match_duties_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('pre_match_duties_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('pre_match_duties_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('pre_match_duties_grade')=="E"?'selected':''}}>E
                                                        </option>
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
                                                        name="game_law_note" value="{{ old('game_law_note') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5 pt-3">
                                                <div>
                                                    <label>Application and ID of Law</label>
                                                    <select class="form-group select" name="application_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('application_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('application_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('application_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('application_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Scrum</label>
                                                    <select class="form-group select" name="scrum_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('scrum_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('scrum_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('scrum_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('scrum_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>Process</label>
                                                    <select class="form-group select" name="process_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('process_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('process_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('process_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('process_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Advantage</label>
                                                    <select class="form-group select" name="advantage_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('advantage_grade')=="N"?'selected':''}}>
                                                            N</option>
                                                        <option value="S" {{old('advantage_grade')=="S"?'selected':''}}>
                                                            S</option>
                                                        <option value="A" {{old('advantage_grade')=="A"?'selected':''}}>
                                                            A</option>
                                                        <option value="E" {{old('advantage_grade')=="E"?'selected':''}}>
                                                            E</option>
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
                                                        name="understandig_note" value="{{old('understandig_note')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Penalty Selection</label>
                                                    <select class="form-group select" name="penalty_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('penalty_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('penalty_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('penalty_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('penalty_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-5 pt-3">
                                                <div>
                                                    <label>Effective Ruck Communication</label>
                                                    <select class="form-group select" name="ruck_comm_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('ruck_comm_grade')=="N"?'selected':''}}>
                                                            N</option>
                                                        <option value="S" {{old('ruck_comm_grade')=="S"?'selected':''}}>
                                                            S</option>
                                                        <option value="A" {{old('ruck_comm_grade')=="A"?'selected':''}}>
                                                            A</option>
                                                        <option value="E" {{old('ruck_comm_grade')=="E"?'selected':''}}>
                                                            E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Effective Caution</label>
                                                    <select class="form-group select" name="effective_caution_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('effective_caution_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('effective_caution_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('effective_caution_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('effective_caution_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label>Movement Patterns</label>
                                                    <select class="form-group select" name="movement_patterns_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('movement_patterns_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('movement_patterns_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('movement_patterns_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('movement_patterns_grade')=="E"?'selected':''}}>E
                                                        </option>
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
                                                        name="marker_ruck_note" value="{{ old('marker_ruck_note') }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>10m Distance</label>
                                                    <select class="form-group select" name="ten_m_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('ten_m_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('ten_m_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('ten_m_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('ten_m_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>10m Complaince</label>
                                                    <select class="form-group select" name="ten_m_complaince_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('ten_m_complaince_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('ten_m_complaince_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('ten_m_complaince_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('ten_m_complaince_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label class="label-small-text">Marker Complaince</label>
                                                    <select class="form-group select" name="marker_complaince_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('marker_complaince_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('marker_complaince_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('marker_complaince_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('marker_complaince_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Ruck/PTB Speed</label>
                                                    <select class="form-group select" name="ruck_speed_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('ruck_speed_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('ruck_speed_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('ruck_speed_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('ruck_speed_grade')=="E"?'selected':''}}>E</option>
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
                                                        name="communication_note" value="{{old('communication_note')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Ruck Vocab</label>
                                                    <select class="form-group select" name="ruck_vocab_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('ruck_vocab_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('ruck_vocab_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('ruck_vocab_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('ruck_vocab_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label class="label-small-text">Tackle Identification</label>
                                                    <select class="form-group select" name="tackle_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('tackle_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('tackle_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('tackle_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('tackle_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Player Rapport</label>
                                                    <select class="form-group select" name="player_rapport_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('player_rapport_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('player_rapport_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('player_rapport_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('player_rapport_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Com. Timing</label>
                                                    <select class="form-group select" name="comm_timming_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('comm_timming_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('comm_timming_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('comm_timming_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('comm_timming_grade')=="E"?'selected':''}}>E</option>
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
                                                        name="positioning_note" value="{{old('positioning_note')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>On 10m</label>
                                                    <select class="form-group select" name="ten_m_position_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('ten_m_position_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S"
                                                            {{old('ten_m_position_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A"
                                                            {{old('ten_m_position_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E"
                                                            {{old('ten_m_position_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2 pt-3">
                                                <div>
                                                    <label>In-Goal</label>
                                                    <select class="form-group select" name="in_goal_grade" required>
                                                        <option value="">Grade</option>
                                                        <option value="N" {{old('in_goal_grade')=="N"?'selected':''}}>N
                                                        </option>
                                                        <option value="S" {{old('in_goal_grade')=="S"?'selected':''}}>S
                                                        </option>
                                                        <option value="A" {{old('in_goal_grade')=="A"?'selected':''}}>A
                                                        </option>
                                                        <option value="E" {{old('in_goal_grade')=="E"?'selected':''}}>E
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 pt-3">
                                                <div>
                                                    <label>Start & Restart</label>
                                                    <select class="form-group select" name="start_restart_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('start_restart_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('start_restart_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('start_restart_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('start_restart_grade')=="E"?'selected':''}}>E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 pt-3">
                                                <div>
                                                    <label class="label-small-text">Kicks, Breaks & Attacting</label>
                                                    <select class="form-group select" name="kicks_breaks_grade"
                                                        required>
                                                        <option value="">Grade</option>
                                                        <option value="N"
                                                            {{old('kicks_breaks_grade')=="N"?'selected':''}}>N</option>
                                                        <option value="S"
                                                            {{old('kicks_breaks_grade')=="S"?'selected':''}}>S</option>
                                                        <option value="A"
                                                            {{old('kicks_breaks_grade')=="A"?'selected':''}}>A</option>
                                                        <option value="E"
                                                            {{old('kicks_breaks_grade')=="E"?'selected':''}}>E</option>
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
                                                    <textarea class="form-control" rows="4"
                                                        name="coach_comments">{{old('coach_comments')}}</textarea>
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
                                                        <input type="radio" name="overall_assesment"
                                                            value="Needing Improvements"
                                                            {{old('overall_assesment')=="Needing Improvements"?'checked':''}}
                                                            required> Needing Improvements
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment"
                                                            value="Meeting Expactations"
                                                            {{old('overall_assesment')=="Meeting Expactations"?'checked':''}}
                                                            required> Meeting Expactations
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment"
                                                            value="Exeeding Expactations"
                                                            {{old('overall_assesment')=="Exeeding Expactations"?'checked':''}}
                                                            required> Exeeding Expactations
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Comments </label>
                                                    <textarea class="form-control" rows="4"
                                                        name="final_comments">{{old('final_comments')}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {{-- <div class="form-group">
                                                    <label> Additional File </label>
                                                    <input type="file" name="file">
                                                </div> --}}
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
