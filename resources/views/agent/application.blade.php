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
    <!-- Select 2 CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/vendors/select2.css') }}">
    <style> .color-a{color:#fff !important}</style>
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
          <h5 class="f-w-700"> Agent Dashboard - <span class="badge badge-primary border border-rounded border-light f-2"> <i class="icofont icofont-ui-home"></i> {{$stateName}} State</span></h5>
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
                <li><span class="header-search">
                    <svg>
                      <use href="{{ asset('svg/icon-sprite.svg#search') }}"></use>
                    </svg></span>
                </li>
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
                      <li><a href="{{ route('dashboard') }}">Overview</a></li>
                      <li><a href="{{ route('loan') }}">Loans</a></li>
                      <li><a class="active" href="{{ route('application') }}">Applications</a></li>
                      <li><a href="{{ route('wallet') }}"> Fund Wallet</a></li>
                      <li><a href="{{ route('transactions') }}">Transactions</a></li>
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
				 <div class="row"> 
                     
                      <div class="col-md-4">
                        <div class="btn-light1-primary b-r-10"> 
                          <div class="upcoming-box"> <a href="#">
                            <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/form.png') }}" alt=""></div>
                            <h6 class="p-b-10">Submitted Application</h6>  
                             <span class="mt-2 badge rounded-circle badge-p-space border  border-primary badge-light  text-dark f-14">{{$applications->count()}}</span>
                          </div></a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box  ">  <a href="#">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/approved.png') }}" alt=""></div>
                            <h6 class="p-b-10">Approved Application</h6> 
                           <span class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$approve_count}}</span>
                          </div></a>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="btn-light1-danger b-r-10"> 
                          <div class="upcoming-box mb-0">  <a href="#">
                            <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/rejected.png') }}" alt=""></div>
                           <h6 class="p-b-10">Rejected Application</h6>
							            <span class="mt-2 badge rounded-circle badge-p-space border  border-danger badge-light  text-dark f-14">{{$reject_count}}</span>
                          </div>
                        </div> </a>
                      </div>                       
                    </div>
					
					<!------- Application ------>
          <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                      <li class="nav-item" role="presentation"><a class="nav-link txt-dark active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-newspaper"></i>My Applications</a></li>
                       @if($balance >= 1000)
                       <li class="nav-item" role="presentation"><a class="nav-link txt-dark" id="profile-icon-tabs" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false" tabindex="-1"><i class="fa fa-plus text-primary"></i>New Application</a></li>
                       @endif 
                    </ul>
                    <div class="tab-content" id="icon-tabContent">
                      <div class="tab-pane fade active show" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                     
                      <div class="alert alert-light-dark mt-3" role="alert">
                          <p style="text-transform:none" class="txt-dark ">Each application can be tracked using its status, application status are indicated using <span class="bagde badge-light text-warning">Pending</span>,  <span class="bagde badge-light text-success">Approved</span> and  <span class="bagde badge-light text-danger">Rejected</span>. 
                      
                        </div>
                        @if($balance < 1000)
                          <p class=" txt-danger">Sorry, Your wallet is insufficent,  to begin an application you need atleast 1000 Naira in your wallet.</p>
                         @endif
                         
                        <div class="table-responsive theme-scrollbar mt-4  border rounded-3 ">
                       
                    <table class="table">
                      <thead style="background-color:#2b3751;">
                        <tr class="border-bottom-primary text-light">
                          <th class="color-a">ID</th>
                          <th class="color-a"> Date</th>
                          <th class="color-a">App Name</th>
                          <th class="color-a"> Requested </th>
                          <th class="color-a"> Approved </th>
                          <th class="color-a"> Initial Fee </th>
                          <th class="color-a" width="15%"><center>Status</center></th>
                          <th class="color-a" width="15%"><center>Action</center></th>
                        </tr>
                      </thead>
                        <tbody>
                        @if($applications->count() != 0)
                        
                        @php $i = 1; @endphp
                        @foreach($applications as $data)
                        <tr class="border-bottom-secondary">
                          <th scope="row">{{ $i }}</th>
                          <td>{{ date("M j, Y", strtotime($data->created_at));}}</td>
                          <td>{{$data->names}}</td>
                          <td>{{ number_format($data->ramount, 2)}}</td>
                          <td>{{ number_format($data->approved_amount, 2)}}</td>
                          <td>
                            {{ number_format($data->initial_fee, 2)}}
                            
                            @if($data->pay_status == "Pending")
                            <i class="icofont icofont-question-circle" title="Pending initial fee payment"></i>
                            @elseif($data->pay_status == "Paid")
                            <i class="fa fa-check-circle" title="Initial fee payment Approved"></i>
                            @endif
                          </td>

                          <td>
                            <center>
                            @if($data->status == "Pending" && $data->app_verify == "0")
                                 <span class="badge badge-warning" title="Application is pending review by the staff in charge !" style="text-transform:none">
                                  <i class="icofont icofont-info-circle"></i>&nbsp;Application pending review !</span>

                            @elseif($data->status == "Pending" && $data->app_verify == "1")
                                 <span class="badge rounded-pill badge-success" title="Application has passed the verification stage" style="text-transform:none"> 
                                  <i class="icofont icofont-info-circle"></i>&nbsp; Your application has passed the <br/>verification stage</span>
                            
                            @elseif($data->status == "Approved")
                                
                                @if($data->status == "Approved" && $data->app_accept == "0")
                                  <span class="badge rounded-pill badge-success" title="Kindly accept the offer by click on the button Accept Offer !" style="text-transform:none"> 
                                    <i class="icofont icofont-info-circle"></i>&nbsp; Approved, Click on the action button <br/>to accept your Offer!</span>
                                
                                @elseif($data->status == "Approved" && $data->app_accept == "2")
                                    <span class="badge rounded-pill badge-warning" title="You have rejected the offer !" style="text-transform:none"> 
                                      <i class="icofont icofont-info-circle"></i>&nbsp; Offer rejected <br/> kindly submit a new application <br/> with neccessay document to get a new offer</span>
                                
                                @elseif($data->app_accept == "1"  && $data->disbursed == "0")
                                <span class="badge rounded-pill badge-warning" title="Awaiting disbursement !" style="text-transform:none"> 
                                 <i class="icofont icofont-info-circle"></i>&nbsp; Your application is now <br>Pending disbursement !</span>
                             
                                 @elseif($data->app_accept == "1" && $data->disbursed == "1")
                                  <span class="badge rounded-pill badge-success" title="Your Application is now disbursed !" style="text-transform:none"> 
                                    <i class="icofont icofont-info-circle"></i>&nbsp; Your application is now <br> disbursed !</span>
                                  
                               @endif
                           
                            @elseif($data->status == "Rejected")
                              <span class="badge rounded-pill badge-danger" style="text-transform:none" title="Your Application is rejected !"> 
                                <i class="icofont icofont-info-circle"></i>&nbsp; Your application is rejected <br> click on the action button to see why !</span>
                               
                            @endif
                            </center>
                          </td>
                          
                          <td> 
                           
                            @if($data->status == "Approved" && $data->app_accept == "2")
                                                          
                            @elseif($data->status == "Rejected")
                              <button class="btn btn-dark btn-sm " type="button" data-bs-toggle="modal"  data-comments="{{ $data->comments}}" data-original-title="reject" data-bs-target="#rejectModal">Reason</button>
                           
                            @elseif($data->status == "Approved" && $data->app_accept == "0" )
                              <button class="btn btn-dark" type="button" data-bs-toggle="modal"   data-id="{{$data->id}}"  data-approve="{{ number_format($data->approved_amount,2)}}" data-cat="{{$data->category}}" data-amount="{{ number_format($data->initial_fee, 2)}}" data-original-title="test" data-bs-target="#payModal">Proceed</button>
                           
                            @else
                              
                            @endif
                           
                          </td>
                        </tr>
                        @php $i++ @endphp
                        @endforeach
                        @else
                        <tr class="border-bottom-secondary">
                        <td colspan="7"> <center>No Record Found</center></td>
                        </tr>
                        @endif
                      </tbody>
                    </table>


                    <!--Modal payment-->
                    <div class="modal fade" id="payModal" aria-hidden="true" aria-labelledby="exampleModalToggle" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                              <h2 class="text-center" style=" text-decoration: underline;"><span id="cat" style=" text-decoration: underline;"></span> Offer Acceptance </h2>
                              <input type="hidden" id="app_id">

                              <h6 class="mb-3 mt-3" style="text-transform:none; color:green">Read the offer details carefully before proceeding</h6>
                             
                              <h6 class="mb-3 mt-3"> Approved Amount :  <b> &#8358;<span id="appv"></span></b></h6>
                              <h6 class="mb-3 mt-3"> Initial upfront fee: <b> &#8358;<span id="onep"></span></b></h6>
                             
                              <h6 class="mb-3 mt-3" style="text-decoration:underline;text-weight:bold">Provide Account Details below</h6>

                             <div class="row">
                              <div class="col-xxl-6 col-sm-6">
                                <label class="form-label" for="validationCustom04">Bank Name<span class="txt-danger">*</span></label>
                                <select class="form-select" name="bank_name" id="bankname">
                                  <option value="">Choose...</option>
                                  <option id='Access Bank Plc'>Access Bank Plc</option>
                                  <option id='Citibank Nigeria Limited'>Citibank Nigeria Limited</option>
                                  <option id='Ecobank Nigeria Plc'>Ecobank Nigeria Plc</option>
                                  <option id='Fidelity Bank Plc'>Fidelity Bank Plc</option>
                                  <option id='First Bank Nigeria Limited'>First Bank Nigeria Limited</option>
                                  <option id='First City Monument Bank Plc'>First City Monument Bank Plc</option>
                                  <option id='Globus Bank Limited'>Globus Bank Limited</option>
                                  <option id='Guaranty Trust Bank Plc'>Guaranty Trust Bank Plc</option>
                                  <option id='Heritage Banking Company Ltd.'>Heritage Banking Company Ltd.</option>
                                  <option id='Keystone Bank Limited'>Keystone Bank Limited</option>
                                  <option id='Parallex Bank Ltd'>Parallex Bank Ltd</option>
                                  <option id='Polaris Bank Plc'>Polaris Bank Plc</option>
                                  <option id='Premium Trust Bank'>Premium Trust Bank</option>
                                  <option id='Providus Bank'>Providus Bank</option>
                                  <option id='Stanbic IBTC Bank Plc'>Stanbic IBTC Bank Plc</option>
                                  <option id='Standard Chartered Bank Nigeria Ltd.'>Standard Chartered Bank Nigeria Ltd.</option>
                                  <option id='Sterling Bank Plc'>Sterling Bank Plc</option>
                                  <option id='SunTrust Bank Nigeria Limited'>SunTrust Bank Nigeria Limited</option>
                                  <option id='Titan Trust Bank Ltd'>Titan Trust Bank Ltd</option>
                                  <option id='Union Bank of Nigeria Plc'>Union Bank of Nigeria Plc</option>
                                  <option id='United Bank For Africa Plc'>United Bank For Africa Plc</option>
                                  <option id='Unity  Bank Plc'>Unity  Bank Plc</option>
                                  <option id='Wema Bank Plc'>Wema Bank Plc</option>
                                  <option id='Zenith Bank Plc'>Zenith Bank Plc</option>
                                </select>
                              </div>
                              <div class="col-xxl-4 col-sm-6">
                                <div class="">
                                  <label class="form-label">Account No.<span class="text-danger">*</span></label>
                                  <input class="form-control" name="account_number" id="acctno" maxlength="10" type="text" value="" >
                                </div>
                                </div>

                                <div class="col-xxl-12 col-sm-12">
                                  <div class="">
                                    <label class="form-label">Account Name.<span class="text-danger">*</span></label>
                                    <input class="form-control" name="account_name" id="acctname"  type="text" value="" >
                                  </div>
                                  </div>
                            </div>
                            
                              <h6 class="mt-4" style="text-transform:none; text-align:justify">By accepting the offer means you have agreed to the <a target="_blank" href="https://fsscholarship.com/Loan-Terms-and-Condition.pdf">terms & Conditions </a>, this also include the initial upfront fee payment of &#8358;<span class="text-danger" id="amount"> </span>
                              which will be debitted from your wallet upon the acceptance of the <span id="cat2"> </span>.
                              </h6>
                            
                              <div id="error1" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible mt-4" role="alert"></div>
                              <div id="success1" style="display:none" class="alert alert-success alert-dismissible mt-4" role="alert"></div>
                  
                              <button id="pay" class="btn btn-dark rounded-pill w-100 mt-4"><i class="icofont icofont-pay">&nbsp;</i> Accept</button>
                              <button id="reject_offer"class="btn btn-danger mt-4 rounded-pill w-100 pb-0 d" type="button" >Reject</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>

                  <!----Rejection Modal--->
                  <div class="modal fade" id="rejectModal" aria-hidden="true" aria-labelledby="exampleModalToggle" tabindex="-1">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-body">
                            <div class="modal-toggle-wrapper">
                              <h4 class="text-danger">Why Application was rejected </h4>
                              <h6 class="mt-4 mb-4" id="message" style="text-transform:none"></h6>
                              <button class="btn btn-dark rounded-pill w-100 pb-0 dark-toggle-btn" type="button" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                    
                  </div>
                  </div>
                      <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tabs">
                       
                      <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Online Application Form </h4>
                    <p class="f-m-light mt-1 mb-1" style="text-transform:none">
                       Kindly complete this form to enable us serve you better, Please Read the <a target="_blank" href="https://fsscholarship.com/Loan-Terms-and-Condition.pdf">terms & Conditions </a>before you fill this form. </p>
                       <p style="text-transform:none">Agents can submit upto 10 application on a row, to submit another application one of your application needs to be approved or decline. </p>
                       <p class="f-m-light mt-1 text-danger" style="text-transform:none"> </p>
                  
                      </div>
                      <div id="error" style="display:none; text-transform:none" class="alert alert-danger alert-dismissible" role="alert"></div>
                    <div id="success" style="display:none" class="alert alert-success alert-dismissible" role="alert"></div>
                  
                  <div class="card-body">
                    <div class="vertical-main-wizard">
                      <div class="row g-3">    
                        <div class="col-xxl-3 col-xl-4 col-12">
                          <div class="nav flex-column header-vertical-wizard" id="wizard-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="wizard-contact-tab" data-bs-toggle="pill" href="#wizard-contact" role="tab" aria-controls="wizard-contact" aria-selected="true"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-user"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Personal</h6>
                                  <p>Add your Personal details </p>
                                </div>
                              </div>
                            </a>
                              <a class="nav-link" id="next-kin-tab" data-bs-toggle="pill" href="#next-kin" role="tab" aria-controls="next-kin" aria-selected="true" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-info-circle"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Next Of Kin </h6>
                                  <p>Add Next of Kin details</p>
                                </div>
                              </div></a>
                              
                              
                              <a class="nav-link" id="education-tab" data-bs-toggle="pill" href="#education" role="tab" aria-controls="wizard-banking" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-graduation-cap"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Education</h6>
                                  <p>Add Study Details</p>
                                </div>
                              </div></a>

                              <a class="nav-link" id="gurantor-tab" data-bs-toggle="pill" href="#gurantor" role="tab" aria-controls="wizard-banking" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-info-circle"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Guarantor</h6>
                                  <p>Add Guarantor Details</p>
                                </div>
                              </div></a>

                              <a class="nav-link" id="school-tab" data-bs-toggle="pill" href="#school" role="tab" aria-controls="school" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-info-circle"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Head of School</h6>
                                  <p>Add Head of School Details</p>
                                </div>
                              </div></a>

                              <a class="nav-link" id="media-tab" data-bs-toggle="pill" href="#media" role="tab" aria-controls="media" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-file"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Upload</h6>
                                  <p> Upload required Documents</p>
                                </div>
                              </div></a>
                            
                            </div>
                        </div>
                        <div class="col-xxl-9 col-xl-8 col-12">
                          <div class="tab-content" id="wizard-tabContent">
                            <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                            <form class="row g-3  custom-input" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                    <div class="col-xxl-4 col-sm-4">
                                      <label class="form-label" for="validationCustom04">Category<span class="txt-danger">*</span></label>
                                      <select class="form-select" name="category" id="category">
                                        <option value="">Choose...</option>
                                        <option>Student Loan </option>
                                        <option>Scholarship </option>
                                      </select>
                                    </div>
                                    
                                    <div class="col-xxl-8 col-sm-8">
                                    <label class="form-label" for="validationCustom0-a">Applicant Names<span class="txt-danger">*</span></label>
                                    <input class="form-control" name="applicant_Names" id="applicant_Name"type="text">
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                    <div class="">
                                    <label class="form-label" for="validationCustom-b">Date of Birth<span class="txt-danger">*</span></label>
                                    <input class="form-control digits" name="dob" id="dob" type="date">
                                    </div>
                                    </div>

                                    <div class="col-xxl-5 col-sm-6">
                                    <div class="">
                                      <label class="form-label">Gender <span class="txt-danger">*</span></label>
                                      <select name="gender" id="gender" class="form-control btn-square">
                                        <option value="">Choose </option>
                                        <option value="Male">Male </option>
                                        <option value="Female">Female </option>
                                      </select>
                                    </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                    <div class="">
                                      <label class="form-label">Phone No.<span class="text-danger">*</span></label>
                                      <input class="form-control" name="phone_no" id="phone_no" maxlength="11" type="text">
                                    </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                      <label class="form-label" for="validationemail-b">Email<span class="txt-danger">*</span></label>
                                      <input class="form-control" id="email_id" name="email_id" type="email">
                                    </div>

                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Country<span class="txt-danger">*</span></label>
                                      <select class="form-select" name="country" id="country" >
                                    <option value="">Choose...</option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Nationality<span class="txt-danger">*</span></label>
                                     <select class="form-select" name="nationality" id="nationality" >
                                        <option value="">Choose...</option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="State">State<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="state" name="state" >
                                        <option value="">Choose...</option>
                                      </select>
                                      </div>

                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">L.G.A<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="lga" name="lga" >
                                        <option value="">Loading...</option>
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="form-label">Current Home Address<span class="txt-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="caddress" name="caddress" placeholder="Enter your home Address">{{ Auth::user()->address}}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nearest Bus Stop<span class="txt-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="nbus_address" name="nbus_address"></textarea>
                                    </div>

                                    <div class="mb-3 mt-3 col-md-6">
                                    <label class="form-label" for="formFileMultiple">Recent Passport<span class="txt-danger">*</span></label>
                                    <input class="form-control" name="image" id="image" type="file">
                                  </div>

                                  <div class="mb-3 mt-3 col-md-6">
                                  <center><img class="img-100 rounded" id="preview"  src="{{ asset('images/images.png')}}" width="100px" height="100px" /></center>
                                  </div>


                                    <div class="col-md-12  rounded" style=" border: 1px dashed rgba(106, 113, 133, 0.3);"><label class="form-label" style="text-transform:none" for="formFileMultiple">Do you study Abroad ?</label>
                                      <div class="mb-3 d-flex gap-3 checkbox-checked">
                                          <div class="form-check"> 
                                            <input class="form-check radio radio-primary"  id="flexRadioDefault1" value="Yes"  type="radio" name="flexRadioDefault">
                                            <label class="form-check-label mb-0" for="flexRadioDefault1">Yes </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check radio radio-primary"  id="flexRadioDefault2" value="No" type="radio" name="flexRadioDefault" checked="">
                                            <label class="form-check-label mb-0" for="flexRadioDefault2">No</label>
                                          </div>
                                      </div>
                                    </div>

                                   
                                    <div class="col-xxl-4 col-sm-6" style="display:none" id="intPhone">
                                      <div class="">
                                        <label class="form-label">International Phone No.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="intl_phone" id="phone" maxlength="11" type="text">
                                      </div>
                                    </div>

                                    <div class="col-md-12" id="intaddr" style="display:none" >
                                        <label class="form-label">International Address <span class="txt-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="intl_address" name="intl_address"></textarea>
                                    </div>

                                    <div class="col-12 text-end"> 
                                      <a href="#" class="btn btn-dark" id="next1">Next <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            
                            <div class="tab-pane fade" id="next-kin" role="tabpanel" aria-labelledby="next-kin-tab">
                                  <div class="row">
                                  <div class="col-xxl-4 col-sm-4">
                                      <label class="form-label" for="validationCustom04">Title<span class="txt-danger">*</span></label>
                                      <select class="form-select" name="title" id="title" >
                                        <option value="">Choose...</option>
                                        <option>Mr</option>
                                        <option>Mrs</option>
                                        <option>Miss</option>
                                      </select>
                                    </div>
                                    <div class="col-xxl-8 col-sm-8">
                                      <label class="form-label" for="validationCustom04">Relationship<span class="txt-danger">*</span></label>
                                      <select class="form-select" name="nok_rel" id="nok_rel" >
                                        <option value="">Choose...</option>
                                        <option>Father</option>
                                        <option>Mother</option>
                                        <option>Son</option>
                                        <option>Daughter</option>
                                        <option>Husband</option>
                                        <option>Wife</option>
                                        <option>Brother</option>
                                        <option>Sister</option>
                                        <option>Friend</option>
                                        <option>Relative</option>
                                      </select>
                                    </div>
                                                                
                                <div class="col-md-4 col-sm-4 mt-3">
                                  <label class="form-label" for="validationDates">Next of Kin (Full Name)<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="nok_sname" id="nok_sname" type="text"  placeholder="Surname">
                                </div>

                                <div class="col-md-4 col-sm-4  mt-3">
                                  <label class="form-label" for="validationDates">&nbsp;</label>
                                  <input class="form-control" id="nok_fname" name="nok_fname" type="text"  placeholder="First Name">
                                </div>

                                <div class="col-md-4 col-sm-4  mt-3">
                                  <label class="form-label" for="validationDates">&nbsp;</label>
                                  <input class="form-control" id="nok_mname" name="nok_mname" type="text"  placeholder="Middle Name">
                                </div>
                                <div class="col-xxl-6 col-sm-6 mt-3">
                                      <label class="form-label" for="validationCustom04">Gender<span class="txt-danger">*</span></label>
                                      <select class="form-select" name="nok_gender" id="nok_gender" >
                                        <option value="">Choose...</option>
                                        <option value="Male">Male </option>
                                        <option value="Female">Female </option>
                                      </select>
                                    </div>
                                <div class="col-md-6 col-sm-6  mt-3">
                                  <label class="form-label" for="dob">Date of Birth<span class="txt-danger">*</span></label>
                                  <input class="form-control" id="nok_dob" name="nok_dob" type="date" >
                                </div>

                                <div class="col-md-6 col-sm-6  mt-3">
                                  <label class="form-label" for="">Phone Number<span class="txt-danger">*</span></label>
                                  <input class="form-control" name="nok_phone" maxlength="11" id="next_of_kin_phone" type="text" >
                                </div>
                                 
                                <div class="col-md-6 col-sm-6 mt-3">
                                  <label class="form-label" for="">Email Address</label>
                                  <input class="form-control" id="nok_email" name="nok_email" type="email" >
                                </div>

                                <div class="col-xxl-6 col-sm-6 mt-3">
                                      <label class="form-label" for="validationCustom04">State<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="nok_state" name="nok_state">
                                        <option value="">Choose...</option>
                                      </select>
                                    </div>
                
                                    <div class="col-xxl-6 col-sm-6 mt-3">
                                      <label class="form-label" for="validationCustom04">LGA<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="nok_lga" name="nok_lga" >
                                        <option value="">Choose...</option>
                                      </select>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                    <label class="form-label">Current Home Address<span class="txt-danger">*</span></label>
                                    <textarea class="form-control" rows="3" id="nok_address" name="nok_address"></textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label class="form-label">Nearest Bus Stop<span class="txt-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="nok_bus_stop" name="nok_bus_stop"></textarea>
                                    </div>

                                <div class="col-12 text-end mt-4"> 
                                  <a href="#" class="btn btn-dark" id="pre1"><i class="fa fa-arrow-circle-left"></i> Previous</a>
                                  <a href="#" class="btn btn-dark" id="next2">Next <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div> 
                          </div>

                            <div class="tab-pane fade custom-input" id="education" role="tabpanel" aria-labelledby="wizard-education-tab">
                              
                              <div class="row">
                                   <div class="col-xxl-4 col-sm-4">
                                      <label class="form-label" for="validationCustom04">Category<span class="txt-danger">*</span></label>
                                      <select class="js-example-basic-single" id="schl_category" name="schl_category" >
                                        <option value="">Choose...</option>
                                        <option>University</option>
                                        <option>Polytechnics/Monotechnics/Colleges</option>
                                        <option>Secondary Schools</option>
                                      </select>
                                    </div>
                                    <div class="col-xxl-8 col-sm-8"><!--js-searchBox-->
                                      <label class="form-label" for="validationCustom04">School<span class="txt-danger">*</span></label>
                                      <select class="js-example-basic-single col-sm-6 " id="school_name" name="school_name">
                                        <option value="">Choose...</option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-4 col-sm-4  mt-3">
                                      <label class="form-label" for="validationCustom04">Section<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="section" name="section" >
                                        <option value="">Choose...</option>
                                        <option>JSS </option>
                                        <option>SS </option>
                                        <option>NCE </option>
                                        <option>ND/HND </option>
                                        <option>DEGREE </option>
                                        <option>MASTERS </option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-8 col-sm-8 mt-3"  id="">
                                      <div class="">
                                        <label class="form-label">Course of Study<span class="text-danger">*</span></label>
                                        <input class="form-control" name="course" id="course"  type="text">
                                      </div>
                                    </div>
                                    <div class="col-xxl-4 col-sm-6 mt-3"  id="">
                                      <div class="">
                                        <label class="form-label">No of years<span class="text-danger">*</span></label>
                                        <input class="form-control" name="no_of_years" maxlength="1" value="1" id="no_of_years" type="text">
                                      </div>
                                    </div>
                                    <div class="col-xxl-4 col-sm-6 mt-3"  id="">
                                      <div class="">
                                        <label class="form-label">Requested Amount.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="ramount" maxlength="8" id="ramount" type="text">
                                      </div>
                                    </div>
                              
                                <div class="col-12 text-end mt-3"> 
                                  <a href="#" class="btn btn-dark" id="pre2"><i class="fa fa-arrow-circle-left"></i>&nbsp; Previous</a>
                                  <a href="#" class="btn btn-dark" id="next3">Next <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                               
                                </div>
                               </div>


                            <div class="tab-pane fade custom-input" id="gurantor" role="tabpanel" aria-labelledby="wizard-banking-tab">
                               
                            <div class="row g-3 mb-3 needs-validation">

                            <div class="col-xxl-12 col-sm-12" id="">
                                      <div class="">
                                        <label class="form-label"><span class="badge badge-dark">Gurantor 1 </span></label>
                                       </div>
                                </div>

                                <div class="col-xxl-6 col-sm-6" id="">
                                      <div class="">
                                        <label class="form-label">Names<span class="text-danger">*</span></label>
                                        <input class="form-control" name="gname" id="gname" type="text"  >
                                      </div>
                                </div>
                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Relationship<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="grelationship"  name="grelationship">
                                        <option value="">Choose...</option>
                                        <option>Father</option>
                                        <option>Mother</option>
                                        <option>Son</option>
                                        <option>Daughter</option>
                                        <option>Husband</option>
                                        <option>Wife</option>
                                        <option>Brother</option>
                                        <option>Sister</option>
                                        <option>Friend</option>
                                        <option>Relative</option>
                                      </select>
                                    </div>
                                    <div class="col-xxl-4 col-sm-6" >
                                      <div class="">
                                        <label class="form-label">Phone No.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="gphone" maxlength="11" id="gphone" type="text">
                                      </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                      <div class="">
                                        <label class="form-label">Email Address.</label>
                                        <input class="form-control" name="gemail" id="gemail" type="text" >
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Home Address<span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="gaddress" name="gaddress"></textarea>
                                    </div>

                                    <!-------Gurantor 2---->

                                    <div class="">
                                        <label class="form-label"><span class="badge badge-dark">Gurantor 2</span></label>
                                       </div>

                                       <div class="col-xxl-6 col-sm-6" id="">
                                      <div class="">
                                        <label class="form-label">Names<span class="text-danger">*</span></label>
                                        <input class="form-control" name="gname2" id="gname2" type="text">
                                      </div>
                                </div>
                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Relationship<span class="txt-danger">*</span></label>
                                      <select class="form-select" id="grelationship2" name="grelationship2">
                                      <option value="">Choose...</option>
                                      <option>Father</option>
                                      <option>Mother</option>
                                      <option>Son</option>
                                      <option>Daughter</option>
                                      <option>Husband</option>
                                      <option>Wife</option>
                                      <option>Brother</option>
                                      <option>Sister</option>
                                      <option>Friend</option>
                                      <option>Relative</option>
                                      </select>
                                    </div>
                                    <div class="col-xxl-4 col-sm-6">
                                      <div class="">
                                        <label class="form-label">Phone No.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="gphone2" maxlength="11" id="gphone2" type="text">
                                      </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                      <div class="">
                                        <label class="form-label">Email Address.</label>
                                        <input class="form-control" name="gemail2" id="gemail2" type="email">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Home Address<span class="txt-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="gaddress2" name="gaddress2"></textarea>
                                    </div>
                                
                                <div class="col-12 text-end mt-3"> 
                                  <a href="#" class="btn btn-dark" id="pre3"><i class="fa fa-arrow-circle-left"></i> Previous</a>
                                  <a href="#" class="btn btn-dark" id="next4">Next <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                              
                                </div> </div>



                            <div class="tab-pane fade custom-input" id="school" role="tabpanel" aria-labelledby="wizard-banking-tab">
                              <div class="row g-3 mb-3">
                                 
                                   <div class="col-xxl-6 col-sm-6" id="">
                                      <div class="">
                                        <label class="form-label">Head of School<span class="text-danger">*</span></label>
                                        <input class="form-control" name="hos_name" id="head_of_schl_name" type="text">
                                      </div>
                                    </div>

                                    <div class="col-xxl-6 col-sm-6">
                                        <label class="form-label">Phone No.<span class="text-danger">*</span></label>
                                        <input class="form-control" maxlength="11" name="hos_phone" id="hos_phone" maxlength="11" type="text">
                                      </div>
                                   
                                    <div class="col-xxl-6 col-sm-6" id="">
                                      <div class="">
                                        <label class="form-label">Email Address.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="hos_email" id="hos_email" type="text">
                                      </div>
                                    </div>
                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">State<span class="text-danger">*</span></label>
                                      <select class="form-select" name="hos_state" id="hos_state" >
                                        <option value="">Choose...</option>
                                      </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">City<span class="text-danger">*</span></label>
                                        <input class="form-control" name="hos_city" id="hos_city" type="text">
                                    </div>
                                    <div class="col-xxl-12 col-sm-12">
                                      <div class="">
                                        <label class="form-label">School Address<span class="text-danger">*</span></label>
                                        <textarea class="form-control" rows="3" id="hos_address" name="hos_address"></textarea>
                                      </div>
                                    </div>

                                <div class="col-12 text-end"> 
                                  <a href="#" class="btn btn-dark" id="pre4"><i class="fa fa-arrow-circle-left"></i> Previous</a>
                                  <a href="#" class="btn btn-dark" id="next5">Next <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                </div>
                            </div>

                            <div class="tab-pane fade custom-input" id="media" role="tabpanel" aria-labelledby="wizard-banking-tab">
                              <div class="row g-3 mb-3">
                                 
                                   <div class="col-xxl-6 col-sm-6" id="">
                                      <div class="">
                                        <label class="form-label">Documents Upload<span class="text-danger">*</span></label>
                                        </div>
                                    </div>

                                    <div class="mb-3 mt-3">
                                    <label class="form-label" for="formFileMultiple" style="text-transform:none">Kindly Upload a PDF file containig the required document(student id card, recent payment slip,addmission letter, and offline form duly signed and stamped)
                                     Click here to <a href="https://fsscholarship.com/Offline-Form.pdf" target="_blank"><i class="fa fa-download"></i>&nbsp;Download form</a> .
                                    </label>
                                    
                                    </div>
                                    <div class="mb-5 mt-5">
                                    <input class="form-control" name="file" id="file" type="file">
                                   </div>
                                <div class="col-12 text-end"> 
                                  <a href="#" class="btn btn-dark" id="pre5"><i class="fa fa-arrow-circle-left"></i> Previous</a>
                                  <button id="submit" type="button" class="btn btn-dark">Finish</button>
                                  
                                </div>
                                </div>
                            </div>

                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                      <!--End --->
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
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright d-flex flex-wrap align-items-center justify-content-between">
                <p class="mb-0 f-w-600">Copyright©fee24 Consultant LTD <script>document.write(new Date().getFullYear())</script></p>
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
    <script src="{{ asset('js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('js/datatable/datatables/datatable.custom1.js') }}"></script>
    <script src="{{ asset('js/loadstates.js') }}"></script>
    <script src="{{ asset('js/loadlga.js') }}"></script>
    <script src="{{ asset('js/init_fees.js') }}"></script>
    <script src="{{ asset('js/loadcountries.js') }}"></script>
    <script src="{{ asset('js/loadschools.js') }}"></script>

    <!-- Touchspin JS -->
    <script src="{{ asset('js/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/select2/select2-custom.js') }}"></script>
     
    <script src="{{ asset('js/logout.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/app_handler.js') }}"></script>
    <!-- Plugin used-->
  </body>
</html>