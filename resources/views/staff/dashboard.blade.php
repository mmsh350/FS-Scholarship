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
          <h5 class="f-w-700"> Staff Dashboard - <span class="badge badge-primary border border-rounded border-light f-2"> <i class="icofont icofont-ui-home"></i> {{$stateName}} State</span></h5>
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
                        <li><a class="active" href="{{ route('dashboard') }}">Overview</a></li>
                        <li><a class="" href="{{ route('staff.applications') }}">Applications</a></li>
                        <li><a href="{{ route('staff.agents') }}" disabled="true">Agents</a></li>
                        <li><a href="{{ route('staff.schools') }}">Schools</a></li>
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
				 
                      
                      <div class="col-md-3">
                        <div class="btn-light1-primary b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('staff.applications') }}">
                            <div class="upcoming-icon bg-primary"> <img src="{{ asset('images/dashboard-2/svg-icon/form.png') }}" alt=""></div>
                            <h6 class="p-b-10">Applications</h6>  
                             <span id="app_total_count" class="mt-2 badge rounded-circle badge-p-space border  border-primary badge-light  text-dark f-14">{{$app_total_count}}</span>
                          </div></a>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-secondary b-r-10"> 
                          <div class="upcoming-box mb-0">  <a href="{{ route('staff.applications') }}">
                            <div class="upcoming-icon bg-secondary"> <img src="{{ asset('images/dashboard-2/svg-icon/pending.png') }}" alt=""></div>
                           <h6 class="p-b-10">Pending</h6>
							                <span id="pending_app_count" class="mt-2 badge rounded-circle badge-p-space border  border-secondary badge-light  text-dark f-14">{{$pending_app_count}}</span>
                            </div>
                        </div> </a>
                      </div>

                      <div class="col-md-3">
                        <div class="btn-light1-success b-r-10"> 
                          <div class="upcoming-box mb-0">  <a href="{{ route('staff.applications') }}">
                            <div class="upcoming-icon bg-success"> <img src="{{ asset('images/dashboard-2/svg-icon/rejected.png') }}" alt=""></div>
                           <h6 class="p-b-10">Verified</h6>
							                <span id="verify_count" class="mt-2 badge rounded-circle badge-p-space border  border-success badge-light  text-dark f-14">{{$verify_count}}</span>
                             <span hidden id="pending_app_count" >{{ $pending_app_count }}</span>
                            </div>
                        </div> </a>
                      </div>


                      <div class="col-md-3">
                        <div class="btn-light1-danger b-r-10"> 
                          <div class="upcoming-box"> <a href="{{ route('staff.applications') }}">
                            <div class="upcoming-icon bg-danger"> <img src="{{ asset('images/dashboard-2/svg-icon/rejected.png') }}" alt=""></div>
                            <h6 class="p-b-10">Rejected</h6>  
                             <span id="reject_count" class="mt-2 badge rounded-circle badge-p-space border  border-danger badge-light  text-dark f-14">{{ $reject_count }}</span>
                          </div></a>
                        </div>
                      </div>
                    </div>

                      <span id="show"><a href="#">More >></a></span>
                    <div id="more" class="row" style="display:none" > 
                      <div class="col-md-6">
                        <div class="btn-light1-warning b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('staff.agents') }}">
                            <div class="upcoming-icon bg-warning"> <img src="{{ asset('images/dashboard-2/svg-icon/users.png') }}" alt=""></div>
                            <h6 class="p-b-10">Agents</h6> 
                           <span id="agents" class="mt-2 badge rounded-circle badge-p-space border  border-warning badge-light  text-dark f-14">{{$agent_count}}</span>
                          </div></a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="btn-light1-secondary b-r-10"> 
                          <div class="upcoming-box  ">  <a href="{{ route('staff.schools') }}">
                            <div class="upcoming-icon bg-secondary"> <img src="{{ asset('images/dashboard-2/svg-icon/school.png') }}" alt=""></div>
                            <h6 class="p-b-10">Schools</h6> 
                           <span id="schools" class="mt-2 badge rounded-circle badge-p-space border  border-secondary badge-light  text-dark f-14">{{$school_count}}</span>
                          </div></a>
                        </div>
                      </div>
                    </div>
					  
					                       
                   
					
					<!-------Might remove----->
                    <div class="col-xl-4 col-xl-12 col-md-12 proorder-md-1 mt-2"> 
                        <div class="card">
                          <div class="card-header">
                            <h4>Graphical Data</h4>
                              
                             
                            <p class="f-m-light mt-1">
                              </p>
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


            //More Option
            $('#show').click(function() {
                $('#more').toggle("slide");
            });

            //Get counts and generate Graph
            let app_total_count = $('#app_total_count').html();
            let verify_count = $('#verify_count').html();
            let reject_count = $('#reject_count').html();
            let pending_app_count = $('#pending_app_count').html();
            
            
            setchart1(pending_app_count,verify_count,reject_count);

            // let schools=  $('#schools').html();;
            // let agents= $('#agents').html();
            
            setchart2(app_total_count,verify_count,pending_app_count,reject_count);
   
					
					
				function setchart1(pending_app_count,verify_count,reject_count){
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
						{ value: pending_app_count, name: 'Pending' , itemStyle:{ color: 'yellow'} },
						{ value: verify_count, name: 'Verified' , itemStyle:{ color: '#0DA759'}},
						{ value: reject_count, name: 'Rejected', itemStyle:{ color: 'red'}  },
                        
						
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
				
				
        function setchart2(app_total_count,verify_count,pending_app_count,reject_count)
                {
					
					var app = {};

                    var chartDom = document.getElementById('container2');
                    var myChart = echarts.init(chartDom);
                    var option;

                    option = {
                            xAxis: {
                              type: 'category',
                              data: ['Apps', 'Verified', 'Pending', 'Rejected']
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
                                    value: verify_count,
                                    itemStyle: {
                                      color: '#0DA759'
                                    }
                                  },
                                   
                                  {
                                    value: pending_app_count,
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

     });
    </script>
    <!-- Plugin used-->
  </body>
</html>