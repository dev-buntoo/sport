<div class="row mt-3">
    <div class="col-md-12">
        <div class="table-responsive">

            <table class="table table-striped custom-table mb-0 datatable">
                <thead>
                    <tr>
                        <th>Payrun Date</th>
                        <th>Member Name</th>
                        <th>Payroll Type</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payrolls as $pay)
                     <tr>
                        <td>
                            {{ $pay->startDate }}
                        </td>
                        <td>{{ $pay->member->fname.' '.$pay->member->lname }}</td>
                        <td>Fortnightly</td>
                        <td>{{ $pay->gross_amount+$pay->deduction }}</td>
                        <td>
                            <a href="{{ route('generate.slip',$pay->id) }}" target="_blank" data-toggle="tooltip"
                                data-placement="top" title="View Member"
                                class="bell-icon mr-2">
                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                     </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
</div>
