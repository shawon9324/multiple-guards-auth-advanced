@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <section class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-user-plus mr-1"></i>Add User
                        <a href="{{ route('users.view') }}">
                        <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-users mr-1"></i> User List</button></a>
                    </h3>
                </div>
                <form action="{{route('users.store')}}" method="POST" id="userRegistrationForm" name="userRegistrationForm" novalidate="novalidate">@csrf
                <div class="card-body">
                        {{-- ROW 1 --}}
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputName"> Name</label>
                                    <input id="name" name="name" type="text" class="form-control " placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputEmail"> Email</label>
                                    <input id="email" name="email" type="email" class="form-control " placeholder="Enter Email" >
                                </div>
                            </div>
                        </div>
                        {{-- ROW 2 --}}
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputPassword"> Password</label>
                                    <input id="password" name="password" type="password" class="form-control " placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputConfirmPassword">Confirm Password</label>
                                    <input id="confirm_password" name="confirm_password" type="password" class="form-control " placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>
                        {{-- ROW 3 --}}
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="user_type">User Role</label>
                                    <select class="form-control" id="user_type" name="user_type">
                                    <option disabled selected>Select User Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
            </section>
        </div>
      </div>
    </section>
  </div>
@endsection
