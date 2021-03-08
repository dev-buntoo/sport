@extends('root')
@section('content')
        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">System Admins</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Role</li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /Page Header -->

                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('role.update') }}">
                            @csrf
                            <input type="hidden" value="{{ $role->id }}" name="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Name</label>
                                        <input class="form-control" name="name" value="{{ $role->name }}" type="text">
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive m-t-15">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th>Module Permission</th>
                                            <th class="text-center">Read</th>
                                            <th class="text-center">Create</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Member</td>
                                            <td class="text-center">
                                                <input  name="view_member" type="checkbox" @if($role->view_member) checked="" @endif value="1">
                                            </td>
                                            <td class="text-center">
                                                <input  name="create_member" type="checkbox" @if($role->create_member) checked="" @endif value="1">
                                            </td>
                                            <td class="text-center">
                                                <input  name="edit_member" type="checkbox" @if($role->edit_member) checked="" @endif value="1">
                                            </td>
                                            <td class="text-center">
                                                <input  name="delete_member" type="checkbox" @if($role->delete_member) checked="" @endif value="1">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Pay Roll</td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->view_payroll) checked="" @endif name="view_payroll" value="1">
                                            </td>
                                            <td class="text-center">
                                                {{--  <input type="checkbox" @if($role->) checked="" @endif name="" value="1">  --}}
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->edit_payroll) checked="" @endif name="edit_payroll" value="1">
                                            </td>
                                            <td class="text-center">
                                                {{--  <input type="checkbox" @if($role->) checked="" @endif name="" value="1">  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Appointment</td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->view_appointments) checked="" @endif name="view_appointments" value="1">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->manage_documents) checked="" @endif name="manage_documents" value="1">
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->edit_appointments) checked="" @endif name="edit_appointments" value="1">
                                            </td>
                                            <td class="text-center">
                                                {{--  <input type="checkbox" @if($role->) checked="" @endif name="" value="1">  --}}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->view_roles) checked="" @endif name="view_roles" value="1">
                                            </td>
                                            <td class="text-center">
                                                {{--  <input type="checkbox" @if($role->) checked="" @endif name="" value="1">  --}}
                                            </td>
                                            <td class="text-center">
                                                <input type="checkbox" @if($role->edit_roles) checked="" @endif name="edit_roles" value="1">
                                            </td>
                                            <td class="text-center">
                                                {{--  <input type="checkbox" @if($role->) checked="" @endif name="" value="1">  --}}
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->


        </div>
        <!-- /Page Wrapper -->

@endsection
@push('script')
<script>
// $('input').click(function(){
//     if($(this).val() == "1"){
//         $(this).val('0');

//     }
//     else{
//         $(this).val('1');
//     }
// });
</script>
@endpush
