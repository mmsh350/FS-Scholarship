<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FS-Scholarship"/>
    <meta name="keywords" content="Your Gateway to a Brighter Future! At FS-Scholarship, we believe in nurturing talent, fostering dreams, and empowering the next generation of leaders">
    <meta name="author" content="Muhammad Sani Hamidu">
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <title>FS-Scholarship </title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
  </head>
  <body>
    <!-- login page start-->
    <div class="container-fluid p-0"> 
      <div class="row m-0">
        <div class="col-xl-5"><img class="bg-img-cover bg-center" src="{{ asset('images/login/2.jpg') }}" alt="looginpage"></div>
        <div class="col-xl-7 p-0"> 
          <div class="login-card login-dark">
            <div>
              <div><a class="logo text-start" href="{{ route('login') }}"><img class="img-fluid for-light" src="{{ asset('images/logo/logo.png') }}" alt="looginpage"><img class="img-fluid for-dark" src="{{ asset('images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
              <div class="login-main"> 
                <form class="theme-form">
                @if(session()->has('status'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                  <h4>Create your account</h4>
                  <p>Enter your personal details to create account</p>
                  <div class="form-group">
                    <label class="col-form-label pt-0">Your Name</label>
                    <div class="row g-2">
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                      <div class="col-6">
                        <input class="form-control" type="text"  id="firstname" name="firstname" placeholder="First name" required>
                      </div>
                      <div class="col-6">
                        <input class="form-control" type="text"  id="lastname"  name="lastname" placeholder="Last name" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Email Address</label>
                    <input class="form-control" type="email" id="email"  name="email" required="" placeholder="e.g test@gmail.com">
                  </div>
                  <div class="form-group g-2">
                  <div class="row g-2">
                    <div class="col-6">
                        <label class="col-form-label">Password</label>
                        <div class="form-input position-relative">
                        <input class="form-control" type="password" id="password" name="password" required placeholder="******">
                        </div>
                    </div>

                    <div class="col-6">
                        <label class="col-form-label">Confirm Password</label>
                        <div class="form-input position-relative">
                        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required placeholder="******">
                        <div class="show-hide"><span class="show"></span></div>
                        </div>
                    </div>
                    </div>
                  </div>
                  <div  id="error" style="display:none;"></div>
                  <div class="form-group mb-0">
                    <div class="checkbox p-0">
                      <input id="checkbox1" type="checkbox">
                      <label class="text-muted" for="checkbox1">Agree with<a class="ms-2" href="#">Privacy Policy</a></label>
                    </div>
                    <button class="btn btn-primary btn-block w-100" id="register" type="button">Create Account
                    <div class="lds-ring" id="spinner"><div></div><div></div><div></div><div></div></div>
                    </button>
                  </div>
                  <p class="mt-4 mb-0 text-center">Already have an account?<a class="ms-2" href="{{ route('login') }}">Sign in</a></p>
                </form>

                <div class="toast-container position-fixed top-0 end-3 p-5 toast-index toast-rtl">
                      <div class="toast hide toast fade" id="liveToast22" role="alert" aria-live="assertive" aria-atomic="true">
                        <div id="errorColor2" class="d-flex justify-content-between alert-primary">
                          <div class="toast-body"  id="error2">Loading....</div>
                          <button class="btn-close btn-close-white me-2 m-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                      </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- latest jquery-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <!-- Bootstrap js-->
      <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>
      <!-- feather icon js-->
      <script src="{{ asset('js/icons/feather-icon/feather.min.js') }}"></script>
      <script src="{{ asset('js/icons/feather-icon/feather-icon.js') }}"></script>
      <!-- scrollbar js-->
      <!-- Sidebar jquery-->
      <script src="{{ asset('js/config.js') }}"></script>
      <!-- Plugins JS start-->
      <!-- calendar js-->
      <!-- Plugins JS Ends-->
      <!-- Theme js-->
      <script src="{{ asset('js/script.js') }}"></script>
      <script src="{{ asset('js/notify/custom-notify.js') }}"></script>
      <script src="{{ asset('js/register.js') }}"></script>
      <!-- Plugin used-->
    </div>
  </body>
</html>