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
          <h4 class="f-w-700"> Applicant Dashboard</h4>
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
                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Mofi .." name="q" title="" autofocus>
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
                    </svg><span class="badge rounded-pill badge-primary">4 </span>
                  </div>
                  <div class="onhover-show-div notification-dropdown">
                    <h5 class="f-18 f-w-600 mb-0 dropdown-title">Notitications                               </h5>
                    <ul class="notification-box">
                      <li class="d-flex"> 
                        <div class="flex-shrink-0 bg-light-primary"><img src="{{ asset('images/dashboard/icon/wallet.png') }}" alt="Wallet"></div>
                        <div class="flex-grow-1"> <a href="#">
                            <h6>New daily offer added</h6></a>
                          <p>New user-only offer added</p>
                        </div>
                      </li>
                      <li class="d-flex"> 
                        <div class="flex-shrink-0 bg-light-info"><img src="{{ asset('images/dashboard/icon/shield-dne.png') }}" alt="Shield-dne"></div>
                        <div class="flex-grow-1"> <a href="#">
                            <h6>Product Evaluation</h6></a>
                          <p>Changed to a new workflow</p>
                        </div>
                      </li>
                      
                     
                      <li><a class="f-w-700" href="#">Check all     </a></li>
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
                      <li><a href="{{ route('dashboard') }}">Overview</a></li>
                      <li><a href="{{ route('wallet') }}"> Wallet</a></li>
                      <li><a class="active" href="{{ route('application') }}">Applications</a></li>
                      <li><a href="{{ route('loan') }}" disabled="true">Loans</a></li>
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
                          <div class="upcoming-box"> <a href="{{ route('application') }}">
                            <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/form.png') }}" alt=""></div>
                            <h6 class="p-b-10">Submitted Application</h6>  
                             <span class="mt-2 badge rounded-circle badge-p-space border  border-primary badge-light  text-dark f-14">0</span>
                          </div></a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('application') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/approved.png') }}" alt=""></div>
                            <h6 class="p-b-10">Approved Application</h6> 
                           <span class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">0</span>
                          </div></a>
                        </div>
                      </div>
					  
					  <div class="col-md-4">
                        <div class="btn-light1-danger b-r-10"> 
                          <div class="upcoming-box mb-0">  <a href="{{ route('application') }}">
                            <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/rejected.png') }}" alt=""></div>
                           <h6 class="p-b-10">Rejected Application</h6>
							            <span class="mt-2 badge rounded-circle badge-p-space border  border-danger badge-light  text-dark f-14">0</span>
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
                      <li class="nav-item" role="presentation"><a class="nav-link txt-dark" id="profile-icon-tabs" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false" tabindex="-1"><i class="fa fa-plus text-primary"></i>New Application</a></li>
                     </ul>
                    <div class="tab-content" id="icon-tabContent">
                      <div class="tab-pane fade active show" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                     
                      <div class="alert alert-light-dark mt-3" role="alert">
                          <p style="text-transform:none" class="txt-dark ">Each application can be tracked using its status, application status are indicated using <span class="bagde badge-light text-warning">Pending</span>,  <span class="bagde badge-light text-success">Approved</span> and  <span class="bagde badge-light text-danger">Rejected</span>. 

                        </div>
                      <div class="table-responsive theme-scrollbar mt-4  border rounded-3 ">
                       
                    <table class="table">
                      <thead>
                        <tr class="border-bottom-primary">
                          <th scope="col">Id</th>
                          <th scope="col">Requested Date</th>
                          <th scope="col">Application Code</th>
                          <th scope="col">Requested Amount</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                        <tr class="border-bottom-secondary">
                            <th scope="row">1</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> 
                              <center><span class="badge badge-light-success"></span></center>
                            </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  </div>
                      <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tabs">
                       
                      <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Online Application Form </h4>
                    <p class="f-m-light mt-1" style="text-transform:none">
                       Kindly complete this form to enable us serve you better, Please Read the terms & Conditions before you fill this form. </p>
                       <p class="f-m-light mt-1 text-danger" style="text-transform:none"> </p>
                  
                      </div>
                  <div class="card-body">
                    <div class="vertical-main-wizard">
                      <div class="row g-3">    
                        <div class="col-xxl-3 col-xl-4 col-12">
                          <div class="nav flex-column header-vertical-wizard" id="wizard-tab" role="tablist" aria-orientation="vertical"><a class="nav-link active" id="wizard-contact-tab" data-bs-toggle="pill" href="#wizard-contact" role="tab" aria-controls="wizard-contact" aria-selected="true"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-user"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Personal Information</h6>
                                  <p>Add your details </p>
                                </div>
                              </div></a><a class="nav-link" id="wizard-cart-tab" data-bs-toggle="pill" href="#wizard-cart" role="tab" aria-controls="wizard-cart" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-chain-broken"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Next Of Kin Information</h6>
                                  <p>Add Next of kin details</p>
                                </div>
                              </div></a><a class="nav-link" id="wizard-banking-tab" data-bs-toggle="pill" href="#wizard-banking" role="tab" aria-controls="wizard-banking" aria-selected="false" tabindex="-1"> 
                              <div class="vertical-wizard">
                                <div class="stroke-icon-wizard"><i class="fa fa-group"></i></div>
                                <div class="vertical-wizard-content"> 
                                  <h6>Education</h6>
                                  <p>Add Education Details</p>
                                </div>
                              </div></a></div>
                        </div>
                        <div class="col-xxl-9 col-xl-8 col-12">
                          <div class="tab-content" id="wizard-tabContent">
                            <div class="tab-pane fade show active" id="wizard-contact" role="tabpanel" aria-labelledby="wizard-contact-tab">
                            <form class="row g-3 needs-validation custom-input" novalidate="">

                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Category</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Student Loan </option>
                                        <option>Scholarship </option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-6 col-sm-6">
                                    <label class="form-label" for="validationCustom0-a">Applicant Names<span class="txt-danger">*</span></label>
                                    <input class="form-control" id="validationCustom0-a"type="text" readonly value="{{ Auth::user()->first_name. ' '. Auth::user()->middle_name.' '. Auth::user()->last_name; }}" required="">
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                    <div class="">
                                    <label class="form-label" for="validationCustom-b">Date of Birth<span class="txt-danger">*</span></label>
                                    <input class="form-control digits" name="dob" id="dob" type="date" value="{{ Auth::user()->dob}}">
                                    </div>
                                    </div>

                                    <div class="col-xxl-5 col-sm-6">
                                    <div class="">
                                      <label class="form-label">Gender <span class="txt-danger">*</span></label>
                                      <select name="gender" id="gender" class="form-control btn-square">
                                        <option value="">--Select--</option>
                                        <option value="Male" @if( Auth::user()->gender == 'Male') selected @endif >Male</option>
                                        <option value="Female" @if( Auth::user()->gender == 'Female') selected @endif>Female</option>
                                      </select>
                                    </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                    <div class="">
                                      <label class="form-label">Phone No.<span class="text-danger">*</span></label>
                                      <input class="form-control" name="phone" id="phone" maxlength="11" type="text" value="{{ Auth::user()->phone_number}}" >
                                    </div>
                                    </div>

                                    <div class="col-xxl-4 col-sm-6">
                                      <label class="form-label" for="validationemail-b">Email<span class="txt-danger">*</span></label>
                                      <input class="form-control" id="validationemail-b" type="email" required="" value="{{ Auth::user()->email}}" readonly>
                                    </div>

                                    <div class="col-xxl-3 col-sm-3">
                                      <label class="form-label" for="validationCustom04">Country</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Nigeria </option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-3 col-sm-3">
                                      <label class="form-label" for="validationCustom04">Nationality</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Nigeria </option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-3 col-sm-3">
                                      <label class="form-label" for="validationCustom04">State</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                    <option selected="" disabled="" value="">Choose...</option>
                                    <option>Kaduna </option>
                                      </select>
                                    </div>

                                    <div class="col-xxl-3 col-sm-3">
                                      <label class="form-label" for="validationCustom04">L.G.A</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                    <label class="form-label">Current Home Address</label>
                                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter your home Address">{{ Auth::user()->address}}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nearest Bus Stop</label>
                                        <textarea class="form-control" rows="3" id="address" name="address" placeholder="Nearedt Bus Station">{{ Auth::user()->address}}</textarea>
                                    </div>

                                    <div class="mb-3 mt-3">
                                    <label class="form-label" for="formFileMultiple">Recent Passport</label>
                                    <input class="form-control" name="image" id="image" type="file" multiple="">
                                    </div>

                                    <div class="col-md-6"><label class="form-label" style="text-transform:none" for="formFileMultiple">Do you study Abroad ?</label>
                                      <div class="mb-3 d-flex gap-3 checkbox-checked">
                                          <div class="form-check"> 
                                            <input class="form-check-input" id="flexRadioDefault1" value="Yes"  type="radio" name="flexRadioDefault">
                                            <label class="form-check-label mb-0" for="flexRadioDefault1">Yes </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" id="flexRadioDefault2" value="No" type="radio" name="flexRadioDefault" checked="">
                                            <label class="form-check-label mb-0" for="flexRadioDefault2">No</label>
                                          </div>
                                      </div>
                                    </div>

                                   
                                    <div class="col-xxl-4 col-sm-6" style="display:none" id="intPhone">
                                      <div class="">
                                        <label class="form-label">Intl Phone No.<span class="text-danger">*</span></label>
                                        <input class="form-control" name="phone" id="phone" maxlength="11" type="text" value="{{ Auth::user()->phone_number}}" >
                                      </div>
                                    </div>

                                    <div class="col-md-12" id="intaddr" style="display:none" >
                                        <label class="form-label">Intl Address </label>
                                        <textarea class="form-control" rows="3" id="address" name="address" placeholder="International Address">{{ Auth::user()->address}}</textarea>
                                    </div>

                                    <div class="col-12 text-end"> 
                                      <button class="btn btn-primary">Next</button>
                                    </div>
                            </form>
                            </div>
                            
                            <div class="tab-pane fade" id="wizard-cart" role="tabpanel" aria-labelledby="wizard-cart-tab">
                              <form class="row g-3 needs-validation custom-input" novalidate="">
                                 
                                  <div class="col-xxl-4 col-sm-4">
                                      <label class="form-label" for="validationCustom04">Title</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>
                                    <div class="col-xxl-8 col-sm-8">
                                      <label class="form-label" for="validationCustom04">Relationship</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>
                                  
                                 
                                <div class="col-md-4 col-sm-4">
                                  <label class="form-label" for="validationDates">Next of Kin</label>
                                  <input class="form-control" id="validationDates" type="number" required="" placeholder="Surname">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                  <label class="form-label" for="validationDates">&nbsp;</label>
                                  <input class="form-control" id="validationDates" type="number" required="" placeholder="First Name">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>

                                <div class="col-md-4 col-sm-4">
                                  <label class="form-label" for="validationDates">&nbsp;</label>
                                  <input class="form-control" id="validationDates" type="number" required="" placeholder="Middle Name">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>
                                <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">Gender</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>
                                <div class="col-md-6 col-sm-6">
                                  <label class="form-label" for="cvvNumber-b">Date of Birth</label>
                                  <input class="form-control" id="cvvNumber-b" type="date" required="">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                  <label class="form-label" for="cvvNumber-b">Phone Number</label>
                                  <input class="form-control" id="cvvNumber-b" type="text" required="">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>
                                 
                                <div class="col-md-6 col-sm-6">
                                  <label class="form-label" for="cvvNumber-b">Email Address</label>
                                  <input class="form-control" id="cvvNumber-b" type="text" required="">
                                  <div class="valid-feedback">
                                     Looks's Good!</div>
                                </div>

                                <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">State</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>
                
                                    <div class="col-xxl-6 col-sm-6">
                                      <label class="form-label" for="validationCustom04">LGA</label>
                                      <select class="form-select" id="validationCustom04" required="">
                                        <option selected="" disabled="" value="">Choose...</option>
                                        <option>Kuje </option>
                                      </select>
                                    </div>

                                    <div class="col-md-6">
                                    <label class="form-label">Current Home Address</label>
                                    <textarea class="form-control" rows="3" id="address" name="address" placeholder="Enter your home Address">{{ Auth::user()->address}}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Nearest Bus Stop</label>
                                        <textarea class="form-control" rows="3" id="address" name="address" placeholder="Nearedt Bus Station">{{ Auth::user()->address}}</textarea>
                                    </div>

                                 
                                <div class="col-12 text-end"> 
                                  <button class="btn btn-primary">Previous</button>
                                  <button class="btn btn-primary">Next</button>
                                </div>
                              </form>
                            </div>

                            <div class="tab-pane fade custom-input" id="wizard-banking" role="tabpanel" aria-labelledby="wizard-banking-tab">
                              <form class="row g-3 mb-3 needs-validation" novalidate="">
                                <div class="col-md-12"> 
                                  <div class="accordion dark-accordion" id="accordionExample-a">
                                    <div class="accordion-item">
                                      <h2 class="accordion-header" id="headingOne-a">
                                        <button class="accordion-button collapsed accordion-light-primary txt-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-a" aria-expanded="true" aria-controls="collapseOne-a">NET BANKING<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down svg-color"><polyline points="6 9 12 15 18 9"></polyline></svg></button>
                                      </h2>
                                      <div class="accordion-collapse collapse" id="collapseOne-a" aria-labelledby="headingOne-a" data-bs-parent="#accordionExample-a">
                                        <div class="accordion-body weight-title card-wrapper">
                                          <h6 class="sub-title f-14">SELECT YOUR BANK</h6>
                                          <div class="row choose-bank">
                                            <div class="col-sm-6">
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-z" type="radio" name="flexRadioDefault-v">
                                                <label class="form-check-label" for="flexRadioDefault-z">Industrial &amp; Commercial Bank</label>
                                              </div>
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-y" type="radio" name="flexRadioDefault-v">
                                                <label class="form-check-label" for="flexRadioDefault-y">Agricultural Bank</label>
                                              </div>
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-x" type="radio" name="flexRadioDefault-v" checked="">
                                                <label class="form-check-label" for="flexRadioDefault-x">JPMorgan Chase &amp; Co.</label>
                                              </div>
                                            </div>
                                            <div class="col-sm-6"> 
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-w" type="radio" name="flexRadioDefault-v">
                                                <label class="form-check-label" for="flexRadioDefault-w">Construction Bank Corp.</label>
                                              </div>
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-v" type="radio" name="flexRadioDefault-v">
                                                <label class="form-check-label" for="flexRadioDefault-v">Bank of America</label>
                                              </div>
                                              <div class="form-check radio radio-primary">
                                                <input class="form-check-input" id="flexRadioDefault-u" type="radio" name="flexRadioDefault-v">
                                                <label class="form-check-label" for="flexRadioDefault-u">HDFC Bank</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12"> 
                                  <textarea class="form-control" id="validationTextarea24" placeholder="Your Feedback" required="" data-gramm="false" wt-ignore-input="true"></textarea>
                                  <div class="invalid-feedback">Please enter a message in the textarea.</div>
                                </div>
                                <div class="col-12">
                                  <div class="form-check mb-0">
                                    <input class="form-check-input" id="invalidCheck67" type="checkbox" value="" required="">
                                    <label class="form-check-label mb-0" for="invalidCheck67">Agree to terms and conditions</label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                  </div>
                                </div>
                                <div class="col-12 text-end"> 
                                  <button class="btn btn-success">Finish</button>
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
                <p class="mb-0 f-w-600">Copyright©fee24 Consultant Ltd <script>document.write(new Date().getFullYear())</script></p>
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
    <script src="{{ asset('js/logout.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <script>

    $($("input[name=flexRadioDefault]")).change(function(){

     
            var radioValue = $("input[name='flexRadioDefault']:checked").val();
            if(radioValue == 'Yes'){
            
               $('#intPhone').show();
               $('#intaddr').show();
            }
            else{
              $('#intPhone').hide();
              $('#intaddr').hide();
            }

      });
    </script>
    
    <!-- Plugin used-->
  </body>
</html>