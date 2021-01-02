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
              <li class="breadcrumb-item active">Edit User</li>
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
                    <h3> <i class="fas fa-user-plus mr-1"></i>Edit User
                        <a href="{{ route('users.view') }}">
                        <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-users mr-1"></i> User List</button></a>
                    </h3>
                </div>
                <form action="{{route('users.update',$editData['id'])}}" method="POST" id="userUpdateForm" name="userUpdateForm" >@csrf
                <div class="card-body">
                        {{-- ROW 1 --}}
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputName"> Name</label>
                                    <input id="name" name="name" type="text" class="form-control " placeholder="Enter Name" 
                                    value="{{ $editData['name'] }}" >
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="inputEmail"> Email</label>
                                    <input id="email" name="email" type="email" class="form-control " placeholder="Enter Email" 
                                    value="{{ $editData['email'] }} " >
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
                                    <option value="Admin" {{($editData['user_type'] == 'Admin')? "selected" : "" }}>Admin</option>
                                    <option value="User" {{($editData['user_type'] == 'User')? "selected" : "" }}>User</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
            </section>
        </div>
      </div>
    </section>
  </div>
@endsection
