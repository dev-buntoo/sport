<form class="needs-validation" action="{{ route('member.update') }}" method="POST" enctype="multipart/form-data" name="myform">
  @csrf
  <input type="hidden" name="length" value="10">
  <input type="hidden" value="{{ $member->id }}" name="id">
    <div class="row">

        <div class="col-sm-6 mb-3">

            <div class="card mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Personal Detail</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="fname">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="fname" name="fname" value="{{ $member->fname }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mname">Middle Name</label>
                                        <input type="text" class="form-control"
                                            id="mname" name="mname" value="{{ $member->mname }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lname">Last Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="lname" name="lname" value="{{ $member->lname }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dob">DOB (DD-MM-YYYY) <span
                                                class="text-danger">*</span></label>
                                        <input type="text"
                                            class="form-control datetimepicker"
                                            id="dob" name="date_of_birth" value="{{ $member->date_of_birth }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_one">Phone #1 <span
                                                class="text-danger">*</span></label>
                                        <input type="number"
                                            
                                            class="form-control" id="phone_one"
                                            name="phone_1" value="{{ $member->phone_1 }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_two">Phone #2</label>
                                        <input type="number"
                                            
                                            class="form-control" id="phone_two"
                                            name="phone_2" value="{{ $member->phone_2 }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email_one">Email #1 <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control"
                                            id="email_one" name="email"
                                            value="{{ $member->email }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email_two">Email #2</label>
                                        <input type="email" class="form-control"
                                            id="email_two" name="email_2" value="{{ $member->email_2 }}">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Gender
                                            <span
                                                class="text-danger">*</span></label>
                                        <select name="gender" class="select">
                                            <option @if($member->gender == "Male") selected @endif value="Male">Male</option>
                                            <option @if($member->gender == "Female") selected @endif value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="password"
                                            class="col-form-label">Password
                                            <span
                                                class="text-danger">*</span></label>
                                                
                                                <div class="input-group">
													
													<input type="text" class="form-control" id="password" name="password"  required>
													<div class="input-group-prepend">
														<button type="button" data-toggle="tooltip" data-placement="top" data-original-title="Generate Password" class="input-group-text" onClick="generate()" tabindex="2" value=""><i class="fa fa-refresh"></i> </button>
													</div>
												</div>
                                       
                                    </div>
                                    
                                   <div class="col-md-12 mb-3" id="mapDetails">
                                      <label for="address">Address <span
                                              class="text-danger">*</span></label>
                                      <div class="input-group">
                                          <input type="text" class="form-control"
                                          id="fulladdressText" name="address" value="{{ $member->address }}"
                                          required>
                                          <div class="input-group-prepend">
												<button id="geolocateButton" type="button" data-toggle="tooltip" data-placement="top" title="Use your current location" data-title-clear="Clear address field" data-title-geolocate="Use your current location" data-title-loading="Please wait, finding your loaction..." class="input-group-text"><i class="fa fa-location-arrow" aria-hidden="true"></i> </button>
											</div>
                                      </div>
                                  </div>
                                  <div class="col-md-12 mb-3">
                                       <div id="map-container">
                                          <div id="map-container-inner">
                                            <div id="map"></div>
                                          </div>
                                        </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mb-3">

            <div class="card mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Association Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="member_number">Member Number
                                            <span
                                                class="text-danger">*</span></label>
                                        <input type="number" 
                                            
                                            class="form-control"
                                            id="member_number"
                                            name="member_number" value="{{ $member->member_number }}"
                                            required>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Status
                                            <span
                                                class="text-danger">*</span></label>
                                        <select name="status" class="select" required>
                                            <option @if($member->status == "Active") selected @endif value="Active">Active
                                            </option>
                                            <option @if($member->status == "Non-Active") selected @endif value="Non-Active">
                                                Non-Active</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Role <span
                                                class="text-danger">*</span></label>
                                        <select name="role" class="select" required>
                                            <option  @if($member->role == "Referee & Coach") selected @endif value="Referee & Coach">
                                                Referee & Coach</option>
                                                <option  @if($member->role == "Coach") selected @endif value="Coach">
                                                Coach</option>
                                            <option  @if($member->role == "Referee") selected @endif value="Referee">Referee
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Life
                                            Member <span
                                                class="text-danger">*</span></label>
                                        <select name="life_member" class="select" required>
                                            <option  @if($member->life_member == "Yes") selected @endif value="Yes">Yes</option>
                                            <option @if($member->life_member == "No") selected @endif value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="date_joining"
                                                class="col-form-label">Date of
                                                joining</label>
                                            <input type="text"
                                                class="form-control datetimepicker"
                                                id="date_joining"
                                                name="date_of_joining" value="{{ $member->date_of_joining }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Referee
                                            Level</label>
                                        <select name="referre_level" class="select">
                                            <option  @if($member->referre_level == "F1") selected @endif value="F1">F1</option>
                                            <option  @if($member->referre_level == "F2") selected @endif value="F2">F2</option>
                                            <option  @if($member->referre_level == "T1") selected @endif value="T1">T1</option>
                                            <option  @if($member->referre_level == "T2") selected @endif value="T2">T2</option>
                                            <option  @if($member->referre_level == "Elite & Mastery") selected @endif value="Elite & Mastery">
                                                Elite & Mastery</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="col-form-label">Coach
                                            Level</label>
                                        <select name="coach_level" class="select">
                                            <option @if($member->coach_level == "F1") selected @endif value="F1">F1</option>
                                            <option @if($member->coach_level == "F2") selected @endif value="F2">F2</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="WWCC_number">WWCC Number
                                        </label>
                                        <input type="text"
                                            class="form-control"
                                            id="WWCC_number" value="{{ $member->wwcc_number }}" name="wwcc_number">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="WWCC_expiry">WWCC
                                                Expiry</label>
                                            <input type="text"
                                                class="form-control datetimepicker"
                                                id="WWCC_expiry"
                                                value="{{ $member->wwcc_expiry }}"
                                                name="wwcc_expiry">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3">

            <div class="card mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Banking Details</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="account_holder_name">Account
                                            Holder Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="account_holder_name"
                                            name="acc_name" value="{{ $member->acc_name }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="account_number">Account
                                            Number <span
                                                class="text-danger">*</span></label>
                                        <input type="number"
                                            class="form-control"
                                            id="account_number"
                                            name="acc_number" value="{{ $member->acc_number }}"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_name">Bank Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control"
                                            id="bank_name" name="bank_name"
                                            value="{{ $member->bank_name }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bsb_number">BSB Number <span
                                                                      class="text-danger">*</span>
                                        </label>
                                        <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            class="form-control bsb_number" maxlength="6" id="bsb_number"
                                            name="bsb_number" value="{{ $member->bsb_number }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tfn_number">TFN Number
                                        </label>
                                        <input type="number"
                                            class="form-control" id="tfn_number"
                                            name="tfn_number" value="{{ $member->tfn_number }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="payment_frequency">Payment
                                                Frequency <span class="text-danger">*</span></label>
                                            <select name="payment_frequency" class="select" required>
                                              <option @if($member->payment_frequency == "Fortnightly") selected @endif value="Fortnightly">Fortnightly</option>
                                              <option @if($member->payment_frequency == "Monthly") selected @endif value="Monthly">Monthly</option>
                                            <option @if($member->payment_frequency == "End of Season") selected @endif value="End of Season">End of Season</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 mb-3">

            <div class="card mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Documents</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="needs-validation" novalidate>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label
                                            for="account_holder_name">Photo</label>
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input"
                                                accept="image/x-png,image/jpeg"
                                                id="photo" name="photo" >
                                            <label class="custom-file-label"
                                                for="photo">Choose
                                                file...</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Row -->
    <div class="submit-section">
        <button class="btn btn-primary submit-btn" type="submit">Save
            Changes</button>
    </div>
</form>
