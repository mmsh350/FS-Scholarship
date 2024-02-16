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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
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
            <h5 class="f-w-700"> Agent Dashboard - <span class="badge badge-primary border border-rounded border-light f-2"> <i class="icofont icofont-ui-home"></i> {{$stateName}} State</span></h5>
            <nav>
              <ol class="breadcrumb justify-content-sm-start align-items-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"> <i data-feather="home"> </i></a></li>
                <li class="breadcrumb-item f-w-400 active">Manage Loans</li>
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
                        @if($notifycount != 0)  
                        <audio src="{{ asset('audio/notification.mp3')}}" autoplay="autoplay" ></audio>   
                        @endif
  
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
                               <h6><i>There are no new messages yet. !</i></h6>
                          </div>
                        </li>
                        @endif
  
                        @if($notifycount != 0) 
                        <li class="d-flex"> 
                          <div class="">
                              <p><a id="read" href="#">Mark Read</a></p>
                              <p style="display:none" id="done" class="text-danger">Done</p>
                          </div>
                        </li>
                        @endif
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
                      <div class="flex-grow-1"><span>{{ substr(Auth::user()->last_name, 0, 10); }} </span>
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
                          <li><a  class="active"  href="{{ route('loan') }}">Loans</a></li>
                          <li><a  href="{{ route('application') }}">Applications</a></li>
                          <li><a  href="{{ route('wallet') }}"> Fund Wallet</a></li>
                          <li><a  href="{{ route('transactions') }}">Transactions</a></li>
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
                    <h4>Manage Loans</h4>
                    <p class="mt-1 f-m-light" style="text-transform:none;">Manage loans, Repayment and send Reminders  </p>
                  </div>
                  <div class="card-body">

                     
                     <!--Close Modal ---> 
                       <!---------Repayment Modal----------->
                       <div class="modal fade repayModal"  id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="myExtraLargeModal" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color:#2b3751; border-bottom: 1px dashed white;">
                              <h4 class="modal-title txt-light" id="staticBackdropLabel">Repayment Plan</h4>
                              <svg data-bs-dismiss="modal" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                                <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)"></path><path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)"></path>
                                </svg>
                            </div>
                            <div class="modal-body dark-modal">
                              <div class="large-modal-header">
                                <!-- Preloader -->
                            <div id="modal-preloader2" style="display:none">
                              <div class="modal-preloader_status">
                              <div class="modal-preloader_spinner">
                                  <div class="d-flex justify-content-center">
                                  <div class="spinner-border" role="status"></div>
                                    Sending Mail..
                                  </div>
                              </div>
                              </div>
                          </div>
                          <div id="modal-preloader3" style="display:none">
                            <div class="modal-preloader_status">
                            <div class="modal-preloader_spinner">
                                <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status"></div>
                                  Making Repayment..
                                </div>
                            </div>
                            </div>
                        </div>
                    <!-- End Preloader -->
                          </div>
                              <div id="err3" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                              <div id="done_3" style="display:none" class="alert alert-success alert-dismissible" role="alert"></div>
                                 <div class="table-responsive ">
                                  <table class="display" style="overflow:auto" id="repaylist" style="width:130%">
                                    <thead style="background-color:#2b3751;" class="text-light">
                                        <tr>
                                            <th>SN</th>
                                            <th>Repayment</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Days</th>
                                            <th style="width:30%">Action</th>
                                        </tr>
                                    </thead>
                                  </table>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
              <!---------Repayment Modal----------->

              <!---------disburseModal ----------->
              <div class="modal fade disburseModal"  id="staticBackdrop" data-bs-backdrop="static"  tabindex="-1" aria-labelledby="myExtraLargeModal" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="background-color:#fafafa">
                    <div class="modal-header" style="background-color:#2b3751; border-bottom: 1px dashed white;">
                      <h4 class="modal-title txt-light" id="staticBackdropLabel"> <i class="fa fa-tasks" aria-hidden="true"></i>
                         Repayment Plan</h4>
                         <svg data-bs-dismiss="modal" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="32" height="32" viewBox="0 0 48 48">
                          <path fill="#F44336" d="M21.5 4.5H26.501V43.5H21.5z" transform="rotate(45.001 24 24)"></path><path fill="#F44336" d="M21.5 4.5H26.5V43.501H21.5z" transform="rotate(135.008 24 24)"></path>
                          </svg>
                    </div>
                    <div class="modal-body dark-modal">
                     
                      <div id="err2" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible mt-4" role="alert"></div>
                      <div id="done_2" style="display:none" class="alert alert-success alert-dismissible mt-4" role="alert"></div>

                       <span class="txt-danger">Kindly fill in the above repayment settings carefully, any error can lead company or applicant loss of funds.
                       When this happens it can only be adjusted from the backend.<i>if you have make mistake while entering the repayment plan
                        or any approval details kindly send a support for correction before proceeding.
                       </i>
                       <hr>
                       
                       <table class="table txt-light border border-dark" border="1" >
                        <thead style="background-color:#2b3751;">
                            <tr>
                                <th style="color:white;">Approved Amount</th>
                                <th style="color:white;">Initial Fee</th>
                                <th style="color:white;">Repayment Fee</th>
                                <th style="color:white;">10% Interest</th>
                                <th style="color:white;">Date Approved</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                        <tr>
                          <td><span id="apr_amt"> </span></td>
                          <td><span id="appr_initfee"> </span></td>
                          <td><span id="appr_monthly"> </span></td>
                          <td><span id="appr_interest"> </span></td>
                          <td><span id="appr_date"> </span></td>
                        </tr>
                      </tbody>
                      </table>
                      <p id="show_table" class="text-center mt-2"> <a href="#">Show Monthly Due dates >> </a></p>
                      <form>
                      <table id="table_repay" class="table display txt-light mt-2 border border-dark" border="1" >
                        <thead style="background-color:#2b3751;">
                            <tr>
                                <th style="color:white;">S/N</th>
                                <th style="color:white;"> Repayment Fee (mthly)</th>
                                <th style="color:white;">Due Date</th>
                               
                            </tr>
                            
                        </thead>
                        <tbody>
                        <tr>
                          <td class="txt-center">1</td>
                          <td><span id="appr_lb1"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                             <input class="form-control" name="mt1" id="mt1" type="date" value="">
                             <input class="form-control" name="app_id" id="rappid" type="hidden" value="">
                             <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><span id="appr_lb2"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt2" id="mt2" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td><span id="appr_lb3"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt3" id="mt3" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td><span id="appr_lb4"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt4" id="mt4" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td><span id="appr_lb5"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt5" id="mt5" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td><span id="appr_lb6"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt6" id="mt6" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td><span id="appr_lb7"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt7" id="mt7" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td><span id="appr_lb8"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt8" id="mt8" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td><span id="appr_lb9"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt9" id="mt9" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td><span id="appr_lb10"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt10" id="mt10" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td><span id="appr_lb11"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt11" id="mt11" type="date" value="">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td><span id="appr_lb12"> </span></td>
                          <td> 
                            <div class="col-xxl-8 col-sm-8">
                            <input class="form-control" name="mt12" id="mt12" type="date" value="">
                            </div>
                          </td>
                        </tr>
                      
                      </tbody>
                      </table>
                       
                       <div class="card-footer text-end mt-5">
                         <button class="btn btn-success" id="btnUpdate" name="btnSave" type="button">
                           <i class="fa fa-save"></i> &nbsp; Confirm & Submit<div class="lds-ring" id="spinner"><div></div><div></div><div></div><div></div></div>
                          </button>
                       </div>
                        
                      </form>
                      
                    </div>
                  </div>
                </div>
              </div>
      <!---------disburseModal----------->
              
                    <ul class="simple-wrapper nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link active txt-warning" id="pending-tabs" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" tabindex="-1" aria-selected="false"><i class="fa fa-clock-o" aria-hidden="true"></i>Pending</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link txt-dark" id="completed-tab" data-bs-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="true" ><i class="icofont icofont-tasks-alt"></i>Completed</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                      
                      <div class="tab-pane fade show active" id="pending" role="tabpanel" aria-labelledby="pending-tabs">
                        <div class="table-responsive theme-scrollbar mt-5">
                          <table class="display" style="overflow:auto" id="pendinglist" style="width:130%">
                            <thead style="background-color:#2b3751;" class="text-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th style="width: 30%;">Applicant Names</th>
                                    <th style="width: 20%;">Loan Amount</th>
                                    <th>Loan Balance</th>
                                   <th>Action</th>
                                </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                     
                      <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tabs">
                        <div class="table-responsive theme-scrollbar mt-5">
                          <table class="display" style="overflow:auto" id="completedlist" style="width:130%">
                            <thead style="background-color:#2b3751;" class="text-light">
                              <tr>
                                <th>ID</th>
                                    <th>Date</th>
                                    <th style="width: 30%;">Applicant Names</th>
                                    <th style="width: 20%;">Loan Amount</th>
                                    <th>Status</th>
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
    <script src="{{ asset('js/app3-pending.js')}}"></script>
    
        
    <!-- Plugin used-->
  </body>
</html>