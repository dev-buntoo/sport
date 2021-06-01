@extends('root')
@section('content')
    <style>
        .select2-container{
            width:100% !important;
        }
    </style>

			<!-- Page Wrapper -->
            <div class="page-wrapper">

				<!-- Page Content -->
                <div class="content container-fluid">
 <form method="POST" action="{{ route('reports.store')}}" enctype="multipart/form-data">
                    @csrf
                    <!-- Row -->
                    <div class="row">
                        <div class="col-sm-12 mb-3">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <h5 class="card-title mb-0 text-center">Create Report</h5>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">Parramatta District Rugby League Referees Association</h5>
                                    <div class="row">
                                        <div class="col-sm">
                                           <form>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Match Day Coaching Sheet<span class="text-danger">*</span> </label>
                                                    <select name="format" class="select" id="change" onchange="changeTo5()" required>
                                                        <option value="1" >Under 15's A Grade</option>
                                                        <option value="2">Under 7’s – Under 14’s</option>
                                                    </select>
                                                </div>
                                             </div>
                                            <div class="col-sm-5">
                                                <div class="form-group">
                                                    <label>Age/Divisions<span class="text-danger">*</span> </label>
                                                    <select name="division" class="select" required>
                                                    @foreach ($division as $item )
                                            <option value="{{ $item->name }}" width="100%">{{ $item->name }}</option>
                                            @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Date <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="date" name="date" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Members Name<span class="text-danger">*</span> </label>
                                                    <select name="member" class="Members">
                                                        @foreach ($members as $member)
                                                            <option value="{{$member->id}}">{{$member->fname}} {{$member->lname}}</option>
                                                            @endforeach
                                                        <!--<option value = "Ali Sobh">Ali Sobh</option>-->
                                                        <!--<option value = "Ali Sobh">Jarrod McFarland</option>-->
                                                        <!--<option value = "Ali Sobh">Corey Fisher</option>-->
                                                        <!--<option value = "Ali Sobh">Lukas Durrant</option>-->
                                                        <!--<option value = "Ali Sobh">Harrison Buxton</option>-->
                                                        <!--<option value = "Ali Sobh">Jacob Dean</option>-->
                                                        <!--<option value = "Ali Sobh">Bassam Agha</option>-->
                                                        <!--<option value = "Ali Sobh">Danny Constantine</option>-->
                                                        <!--<option value = "Ali Sobh">Raymond Doung</option>-->
                                                        <!--<option value = "Ali Sobh">Calliope Harvey</option>-->
                                                        <!--<option value = "Ali Sobh">Mark Harvey</option>-->
                                                        <!--<option value = "Ali Sobh">Lachlan Smith</option>-->
                                                        <!--<option value = "Ali Sobh">Kallin Dries</option>-->
                                                        <!--<option value = "Ali Sobh">Brock Miller</option>-->
                                                        <!--<option value = "Ali Sobh">Bernard Biala</option>-->
                                                        <!--<option value = "Ali Sobh">Sarkis Wakim</option>-->
                                                        <!--<option value = "Ali Sobh">Michael Karam</option>-->
                                                        <!--<option value = "Ali Sobh">Thomas Cowling</option>-->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Home Team<span class="text-danger">*</span> </label>
                                                      <select class="Home" class="form-control select" name="home_team" onkeyup="filterFunction()" class="myDropdown myInput" required>
                                                        @foreach ($team as $item )
                                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Away Team <span class="text-danger">*</span></label>
                                                        <select  class="Away" class="form-control select" name="away_team" required>
                                                            <!--<input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">-->
                                                             @foreach ($team as $item )
                                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Overall Grade <span class="text-danger">*</span></label>
                                                    <select class="form-group select" name="overall_grade" id="create-overall" required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Home Team Score <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="home_score" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Away Team Score <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="away_score" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Home Team Penalties <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="home_penalties" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Away Team Penalties <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="number" name="away_penalties" required>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Signals / Presentation </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Whistle<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="wistla_tone_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Signals<span class="text-danger">*</span> </label>
                                                    <select class="form-group select create-childrens" name="c_c_signal_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Presentation<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="presentation_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Pre-Match <span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="pre_match_duties_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="signals_note">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Laws of the Game </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>ID of Laws<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="application_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Scrums<span class="text-danger">*</span> </label>
                                                    <select class="form-group select create-childrens" name="scrum_grade" required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Processes<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="process_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Advantage<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="advantage_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="game_law_note">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Game Understanding/Awareness </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Pen Selection<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="penalty_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Ruck Comms <span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="ruck_comm_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Caution<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="effective_caution_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="rapp">Movement<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="movement_patterns_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="understandig_note">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label id="Label1">10m, Markers & Ruck </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="Label2">10m Distance<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="ten_m_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="Label3">10m Complaince<span class="text-danger">*</span> </label>
                                                    <select class="form-group select create-childrens" name="ten_m_complaince_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Markers<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="marker_complaince_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="tack">Ruck/PTB Speed<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="ruck_speed_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="marker_ruck_note">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label id="safe">Communication & Tackle ID</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="app">Ruck Vocab<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="ruck_vocab_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="idt">Tackle ID<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="tackle_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="adv">Player Report<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="player_rapport_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="coms">Comms Timing<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="comm_timming_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="communication_note">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Positioning</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="Label4">On 10m<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="ten_m_position_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>In-Goal<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="in_goal_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Start & Restart<span class="text-danger">*</span><span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="start_restart_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>General Kicks<span class="text-danger">*</span></label>
                                                    <select class="form-group select create-childrens" name="kicks_breaks_grade"  required>
                                                        <option value="0" selected>Grade</option>
                                                        <option value="N">N</option>
                                                        <option value="S">S</option>
                                                        <option value="A">A</option>
                                                        <option value="E">E</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Note"
                                                        name="positioning_note">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Coaching Comments / Summary<span class="text-danger">*</span> </label>
                                                    <textarea class="form-control" rows="4" name="coach_comments" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label> Overall Assessment <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label class="label-small-text">
                                                        <input type="radio" name="overall_assesment" value="Needing Improvements"> Needing Improvements
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment" value="Meeting Expactations" required> Meeting Expectations
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="overall_assesment" value="Exeeding Expactations"> Exceeding Expectations
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Comments <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" rows="4" name="final_comments" required></textarea>
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
                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn">Submit</button>
                                        </div>
                                    </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
 </form>
                    <!-- /Row -->
                </div>
				<!-- /Page Content -->

				<!-- Add Tax Modal -->
				<div id="add_tax" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Add Tax</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Tax Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Tax Percentage (%) <span class="text-danger">*</span></label>
										<input class="form-control" type="text">
									</div>
									<div class="form-group">
										<label>Status <span class="text-danger">*</span></label>
										<select class="select">
											<option>Pending</option>
											<option>Approved</option>
										</select>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Add Tax Modal -->

				<!-- Edit Tax Modal -->
				<div id="edit_tax" class="modal custom-modal fade" role="dialog">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Edit Tax</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label>Tax Name <span class="text-danger">*</span></label>
										<input class="form-control" value="VAT" type="text">
									</div>
									<div class="form-group">
										<label>Tax Percentage (%)  <span class="text-danger">*</span></label>
										<input class="form-control" value="14%" type="text">
									</div>
									<div class="form-group">
										<label>Status <span class="text-danger">*</span></label>
										<select class="select">
											<option>Active</option>
											<option>Inactive</option>
										</select>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /Edit Tax Modal -->

				<!-- Delete Tax Modal -->
				<div class="modal custom-modal fade" id="delete_tax" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Tax</h3>
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
				<!-- /Delete Tax Modal -->

            </div>
			<!-- /Page Wrapper -->
			

