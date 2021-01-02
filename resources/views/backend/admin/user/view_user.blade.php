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
              <li class="breadcrumb-item active">View User</li>
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
                <h3> <i class="fas fa-users mr-1"></i> User List
                    <a href="{{ route('users.add') }}">
                    <button type="button" class="btn btn-info float-right btn-sm"> <i class="fas fa-user-plus mr-1"></i> Add User</button></a>
                </h3>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>SL.</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                    @foreach($users as $key => $user)
                      <tr class="{{ $user['id']}} ">
                        <td>{{$key+1}}</td>
                        <td>{{$user['user_type']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>
                            <a title="Edit" class=" btn btn-success mr-1"
                            href="{{ route('users.edit',$user['id']) }}"> <i class="fas fa-pencil-alt"></i></a>
                            <a title="Delete" id="delete" class="confirmDelete  btn btn-danger"
                            href="{{ route('users.delete') }}" data-token="{{ csrf_token() }}" data-id="{{ $user['id'] }}"><i class="fas fa-trash"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      <tfoot>
                      <tr>
                        <th>SL.</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
            </div>
          </section>
        </div>
      </div>
    </section>
  </div>
@endsection
