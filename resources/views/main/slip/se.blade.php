<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Writing Form Document</title>
</head>
<body>
		<table width="100%" style="border-collapse: collapse; min-width: auto; max-width: 600px; margin: 0 auto; font-family: Roboto,Arial,Helvetica,sans-serif">
		<tr>
			<td width="100%" colspan="12" style="max-width: 600px;">
				<table width="100%">
					<tr>
						<td style="max-width: 600px;">
					<table width="100%" style="margin-bottom: 0;">
						<tr>
							<td  width="10%" align="left">
								<img src="https://admin.parramattarefs.com.au/main/img/logo.png" style="height: 4pc;" alt="logo">
							</td>
							<td width="80%" align="center" style="font-size: 16px; line-height: 23px;">
								<h1 style="font-size: 13px; line-height: 16px;">Parramatta District Rugby League Referees Association Match Day Coaching Sheet (Under 15’s A grade)</h1>
							</td>
							<td  width="10%" align="left">
								<img src="https://admin.parramattarefs.com.au/main/img/logo.png" style="height: 4pc;" alt="logo">
							</td>
						</tr>
					</table>

        			<table width="100%">
		          <tr>
		            <td width="70%" valign="top">
		              <table width="100%">
		                <tr>
		              		<td width="50%" style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;padding-top: 20px;">
		              			<table width="100%">
		              				<tr>
		              					<td width="20%">
		              						<label>Referee:</label>
		              					</td>
		              					<td width="80%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ $report->member->fname.' '.$report->member->lname}}</span>
		              					</td>
		              				</tr>
		              			</table>
								</td>
								<td width="50%" style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;padding-top: 20px;">
									<table width="100%">
		              				<tr>
		              					<td width="20%">
		              						<label>Grade:</label>
		              					</td>
		              					<td width="80%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ $report->grade_division }}</span>
		              					</td>
		              				</tr>
		              			</table>
								</td>
		                  </tr>
		              </table>
						<table width="100%">
							<tr>
								<td width="50%" style="font-weight: 400; padding-right: 0; font-size: 12px; line-height: 16px;">
									<table width="100%">
		              				<tr>
		              					<td width="20%">
		              						<label>Teams:</label>
		              					</td>
		              					<td width="80%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ $report->home_team }}</span>
		              					</td>
		              				</tr>
		              			</table>
								</td>
								<td width="50%" style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;">
									<table width="100%">
		              				<tr>
		              					<td width="8%">
		              						<label>V</label>
		              					</td>
		              					<td width="90%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ $report->away_team }}</span>
		              					</td>
		              				</tr>
		              			</table>
								</td>
							</tr>
						</table>
						<table width="100%">
							<tr>
								<td style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;">
									<table width="100%">
							<tr>
		              		<td width="50%" style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;">
		              			<table width="100%">
		              				<tr>
		              					<td width="20%">
		              						<label>Date:</label>
		              					</td>
		              					<td width="80%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ date("d-m-Y", strtotime($report->date)) }}</span>
		              					</td>
		              				</tr>
		              			</table>
								</td>
								<td width="50%" style="font-weight: 400; padding-right: 10px; font-size: 12px; line-height: 16px;padding-top: 20px;">
									<table width="100%">
		              				<tbody><tr>
		              					<td width="20%">
		              						<label></label>
		              					</td>
		              					<td width="80%">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;"></span>
		              					</td>
		              				</tr>
		              			</tbody></table>
								</td>
		                  </tr>
		              	</table>
								</td>
							</tr>
		         </table>
		            </td>

		        <td width="30%">
		          <table width="100%">
						<tbody  align="center">
							<tr>
								<td style="vertical-align: top;">
									<table width="200px" style="border-collapse: collapse; margin-top: 20px;">
										<tbody align="center">
											<tr>
												<th style="width: 50%; border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Home</th>
												<th style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Away</th>
											</tr>
											<tr>
												<th colspan="2" style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Penalties</th>
											</tr>
											<tr>
												<td style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px; height: 14px;"><span>{{ $report->home_penalties }}</span></td>
												<td style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px; height: 14px;"><span>{{ $report->away_penalties }}</span></td>
											</tr>
											<tr>
												<th colspan="2" cellspacing="0" style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Score</th>

											</tr>
											<tr>
												<td style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px; height: 14px;"><span>{{ $report->home_score }}</span></td>
												<td style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px; height: 14px;"><span>{{ $report->away_score }}</span></td>
											</tr>
											<tr>
												<th style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Overall Grading</th>
												<td style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;"><span>{{ $report->overall_grade }}</span></td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
		        </td>
		    </tr>
		</table>
		            <table style="border-collapse: collapse; margin-top: 0; max-width: 515px;">
							<tr>
								<th colspan="1" valign="top" align="left" width="115" style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px; height: 24px;">Key</th>
								<th colspan="7" style="border: none;"></th>
							</tr>
							<tr>
								<th valign="top" width="115" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px;line-height: 14px;">Needing Improvement</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">(N)</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">Standard</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">(S)</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">Above Standard</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">(A)</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">Excellent</th>
								<th valign="top" align="left" style="border:2px solid #000; padding: 3px 10px; font-size: 10px; line-height: 14px;">(E)</th>
							</tr>
						</table>

				<table class="table-form" style="margin-top: 10px; border-collapse: collapse; max-width: 600px;">
					<tbody align="left" valign="top" style="font-size: 10px;line-height: 13px;">
				<tr class="table-head">
					<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
		            <table width="100%">
		              <tr>
		                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">Signals / Presentation</th>
		              </tr>
		            </table>
		          </td>
		          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
		            <table width="100%">
		              <tr>
		                <td style="padding: 0; border-bottom: 2px solid #000;">
		                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->signals_note }}</span>
		                </td>
		              </tr>
		            </table>
		          </td>
				</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Whistle Tone</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->wistla_tone_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Clear & Concise Signals</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->c_c_signal_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Presentation</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->presentation_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Pre-Match Duties</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->pre_match_duties_grade }}</span></td>
					</tr>
					<tr class="table-head">
						<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
			            <table width="100%">
			              <tr>
			                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">laws of the Game</th>
			              </tr>
			            </table>
			          </td>
			          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
			            <table width="100%">
			              <tr>
			                <td style="padding: 0; border-bottom: 2px solid #000;">
			                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->game_law_note }}</span>
			                </td>
			              </tr>
			            </table>
			          </td>
					</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Identification of Laws</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->application_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Application of Laws</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->scrum_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Processess</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->process_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Advantage</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->advantage_grade }}</span></td>
					</tr>
					<tr class="table-head">
						<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
			            <table width="100%">
			              <tr>
			                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">Game Understanding / Awareness</th>
			              </tr>
			            </table>
			          </td>
			          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
			            <table width="100%">
			              <tr>
			                <td style="padding: 0; border-bottom: 2px solid #000;">
			                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->understandig_note }}</span>
			                </td>
			              </tr>
			            </table>
			          </td>
					</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Penalty Selection</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->penalty_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Effective Ruck Communication</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ruck_communication_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Effective Cautions</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->effective_caution_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Player Rapport </td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->movement_patterns_grade }}</span></td>
					</tr>
					<tr class="table-head">
						<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
			            <table width="100%">
			              <tr>
			                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">10m, Markers & Ruck</th>
			              </tr>
			            </table>
			          </td>
			          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
			            <table width="100%">
			              <tr>
			                <td style="padding: 0; border-bottom: 2px solid #000;">
			                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->marker_ruck_note }}</span>
			                </td>
			              </tr>
			            </table>
			          </td>
					</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">5m Distance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ten_m_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">5m Compliance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ten_m_complaince_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Marker Compliance</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->marker_complaince_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Tackle ID</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ruck_speed_grade }}</span></td>
					</tr>
					<tr class="table-head">
						<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
			            <table width="100%">
			              <tr>
			                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">Communication & Tackle ID</th>
			              </tr>
			            </table>
			          </td>
			          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
			            <table width="100%">
			              <tr>
			                <td style="padding: 0; border-bottom: 2px solid #000;">
			                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->communication_note }}</span>
			                </td>
			              </tr>
			            </table>
			          </td>
					</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Application</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ruck_vocab_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Identification</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->tackle_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Advantage</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->player_rapport_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Scrums</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->communication_timming_grade }}</span></td>
					</tr>
					<tr class="table-head">
						<td width="25%" style="border:2px solid #000; vertical-align: top !important;">
			            <table width="100%">
			              <tr>
			                <th style="padding: 1px 5px; text-align: left; height: 30px; vertical-align: top;">Positioning</th>
			              </tr>
			            </table>
			          </td>
			          <td colspan="7" width="75%" valign="middle" style="vertical-align: middle !important; padding: 0;">
			            <table width="100%">
			              <tr>
			                <td style="padding: 0; border-bottom: 2px solid #000;">
			                  <span style=" padding: 0 10px; font-weight: normal; font-size: 10px; line-height: 14px;">{{ $report->positioning_note }}</span>
			                </td>
			              </tr>
			            </table>
			          </td>
					</tr>
					<tr>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">On the 5m</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->ten_m_position_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">In-Goal</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->in_goal_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Start & Restarts</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->start_restart_grade }}</span></td>
						<td style="border:2px solid #000; padding: 3px 10px; font-weight: 400;">Kicks, Breaks in Play & Attacting Situations</td>
						<td width="30" style="border:2px solid #000; padding: 3px 10px; font-weight: 400;"><span class="no-line">{{ $report->kicks_breaks_grade }}</span></td>
					</tr>
					</tbody>
				</table>

				<table width="100%">
					<tr>
						<td width="100%" style="border-bottom: 2px solid #000; height: 20px;">
							<label style="font-size: 12px; line-height: 14px; padding: 4px 0; font-weight: 600;">Coaching Comments/Summary:</label><span style="font-size: 10px; line-height: 20px; height: 20px; padding: 5px 10px;">{{ $report->coach_comments }}</span>
						</td>
					</tr>
					<tr>
						<td width="100%" style="border-bottom: 2px solid #000; height: 20px;">
							<span style="font-size: 10px; line-height: 20px; padding: 5px 10px; height: 20px;"></span>
						</td>
					</tr>
					<tr>
						<td width="100%" style="border-bottom: 2px solid #000; height: 20px;">
							<span style="font-size: 10px; line-height: 20px; padding: 5px 10px; height: 20px;"></span>
						</td>
					</tr>
				</table>

				<table width="100%" style="border-collapse: collapse; max-width: 600px;">
					<tr>
						<td align="center" style="font-size: 14px; line-height: 18px;">
							<h2 style="margin-bottom: 0; font-size: 14px; line-height: 18px; margin-top: 10px;">Overall Assessment</h2>
						</td>
					</tr>
				</table>
				<table width="100%" class="table-form" style="border-collapse: collapse;">
					<tr>
						<td>
							<table width="100%" style="border-collapse: collapse; vertical-align: middle;">
							<tr>
								<th width="182px" align="left" style="border:2px solid #000; padding: 5px 10px; font-size: 10px; line-height: 14px; height: 14px;">Needing Improvement <input name="name" type="checkbox" @if($report-overall_assesment == "Needing Improvement") checked @endif style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: text-top;"></th>
								<th width="182px" align="left" style="border:2px solid #000; padding: 5px 10px; font-size: 10px; line-height: 14px; height: 14px;">Meeting Expectations <input name="name1" type="checkbox" @if($report-overall_assesment == "Meeting Expectations") checked @endif style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: text-top;"></th>
								<th width="188px" align="left" style="border:2px solid #000; padding: 5px 10px; font-size: 10px; line-height: 14px;  height: 14px;">Exceeding Expectations <input name="name2" type="checkbox" @if($report-overall_assesment == "Exceeding Expectations") checked @endif style="width: 10px; height: 10px; margin: 0 0 0 3px; vertical-align: text-top;"></th>
							</tr>
						</table>
						</td>
					</tr>
				</table>

				<table width="100%">
					<tr>
						<td width="100%">
							<p style="margin-bottom: 0; margin-top: 0;"><label style="border-bottom: none; font-weight: 600; font-size: 12px; line-height: 16px;">Comment:</label></p>
						</td>
					</tr>
					<tr>
						<td width="100%" style="border-bottom: 2px solid #000; height: 20px;">
							<span style="font-size: 10px; line-height: 20px; padding: 0px 10px;">{{ $report->final_comments }}</span>
						</td>
					</tr>
					<tr>
						<td width="100%" style="border-bottom: 2px solid #000; height: 20px;">
							<span style="font-size: 10px; line-height: 20px; padding: 0px 10px;"></span>
						</td>
					</tr>

				</table>

				<table width="100%" style="margin-top: 10px;">
					<tr>
						<td width="50%">
							<table width="100%">
		              				<tr>
		              					<td width="30%" style="font-size: 14px; line-height: 16px;">
		              						<label>Coach Name:</label>
		              					</td>
		              					<td width="65%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;">{{ $report->cocah }}</span>
		              					</td>
		              				</tr>
		              			</table>
						</td>
						<td width="50%">
								<table width="100%">
		              				<tr>
		              					<td width="40%" style="font-size: 14px; line-height: 16px;">
		              						<!-- <label>Coach Signature:</label> -->
		              					</td>
		              					<!-- <td width="60%" style="border-bottom: 1px solid #000;">
		              						<span style="padding: 0 5px; font-size: 10px; line-height: 14px;"></span>
		              					</td> -->
		              				</tr>
		              			</table>

						</td>
					</tr>
				</table>
				</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