<script>

    function changeTo5(){
        
                var e = document.getElementById("change");
                if(e.options[e.selectedIndex].value=== "1" )
               {
                   
                   document.querySelector("#app").innerHTML = "Ruck Vocab";
                   document.querySelector("#idt").innerHTML = "Tackle ID";
                   document.querySelector("#adv").innerHTML = "Player Report";
                   document.querySelector("#rapp").innerHTML = "Movement";
                    document.querySelector("#safe").innerHTML = "Communication & Tackle ID";
                    document.querySelector("#tack").innerHTML = "Ruck/PTB Speed";
                    document.querySelector("#rapp").innerHTML = "Movement";
                    document.querySelector("#coms").innerHTML = "Comms Timing";
                    document.querySelector("#Label1").innerHTML = "10m, Markers & Ruck";
                    document.querySelector("#Label2").innerHTML = "10m Distance";
                    document.querySelector("#Label3").innerHTML = "10m Complaince";
                    document.querySelector("#Label4").innerHTML = "On 10m";
               }
                if(e.options[e.selectedIndex].value=== "2")
                {
                    document.querySelector("#app").innerHTML = "Application";
                    document.querySelector("#idt").innerHTML = "Identification";
                    document.querySelector("#adv").innerHTML = "Advantage";
                    document.querySelector("#rapp").innerHTML = "Movement";
                    document.querySelector("#safe").innerHTML = "Safe Play Code";
                    document.querySelector("#tack").innerHTML = "Tackle ID";
                    document.querySelector("#rapp").innerHTML = "Player Rapport";
                    document.querySelector("#coms").innerHTML = "Scrums";
                    document.querySelector("#Label1").innerHTML = "5m, Markers & Ruck";
                    document.querySelector("#Label2").innerHTML = "5m Distance";
                    document.querySelector("#Label3").innerHTML = "5m Complaince";
                    document.querySelector("#Label4").innerHTML = "On 5m";
                      
                }
               
    }
</script>



@endsection