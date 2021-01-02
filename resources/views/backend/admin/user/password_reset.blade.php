<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.flaticon.com/svg/static/icons/svg/2231/2231696.svg">
    <title>Reset Password | School Management System</title>
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/css/auth_style.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    {{-- Sweet Alert --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    @toastr_css
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center">
                        <span style="color: lightgray"> <h2> <i class="fas fa-key"></i> Reset Password </h2></span>
                    </div>
                    <!-- Form -->
                    <form id="resetPassword" class="form-horizontal m-t-20" method="POST" action="{{route('admin.account.recover',$email)}}">@csrf
                        <div class="row p-b-30 mb-3">
                            <div class="col-12">
                                <div class="input-group mb-3" >
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"> <i class="fas fa-key"></i> </span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter New Password" aria-label="Enter New Password">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"> <i class="fas fa-key"></i> </span>
                                    </div>
                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Password" >
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12 mt-1">
                                <div class="form-group">
                                    <div class="mt-4">
                                        <button name="submit" class="btn btn-info" type="submit"> <i class="fas fa-unlock mr-2"></i> Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src=" {{ asset('frontend/js/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src=" {{ asset('frontend/js/popper.min.js') }} "></script>
    <script src=" {{ asset('frontend/js/bootstrap.min.js') }} "></script>
    <!-- jquery-validation -->
    <script src="{{ asset('backend/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    {{-- Custom Backend Script --}}
    <script src="{{ asset('backend/js/admin_script.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){
        
        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
    @toastr_js
    @toastr_render
</body>

</html>