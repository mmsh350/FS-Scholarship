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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
  </head>
  <style> .light-a { color:white !important}</style>
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
              <li class="breadcrumb-item f-w-400">Wallet</li>
              <li class="breadcrumb-item f-w-400 active">Top Up</li>
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
                      <li><a href="{{ route('loan') }}">Loans</a></li>
                      <li><a  href="{{ route('application') }}">Applications</a></li>
                      <li><a  class="active" href="{{ route('wallet') }}"> Fund Wallet</a></li>
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
                        <div class="btn-light1-secondary b-r-10"> 
                          <div class="upcoming-box"> 
                          <div class="upcoming-icon bg-secondary"> <img src="{{ asset('images/dashboard-2/svg-icon/wallet2.png') }}" alt=""></div>
                            <h6 class="p-b-10">Available Balance</h6>
                            &#8358;<span class="f-14">{{ number_format($balance, 2); }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="btn-light1-warning b-r-10"> 
                          <div class="upcoming-box"> 
                            <div class="upcoming-icon bg-warning"> <img src="{{ asset('images/dashboard-2/svg-icon/payments.png') }}" alt=""></div>
                            <h6 class="p-b-10">Total Payments</h6>  
                            &#8358;<span class="f-14">{{ number_format($deposit - $balance, 2); }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="btn-light1-primary b-r-10"> 
                          <div class="upcoming-box  "> 
                          <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/naira.png') }}" alt=""></div>
                            <h6 class="p-b-10">Total Deposits</h6>&#8358;<span class="f-14">{{ number_format($deposit, 2); }}</span>
                          	</div>
                        </div>
                        </div>
           </div>
					  
					 
                <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-body">
                    <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                      <li class="nav-item" role="presentation"><a class="nav-link txt-dark active" id="icon-home-tab" data-bs-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"> <i class="fa fa-history text-danger"></i>Last 10 Transactions</a></li>
                      <li class="nav-item" role="presentation"><a class="nav-link txt-dark" id="profile-icon-tabs" data-bs-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false" tabindex="-1"><i class="fa fa-money text-primary"></i>Fund my Account</a></li>
                     </ul>
                    <div class="tab-content" id="icon-tabContent">
                      <div class="tab-pane fade active show" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
                      <div class="table-responsive theme-scrollbar mt-4  border rounded-3 ">
                    <table class="table">
                      <thead style="background-color:#2b3751;">
                        <tr class="border-bottom-primary">
                          <th class="light-a">ID</th>
                          <th class="light-a">Transaction Date</th>
                          <th class="light-a">Reference Number</th>
                          <th class="light-a">Channel</th>
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
                          <td>{{ $data->gateway}}</td>
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
                      <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tabs">
                        <div class="pt-3 mb-0">
                        <div id="error" style="display:none" class="alert alert-danger alert-dismissible" role="alert"></div>  
                          <div class="flex-space flex-wrap align-items-center">
                          <div class="card-wrapper border rounded-3 h-100 w-100 checkbox-checked">
                          <h6 class="sub-title" >payment method</h6>
                         <span style="text-transform:none">Choose a payment method, enter the funding amount and continue to top up</span>
                          <div class="payment-wrapper mt-2">
                            <div class="payment-first">
                              <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="ptm11"   type="radio" name="radio1" value="paystack">
                                <label class="form-check-label mb-0" for="ptm11"><img class="img-fluid"  width="20%" src="{{ asset('images/ecommerce/paystack.png') }}" alt="card"></label>
                              </div>
                            </div>
                          </div>
                          <div class="payment-wrapper">
                            <div class="payment-first">
                              <div class="form-check radio radio-primary">
                                <input class="form-check-input" id="ptm44" type="radio" name="radio1" value="moniepoint">
                                <label class="form-check-label mb-0" for="ptm44"><img  width="20%" class="img-fluid" src="{{ asset('images/ecommerce/monify.png') }}" alt="card"></label>
                              </div>
                            </div>
                          </div>

                      <form class="row" name="paymentForm" id="paymentForm">
                      @csrf
                      @method('post')
                      <div class="col-4"  hidden> 
                        <input class="form-control"   id="first-name" name="first-name" type="text" value="{{ Auth::user()->first_name; }}" aria-label="First name" required="">
                      </div>
                      <div class="col-4"  hidden> 
                        <input class="form-control"  id="last-name" name="last-name" type="text" value="{{ Auth::user()->last_name; }}" aria-label="Last name" required="">
                      </div>
                      <div class="col-4"  hidden>
                        <input class="form-control"   id="email" name="email" type="email" value="{{ Auth::user()->email; }}" required="">
                      </div>
                      <div class="col-4"  hidden>
                        <input class="form-control"   id="phone_number" name="phone_number" type="text" value="{{ Auth::user()-> phone_number; }}" required="">
                      </div>
                     
                      <div class="col-4"  hidden>
                        <input class="form-control" id="desc" type="desc" value="Wallet Top Up" required="">
                      </div>
                      <input type="text" hidden id="response" />
                      <input type="text" hidden id="reference" />
                      <div class="col-6 "> 
                        <label class="col-sm-6 col-form-label"  >Top up Amount</label>
                        <input class="form-control border border-primary" onkeypress="return isNumberKey(event)" type="text" id="amount"  name="amount"    value="">
                      </div>  
                      <div class="col-8  ">  
                      <button class="example-popover btn btn-dark mb-1   mt-3 " id="topup" type="button"><i class="icofont icofont-pay">&nbsp;</i>Top Up</button>                    
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
    <script src="{{ asset('js/custom-gates.js')}}"></script>
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
    <!-- calendar js-->
    <script src="{{ asset('js/logout.js') }}"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- Plugin used-->
  </body>
</html>