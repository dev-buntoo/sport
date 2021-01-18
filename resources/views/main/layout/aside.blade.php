    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li >
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
                            <li><a href="{{ route('payrun.show') }}"> Pay Run </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('appointment.show') }}"><i class="la la-user-secret"></i> <span>Appointments</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#"><i class="la la-columns"></i> <span> Pages </span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="search.html"> Search </a></li>
                            <li><a href="faq.html"> FAQ </a></li>
                            <li><a href="terms.html"> Terms </a></li>
                            <li><a href="privacy-policy.html"> Privacy Policy </a></li>
                            <li><a href="blank-page.html"> Blank Page </a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="settings.html"><i class="la la-cog"></i> <span>System Settings</span></a>
                    </li>
                    <li class="submenu">
                        <a href="#" class=""><i class="la la-user"></i> <span> System Admins</span> <span
                                class="menu-arrow"></span></a>
                        <ul style="display: none;">
                            <li><a href="employees.html">All Employees</a></li>
                            <li><a href="holidays.html">Holidays</a></li>
                            <li><a href="leaves.html">Leaves (Admin) <span
                                        class="badge badge-pill bg-primary float-right">1</span></a></li>
                            <li><a href="leaves-employee.html">Leaves (Employee)</a></li>
                            <li><a href="leave-settings.html">Leave Settings</a></li>
                            <li><a href="attendance.html">Attendance (Admin)</a></li>
                            <li><a href="attendance-employee.html">Attendance (Employee)</a></li>
                            <li><a href="departments.html">Departments</a></li>
                            <li><a href="designations.html">Designations</a></li>
                            <li><a href="timesheet.html">Timesheet</a></li>
                            <li><a href="overtime.html">Overtime</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
