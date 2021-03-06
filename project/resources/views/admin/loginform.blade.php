<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin Loginform</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset("assets/admin/img/brand/favicon.png") }}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset("assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css") }}" type="text/css">
  <!-- Argon CSS -->

  <link rel="stylesheet" href="{{ asset('assets/admin/css/argon.css?v=1.2.0') }}" type="text/css">
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body class="bg-default">
  <!-- Navbar -->

  <!-- Main content -->
  <div class="main-content">

    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">

        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <!-- Page content -->
      <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">

              <div class="card-body px-lg-5 py-lg-5">

                <h1 class="text-dark text-center mb-4 font-weight-bolder">Login!</h1>
                @include('includes.admin.form-login')
                  <form id="loginform" action="#" method="POST" class="user">
                    {{ csrf_field() }}
                    

                      <div class="form-group">
                            <label class="sr-only" for="inlineFormInputGroup">Email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text"><i class="ni ni-email-83"></i></div>
                                </div>
                                <input type="email" name="email" class="form-control" id="email" placeholder="User email">
                            </div>
                      </div>
                       <div class="form-group">
                                <label class="sr-only" for="inlineFormInputGroup">Password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="ni ni-lock-circle-open"></i></div>
                                    </div>
                                    <input type="password" name="password"  class="form-control" id="password" placeholder="Password">
                                </div>
                       </div>
                       <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                            <label class="custom-control-label" for=" customCheckLogin">
                            <span class="text-muted">Remember me</span>
                            </label>
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 w-100">Sign in</button>
                      </div>
                  </form>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-6">
                <a href="#" class="text-light"><small>Forgot password?</small></a>
              </div>
              <div class="col-6 text-right">
                <a href="#" class="text-light"><small>Create new account</small></a>
              </div>
            </div>
          </div>
        </div>
      </div>


    <!-- Page content -->

  </div>
  <!-- Footer -->

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset("/assets/admin/vendor/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset("assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("assets/admin/vendor/js-cookie/js.cookie.js") }}"></script>
  <script src="{{ asset("assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js") }}"></script>
  <script src="{{ asset("assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js") }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset("assets/admin/js/argon.js?v=1.2.0") }}"></script>
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  <script>
      // LOGIN FORM

$("#loginform").on('submit',function(e){
  e.preventDefault();
  $('button.submit-btn').prop('disabled',true);
  $('.alert-info').show();
  $('.alert-info p').html($('#authdata').val());
      $.ajax({
       method:"POST",
       url:$(this).prop('action'),
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
          if ((data.errors)) {
          $('.alert-success').hide();
          $('.alert-info').hide();
          $('.alert-danger').show();
          $('.alert-danger ul').html('');
            for(var error in data.errors)
            {
              $('.alert-danger p').html(data.errors[error]);
            }
          }
          else
          {
            $('.alert-info').hide();
            $('.alert-danger').hide();
            $('.alert-success').show();
            $('.alert-success p').html('Success !');
            window.location = data;
          }
          $('button.submit-btn').prop('disabled',false);
       }

      });

});


// LOGIN FORM ENDS
  </script>

</body>

</html>



