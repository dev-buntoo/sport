<div class="row">
    <div class="col-6">
        <h3>Match Reports</h3>
    </div>
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
