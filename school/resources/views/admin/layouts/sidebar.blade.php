@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Deashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img class="profile-user-img img-fluid img-circle" src="{{!empty(Auth::user()->image)?url('/school/public/upload/user_image/'.Auth::user()->image):url('/upload/no_image.jpg/')}}" alt="User profile picture">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (Auth::user()->role=='Admin')
            <li class="nav-item has-treeview  {{$prefix=='/users'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage User
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('users.view')}}" class="nav-link {{$route=='users.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View User</p>
                    </a>
                  </li>
                </ul>
            </li>
            @endif
            <li class="nav-item has-treeview {{$prefix=='/profiles'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link {{$route=='profiles.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Profile</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link {{$route=='profiles.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Change Password</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/logos'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Logo
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('logos.view')}}" class="nav-link {{$route=='logos.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Logo</p>
                    </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/setups'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Setup
                    <i class="fas fa-angle-left right"></i>
                    {{-- <span class="badge badge-info right">6</span> --}}
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('setups.student.class.view')}}" class="nav-link {{$route=='setups.student.class.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Class</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.student.year.view')}}" class="nav-link {{$route=='setups.student.year.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Year</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.student.group.view')}}" class="nav-link {{$route=='setups.student.group.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Group</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.student.shift.view')}}" class="nav-link {{$route=='setups.student.shift.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Shift</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.fee.category.view')}}" class="nav-link {{$route=='setups.fee.category.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fee Category</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.fee.amount.view')}}" class="nav-link {{$route=='setups.fee.amount.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fee Category Amount</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.exam.type.view')}}" class="nav-link {{$route=='setups.exam.type.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Exam Type</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.subject.view')}}" class="nav-link {{$route=='setups.subject.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>View Subject</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.assign.subject.view')}}" class="nav-link {{$route=='setups.assign.subject.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Assign Subject</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('setups.designation.view')}}" class="nav-link {{$route=='setups.designation.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Designation</p>
                    </a>
                  </li>

                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/students'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Students
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('students.registration.view')}}" class="nav-link {{$route=='students.registration.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Student Registration</p>
                    </a>
                  </li>



                  <li class="nav-item">
                    <a href="{{route('students.roll.view')}}" class="nav-link {{$route=='students.roll.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Roll Generate</p>
                    </a>
                  </li>



                    <li class="nav-item">
                      <a href="{{route('students.reg.fee.view')}}" class="nav-link {{$route=='students.reg.fee.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Registration Fee</p>
                      </a>
                    </li>



                    <li class="nav-item">
                      <a href="{{route('students.monthly.fee.view')}}" class="nav-link {{$route=='students.monthly.fee.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly Fee</p>
                      </a>
                    </li>



                    <li class="nav-item">
                      <a href="{{route('students.exam.fee.view')}}" class="nav-link {{$route=='students.exam.fee.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Exam Fee</p>
                      </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/employees'?'menu-open':''}}">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Manage Employees
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>

                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('employees.registration.view')}}" class="nav-link {{$route=='employees.registration.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Employee Registration</p>
                    </a>
                  </li>



                    <li class="nav-item">
                      <a href="{{route('employees.salary.view')}}" class="nav-link {{$route=='employees.salary.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Salary</p>
                      </a>
                    </li>



                    <li class="nav-item">
                      <a href="{{route('employees.leave.view')}}" class="nav-link {{$route=='employees.leave.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Leave</p>
                      </a>
                    </li>



                    <li class="nav-item">
                      <a href="{{route('employees.attendence.view')}}" class="nav-link {{$route=='employees.attendence.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Employee Attendence</p>
                      </a>
                    </li>



                    <li class="nav-item">
                      <a href="{{route('employees.monthly.salary.view')}}" class="nav-link {{$route=='employees.monthly.salary.view'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Monthly Salary</p>
                      </a>
                    </li>
                  </ul>
            </li>

            <li class="nav-item has-treeview {{$prefix=='/marks'?'menu-open':''}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                      Manage Marks
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>

                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{route('marks.create')}}" class="nav-link {{$route=='marks.create'?'active':''}}">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Marks Entry</p>
                      </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('marks.edit')}}" class="nav-link {{$route=='marks.edit'?'active':''}}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Marks Edit</p>
                        </a>
                      </li>
                    </ul>
                </li>
        </ul>
    </nav>
</aside>
