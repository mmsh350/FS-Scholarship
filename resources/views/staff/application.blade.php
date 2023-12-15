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
      .close {
   color: #fff !important; // red
   opacity: 1;
   // orther style
}
 
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
            <h4 class="f-w-700"> Staff Dashboard</h4>
            <nav>
              <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"> </i></a></li>
                <li class="breadcrumb-item f-w-400">Applications</li>
                <li class="breadcrumb-item f-w-400 active">Manage</li>
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
                      </svg><span class="badge rounded-pill badge-primary">0</span>
                    </div>
                    <div class="onhover-show-div notification-dropdown">
                      <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notitications</h5>
                      <ul class="notification-box">
                        <li class="d-flex"> 
                          
                          <div class="flex-grow-1"> <a href="#">
                              <h6>Approval</h6></a>
                            <p>No Notification Available</p>
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
                          <li><a href="{{ route('dashboard') }}">Overview</a></li>
                          <li><a class="active" class="" href="{{ route('staff.applications') }}">Applications</a></li>
                          <li><a  href="{{ route('staff.agents') }}">Agents</a></li>
                          <li><a href="#">Schools</a></li>
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
                    <h4>Manage Applications</h4>
                    <p class="mt-1 f-m-light" style="text-transform:none;">Staff manage submitted applications from this module </p>
                  </div>
                  <div class="card-body">

                    <!--Open Modal --->
                    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content" id="modal-content">
                          <div class="modal-header" style="background:#2b3751;   border-bottom: 1px dashed white; ">
                            <h4 class="modal-title text-light" id="myLargeModalLabel">Application Lookup</h4>
                            <button class="btn-close py-0 text-danger" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body dark-modal container-fluid ">
                            <div class="large-modal-header">
                              
                            </div>

                            <div class="row">
                              <div class="col-sm-2 ">
                                <center><img class="img-responsive rounded border border-dark " width="80%" id="passport" src="" alt="Profile Photo" />
                             </center>
                             
                            <!-------Next of kin------>
                            <table border="1" class="table mt-4">
                              <thead style="background-color:#2b3751;">
                                <th class="text-light"> Application Details </th> 
                              </thead>
                              <tbody>
                               
                                <tr>
                                  <th class="border-end" width="50%"><span>Type</span>
                                  <br> <span id="cat" class="f-w-300"></span>
                                  </th>
                                </tr>
                                <tr>
                                  <th class="border-end" width="50%"><span>Status</span>
                                  <br> <span id="appstatus" class="f-w-300"></span>
                                  </th>
                                </tr>
                                <tr>
                                  <th class="border-end" width="50%"><span>Request Amount</span>
                                  <br> <span id="amount" class="f-w-300 text-dark"></span>
                                  </th>
                                </tr>
                                <tr id="dis1"  style="display:none">
                                  <th class="border-end" width="50%"><span>Approved Amount</span>
                                  <br> <span id="appamount" class="f-w-300 text-suceess"></span>
                                  </th>
                                </tr>
                                <tr id="dis4"  style="display:none">
                                  <th class="border-end" width="50%"><span>Offer Acceptance</span>
                                  <br> <span id="app_accept" class="f-w-300 text-suceess"></span>
                                  </th>
                                </tr>

                                <tr id="dis3" style="display:none">
                                  <th class="border-end" width="50%"><span>Initial Fees</span>
                                    <br/><span id="paystatus">Loading status...</span>
                                  <br> <span id="initamount" class="f-w-300 text-suceess"></span>
                                  
                                  </th>
                                </tr>

                                <tr id="dis2"  style="display:none">
                                  <th class="border-end" width="50%"><span>Disbursement</span>
                                       <span id="disbursed"></span>
                                  </th>
                                </tr>
                               
                                <tr>
                                  <th class="border-end" width="50%"><span>Initiated By</span>
                                  <br> <span id="initiator" class="f-w-400"></span>
                                  </th>
                                </tr>
                              </tbody>
                            </table>

                            <table id="action" style="display:none" border="1" class="table mt-4">
                              <thead style="background-color:#2b3751;">
                                <th class="text-light"> Action </th>
                              </thead>
                              <tbody>
                                <tr>
                                  <td class="border-end">
                                    <textarea class="form-control btn-square" placeholder="Verification Reason" id="comments" title="Coments"></textarea>
                                  </td>
                                </tr>
                            <tr>
                              <td class="border-end" width="50%">
                                <button class="btn btn-success-gradien btn-sm" id="approve" type="button" title="Approve">&nbsp; Approve &nbsp;<i class="fa fa-check"></i></button>
                              </td>
                            </tr>
                            <tr>
                              <td class="border-end" width="50%">
                                <button class="btn btn-danger-gradien btn-sm" id="reject" type="button" title="Reject">&nbsp; Reject &nbsp;&nbsp; &nbsp; <i class="fa fa-times"></i> &nbsp;</button>
                              </td>
                            </tr>
                          </tbody>
                           </table>
                             
                              </div>
                              <div class="col-sm-10 ">
                                <div class="col-sm-12">
                                  <div class="card">
                                    {{-- <div class="card-header">
                                      <h4></h4>
                                    </div> --}}
                                    <div class="card-block row">
                                      <div class="col-sm-12 col-lg-12 col-xl-12">
                                        
                                        <div id="err" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible mt-4" role="alert"></div>
                                        <div id="done" style="display:none" class="alert alert-success alert-dismissible mt-4" role="alert"></div>
                            
                                        <div class="table-responsive theme-scrollbar">
                                          <table border="1" class="table">
                                            <thead style="background-color:#2b3751;">
                                              <tr>
                                                <th colspan="2" class="text-light">Personal Information</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Applicant Name</span>
                                                <br> <span id="app_name" class="f-w-300"></span>
                                                <input type="hidden" id="appid" value="" name="appid" class="f-w-300"/>
                                                </th>
                                                <th><span>Gender</span>
                                                  <br><span id="gender" class="f-w-300">
                                                  </span>
                                                </th>
                                              </tr>

                                              <tr>
                                                <th class="border-end" width="50%"><span>Date Of Birth</span>
                                                <br> <span id="dob" class="f-w-300"></span>
                                                </th>
                                                <th><span>Phone Number</span>
                                                  <br> <span id="phoneno" class="f-w-300"></span>
                                                </th>
                                              </tr>

                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Email</span>
                                                 <br> <span id="email" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>Country/Nationality</span>                                               
                                                  <br> <span id="country" class="f-w-300"></span> - <span id="nationality" class="f-w-300"></span>
                                                </th>
                                              </tr>


                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>State</span>
                                                 <br> <span id="state" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>LGA</span>                                               
                                                  <br> <span id="lga" class="f-w-300"></span> 
                                                </th>
                                              </tr>

                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Home Address</span>
                                                 <br> <span id="haddress" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>Nearest Busstop</span>                                               
                                                  <br> <span id="busstop" class="f-w-300"></span> 
                                                </th>
                                              </tr>
                                             
                                              <tr id="dysabroad_div" style="display:none">
                                                <th class="border-end" width="50%">
                                                  <span>International Phone No.*</span>
                                                 <br> <span id="intl_phone" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>International Address</span>                                               
                                                  <br> <span id="intl_address" class="f-w-300"></span> 
                                                </th>
                                              </tr>
                                              
                                               
                                            </tbody>
                                          </table>

                                          <!-------Next of kin------>
                                          <table border="1" class="table mt-3">
                                            <thead style="background-color:#2b3751;">
                                              <tr>
                                                <th colspan="2" class="text-light">Next of Kin Information</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Next of Kin Name</span>
                                                <br> <span id="kinname" class="f-w-300"></span>
                                                </th>
                                                <th><span>Relationship</span>
                                                  <br><span id="kinrelation" class="f-w-300">
                                                  </span>
                                                </th>
                                              </tr>
                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Gender</span>
                                                <br> <span id="kin_gender" class="f-w-300"></span>
                                                </th>
                                                <th><span>Date of Birth</span>
                                                  <br><span id="kin_dob" class="f-w-300">
                                                  </span>
                                                </th>
                                              </tr>                                            

                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Email</span>
                                                 <br> <span id="kin_email" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>State / LGA </span>                                               
                                                  <br> <span id="kin_state" class="f-w-300"></span> - <span id="kin_lga" class="f-w-300"></span>
                                                </th>
                                              </tr>


                                                <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Home Address</span>
                                                 <br> <span id="kin_address" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>Nearest Busstop</span>                                               
                                                  <br> <span id="kin_busstop" class="f-w-300"></span> 
                                                </th>
                                              </tr>
                                              
                                              
                                               
                                            </tbody>
                                          </table>

                                          <!-------Education------>
                                          <table border="1" class="table mt-3">
                                            <thead style="background-color:#2b3751;">
                                              <tr>
                                                <th colspan="2" class="text-light">Educational Information</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>School Category</span>
                                                <br> <span id="schl_cat" class="f-w-300"></span>
                                                </th>
                                                <th><span>Section</span>
                                                  <br><span id="section" class="f-w-300">
                                                  </span>
                                                </th>
                                              </tr>
                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>Schoool Name</span>
                                                <br> <span id="schl_name" class="f-w-300"></span>
                                                </th>
                                                <th><span>Course of Study</span>
                                                  <br><span id="course" class="f-w-300">
                                                  </span>
                                                </th>
                                              </tr>                                            

                                              <tr>
                                                <th class="border-end" width="50%">
                                                  <span>No of Years</span>
                                                 <br> <span id="no_years" class="f-w-300"></span>
                                                </th>
                                                <th>
                                                  <span>Requested Amount </span>                                               
                                                  <br> <span id="ramt" class="f-w-300"></span>
                                                </th>
                                              </tr>                                              
                                               
                                            </tbody>
                                          </table>

                                            <!-------Guarantor ------>
                                            <table border="1" class="table mt-3">
                                              <thead style="background-color:#2b3751;">
                                                <tr>
                                                  <th colspan="2" class="text-light">Guarantors Information</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th colspan="2" class="text-light ">
                                                    <span class="badge badge-dark" >First Guarantor</span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Guarantor Name</span>
                                                  <br> <span id="gf_names" class="f-w-300"></span>
                                                  </th>
                                                  <th><span>Relationship</span>
                                                    <br><span id="gf_relationship" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Phone</span>
                                                  <br> <span id="gf_phone" class="f-w-300"></span>
                                                  </th>
                                                  <th><span>Email <Address></Address></span>
                                                    <br><span id="gf_email" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>                                            
  
                                                <tr>
                                                  <th class="border-end" colspan="2" width="50%">
                                                    <span>Address</span>
                                                   <br> <span id="gf_address" class="f-w-300"></span>
                                                  </th>
                                                </tr>       
                                                
                                                <tr>
                                                  <th colspan="2" class="text-light ">
                                                    <span class="badge badge-dark" >Second Guarantor</span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Guarantor Name</span>
                                                  <br> <span id="gs_names" class="f-w-300"></span>
                                                  </th>
                                                  <th><span>Relationship</span>
                                                    <br><span id="gs_relationship" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Phone</span>
                                                  <br> <span id="gs_phone" class="f-w-300"></span>
                                                  </th>
                                                  <th><span>Email <Address></Address></span>
                                                    <br><span id="gs_email" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>                                            
  
                                                <tr>
                                                  <th class="border-end" colspan="2" width="50%">
                                                    <span>Address</span>
                                                   <br> <span id="gs_address" class="f-w-300"></span>
                                                  </th>
                                                </tr>    
                                              </tbody>
                                            </table>
 <!-------Guarantor ------>
                                            
                                             <!-------Head of school info ------>
                                             <table border="1" class="table mt-3">
                                              <thead style="background-color:#2b3751;">
                                                <tr>
                                                  <th colspan="2" class="text-light">Head of School Information</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                 
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Head of School Name</span>
                                                  <br> <span id="hos_name" class="f-w-300"></span>
                                                  </th>
                                                  <th class="border-end" width="50%">
                                                    <span>Phone</span>
                                                  <br> <span id="hos_phone" class="f-w-300"></span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th><span>Email <Address></Address></span>
                                                    <br><span id="hos_email" class="f-w-300">
                                                    </span>
                                                  </th>
                                                  <th><span>State</span>
                                                    <br><span id="hos_state" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>   
                                                <tr>
                                                  <th><span>City <Address></Address></span>
                                                    <br><span id="hos_city" class="f-w-300">
                                                    </span>
                                                  </th>
                                                  <th><span>Address</span>
                                                    <br><span id="hos_address" class="f-w-300">
                                                    </span>
                                                  </th>
                                                </tr>                                            
  
                                                  
                                              </tbody>
                                            </table>
        <!-------Head of school info ------>
                                             
                                                      <!-------Head of school info ------>
                                             <table border="1" id="acct_info" style="display:none;" class="table mt-3">
                                              <thead style="background-color:#2b3751;">
                                                <tr>
                                                  <th colspan="2" class="text-light">Account Information</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                 
                                                <tr>
                                                  <th class="border-end" width="50%">
                                                    <span>Account Number</span>
                                                  <br> <span id="acct_number" class="f-w-300"></span>
                                                  </th>
                                                  <th class="border-end" width="50%">
                                                    <span>Account Name</span>
                                                  <br> <span id="acct_name" class="f-w-300"></span>
                                                  </th>
                                                </tr>
                                                <tr>
                                                  <th><span>Bank Name <Address></Address></span>
                                                    <br><span id="acct_bankname" class="f-w-300">
                                                    </span>
                                                  </th>
                                              </tbody>
                                            </table>
                                              <!-------Documents info ------>
                                              <table border="1" class="table mt-3">
                                                <thead style="background-color:#2b3751;">
                                                  <tr>
                                                    <th colspan="2" class="text-light">Uploaded Documents</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                  <tr>
                                                    <td>
                                                    <object id="upload" data="" type="application/pdf" width="100%" height="500px">
                                                      <p>Unable to display PDF file. <a id="downloadpdf" href="">Download</a> instead.</p>
                                                    </object>
                                                  </td>
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
                             
                            </div>
                        </div>
                      </div>
                    </div>
                     <!--Close Modal ---> 
                   
                    <ul class="simple-wrapper nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation"><a class="nav-link active txt-warning" id="pending-tabs" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" tabindex="-1" aria-selected="false"><i class="fa fa-clock-o" aria-hidden="true"></i>Pending</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link txt-success" id="verified-tab" data-bs-toggle="tab" href="#verified" role="tab" aria-controls="verified" aria-selected="true" ><i class="fa fa-check-circle" aria-hidden="true"></i>
                        Verified</a></li>
                     
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade" id="verified" role="tabpanel" aria-labelledby="verified-tab">
                       
                        <div class="table-responsive theme-scrollbar mt-5">
                          <table class="display" style="overflow:auto" id="verifiedlist" style="width:130%">
                            <thead style="background-color:#2b3751;" class="text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Submitted On.</th>
                                    <th style="width: 25%;">Applicant Names</th>
                                    <th style="width: 10%;">Request Amount</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                        
                      </div>

                      <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tabs">
                        <div class="table-responsive theme-scrollbar mt-5">
                          <table class="display" style="overflow:auto" id="pendinglist" style="width:130%">
                            <thead style="background-color:#2b3751;" class="text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Submitted On.</th>
                                    <th style="width: 25%;">Applicant Names</th>
                                    <th style="width: 10%;">Request Amount</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                          </table>
                        </div>
                	
                      </div>

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
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="{{ asset('js/script.js')}}"></script>
    <script src="{{ asset('js/app-pending.js')}}"></script>
        
    <!-- Plugin used-->
  </body>
</html>