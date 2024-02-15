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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/animate.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>.red{ color:red;}</style>
  </head>
  <body> 
    <div class="loader-wrapper"> 
      <div class="loader loader-1">
        <div class="loader-outter"></div>
        <div class="loader-inner"></div>
        <div class="loader-inner-1"></div>
      </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper StartMy Currencies-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <div class="page-header row">
        <div class="header-logo-wrapper col-auto">
          <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ asset('images/logo/logo.png') }}" alt=""/><img class="img-fluid for-dark" src="{{ asset('images/logo/logo_light.png') }}" alt=""/></a></div>
        </div>
        <div class="col-4 col-xl-4 page-title">
          <h4 class="f-w-700">Edit Profile</h4>
          <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"> </i></a></li>
              <li class="breadcrumb-item f-w-400">Account</li>
              <li class="breadcrumb-item f-w-400 active">Edit Profile</li>
            </ol>
          </nav>
        </div>
        <!-- Page Header Start-->
        <div class="header-wrapper col m-0">
          <div class="row">
            <form class="form-inline search-full col" action="#" method="get">
              <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                  <div class="u-posRelative">
                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search ..." name="q" title="" autofocus>
                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                  </div>
                  <div class="Typeahead-menu"></div>
                </div>
              </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
              <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('images/logo/logo.png') }}" alt=""></a></div>
              <div class="toggle-sidebar">
                <svg class="stroke-icon sidebar-toggle status_toggle middle">
                  <use href="{{ asset('svg/icon-sprite.svg#toggle-icon') }}"></use>
                </svg>
              </div>
            </div>
            <div class="nav-right col-xxl-8 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
              <ul class="nav-menus">
                <li>                         <span class="header-search">
                    <svg>
                      <use href="{{ asset('svg/icon-sprite.svg#search') }}"></use>
                    </svg></span></li>
                <li>
                  <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                      <div class="u-posRelative d-flex align-items-center">
                        <svg class="search-bg svg-color"> 
                          <use href="{{ asset('svg/icon-sprite.svg#search') }}"></use>
                        </svg>
                        <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search FS .." name="q" title="">
                      </div>
                    </div>
                  </div>
                </li>                
                <li>
                  <div class="mode">
                    <svg>
                      <use href="{{ asset('svg/icon-sprite.svg#moon') }}"></use>
                    </svg>
                  </div>
                </li>
                
                <li class="profile-nav onhover-dropdown px-0 py-0">
                  <div class="d-flex profile-media align-items-center">                        
                             @if(Auth::user()->profile_pic != '')
                                 <img class="img-30  rounded-circle" src="{{ 'data:image/;base64,'.Auth::user()->profile_pic }}">
                               @else
                                  <img class="img-30" src="{{ asset('images/dashboard/profile.png') }}" alt="">
                               @endif
                    <div class="flex-grow-1"><span>{{ Auth::user()->last_name; }}</span>
                      <p class="mb-0 font-outfit">{{ ucwords(Auth::user()->role) }}<i class="fa fa-angle-down"></i></p>
                    </div>
                  </div>
                  <ul class="profile-dropdown onhover-show-div">
                    <li><a href="{{ route('profile.edit') }}"><i data-feather="user"></i><span>Account</span></a></li>
                    <li>
                     <a href="#" id="logout" onclick="logout();"> <i data-feather="log-out"> </i><span> Logout</span></a>
                     <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                  </li>
                  </ul>
                </li>
              </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
              <div class="ProfileCard u-cf">                        
              <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
              <div class="ProfileCard-details">
              <div class="ProfileCard-realName">  {{ __('Dashboard') }}</div>
              </div>
              </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
          </div>
        </div>
        <!-- Page Header Ends                              -->
      </div>
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('images/logo/logo_light.png') }}" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar">
                <svg class="stroke-icon sidebar-toggle status_toggle middle">
                  <use href="{{ asset('svg/icon-sprite.svg#toggle-icon') }}"></use>
                </svg>
                <svg class="fill-icon sidebar-toggle status_toggle middle">
                  <use href="{{ asset('svg/icon-sprite.svg#fill-toggle-icon') }}"></use>
                </svg>
              </div>
            </div>
            <div class="logo-icon-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="{{ route('dashboard') }}"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                   
                  <li class="sidebar-list active">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title active" href="javascript:void(0)">
                                <svg class="stroke-icon">
                                    <use href="{{ asset('svg/icon-sprite.svg#stroke-home') }}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{ asset('svg/icon-sprite.svg#fill-home') }}"></use>
                                </svg><span>Dashboard</span>
                         </a>
                         @if(Auth::user()->role == 'applicant')
                          <ul class="sidebar-submenu expand">
                            <li><a href="{{ route('dashboard') }}">Overview</a></li>
                            <li><a href="{{ route('loan') }}">Loans</a></li>
                            <li><a class="" href="{{ route('application') }}">Applications</a></li>
                            <li><a href="{{ route('wallet') }}"> Fund Wallet</a></li>
                            <li><a href="{{ route('transactions') }}">Transactions</a></li>
                          </ul>
                       
                        @elseif(Auth::user()->role == 'staff')
                          <ul class="sidebar-submenu expand">
                            <li><a class="active" href="{{ route('dashboard') }}">Overview</a></li>
                            <li><a href="{{ route('staff.agents') }}" disabled="true">Agents</a></li>
                            <li><a href="{{ route('staff.applications') }}">Applications</a></li>
                            <li><a href="{{ route('staff.schools') }}">Schools</a></li>
                          </ul>
                        @elseif(Auth::user()->role == 'admin')
                        <ul class="sidebar-submenu expand">
                          <li><a  class="active" href="{{ route('dashboard') }}">Overview</a></li>
                          <li><a href="{{ route('admin.users') }}">Users</a></li>
                          <li><a href="{{ route('admin.applications') }}">Applications</a></li>
                          <li><a href="{{ route('admin.schools') }}">Schools</a></li>
                          <li><a href="{{ route('admin.activities') }}">Activities</a></li>
                          <li><a href="{{ route('admin.wallet') }}"> Fund Wallet</a></li>
                          <li><a href="{{ route('admin.transactions') }}">Transactions</a></li> 
                          <li><a href="{{ route('admin.reports') }}">Generate Report</a></li> 
                        </ul>
                        @elseif(Auth::user()->role == 'agent')
                        <ul class="sidebar-submenu expand">
                          <li><a href="{{ route('dashboard') }}">Overview</a></li>
                          <li><a href="{{ route('loan') }}">Loans</a></li>
                          <li><a class="" href="{{ route('application') }}">Applications</a></li>
                          <li><a href="{{ route('wallet') }}"> Fund Wallet</a></li>
                          <li><a href="{{ route('transactions') }}">Transactions</a></li>
                        </ul>
                        @endif
                  </li>
                   
               
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="edit-profile">
              <div class="row">
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header" style="background-color:#2b3751;">
                      <h4 class="card-title mb-0 text-light">
                        <i class="icofont icofont-users-alt-4"></i>
                        My Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row ">
                          <div class="profile-title">
                            <div><center>
                                @if(Auth::user()->profile_pic != '')
                                 <img class="img-100  " src="{{ 'data:image/;base64,'.Auth::user()->profile_pic }}">
                               @else
                                  <img class="img-100  " src="{{ asset('images/No-Image.png') }}">
                               @endif </center> 
                            </div><center>
                            <p><span class="badge badge-dark mt-3">{{ ucwords(Auth::user()->role) }}</span></p>
                                <h4 class="mb-1">{{ ucwords(Auth::user()->first_name." ".Auth::user()->last_name) }}</h4>
                               <span class="mb-2"> {{ ucwords(Auth::user()->email) }} </span>
                            </center>
                          </div>
                          <button class="btn btn-danger" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#passwordModal">
                            <i class="fa fa-expand" aria-hidden="true">&nbsp; </i>&nbsp; Update Password
                          </button>
                          </div>

                      <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModal" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="card-header text-light" style="background-color:#2b3751;">
                          <h4 class="card-title mb-0"><i class="fa fa-user" aria-hidden="true"></i> Password Update</h4>
                          <div class="card-options">
                            <a class="card-options-collapse" href="#" data-bs-toggle="card-collapse">
                            <i class="fe fe-chevron-up"></i></a>
                              <a class="card-options-remove" href="#" data-bs-toggle="card-remove">
                              <i class="fe fe-x"></i></a>
                          </div>
                        </div>
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper"> 
                              <div id="error1" style="display:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                              <div id="success1" style="display:none" class="alert alert-success alert-dismissible" role="alert"></div>                     
                            <form method="post" action="{{ route('password.update') }}" id="form_pass">
                              @csrf
                              @method('put')
                              <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input class="form-control" name="current_password" id="current_password" type="password">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input class="form-control" name="password" id="password" type="password">
                              </div>
                              <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" >
                              </div>
                              <div class="form-footer">
                              <button type="button" id="btnUpdate" class="btn bg-danger d-flex align-items-center gap-2 text-light ms-auto"/> <i class="fa fa-key" aria-hidden="true"></i>
                              Change</button>
                            </div>
                          </form>
                              
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-8">
                  <form class="card" id="profile" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-header" style="background-color:#2b3751;">
                      <h4 class="card-title mb-0 text-light"><i class="fa fa-edit"></i> Edit Profile</h4>
                      <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
                    </div>
                    <div id="error3" style="display:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                    <div id="success" style="display:none" class="alert alert-success alert-dismissible" role="alert"></div>
                    @if(session()->has('status'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="oldpic" id="oldpic" value="{{ Auth::user()->profile_pic}}">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="mb-1">
                            <label class="form-label">Surname <span class="red">*</span></label>
                            <input class="form-control" id="surname" name="surname" type="text" value="{{ Auth::user()->last_name}}" placeholder="">
                        </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-1">
                            <label class="form-label">First Name <span class="red">*</span></label>
                            <input class="form-control" id="firstname" name="firstname" type="text" value="{{ Auth::user()->first_name}}" placeholder="">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-1">
                            <label class="form-label">Middle Name</label>
                            <input class="form-control" id="middlename" name="middlename" type="text" value="{{ Auth::user()->middle_name}}" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="mb-1">
                            <label class="form-label">Gender <span class="red">*</span></label>
                            <select name="gender" id="gender" class="form-control btn-square">
                              <option value="">--Select--</option>
                              <option value="Male" @if( Auth::user()->gender == 'Male') selected @endif >Male</option>
                              <option value="Female" @if( Auth::user()->gender == 'Female') selected @endif>Female</option>
                            </select>
                          </div>
                        </div>
                        @php 
                            $edate = Auth::user()->dob;
                            $dob = str_replace('-', '/', $edate);
                        @endphp
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-1">
                            <label class="form-label">Date of Birth <span class="red">*</span></label>
                            <input class="form-control digits" placeholder="DD/MM/YYYY" name="dob" id="dob" type="text" value="{{date('d/m/Y', strtotime($dob));}}">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="mb-1">
                            <label class="form-label">Phone No.<span class="red">*</span></label>
                            <input class="form-control" name="phone_number" id="phone" maxlength="11" type="text" value="{{ Auth::user()->phone_number}}" >
                          </div>
                        </div>
                       
                        <div class="col-md-12">
                          <div>
                            <label class="form-label">Home Address</label>
                            <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter your home Address">{{ Auth::user()->address}}</textarea>
                        </div>
                        </div>
                        <div class="mb-3 mt-3">
                      <label class="form-label" for="formFileMultiple">Profile Photo</label>
                      <input class="form-control" name="image" id="image" type="file" multiple="">
                    </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-dark" id="btnSave" name="btnSave" type="button">
                        <i class="fa fa-save"></i> &nbsp; Update  <div class="lds-ring" id="spinner"><div></div><div></div><div></div><div></div></div>
                       </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
          
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                <p class="mb-0 f-w-600">Copyright©fee24 Consultant LTD <script>document.write(new Date().getFullYear())</script> </p>
              </div>
            </div>
          </div>
        </footer>
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
    <script src="{{ asset('js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('js/scrollbar/custom.js') }}"></script>
	    <script src="{{ asset('js/tooltip-init.js') }}"></script>
        <script src="{{ asset('js/sweetalert.js') }}"></script>
     
		 <script src="{{ asset('js/clipboard/clipboard.min.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick/slick.js') }}"></script>
    <script src="{{ asset('js/header-slick.js') }}"></script>
	<script src="{{ asset('js/prism/prism.min.js') }}"></script>
       <script src="{{ asset('js/custom-card/custom-card.js') }}"></script>
    <!-- calendar js-->
     
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="{{ asset('js/updateProfile.js') }}"></script>
    <script src="{{ asset('js/loadstates.js') }}"></script>
    <script src="{{ asset('js/loadlga.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
      $( document ).ready(function() {
        var dateFormat = $( "#dob" ).datepicker( "option", "dateFormat" );
        let dayTo = "2014"; let dayFrom = "1973";
        // //set range
        $( "#dob" ).datepicker({
            yearRange: dayFrom + ":"+dayTo,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd/mm/yy'
        });
        let getDate =   $("#dob").val();
         if(getDate == '01/01/1970')
         { let fullDate = "01/01/"+dayTo; $("#dob").datepicker( "setDate", fullDate ); $("#dob").val(null); }
      });
    </script>
    <!-- Plugin used-->
  </body>
</html>