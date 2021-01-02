@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
{{-- @dd($prefix) --}}
{{-- @dd($prefix) --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="https://www.flaticon.com/svg/static/icons/svg/1142/1142886.svg" alt="User Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SMS | Dashboard</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img style="height: 40px; width:40px " src="@if(empty(Auth::guard('admin')->user()->image)) https://www.thermaxglobal.com/wp-content/uploads/2020/05/image-not-found.jpg @else {{url(Auth::guard('admin')->user()->image)}} @endif" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{ route('profile.view') }}" class="d-block">{{Auth::guard('admin')->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{($route == 'admin.dashboard')?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">User Management</li>
          @if(Auth::guard('admin')->user()->user_type == "Admin")
          <li class="nav-item {{($prefix == 'admin/users')?'menu-open':''}}">
            <a href="#" class="nav-link">
              <i class="fas fa-users-cog nav-icon"></i>
              <p> 
                Manage User
                <i class="fas fa-angle-left right "></i>
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{ route('users.view') }}" class="nav-link {{($route == 'users.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View User</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item {{($prefix == 'admin/profile')?'menu-open':''}} ">
            <a href="#" class="nav-link ">
              <i class="fas fa-user-secret nav-icon"></i>
              <p>
                Manage Profile
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('profile.view') }}" class="nav-link {{($route == 'profile.view')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Profile</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>