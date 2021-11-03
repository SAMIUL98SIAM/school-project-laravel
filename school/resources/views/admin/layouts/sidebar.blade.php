@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('/admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
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
                    <a href="{{route('setups.student.category.view')}}" class="nav-link {{$route=='setups.student.category.view'?'active':''}}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Fee Category</p>
                    </a>
                  </li>

                </ul>
            </li>


        </ul>
    </nav>
</aside>