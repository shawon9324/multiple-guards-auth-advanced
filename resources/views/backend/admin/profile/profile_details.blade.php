          <div class=" card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class=" img-fluid "
                    @if(empty($user['image'])) src="{{asset('upload/not_found.png')}}" @else src="{{ url($user['image']) }}" @endif
                     alt="User profile picture" style="height: 300px; width:350px">
              </div>
              <h3 class="profile-username text-center">{{$user['name']}}</h3>
              <p class="text-muted text-center">{{$user['user_type']}}</p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right">{{$user['email']}}</a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="float-right">{{$user['mobile']}}</a>
                </li>
                <li class="list-group-item">
                  <b>Gender</b> <a class="float-right">{{$user['gender']}}</a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="float-right">{{$user['address']}}</a>
                </li>
              </ul>
            </div>
          
          </div>

          
