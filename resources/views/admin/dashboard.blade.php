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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/datatables.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/sweetalert.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <style> .light-a { color:white !important}</style>
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
          <h4 class="f-w-700"> Admin Dashboard </h4>
          <nav>
            <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"> </i></a></li>
              <li class="breadcrumb-item f-w-400">Dashboard</li>
              <li class="breadcrumb-item f-w-400 active">Overview</li>
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
                    <div class="flex-grow-1"><span>{{ Auth::user()->last_name; }} </span>
                      <p class="mb-0 font-outfit">{{ ucwords(Auth::user()->role) }}<i class="fa fa-angle-down"></i></p>
                    </div>
                  </div>
                  <ul class="profile-dropdown onhover-show-div">
                    <li><a href="{{ route('profile.edit') }}"><i data-feather="user"></i><span>Account</span></a></li>
                    <li>
                     <a href="#" id="logout" onclick="logout();"> <i data-feather="log-out"> </i><span> Sign Out</span></a>
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
                   
                  
                  <li class="sidebar-list" > 
                      <a class="sidebar-link sidebar-title active"  href="javascript:void(0)">
                      <svg class="stroke-icon">
                        <use href="{{ asset('svg/icon-sprite.svg#stroke-home') }}"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="{{ asset('svg/icon-sprite.svg#fill-home') }}"></use>
                      </svg><span>Dashboard</span></a>
                      <ul class="sidebar-submenu expand">
                        <li><a class="active" href="{{ route('dashboard') }}">Overview</a></li>
                        <li><a  href="{{ route('admin.users') }}">Users</a></li>
                        <li><a class="" href="{{ route('admin.applications') }}">Applications</a></li>
                        <li><a href="{{ route('admin.schools') }}">Schools</a></li>
                        <li><a class="" href="{{ route('admin.activities') }}">Activities</a></li>
                        <li><a href="{{ route('admin.wallet') }}"> Fund Wallet</a></li>
                        <li><a href="{{ route('admin.transactions') }}">Transactions</a></li> 
                        <li><a href="{{ route('admin.reports') }}">Generate Report</a></li> 
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
          <div class="container-fluid dashboard-2">
            <div class="row">
				 
            
              <div class="col-md-4">
                <div class="btn-light1-success b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/interest.png') }}" alt=""></div>
                    <h6 class="p-b-10">Loan Interest</h6>  
                        <span class="f-16 txt-dark"> &#8358; {{ number_format($interest, 2); }}</span>
                  </div></a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="btn-light1-secondary b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-secondary"> <img src="{{ asset('images/dashboard-2/svg-icon/wallet2.png') }}" alt=""></div>
                    <h6 class="p-b-10">Wallet Value</h6>  
                        <span class="f-16 txt-dark">&#8358; {{ number_format($wallet_bal, 2); }}</span>
                  </div></a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="btn-light1-primary b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/payments.png') }}" alt=""></div>
                    <h6 class="p-b-10">Upfront Fee</h6>  
                    <span class="f-16 txt-dark">&#8358; {{ number_format($upfront, 2); }}</span>
                  </div></a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="btn-light1-danger b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/loan.png') }}" alt=""></div>
                    <h6 class="p-b-10">Loan</h6>  
                    <span class="f-16 txt-dark">&#8358; {{ number_format($disbursed_amt, 2); }}</span>
                  </div></a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="btn-light1-dark b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-dark"> <img src="{{ asset('images/dashboard-2/svg-icon/repay.png') }}" alt=""></div>
                    <h6 class="p-b-10">Repayment</h6>  
                    <span class="f-16 txt-dark">&#8358; {{ number_format($repay, 2); }}</span>
                  </div></a>
                </div>
              </div>

              <div class="col-md-4">
                <div class="btn-light1-info b-r-10"> 
                  <div class="upcoming-box"> <a href="#">
                    <div class="upcoming-icon bg-info"> <img src="{{ asset('images/dashboard-2/svg-icon/gift.png') }}" alt=""></div>
                    <h6 class="p-b-10">Scholarship</h6>  
                    <span class="f-16 txt-dark">&#8358; {{ number_format($disbursed_schl, 2); }}</span>
                  </div></a>
                </div>
              </div>
            </div>
            
             

              <div id="more" class="row" style="display:none" > 

                      <div class="col-md-6" >
                        <div class="btn-light1-primary b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/form.png') }}" alt=""></div>
                            <h6 class="p-b-10">Applications</h6>  
                             <span id="app_total_count" class="mt-2 badge rounded-circle badge-p-space border  border-primary badge-light  text-dark f-14">{{$app_total_count}}</span>
                          </div></a>
                        </div>
                      </div>


                      <div class="col-md-3"  >
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box">  <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/approved.png') }}" alt=""></div>
                           <h6 class="p-b-10">Verified</h6>
							                <span id="verify_count" class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$verify_count}}</span>
                             <span hidden id="verified" >{{ $verify_count }}</span>
                            </div>
                        </div> </a>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box ">  <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/approved2.png') }}" alt=""></div>
                           <h6 class="p-b-10">Approved</h6>
							                <span id="app_approve_count" class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$app_approve_count}}</span>
                            </div>
                        </div> </a>
                      </div>

                      <div class="col-md-6">
                        <div class="btn-light1-danger b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/rejected.png') }}" alt=""></div>
                            <h6 class="p-b-10">Rejected</h6>  
                             <span id="reject_count" class="mt-2 badge rounded-circle badge-p-space border  border-danger badge-light  text-dark f-14">{{ $reject_count }}</span>
                          </div></a>
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="btn-light1-warning b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-warning"> <img src="{{ asset('images/dashboard-2/svg-icon/pending.png') }}" alt=""></div>
                            <h6 class="p-b-10">Pending Verification</h6>  
                             <span id="pending_verify_count" class="mt-2 badge rounded-circle badge-p-space border  border-warning badge-light  text-dark f-14">{{ $pending_verify_count }}</span>
                          </div></a>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-warning b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('admin.applications') }}">
                            <div class="upcoming-icon bg-warning"> <img src="{{ asset('images/dashboard-2/svg-icon/processing.png') }}" alt=""></div>
                            <h6 class="p-b-10">Pending Approval</h6>  
                             <span id="pending-approval" class="mt-2 badge rounded-circle badge-p-space border border-warning badge-light  text-dark f-14">{{ $pending_approval_count }}</span>
                          </div></a>
                        </div>
                      </div>

                   
                      <div class="col-md-6">
                        <div class="btn-light1-dark b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.schools') }}">
                            <div class="upcoming-icon bg-dark"> <img src="{{ asset('images/dashboard-2/svg-icon/school.png') }}" alt=""></div>
                            <h6 class="p-b-10">Schools/Institution</h6> 
                           <span id="schools" class="mt-2 badge rounded-circle badge-p-space border  border-dark badge-light  text-dark f-14">{{$school_count}}</span>
                          </div></a>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.schools') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/school.png') }}" alt=""></div>
                            <h6 class="p-b-10">Active</h6> 
                           <span id="schools" class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$school_count_active}}</span>
                          </div></a>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-danger b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.schools') }}">
                            <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/school.png') }}" alt=""></div>
                            <h6 class="p-b-10">In Active</h6> 
                           <span id="schools" class="mt-2 badge rounded-circle badge-p-space border  border-danger badge-light  text-dark f-14">{{$school_count_inactive}}</span>
                          </div></a>
                        </div>
                      </div>
                     

                      <div class="col-md-4">
                        <div class="btn-light1-info b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.users') }}">
                            <div class="upcoming-icon bg-info"> <img src="{{ asset('images/dashboard-2/svg-icon/users.png') }}" alt=""></div>
                            <h6 class="p-b-10">Agents</h6> 
                           <span id="agents" class="mt-2 badge rounded-circle badge-p-space border  border-info badge-light  text-dark f-14">{{$agent_count}}</span>
                          </div></a>
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.users') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/users.png') }}" alt=""></div>
                            <h6 class="p-b-10">Staff</h6> 
                           <span id="agents" class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$staff_count}}</span>
                          </div></a>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="btn-light1-secondary b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('admin.users') }}">
                            <div class="upcoming-icon bg-secondary"> <img src="{{ asset('images/dashboard-2/svg-icon/users.png') }}" alt=""></div>
                            <h6 class="p-b-10">Applicant</h6> 
                           <span id="agents" class="mt-2 badge rounded-circle badge-p-space border  border-secondary badge-light  text-dark f-14">{{$applicant_count}}</span>
                          </div></a>
                        </div>
                      </div>

                    
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <ul class="fw-bold list-group list-group-horizontal-sm pb-1">
                          <li class="list-group-item  bg-dark"><i class="fa fa-history txt-danger "></i><a href="{{ route('admin.transactions') }}" style="color: #fff; text-decoration: none;">All Transactions</a></li>
                          <li class="list-group-item bg-secondary"><i class="fa fa-list-alt" aria-hidden="true"></i> <a href="#" style="color: #f3f3f3; text-decoration: none;" id="show">Tiles [in/out]</a></li>
                          <li class="list-group-item bg-info"><a style="color: #000; text-decoration: none;" href="#graph"><i class="fa fa-bar-chart" aria-hidden="true"></i> Graphical Data</a></li>
                          <li class="list-group-item bg-warning"><a style="color: #f3f3f3; text-decoration: none;" href="{{ route('admin.users') }}"><i class="fa fa-users" aria-hidden="true"></i> Accounts </a></li>
                          <li class="list-group-item bg-success"><a style="color: #f3f3f3; text-decoration: none;" href="{{ route('admin.applications')  }}"><i class="fa fa-tasks" aria-hidden="true"></i> Applications </a></li>
                          <li class="list-group-item bg-light"> <a style="color: #000; text-decoration: none;" href="{{ route('admin.schools')  }}"><i class="fa fa-institution"></i>Schools</a></li>
                          <li class="list-group-item bg-danger"> <a style="color: #f3f3f3; text-decoration: none;" href="{{ route('admin.activities')  }}"><i class="fa fa-hand-o-right"></i> Activities</a></li>
                        </ul>
                      </div>
                        <div class="tab-pane fade active show" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                      <div class="table-responsive  bg-white theme-scrollbar mt-4  border rounded-3 ">
                        <table class="table">
                          <thead style="background-color:#2b3751;">
                            <tr class="border-bottom-primary">
                              <th class="light-a">ID</th>
                              <th class="light-a">Transaction Date</th>
                              <th class="light-a">Reference Number</th>
                              <th class="light-a">Payer Name</th>
                              <th class="light-a">Payer Phone </th>
                              <th class="light-a">Service Description</th>
                              <th class="light-a"><center>Amount (NGN)</center></th>
                            </tr>
                          </thead>
                          
                            <tbody>
                            @if($transactions != null)
    
                            @php $i = 1; @endphp
                           @foreach($transactions as $data)
                          <tr class="border-bottom-secondary">
                              <th scope="row">{{ $i }}</th>
                              <td>{{ $data->created_at}}</td>
                              <td>{{ $data->referenceId}}</td>
                              <td>{{ $data->payer_name}}</td>
                              <td>{{ $data->payer_phone}}</td>
                              <td>{{ $data->service_description}}</td>
                            
                              <td> 
                                <center>
                                @if($data->type == "plus")
                                <span class="badge badge-light-success">{{ number_format($data->amount, 2)}}</span>
                                @else
                                <span class="badge badge-light-danger">{{ number_format($data->amount, 2)}}</span>
                                @endif
                                </center>
                              </td>
                              
                          </tr>
                          @php $i++ @endphp
                          @endforeach
                          @else
                          <tr class="border-bottom-secondary">
                          <td> No Record Found</td>
                          </tr>
                         
                          
                          @endif
                          </tbody>
                            
                             
                          
                        </table>
                      </div>
                    </div>   
                    
                        
                  </div>             
                   
                </div>
              <div class="row"> 
					<!-------Might remove----->
                    <div id="graph" class="col-xl-4 col-xl-12 col-md-12 proorder-md-1 mt-2"> 
                        <div class="card">
                          <div class="card-header">
                            <h4>Graphical Data</h4>
                            <div class="card-header-right">
                              <ul class="list-unstyled card-option">
                                <li><i class="icon-more-alt"></i></li>
                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                              </ul>
                            </div>
                          </div>
                          <div class="card-body">
                            <p class="mb-1   pb-0 " style="text-align:justify"></p>
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-md-6  ">
                                       <div id="container" style="height: 370px; width: 100%;"></div>
                                     </div>
                                    <div class="col-md-6">
                                      <div id="container2" style="height: 370px; width: 100%;"></div>
                                    </div>
                                    <div class="col-md-12">
                                      Application by states
                                      <div id="container3" style="height: 800px; width: 100%;"></div>
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
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                <p class="mb-0 f-w-600">Copyright©<script>document.write(new Date().getFullYear())</script> Fee24 Consultant Limited. All rights reserved.</p>
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
    <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.3.2/dist/echarts.min.js"></script>
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
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
    $(document).ready(function() {  

      var _token = $('#_token').val(); 
            //More Option
            $('#show').click(function() {
                $('#more').toggle("slide");
            });

            //Get counts and generate Graph
            let app_total_count = $('#app_total_count').html();
            let pendingApproval = $('#pending-approval').html();
            let app_approve_count = $('#app_approve_count').html();
            let verified = $('#verified').html();
            let reject_count = $('#reject_count').html();           
            
            setchart1(pendingApproval,app_approve_count,reject_count);

            //let schools=  $('#schools').html();;
            //let agents= $('#agents').html();
            setchart2(app_total_count,verified,app_approve_count,pendingApproval,reject_count);
   
					
					
				function setchart1(pendingApproval,app_approve_count,reject_count){
					var dom = document.getElementById('container');
					var myChart = echarts.init(dom, null, {
					  renderer: 'canvas',
					  useDirtyRect: false
					});
					var app = {};
					
					var option;

					option = {
                                title: {
                                text: 'Applications',
                                subtext: 'submitted',
                                left: 'center'
				  },
				  tooltip: {
					trigger: 'item'
				  },
				  legend: {
					orient: 'vertical',
					left: 'left'
				  },
				  series: [
					{
					  name: 'Total',
					  type: 'pie',
					  radius: '50%',
					  data: [
            { value: verified, name: 'Verified', itemStyle:{ color: 'blue'} },
						{ value: app_approve_count, name: 'Approved' , itemStyle:{ color: 'green'} },
            { value: pendingApproval, name: 'Pending' , itemStyle:{ color: 'yellow'} },
						{ value: reject_count, name: 'Rejected' , itemStyle:{ color: 'red'} },
                        
						
					  ],
					  emphasis: {
						itemStyle: {
						  shadowBlur: 10,
						  shadowOffsetX: 0,
						  shadowColor: 'rgba(0, 0, 0, 0.5)'
						}
					  }
					}
				  ]
				};

					if (option && typeof option === 'object') {
					  myChart.setOption(option);
					}

					window.addEventListener('resize', myChart.resize);
					
				}
				
				
				function setchart2(app_total_count,verified,app_approve_count,pendingApproval,reject_count)
                {
					
					var app = {};

                    var chartDom = document.getElementById('container2');
                    var myChart = echarts.init(chartDom);
                    var option;

                    option = {
                            xAxis: {
                              type: 'category',
                              data: ['Apps', 'Verified', 'Approved', 'Pending', 'Rejected']
                            },
                            yAxis: {
                              type: 'value'
                            },
                            series: [
                              {
                                data: [
                                
                                  {
                                    value: app_total_count,
                                    itemStyle: {
                                      color: '#a90000'
                                    }
                                  },
                                  {
                                    value: verified,
                                    itemStyle: {
                                      color: 'blue'
                                    }
                                  },
                                  {
                                    value: app_approve_count,
                                    itemStyle: {
                                      color: 'green'
                                    }
                                  },
                                  {
                                    value: pendingApproval,
                                    itemStyle: {
                                      color: 'yellow'
                                    }
                                  },
                                  {
                                    value: reject_count,
                                    itemStyle: {
                                      color: 'red'
                                    }
                                  },
                                  
                                ],
                                type: 'bar'
                              }
                            ]
                          };

                    option && myChart.setOption(option);

                    window.addEventListener('resize', myChart.resize);
                                }

        $.ajax({
            url: 'get-statecount',
            type: "GET",
            data:{_token},
            dataType: "json",
            success: function(data) {
             

              var chartDom = document.getElementById('container3');
              var myChart = echarts.init(chartDom);
              var option;

              option = {
                dataset: {
                  source: [
                    ['score', 'Total', 'product'],
                    [ data[1], data[1], 'Abia'],
                    [ data[2], data[2], 'Adamawa'],
                    [ data[3], data[3], 'Akwa Ibom'],
                    [ data[4], data[4], 'Anambra'],
                    [ data[5], data[5], 'Bauchi'],
                    [ data[6], data[6], 'Bayelsa'],
                    [ data[7], data[7], 'Benue'],
                    [ data[8], data[8], 'Borno'],
                    [ data[9], data[9], 'Cross River'],
                    [ data[10], data[10], 'Delta'],
                    [ data[11], data[11], 'Ebonyi'],
                    [ data[12], data[12], 'Edo'],
                    [ data[13], data[13], 'Ekiti'],
                    [ data[14], data[14], 'Enugu'],
                    [ data[15], data[15], 'FCT'],
                    [ data[16], data[16], 'Gombe'],
                    [ data[17], data[17], 'Imo'],
                    [ data[18], data[18], 'Jigawa'],
                    [ data[19], data[19], 'Kaduna'],
                    [ data[20], data[20], 'Kano'],
                    [ data[21], data[21], 'Katsina'],
                    [ data[22], data[22], 'Kebbi'],
                    [ data[23], data[23], 'Kogi'],
                    [ data[24], data[24], 'Kwara'],
                    [ data[25], data[25], 'Lagos'],
                    [ data[26], data[26], 'Nasarawa'],
                    [ data[27], data[27], 'Niger'],
                    [ data[28], data[28], 'Ogun'],
                    [ data[29], data[29], 'Ondo'],
                    [ data[30], data[30], 'Osun'],
                    [ data[31], data[31], 'Oyo'],
                    [ data[32], data[32], 'Plateau'],
                    [ data[33], data[33], 'Rivers'],
                    [ data[34], data[34], 'Sokoto'],
                    [ data[35], data[35], 'Taraba'],
                    [ data[36], data[36], 'Yobe'],
                    [ data[37], data[37], 'Zamfara'],
                  ]

                },
                grid: { containLabel: true },
                xAxis: { name: 'Total' },
                yAxis: { type: 'category' },
                visualMap: {
                  orient: 'horizontal',
                  left: 'center',
                  min: 1,
                  max: app_total_count,
                  text: ['High Score', 'Low Score'],
                  // Map the score column to color
                  dimension: 0,
                  inRange: {
                    color: ['#65B581', '#FFCE34', '#FD665F']
                  }
                },
                series: [
                  {
                    type: 'bar',
                    encode: {
                      // Map the "amount" column to X axis.
                      x: 'Total',
                      // Map the "product" column to Y axis
                      y: 'product'
                    }
                  }
                ]
              };

              option && myChart.setOption(option);
               
            },
            error: function(data) {
            
            }  
            
        }); 




     });
    </script>
    <!-- Plugin used-->
  </body>
</html>