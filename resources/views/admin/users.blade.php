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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
    <link href="{{ asset('css/spinner.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/sweetalert.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
      .paginate_button.current  {background-color: #2b3751 !important; }
      .dataTables_filter input { border: 1px dashed #2b3751 !important; }
      </style>
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
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <div class="page-header row">
          <div class="header-logo-wrapper col-auto">
            <div class="logo-wrapper"><a href="{{ route('dashboard') }}"><img class="img-fluid for-light" src="{{ asset('images/logo/logo.png') }}" alt=""/><img class="img-fluid for-dark" src="{{ asset('images/logo/logo_light.png') }}" alt=""/></a></div>
          </div>
          <div class="col-4 col-xl-4 page-title">
            <h4 class="f-w-700"> Admin Dashboard </h4>
            <nav>
              <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"> </i></a></li>
                <li class="breadcrumb-item f-w-400">Users</li>
                <li class="breadcrumb-item f-w-400 active">Manage Accounts</li>
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
                  <li class="onhover-dropdown">
                    <div class="notification-box">
                      <svg>
                        <use href="{{ asset('svg/icon-sprite.svg#notification') }}"></use>
                      </svg><span class="badge rounded-pill badge-danger">{{$notifycount}}</span>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                      <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notifications</h5>
                      <ul>
                       
                        @if($notifications->count() != 0)                      
                        @foreach($notifications as $data)
  
                        <li class="d-flex"> 
                          <div class="">
                              <h6></h6>
                              <p>{{$data->messages}}</p>
                              <p class="txt-primary mb-0 pull-right"> ~ {{date("F j, Y", strtotime($data->created_at) );}} ~ </p>
                          </div>
                        </li>
  
                        @endforeach
                        @else
                        <li class="d-flex"> 
                          <div class="">
                               <h6>No Notification yet!</h6>
                          </div>
                        </li>
  
                        @endif
  
                        <li class="d-flex"> 
                          <div class="">
                              <p><a id="read" href="#">Mark Read</a></p>
                              <p style="display:none" id="done" class="text-danger">Done</p>
                          </div>
                        </li>
                      </ul>
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
                     
                    
                    <li class="sidebar-list active"><i class="fa fa-thumb-tack"></i>
                    <a class="sidebar-link sidebar-title active" href="javascript:void(0)">
                        <svg class="stroke-icon">
                          <use href="{{ asset('svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg>
                        <svg class="fill-icon">
                          <use href="{{ asset('svg/icon-sprite.svg#fill-home') }}"></use>
                        </svg><span>Dashboard</span></a>
                        <ul class="sidebar-submenu expand">
                            <li><a  href="{{ route('dashboard') }}">Overview</a></li>
                            <li><a class="active" href="{{ route('admin.users') }}">Users</a></li>
                            <li><a class="" href="{{ route('admin.applications') }}">Applications</a></li>
                            <li><a class="" href="{{ route('admin.activities') }}">Activities</a></li>
                            <li><a href="{{ route('admin.schools') }}" disabled="true">Schools</a></li>
                        </ul>
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

            
            <div class="row">             
            
              <div class="col-sm-12 col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Manage Users</h4>
                    <p class="mt-1 f-m-light" style="text-transform:none;">Manage all user account, including activation/de-activation, Email verification and password reset etc.</p>
                  </div>
                  <div class="card-body">
                    <ul class="simple-wrapper nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link " id="newuser-tabs" data-bs-toggle="tab" href="#newuser" role="tab" aria-controls="newuser" tabindex="-1" aria-selected="false"><i class="fa fa-plus txt-primary" aria-hidden="true"></i>New User</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="existinguser-tab" data-bs-toggle="tab" href="#existinguser" role="tab" aria-controls="existinguser" aria-selected="true" ><i class="fa fa-users txt-primary" aria-hidden="true"></i>Existing Users</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="existinguser" role="tabpanel" aria-labelledby="existinguser-tab">
                        <div class="table-responsive  mt-5">
                          <table class="display" style="overflow:auto; width:100%" id="users">
                            <thead style="background-color:#2b3751;" class="text-light">
                                <tr>
                                    <th>ID</th>
                                    <th  style="width: 20%;" >Email ID</th>
                                    <th  style="width: 25%;">Full Names</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th style="width: 2%;">Action</th>
                                </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                 

                      <div class="tab-pane fade " id="newuser" role="tabpanel" aria-labelledby="newuser-tabs">
                        <div id="error1" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible mt-4" role="alert"></div>
                        <div id="success1" style="display:none" class="alert alert-success alert-dismissible mt-4" role="alert"></div>
            
                  <form id="form" class="form theme-form col-md-8">
                    @csrf
                    <div class="card-body custom-input">
                      <div class="row"> 
                        <div class="col"> 
                          <div class="mb-3 row"> 
                            <label class="col-sm-3">Email</label>
                            <div class="col-sm-9"> 
                              <div class="form-floating mb-3">
                                <input class="form-control" id="email_id" name="email" type="email">
                                <label for="floatingInput">Input Email address</label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 row"> 
                            <label class="col-sm-3">First Name</label>
                            <div class="col-sm-9"> 
                              <div class="form-floating">
                                <input class="form-control" name="firstname" id="firstname" type="text">
                                <label for="floatingPassword1">Input First Name</label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 row"> 
                            <label class="col-sm-3">Middle Name</label>
                            <div class="col-sm-9"> 
                              <div class="form-floating">
                                <input class="form-control" name="middlename" id="middlename" type="text">
                                <label for="floatingPassword1">Input Middle Name</label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 row"> 
                            <label class="col-sm-3">Last Name</label>
                            <div class="col-sm-9"> 
                              <div class="form-floating">
                                <input class="form-control" name="lastname" id="lastname" type="text">
                                <label for="floatingPassword1">Input Last Name</label>
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 row"> 
                            <label class="col-sm-3">Phone Number</label>
                            <div class="col-sm-9"> 
                              <div class="form-floating">
                                <input class="form-control" maxlength="11" name="phone_number" id="phoneno" type="text">
                                <label for="floatingPassword1">Input Phone Number</label>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 mb-3"> 
                            <div class="card-wrapper border rounded-3 checkbox-checked">
                              <h6 class="sub-title txt-dark">Account Type</h6>
                              <div class="radio-form">
                                <div class="form-check">
                                  <input  id="staff" type="radio" name="account_type"  value="Staff">
                                  <label class="form-check-label" for="type">Staff</label>
                                </div>
                                <div class="form-check">
                                  <input  id="agent" type="radio" name="account_type"  value="Agent">
                                  <label class="form-check-label" for="type">Agent</label>
                                </div>
                                <div class="form-check">
                                    <input  id="applicant" type="radio" name="account_type" checked="true" value ="Applicant">
                                    <label class="form-check-label" for="type">Applicant</label>
                                  </div>
                              </div>
                            </div>
                          </div>
                         <div class="row">
                          <div id="idcards" class=" mt-3 col-xxl-6 col-sm-6" style="display:none;">
                            <label class="form-label" for="formFileMultiple">ID Card <span class="text-danger">(Format JPEG or PNG) e.g NIN, BVN*</span></label>
                            <input class="form-control" name="user_image" id="image2" type="file" multiple="">
                          </div>
                           
                          <div id="bbvn" class=" mt-3 col-xxl-6 col-sm-6" style="display:none;">
                            <label class="form-label" for="BVN No.">BVN No.<span class="txt-danger">*</span></label>    
                            <input class="form-control" maxlength="11" name="user_bvn" id="user_bvn" type="text">
                           </div>

                          <div id="location" class="mt-3 col-xxl-6 col-sm-6"  style="display:none;">
                            <label class="form-label" for="State">State<span class="txt-danger">*</span></label>
                            <select class="form-select" id="state2" name="user_state" >
                              <option value="">Choose...</option>
                            </select>
                            </div>
                         </div>

                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <div class="col-sm-9 offset-sm-3">
                        <input class="btn btn-danger" type="reset" value="Reset">
                        <button class="btn btn-dark me-3" name="register" id="register" type="button">
                          Submit  <div class="lds-ring" id="spinner2"><div></div><div></div><div></div><div></div></div>
                        </button>
                      </div>
                    </div>
                  </form>
                      </div>
                    <!---------User Modal----------->
                    <div class="modal fade bd-example-modal-xl"  id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="myExtraLargeModal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                             <!-- Preloader -->
                                <div id="modal-preloader">
                                    <div class="modal-preloader_status">
                                    <div class="modal-preloader_spinner">
                                        <div class="d-flex justify-content-center">
                                        <div class="spinner-border" role="status"></div>
                                           Fetching  Record..
                                        </div>
                                    </div>
                                    </div>
                                </div>
                              
                            <!-- End Preloader -->
                            <div class="modal-header" style="background-color:#2b3751; border-bottom: 1px dashed white;" >
                            <h4 class="modal-title txt-white" style="color:aliceblue" id="staticBackdropLabel"> Edit User Account </h4>
                            <svg data-bs-dismiss="modal" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                                <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)"></path><path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)"></path>
                                </svg>
                            </div>
                            <div class="modal-body dark-modal">
                                <div id="error_update" style="display:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                                <div id="done_update" style="display:none" class="alert alert-success alert-dismissible" role="alert"></div>
                  
                             <div class="row">
                                <div class="col-md-2 ">
                                    <center>
                                        <img class="img-responsive rounded border border-dark " width="100%" id="passport" src="" alt="Profile Photo" />
                                    </center>
                                     <div class="row mt-3  " >
                                        <div class="col-md-12">
                                    <p class="border-end b-r-info" width="50%"><span>Account Type</span>
                                        <br> <span id="type" class="f-w-300 badge badge-info"></span>
                                    </p>

                                        <p class="border-end b-r-dark" width="50%"><span>Status</span>
                                            <br> <span id="astatus"></span>
                                        </p>

                                        <p class="border-end b-r-success" width="50%"><span>Created By</span>
                                                <br> <span id="initiator" class="f-w-400 badge badge-success"></span>
                                        </p>

                                        <p class="border-end b-r-warning" width="50%"><span>Created On</span>
                                            <br>
                                            <span id="regon" class="f-w-400 badge badge-warning"></span>
                                        </p>
                                        <p class="border-end b-r-primary" width="50%"><span>Last Updated</span>
                                            <br>
                                            <span id="updton" class="f-w-400 badge badge-primary"></span>
                                        </p>
                                        </div>
                                     </div>
                                    
                                </div>

                               
                                <div class="col-md-10">
                                    <form class="card" id="profile" autocomplete="off">
                                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                        <div class="row">
                                        <div class="col-xxl-6 col-sm-6">
                                            <label class="form-label" for="validationCustom0-a">First Name<span class="txt-danger">*</span></label>
                                            <input class="form-control" name="first_name" id="first_name" type="text">
                                            <input class="form-control" name="userid" id="userid" type="hidden">
                                            <input class="form-control" name="status" id="status" type="hidden">
                                        </div>

                                        <div class="col-xxl-6 col-sm-6">
                                            <label class="form-label" for="validationCustom0-a">Middle Name<span class="txt-danger">*</span></label>
                                            <input class="form-control" name="middle_name" id="middle_name" type="text">
                                        </div>

                                        <div class="col-xxl-6 col-sm-6 mt-2">
                                            <label class="form-label" for="validationCustom0-a">Last Name<span class="txt-danger">*</span></label>
                                            <input class="form-control" name="last_name" id="last_name" type="text">
                                        </div>

                                        <div class="col-xxl-6 col-sm-6 mt-2">
                                            <label class="form-label">Gender <span class="txt-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control btn-square">
                                              <option value="">Choose</option>
                                              <option>Male</option>
                                              <option>Female</option>
                                            </select>
                                          </div>

                                          <div class="col-xxl-6 col-sm-6 mt-2">
                                            <label class="form-label" for="validationCustom-b">Date of Birth<span class="txt-danger">*</span></label>
                                            <input class="form-control digits" name="dob" id="dob" type="date" value="">
                                            </div>

                                            <div class="col-xxl-6 col-sm-6 mt-2">
                                                <label class="form-label" for="validationCustom0-a">Phone No.<span class="txt-danger">*</span></label>
                                                <input class="form-control" name="phone_no" id="phone_number" maxlength="11" type="text">
                                            </div>
                                            
                                            <div class="col-xxl-4 col-sm-6 mt-2">
                                               
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label" for="validationemail-b">Email<span class="txt-danger">*</span> <span id="cverify">Not verified</span></label>
                                                        <input class="form-control" id="email" name="email2" type="email"  value="" readonly>
                                                    </div>

                                                    <div class="col-md-12 mt-2">
                                                        <label class="form-label" for="State">State<span class="txt-danger"> &nbsp;<span style="font-size:10px;">(compulsory for only Agent and Staff)</span> *</span></label>
                                                        <select class="form-select" id="state" name="state" >
                                                          <option value="">Choose...</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-xxl-12 col-sm-12 mt-2">
                                                        <label class="form-label" for="validationCustom0-a">BVN. <span style="font-size:10px;" class="txt-danger">(BVN and Id cards compulsory for Agent)*</span></label>
                                                        <input class="form-control" name="bvn" maxlength="11" id="bvn" type="text">
                                                    </div>                                                   
                                                </div>
                                            </div>
                                             
                                            <div class="col-md-6 mt-2">

                                            <div class="row">
                                               <div class="col-md-12 mt-2">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter your home Address"></textarea>
                                                </div>

                                                <div class=" mt-2 col-xxl-12 col-sm-12">
                                                    <label class="form-label" for="formFileMultiple">ID Card <span style="font-size:10px;" class="text-danger ">(Format JPEG or PNG), e.g NIN! *</span></label>
                                                    <input class="form-control" name="image" id="image" type="file" multiple="">
                                                    <input class="form-control" name="oldpath" id="oldpath" type="hidden">
                                                  </div>

                                            </div>
                                            </div>
                                                
                                    </div>
                                    <div class="card-footer text-end mt-5">
                                        <button class="btn btn-dark" id="btnSave" name="btnSave" type="button">
                                          <i class="fa fa-save"></i> &nbsp; Update  <div class="lds-ring" id="spinner"><div></div><div></div><div></div><div></div></div>
                                         </button>
                                         <button class="btn btn-success" id="activate" name="activate" type="button">
                                            <i class="fa fa-eye"></i> &nbsp; Enable  
                                           </button>
                                           <button class="btn btn-warning" id="verify" name="verify" type="button">
                                            <i class="fa fa-check-square-o"></i> &nbsp; Verify Email
                                           </button>
                                      </div>
                                    </form>    
                                </div>
                             </div>
                             
                            </div>
                        </div>
                        </div>
                    </div>
                <!---------User Modal----------->



                <!---------User View Modal----------->
                <div class="modal fade view"  id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="myExtraLargeModal" style="display: none;" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                       <!-- Preloader -->
                          <div id="modal-preloader2">
                              <div class="modal-preloader_status">
                              <div class="modal-preloader_spinner">
                                  <div class="d-flex justify-content-center">
                                  <div class="spinner-border" role="status"></div>
                                     Fetching  Record..
                                  </div>
                              </div>
                              </div>
                          </div>
                        
                      <!-- End Preloader -->
                      <div class="modal-header" style="background-color:#2b3751; border-bottom: 1px dashed white;" >
                      <h4 class="modal-title txt-white" style="color:aliceblue" id="staticBackdropLabel"> User Profile </h4>
                      <svg data-bs-dismiss="modal" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                          <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)"></path><path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)"></path>
                          </svg>
                      </div>
                      <div class="modal-body dark-modal">
                       <div class="row">
                          <div class="col-md-2 ">
                              <center>
                                  <img class="img-responsive rounded border border-dark " width="100%" id="label_passport" src="" alt="Profile Photo" />
                              </center>
                               <div class="row mt-3  " >
                                  <div class="col-md-12">
                              <p class="border-end b-r-info" width="50%"><span>Account Type</span>
                                  <br> <span id="label_type" class="f-w-300 badge badge-secondary"></span>
                              </p>

                                  <p class="border-end b-r-dark" width="50%"><span>Status</span>
                                      <br> <span id="label_astatus"></span>
                                  </p>

                                  <p class="border-end b-r-success" width="50%"><span>Created By</span>
                                          <br> <span id="label_initiator" class="f-w-400 badge badge-success"></span>
                                  </p>

                                  <p class="border-end b-r-warning" width="50%"><span>Created On</span>
                                      <br>
                                      <span id="label_regon" class="f-w-400 badge badge-warning"></span>
                                  </p>
                                  <p class="border-end b-r-primary" width="50%"><span>Last Updated</span>
                                      <br>
                                      <span id="label_updton" class="f-w-400 badge badge-primary"></span>
                                  </p>
                                  </div>
                               </div>
                              
                          </div>

                         
                          <div class="col-md-10">
                            <div class="table-responsive theme-scrollbar">
                              <table border="1" class="table">
                                <thead style="background-color:#2b3751;">
                                  <tr>
                                    <th colspan="2" class="text-light"><i class="fa fa-user">&nbsp;</i>Profile Information</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th class="border-end" width="50%">
                                      <span id="label_username">User Name</span>
                                    <br> <span id="username" class="f-w-300"></span>
                                    </th>
                                    <th><span>Gender</span>
                                      <br><span id="label_gender" class="f-w-300">N/A
                                      </span>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th class="border-end" width="50%"><span>Date Of Birth</span>
                                    <br> <span id="label_dob" class="f-w-300">N/A</span>
                                    </th>
                                    <th><span>Phone Number</span>
                                      <br> <span id="label_phoneno" class="f-w-300"></span>
                                    </th>
                                  </tr>

                                  <tr>
                                    <th class="border-end" width="50%">
                                      <label><span>Email Address</span> <span id="label_verify"></span></label>
                                      
                                     <br> <span id="label_email" class="f-w-300">N/A</span>
                                    </th>
                                    <th>
                                      <span>BVN</span>                                               
                                      <br> <span id="label_BVN" class="f-w-300">N/A</span> 
                                    </th>
                                  </tr>
                                  <tr>
                                    <th class="border-end" width="50%">
                                      <span>State</span>
                                     <br> <span id="label_state" class="f-w-300"></span>
                                    </th>
                                    <th class="border-end" width="50%">
                                      <span>Home Address</span>
                                     <br> <span id="label_address" class="f-w-300">N/A</span>
                                    </th>
                                  </tr>
                                </tbody>
                              </table>

                              <table border="1" class="table">
                                <thead style="background-color:#2b3751;">
                                  <tr>
                                    <th colspan="2" class="text-light"><i class="icon-credit-card"></i> Identity Card</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th>
                                     <img src="" id="label_doc" width="450" height="300" alt="Identity Card"/>
                                    </th>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                       </div>
                       
                      </div>
                  </div>
                  </div>
              </div>
          <!---------User View Modal----------->
                     </div>
                    </div>
                  </div> 
                
                </div>
              </div>
              
           
             
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
          <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                  <p class="mb-0 f-w-600">Copyright©<script>document.write(new Date().getFullYear())</script> Fee24 Consultant Limited. All rights reserved.</p>  </div>
              </div>
            </div>
          </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{ asset('js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <script src="{{ asset('js/scrollbar/simplebar.js')}}"></script>
    <script src="{{ asset('js/scrollbar/custom.js')}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('js/sidebar-menu.js')}}"></script>
    <script src="{{ asset('js/slick/slick.min.js')}}"></script>
    <script src="{{ asset('js/slick/slick.js')}}"></script>
    <script src="{{ asset('js/header-slick.js')}}"></script>
    <!-- calendar js-->
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    
    <script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js') }}" ></script>

    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/loadstates.js') }}"></script>
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/users.js')}}"></script>
        
    <!-- Plugin used-->
  </body>
</html>