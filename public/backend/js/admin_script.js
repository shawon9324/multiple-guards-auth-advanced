$(document).ready(function() {
/*********************************************************************
* 
* AJAX - CSRF TOEKN PASSING USING META TAG ON HEADER 
* 
*********************************************************************/
// $.ajaxSetup({
//     beforeSend: function(xhr, type) {
//         if (!type.crossDomain) {
//             xhr.setRequestHeader(
//                 "X-CSRF-Token",
//                 $('meta[name="csrf-token"]').attr("content")
//             );
//         }
//     }
// });
/********************************************************************
* 
* SWEET ALERT AJAX DELETE
* 
*********************************************************************/
$(document).on('click','#delete', function(e){
    e.preventDefault()
    var actionTo = $(this).attr('href');
    var token = $(this).attr('data-token');
    var id = $(this).attr('data-id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to recover this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: actionTo,
                type: 'POST',
                data:{id:id, _token:token},
                success: function(data){
                    Swal.fire({
                        title: 'Deleted!',
                        text: "Your Data has been deleted.",
                        icon: 'success'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            $('.'+id).fadeOut();
                        }
                      })
                }
            })
            
        }
      })
})

/********************************************************************
* 
* FORM VALIDATION USING JQUERY
* 
*********************************************************************/
$(function () {
    $('#userRegistrationForm').validate({
      rules: {
        name:{
            required: true
        },
        email:{
            required: true,
            email: true,
            remote:"check-user-email",
        },
        password:{
            required: true,
            minlength: 8,
        },
        confirm_password:{
            required: true,
            equalTo: '#password'
        },
        user_type:{
            required: true
        },
      },
      messages: {
        name:{
            required:'Please enter your name'
        },
        mobile:{
            required:'Please enter your mobile number'
        },
        email:{
            required:'Please enter email address',
            email: "Please enter valid email address!",
            remote:"Account with this email already exists",
        },
        password:{
            required:'Please enter  password',
            minlength: "Your password must be at least 8 characters long",

        },
        confirm_password:{
            required:'Please enter confirm password',
            equalTo:'Passwords do not match'
        },
        user_type:{
            required: 'Please select any user role'
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    $('#userUpdateForm').validate({
      rules: {
        name:{
            required: true
        },
        email:{
            required: true,
            email: true,
        },
        user_type:{
            required: true
        },
      },
      messages: {
        name:{
            required:'Please enter your name'
        },
        email:{
            required:'Please enter email address',
            email: "Please enter valid email address!",
        },
        user_type:{
            required: 'Please select any user role'
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    $('#updateProfileForm').validate({
      rules: {
        name:{
            required: true
        },
        email:{
            required: true,
            email: true,
        },
        mobile:{
            minlength: 11,
        },
        image:{
          accept: "image/*"
        },
      },
      messages: {
        name:{
            required:'Please enter your name'
        },
        email:{
            required:'Please enter email address',
            email: "Please enter valid email address!",
        },
        mobile:{
          minlength: "Please enter valid mobile number",
        },
        image:{
          accept: "Please insert an image file (e.g JPEG/JPG/PNG)"
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    $('#updatePassword').validate({
      rules:{
          current_password:{
              required: true,
              remote:"check-user-password",
          },
          new_password:{
              required: true,
              minlength: 8,
          },
          confirm_password:{
              required: true,
              equalTo: '#new_password'
          },
      },
      messages:{
        current_password:{
            required:'Please enter current password',
            remote:"Please enter correct password",
        },
        password:{
            required:'Please enter new password',
            minlength: "Your password must be at least 8 characters long",
        },
        confirm_password:{
            required:'Please enter confirm password',
            equalTo:'Passwords do not match'
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
    $('#resetPassword').validate({
      rules:{
          password:{
              required: true,
              minlength: 8,
          },
          confirm_password:{
              required: true,
              equalTo: '#password'
          },
      },
      messages:{
        password:{
            required:'Please enter new password',
            minlength: "Your password must be at least 8 characters long",
        },
        confirm_password:{
            required:'Please enter confirm password',
            equalTo:'Passwords do not match'
        },
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });

/********************************************************************
* 
* SWEET ALERT AJAX DELETE
* 
*********************************************************************/
$(document).on('click','#updateProfile', function(e){
  e.preventDefault()
  var name = $("#name").val()
  var email = $("#email").val()
  var mobile = $("#mobile").val()
  var gender = $("#gender").val()
  var address = $("#address").val()

  $.ajax({
    type:'POST',
    url: 'update-user-profile',
    data: {
      name:name,
      email:email,
      mobile:mobile,
      gender:gender,
      address:address,
    },
    success: function(resp){
      $(".AppendProfile").html(resp.view);
      toastr.success('Success','Profile Details Updated Successfully');
    },error: function(){
      console.log("Error");
    }
  })
  
});

$(document).on('submit','#updateProfilePicture', function(e){
  e.preventDefault()
  $.ajax({
    method:'POST',
    url: 'update-user-profile-picture',
    data: new FormData(this),
    dataType: 'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success: function(resp){
      $(".custom-file-label").text('Choose file');
      $(".AppendProfile").html(resp.view);
      toastr.success('Success','Profile Picture Updated Successfully');
    },error: function(){
      console.log("Error");
    }
  })
});

$("#image").change(function(e){
  var reader = new FileReader();
  reader.onload = function(e){
    $("#showImage").attr('src',e.target.result);
  }
  reader.readAsDataURL(e.target.files['0']);
});

$("#current_password").bind('copy paste cut',function(e) {
  e.preventDefault(); 
});
$("#new_password").bind('copy paste cut',function(e) {
  e.preventDefault(); 
});
$("#confirm_password").bind('copy paste cut',function(e) {
  e.preventDefault(); 
});

$(document).on('click','#togglePassword', function(e){
  var current_password = document.getElementById("current_password");
  var new_password = document.getElementById("new_password");
  var confirm_password = document.getElementById("confirm_password");
  if(current_password.type == "password"){
    current_password.type = "text";
    new_password.type = "text";
    confirm_password.type = "text";
  }else{
    current_password.type = "password";
    new_password.type = "password";
    confirm_password.type = "password";
  }
});
$(document).on('click','#resetProfilePassword', function(){
  var new_password = $("#new_password").val();
  $.ajax({
    type: 'POST',
    url:'update-user-password',
    data:{new_password:new_password},
    success: function(resp){
      if(resp['status'] == "true"){
        //SWEET ALERT AUTO CLOSE
        let timerInterval
        Swal.fire({
          icon: 'success',
          title: 'Password Reset Successfully!',
          html: 'You will log-out in <b></b> milliseconds.',
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            timerInterval = setInterval(() => {
              const content = Swal.getContent()
              if (content) {
                const b = content.querySelector('b')
                if (b) {
                  b.textContent = Swal.getTimerLeft()
                }
              }
            }, 100)
          },
          willClose: () => {
            window.location.href="/admin/logout";
          }
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href="/admin/logout";
          }
        })
        //SWEET ALERT AUTO CLOSE
      } 
    },error: function(){
      console.log("ERROR")
    }
  })
});



$(document).on('click','#recover', function(){
 var email = $("#recover_email").val()
  $.ajax({
    type: 'POST',
    url:'admin/forgot-password',
    data:{email:email},
    success: function(resp){
      if(resp['status'] == "not_exist"){
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Account doest not exists with this email!',
        })
      }
      else if(resp['status'] == "email_send_success"){
        Swal.fire({
          icon: 'success',
          title: 'Email sent to you successfully',
          text: 'Please check your inbox to reset the password',
        })
      }
    },error: function(){
      console.log("ERROR")
    }
  })
});

});

