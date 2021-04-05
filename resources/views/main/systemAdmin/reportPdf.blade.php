<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('report_assets/css/writing_form.css')}}"> --}}
    <style>
        @page { size: 500pt 500pt; margin: 50px;  }
        body {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
            max-width: 1111px;
            font-family: 'Open Sans', sans-serif;
        }

        .main-heading {
            display: flex;
            margin: 40px 0;
            align-items: center;
            justify-content: space-between;
        }

        .main-heading h1 {
            font-size: 24px;
            line-height: 40px;
            text-align: center;
            max-width: 665px;
        }

        .two-sec {
            display: flex;
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            flex-wrap: wrap;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            -webkit-box-align: flex-start;
            -webkit-align-items: flex-start;
            -ms-flex-align: flex-start;
            align-items: flex-start;
        }

        .two-sec .iner {
            display: flex;
            flex-wrap: wrap;
            width: 74%;
        }

        .two-sec .right-table {
            width: calc(28% - 50px);
            float: right;
        }

        .two-sec .right-table table {
            margin-top: 0;
        }

        .two-sec span {
            border-bottom: 2px solid;
            padding: 2px 15px;
            font-weight: normal;
            font-size: 16px;
            line-height: 24px;
        }

        .two-sec p {
            font-size: 20px;
            line-height: 40px;
            font-weight: bold;
            margin: 0 0 15px;
        }

        .two-sec table {
            border-collapse: collapse;
            margin-top: 30px;
        }

        .two-sec .right-table td {
            padding: 5px;
        }

        .two-sec th,
        td {
            border: 2px solid #000;
            padding: 3px 10px;
            font-size: 18px;
            line-height: 22px;
            height: 40px;
        }

        table.table-form {
            border-collapse: collapse;
            margin-top: 30px;
            width: 100%;
        }

        .table-form td {
            font-weight: 600;
        }

        .table-form th,
        td {
            border: 2px solid #000;
            padding: 5px 10px;
            text-align: center;
            font-size: 18px;
            line-height: 24px;
            vertical-align: top;
        }

        .table-form span {
            border-bottom: 2px solid;
            padding: 0 15px;
            line-height: 30px;
        }

        tr.table-head th:first-child {
            height: 40px;
        }

        tr.table-head th:nth-child(2) {
            border: none;
            text-align: left;
            font-weight: normal;
            font-size: 16px;
            vertical-align: middle;
        }

        .comment-section p {
            margin: 20px 0;
        }

        .comment-section label {
            border-bottom: 2px solid;
            font-size: 20px;
            line-height: 30px;
            padding: 4px 0;
            font-weight: bold;
        }

        .comment-section span {
            border-bottom: 2px solid;
            font-size: 16px;
            line-height: 50px;
            padding: 5px 10px;
            width: 100%;
        }

        .assesment-section h2 {
            text-align: center;
            margin: 40px 0 10px;
        }

        .assesment-section table {
            margin: 0;
        }

        .assesment-section th {
            text-align: left;
            vertical-align: middle;
            padding: 0 10px;
        }

        .assesment-section input {
            width: 30px;
            height: 30px;
            margin: 0 25px;
            vertical-align: middle;
        }

        .comment-section.signature-section p {
            margin-bottom: 40px;
        }

        .comment-section.signature-section label {
            border-bottom: none;
            font-weight: 600;
        }

        .comment-section.signature-section span {
            padding: 2px 15px;
        }

        .signature-section p {
            width: 40%;
            float: left;
            margin-right: 50px;
        }

        span.no-line {
            border-bottom: none;
            padding: 0;
            text-align: center;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <div class="main-heading">
        <img src="{{asset('report_assets/img/payLogo.png')}}" alt="logo">
        <h1>Parramatta District Rugby League Referees Association Match Day Coaching Sheet (
            @php
            if ($report->format == 1) {
            echo "Under 15's - A Grade";
            }elseif ($report->format == 2) {
            echo "Under 7’s – Under 14’s";
            }
            else {
            echo "Tough Judge";
            }
            @endphp
            )</h1>
        <img src="{{asset('report_assets/img/payLogo.png')}}" alt="logo">
    </div>
    <div class="two-sec">
        <div class="iner">
            <p><label>Referee:</label><span>{{$report->member->fname}} {{$report->member->lname}} </span></p>
            <p><label>Grade:</label><span>{{$report->grade_division}}</span></p>
            <p><label>Teams:</label><span>{{$report->homeTeam->team_name}}</span></p>
            <p><label>V</label><span>{{$report->awayTeam->team_name}}</span></p>
            <p><label>Date:</label><span>{{Carbon\Carbon::parse($report->date)->format('d-m-Y')}}</span></p>
            <table>
                <tr>
                    <th colspan="1" valign="top" align="left" width="170">Key</th>
                </tr>
                <tr>
                    <th valign="top" width="170" align="left">Needing Improvement</th>
                    <th valign="top" align="left">(N)</th>
                    <th valign="top" align="left">Standard</th>
                    <th valign="top" align="left">(S)</th>
                    <th valign="top" align="left">Above Standard</th>
                    <th valign="top" align="left">(A)</th>
                    <th valign="top" align="left">Excellent</th>
                    <th valign="top" align="left">(E)</th>
                </tr>
            </table>
        </div>
        <div class="right-table">
            <table>
                <tr>
                    <th style="width: 50%;">Home</th>
                    <th>Away</th>
                </tr>
                <tr>
                    <th colspan="2">Penalties</th>
                </tr>
                <tr>
                    <td style="height: 30px;"><span class="no-line">{{$report->home_penalties}}</span></td>
                    <td style="height: 30px;"><span class="no-line">{{$report->home_penalties}}</span></td>
                </tr>
                <tr>
                    <th colspan="2" cellspacing="0">Score</th>

                </tr>
                <tr>
                    <td style="height: 30px;"><span class="no-line">{{$report->home_score}}</span></td>
                    <td style="height: 30px;"><span class="no-line">{{$report->away_score}}</span></td>
                </tr>
                <tr>
                    <th>Overall Grading</th>
                    <th><span class="no-line">{{$report->overall_grade}}</span></th>
                </tr>
            </table>
        </div>
    </div>
    <table class="table-form">
        <tr class="table-head">
            <th colspan="1" style="">Signals/Presentation</th>
            <th colspan="7" style=""><span>{{($report->signals_note <> null)?$report->signals_note:''}}</span></th>
        </tr>
        <tr>
            <td>Whistle Tone</td>
            <td width="30"><span class="no-line">{{$report->wistla_tone_grade}}</span></td>
            <td>Clear & Concise Signals</td>
            <td width="30"><span class="no-line">{{$report->c_c_signal_grade}}</span></td>
            <td>Presentation</td>
            <td width="30"><span class="no-line">{{$report->presentation_grade}}</span></td>
            <td>Pre-Match Duties</td>
            <td width="30"><span class="no-line">{{$report->pre_match_duties_grade}}</span></td>
        </tr>
        <tr class="table-head">
            <th colspan="1" style="">laws of the Game</th>
            <th colspan="7" style=""><span>{{($report->game_law_note <> null)?$report->game_law_note:''}}</span></th>
        </tr>
        <tr>
            <td>Application and ID of Laws</td>
            <td width="30"><span class="no-line">{{$report->application_grade}}</span></td>
            <td>Scurms</td>
            <td width="30"><span class="no-line">{{$report->scrum_grade}}</span></td>
            <td>Processess</td>
            <td width="30"><span class="no-line">{{$report->process_grade}}</span></td>
            <td>Advantage</td>
            <td width="30"><span class="no-line">{{$report->advantage_grade}}</span></td>
        </tr>
        <tr class="table-head">
            <th colspan="1" style="">Game Understanding/Awareness</th>
            <th colspan="7" style=""><span>{{($report->understandig_note <> null)?$report->understandig_note:''}}</span>
            </th>
        </tr>
        <tr>
            <td>Penalty Selection</td>
            <td width="30"><span class="no-line">{{$report->penalty_grade}}</span></td>
            <td>Effective Ruck Communication</td>
            <td width="30"><span class="no-line">{{$report->ruck_communication_grade}}</span></td>
            <td>Effective Caution</td>
            <td width="30"><span class="no-line">{{$report->effective_caution_grade}}</span></td>
            <td>Movement Patterns</td>
            <td width="30"><span class="no-line">{{$report->movement_patterns_grade}}</span></td>
        </tr>
        <tr class="table-head">
            <th colspan="1" style="">10m, Markers & Ruck</th>
            <th colspan="7" style=""><span>{{($report->marker_ruck_note <> null)?$report->marker_ruck_note:''}}</span>
            </th>
        </tr>
        <tr>
            <td>10m Distance</td>
            <td width="30"><span class="no-line">{{$report->ten_m_grade}}</span></td>
            <td>10m Compliance</td>
            <td width="30"><span class="no-line">{{$report->ten_m_complaince_grade}}</span></td>
            <td>Marker Compliance</td>
            <td width="30"><span class="no-line">{{$report->marker_complaince_grade}}</span></td>
            <td>Ruck/PTB Speed</td>
            <td width="30"><span class="no-line">{{$report->ruck_speed_grade}}</span></td>
        </tr>
        <tr class="table-head">
            <th colspan="1" style="">Communication and Tackle ID</th>
            <th colspan="7" style="">
                <span>{{($report->communication_note <> null)?$report->communication_note:''}}</span></th>
        </tr>
        <tr>
            <td>Ruck Vocab</td>
            <td width="30"><span class="no-line">{{$report->ruck_vocab_grade}}</span></td>
            <td>Tackle Identification</td>
            <td width="30"><span class="no-line">{{$report->tackle_grade}}</span></td>
            <td>Player Rapport</td>
            <td width="30"><span class="no-line">{{$report->player_rapport_grade}}</span></td>
            <td>Communication Timing</td>
            <td width="30"><span class="no-line">{{$report->communication_timming_grade}}</span></td>
        </tr>
        <tr class="table-head">
            <th colspan="1" style="">Positioning</th>
            <th colspan="7" style=""><span>{{($report->positioning_note <> null)?$report->positioning_note:''}}</span>
            </th>
        </tr>
        <tr>
            <td>On the 10m</td>
            <td width="30"><span class="no-line">{{$report->ten_m_position_grade}}</span></td>
            <td>In-Goal</td>
            <td width="30"><span class="no-line">{{$report->in_goal_grade}}</span></td>
            <td>Start & Restarts of Play</td>
            <td width="30"><span class="no-line">{{$report->start_restart_grade}}</span></td>
            <td>Kicks, Breaks in Play & Attacting Situations</td>
            <td width="30"><span class="no-line">{{$report->kicks_breaks_grade}}</span></td>
        </tr>
    </table>
    <div class="comment-section">
        <p><label>Coaching Comments/Summery:</label><span>{{$report->coach_comments}}</span></p>
    </div>
    <div class="assesment-section">
        <h2>Overall Assessment</h2>
        <table class="table-form">
            <tr>
                <th>Needing Improvement <input name="name" type="checkbox"></th>
                <th>Meeting Expectations <input name="name1" type="checkbox"></th>
                <th>Exceeding Expectations <input name="name2" type="checkbox"></th>
            </tr>
        </table>
    </div>
    <div class="comment-section">
        <p style="margin-bottom: 0;"><label style="border-bottom: none; font-weight: 600;">Comment:</label></p>
        <p style="margin-top: 0;"><span>{{$report->final_comments}}</span></p>
    </div>
    <div class="signature-section comment-section">
        <p><label>Coach Name:</label><span id="text">{{$report->coach}}</span></p>
        <p><label>Coach Signature:</label><span>Ali Raza Match</span></p>
    </div>
</body>

</html>
