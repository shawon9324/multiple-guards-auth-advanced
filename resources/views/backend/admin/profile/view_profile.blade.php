@extends('backend.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class=" row">
          <div class="AppendProfile col-md-4">
            @include('backend.admin.profile.profile_details')
          </div>
            <div class="col-md-8">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change Password</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                    <li class="nav-item"><a class="nav-link" href="#picture" data-toggle="tab">Profile Picture Update</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      <h3 class="text-center" style="color: gray">No activity found</h3>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="password">
                      <form action="javascript:void(0)" class="updatePassword" id="updatePassword" >
                      <div class="form-group row">
                        <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="current_password" name="current_password"  placeholder="Enter Current Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="new_password" name="new_password"  placeholder="Enter New Password">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="confirm_password" name="confirm_password"  placeholder="Confirm Passowrd">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="custom-control custom-switch offset-sm-2">
                          <input type="checkbox" class="custom-control-input" id="togglePassword">
                          <label class="custom-control-label" for="togglePassword">Show/hide password</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button href="javascript:void(0)" id="resetProfilePassword" type="submit" class="btn btn-danger" >Reset</button>
                        </div>
                      </div>
                      </form>
                    </div>
                    
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="settings">
                      <form  class="form-horizontal" id="updateProfileForm" name="updateProfileForm" >
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputName2" class="col-sm-2 col-form-label">Mobile</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $user['mobile'] }}" placeholder="Mobile">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputExperience" class="col-sm-2 col-form-label">Gender</label>
                          <div class="col-sm-10">
                              <select class="form-control" id="gender" name="gender">
                                  
                                  <option value="Male" {{($user['gender'] == 'Male')? "selected" : "" }}>Male</option>
                                  <option value="Female" {{($user['gender'] == 'Female')? "selected" : "" }}>Female</option>
                                  <option value="Other" {{($user['gender'] == 'Other')? "selected" : "" }}>Other</option>
                                  </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Address</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" value="{{ $user['address'] }}" placeholder="Address">
                          </div>
                        </div>
                        
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button  id="updateProfile" type="submit" class="btn btn-danger" >Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="picture">
                      <form method="POST" enctype="multipart/form-data"  class="form-horizontal" id="updateProfilePicture" name="updateProfilePicture" >
                        @csrf
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Choose Image</label>
                          <div class="col-sm-10">
                              <div class=" custom-file">
                                  <input type="file" class="custom-file-input" name="image" id="image"  accept="image/*" required>
                                  <label class="custom-file-label" for="customFile">Choose file</label>
                                  <input type="hidden" id="old_image" name="old_image" value="{{ $user['image'] }}">
                                </div>
                          </div>
                        </div>
                        <div class="form-group row" style="padding-top: 30px">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Preview Image</label>
                          <img class="img-bordered" id="showImage"  @if(empty($user['image'])) src="{{asset('upload/not_found.png')}}" @else src="{{ url($user['image']) }}" @endif
                            width="150px" height="150px" alt="" >
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button  id="updatePicture" type="submit" class="btn btn-danger" >Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
