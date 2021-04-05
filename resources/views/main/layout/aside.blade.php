<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="/" class="logo d-flex justify-content-center">
                        <img src="{{asset('main')}}/img/logo.png" width="100" height="auto" alt="PDRLRA SYSTEM">
                    </a>
                </li>
                <li>
                    <a href="{{ route('dashboard.show') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('member.show') }}"><i class="la la-users"></i> <span>Members</span></a>
                </li>
                <li class="submenu">
                    <a href="{{ route('payroll.show') }}"><i class="la la-money"></i> <span> Payroll </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('payroll.show') }}"> Payroll </a></li>
                        <!-- <li><a href="salary-view.html"> Payslip </a></li> -->
                        {{--                            <li><a href="{{ route('payrun.show') }}"> Pay Run </a>
                </li>--}}
            </ul>
            </li>

            <li class="submenu">
                <a href="#"><i class="la la-columns"></i> <span> Appointments </span> <span
                        class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{ route('appointment.show') }}"> Appointment List </a></li>
                    <li><a href="{{ route('appointment.game') }}"> Appointment Game </a></li>
                    <li><a href="{{ route('appointment.update-rate') }}"> Update Rates </a></li>
                </ul>
            </li>

            <li class="submenu">
                <a href="#" class=""><i class="la la-user"></i> <span> System Admins</span> <span
                        class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li><a href="{{ route('system.admin') }}">System Users</a></li>
                    <li><a href="{{ route('system.role') }}">Roles</a></li>
                    <li><a href="{{ route('system.auditlog') }}">Audit Logs</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#" class=""><i class="la la-pie-chart"></i> <span> Reports</span> <span
                        class="menu-arrow"></span></a>
                <ul style="display: none;">
                    <li>
                        <a href="{{ route('reports.show') }}">Match Reports</a>
                    </li>
                    <li>
                        <a href="{{ route('teams.show') }}">Teams</a>
                    </li>
                </ul>
            </li>

            <li>
            </li>

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
