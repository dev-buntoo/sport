<div class="row">
    <div class="col-6">
        <h3>Match Reports</h3>
    </div>
  {{--  <div class="col-6">
        <div class="col-6 float-right ml-auto mb-3">
            <a href="#" class="btn add-btn" data-toggle="modal"
                data-target="#add_addition"><i class="fa fa-plus"></i>
                Create</a>
        </div>
    </div>
    --}}
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
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('model')

<!-- Add Addition Modal -->
<div id="add_addition" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New pay run</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <label>Match Report Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text">
                            </div>
                        </div>
                            <div class="form-group">
                                <label>Member Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Home Team</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Away Team</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Grade</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Overall Grade</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <label>Viewed</label>
                                <input class="form-control" type="text">
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
<!-- /Add Addition Modal -->
@endpush
