<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Report</title>

</head>
<body>
	<table width="100%" style="border-collapse: collapse; border: none; min-width: auto; max-width: 600px; margin: 0 auto; font-family: Roboto,Arial,Helvetica,sans-serif">
		<tr>
			<td width="100%" colspan="12" style="max-width: 600px;">
					<table width="100%" style="margin-bottom: 30px;">
						<tr>
							<td  width="10%" align="left">
								<!-- <img src="img/payLogo.png" alt="logo"> -->
							</td>
							<td width="80%" align="center" style="font-size: 18px; line-height: 25px;">
								<h1 style="font-size: 18px; line-height: 25px;">Parramatta District Rugby League Referees Association Match Day Coaching Sheet <br> (@php
                                    if ($report->format == 1) {
                                    echo "Under 15's - A Grade";
                                    }elseif ($report->format == 2) {
                                    echo "Under 7’s – Under 14’s";
                                    }
                                    else {
                                    echo "Tough Judge";
                                    }
                                    @endphp)</h1>
							</td>
							<td  width="10%" align="left">
								<!-- <img src="img/payLogo.png" alt="logo"> -->
							</td>
						</tr>
					</table>

				<table width="100%">
					<tr>
						<td width="50%" style="font-weight: 600; padding-right: 10px;">
							<p>Referee: <span style="font-weight: 400; border-bottom: 2px solid #000; padding: 0 5px; font-size: 14px; line-height: 25px;">{{$report->member->fname}} {{$report->member->lname}}</span></p>
						</td>
						<td width="50%" style="font-weight: 600; padding-right: 10px;">
							<p>Grade: <span style="font-weight: 400; border-bottom: 2px solid #000; padding: 0 5px; font-size: 14px; line-height: 25px;">{{$report->grade_division}}</span></p>
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td width="50%" style="font-weight: 600; padding-right: 10px;">
							<p>Teams: <span style="font-weight: 400; border-bottom: 2px solid #000; padding: 0 5px; font-size: 14px; line-height: 25px;">{{$report->homeTeam->team_name}}</span></p>
						</td>
						<td width="50%" style="font-weight: 600; padding-right: 10px;">
							<p>V: <span style="font-weight: 400; border-bottom: 2px solid #000; padding: 0 5px; font-size: 14px; line-height: 25px;">{{$report->awayTeam->team_name}}</span></p>
						</td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td style="font-weight: 600; padding-right: 10px;">
							<p>Date: <span style="font-weight: 400; border-bottom: 2px solid #000; padding: 0 5px; font-size: 14px; line-height: 25px;">{{Carbon\Carbon::parse($report->date)->format('d-m-Y')}}</span></p>
						</td>
					</tr>
				</table>

			<table width="100%">
				<tbody  align="center">
					<tr>
						<td style="vertical-align: top;">
							<table width="250px" style="border-collapse: collapse; margin-top: 20px;text-align:center">
								<tbody">
									<tr>
										<th style="width: 50%; border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Home</th>
										<th style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Away</th>
									</tr>
									<tr>
										<th colspan="2" style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Penalties</th>
									</tr>
									<tr>
										<td style="height: 30px; border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;"><span>{{$report->home_penalties}}</span></td>
										<td style="height: 30px; border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;"><span>{{$report->away_penalties}}</span></td>
									</tr>
									<tr>
										<th colspan="2" cellspacing="0" style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Score</th>

									</tr>
									<tr>
										<td style="height: 30px; border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;"><span>{{$report->home_score}}</span></td>
										<td style="height: 30px; border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;"><span>{{$report->away_score}}</span></td>
									</tr>
									<tr>
										<th style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Overall Grading</th>
										<td style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;"><span>{{$report->overall_grade}}</span></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			<table style="border-collapse: collapse; margin-top: 50px;">
					<tr>
						<th colspan="1" valign="top" align="left" width="170" style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px; height: 30px;">Key</th>
					</tr>
					<tr>
						<th valign="top" width="170" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px;line-height: 20px;">Needing Improvement</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">(N)</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">Standard</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">(S)</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">Above Standard</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">(A)</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">Excellent</th>
						<th valign="top" align="left" style="border:2px solid #000; padding: 3px 5px; font-size: 14px; line-height: 20px;">(E)</th>
					</tr>
				</table>

				<table class="table-form" style="margin-top: 50px; border-collapse: collapse; max-width: 600px;">
					<tbody align="left" valign="top" style="font-size: 14px;line-height: 20px; height: 30px;">
				<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">Signals / Presentation</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->signals_note <> null)?$report->signals_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Whistle Tone</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->wistla_tone_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Clear & Concise Signals</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->c_c_signal_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Presentation</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->presentation_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Pre-Match Duties</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->pre_match_duties_grade}}</span></td>
					</tr>
					<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">laws of the Game</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->game_law_note <> null)?$report->game_law_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Application and ID of Laws</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->application_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Scurms</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->scrum_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Processess</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->process_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Advantage</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->advantage_grade}}</span></td>
					</tr>
					<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">Game Understanding / Awareness</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->understandig_note <> null)?$report->understandig_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Penalty Selection</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->penalty_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Effective Ruck Communication</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ruck_communication_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Effective Caution</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->effective_caution_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Movement Patterns</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->movement_patterns_grade}}</span></td>
					</tr>
					<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">10m, Markers & Ruck</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->marker_ruck_note <> null)?$report->marker_ruck_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">10m Distance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ten_m_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">10m Compliance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ten_m_complaince_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Marker Compliance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->marker_complaince_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Ruck/PTB Speed</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ruck_speed_grade}}</span></td>
					</tr>
					<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">Communication and Tackle ID</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->communication_note <> null)?$report->communication_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Ruck Vocab</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ruck_vocab_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Tackle Identification</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->tackle_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Player Rapport</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->player_rapport_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Communication Timing</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->communication_timming_grade}}</span></td>
					</tr>
					<tr class="table-head">
					<th colspan="1" style="border:2px solid #000; padding: 3px 5px; height: 40px;">Positioning</th>
					<th colspan="7" valign="middle" style="padding-left: 10px;"><span style="border-bottom: 2px solid #000; padding: 0 10px; font-weight: normal; font-size: 13px; line-height: 24px;">{{($report->positioning_note <> null)?$report->positioning_note:''}}</span></th>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">On the 10m</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->ten_m_position_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">In-Goal</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->in_goal_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Start & Restarts of Play</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->start_restart_grade}}</span></td>
						<td style="border:2px solid #000; padding: 3px 5px; font-weight: 600;">Kicks, Breaks in Play & Attacting Situations</td>
						<td width="30" style="border:2px solid #000; padding: 3px 5px; font-weight: 600;"><span class="no-line">{{$report->kicks_breaks_grade}}</span></td>
					</tr>
					</tbody>
				</table>

				<table width="100%">
					<tr>
						<td>
							<p><label style="border-bottom: 2px solid; font-size: 16px; line-height: 28px; padding: 5px 0; font-weight: bold;">Coaching Comments/Summery:</label><span style="border-bottom: 2px solid; font-size: 14px; line-height: 45px; padding: 5px 10px;">{{$report->coach_comments}}</span></p>
						</td>
					</tr>
				</table>

				<table width="100%" style="border-collapse: collapse; max-width: 600px;">
					<tr>
						<td align="center" style="font-size: 18px; line-height: 30px;">
							<h2 style="margin-bottom: 0; font-size: 18px; line-height: 30px;">Overall Assessment</h2>
						</td>
					</tr>
						<td>
							<table width="100%" class="table-form" style="border-collapse: collapse;">
								<tr>
									<th width="182px" align="left" style="border:2px solid #000; padding: 10px 5px; font-size: 14px; line-height: 28px;">Needing Improvement <input name="name" type="checkbox" style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: middle;" {{$report->overall_assesment=="Needing Improvements"?'checked':''}}></th>
									<th width="182px" align="left" style="border:2px solid #000; padding: 10px 5px; font-size: 14px; line-height: 28px;">Meeting Expectations <input name="name" type="checkbox" style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: middle;" {{$report->overall_assesment=="Meeting Expactations"?'checked':''}}></th>
									<th width="188px" align="left" style="border:2px solid #000; padding: 10px 5px; font-size: 14px; line-height: 28px;">Exceeding Expectations <input name="name" type="checkbox" style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: middle;" {{$report->overall_assesment=="Exeeding Expactations"?'checked':''}}></th>
								</tr>
							</table>
						</td>
				</table>

				<table width="100%">
					<tr>
						<td>
							<p style="margin-bottom: 0;"><label style="border-bottom: none; font-weight: 600; font-size: 16px; line-height: 28px;">Comment:</label></p>
							<p style="margin-top: 0;"><span style="border-bottom: 2px solid; font-size: 14px; line-height: 45px;">{{$report->final_comments}}</span></p>
						</td>
					</tr>
				</table>

				<table width="100%">
					<tr>
						<td width="50%">
							<p><label style="font-weight: 600; font-size: 16px; line-height: 28px;">Coach Name:</label><span style="border-bottom: 2px solid; padding: 0 10px; font-size: 14px; line-height: 30px;">{{$report->coach}}</span></p>
						</td>
						<td width="50%">
							<p><label style="font-weight: 600; font-size: 16px; line-height: 28px;">Coach Signature:</label><span style="border-bottom: 2px solid; padding: 0 10px; font-size: 14px; line-height: 30px;"></span></p>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
