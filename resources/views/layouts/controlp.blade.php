<!DOCTYPE html>
<!–– This Code was written By mgi.x.mgi@gmail.com you need information ,send msg ! ––>
    <html lang="{{ app()->getLocale() }}" @if(app()->
    getLocale() =="ar")dir="rtl" @endif >

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@lang('Control.Title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="all,follow">
        <meta name="_token" content="{{csrf_token()}}" />

        <!-- Bootstrap CSS-->
        @if(app()->getLocale() =="ar")
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css"
            integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
        @else
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

        @endif


        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

        <link rel="stylesheet" type="text/css"
            href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Fontastic Custom icon font-->
        <link rel="stylesheet" href="/css/fontastic.css">
        <!-- Google fonts - Poppins -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="/css/style.Controll.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/css/custom.css">
        <link rel="stylesheet" href="/css/tag/bootstrap-tokenfield.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css" />

        <!-- Favicon-->
        <link rel="shortcut icon" href="/img/favicon.ico">

        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style>
            @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900);

            .bootstrap-datetimepicker-widget.dropdown-menu {
                width: 20rem;
            }

            .whitefont {
                color: white;
            }

            .loader {
                width: 100px;
                height: 80px;
                position: absolute;
                top: 0;
                right: 0;
                left: 0;
                bottom: 0;
                margin: auto;
            }

            .loader .image {
                width: 100px;
                height: 160px;
                font-size: 40px;
                text-align: center;
                transform-origin: bottom center;
                animation: 3s rotate infinite;
                opacity: 0;
            }

            .loader span {
                display: block;
                width: 100%;
                text-align: center;
                position: absolute;
                bottom: 0;
            }

            @keyframes rotate {
                0% {
                    transform: rotate(90deg);
                }

                10% {
                    opacity: 0;
                }

                35% {
                    transform: rotate(0deg);
                    opacity: 1;
                }

                65% {
                    transform: rotate(0deg);
                    opacity: 1;
                }

                80% {
                    opacity: 0;
                }

                100% {
                    transform: rotate(-90deg);
                }
            }



            input.input-material~label {
                @if(app()->getLocale()=="ar") right: 0;
                @else left: 0;
                @endif
            }

            .page {
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-image: url(/img/photoBackGroundControll/maxresdefault1.jpg);
                background-size: cover;
                background-position-x: center;
            }

            #tdendF {
                color: red;
                font-weight: bold;
                font-size: 19px;

            }

            @if(app()->getLocale()=="ar") @media (max-width: 1199px) {
                nav.side-navbar {
                    margin-right: -90px;

                }

                nav.side-navbar.shrinked {
                    margin-right: 0;
                }

                @else @media (max-width: 1199px) {
                    nav.side-navbar {
                        margin-left: -90px;

                    }

                    nav.side-navbar.shrinked {
                        margin-left: 0;
                    }

                    @endif
        </style>


        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118599099-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118599099-2');
        </script>

    </head>

    <body onload="onloadevnetFunction()" style="margin:0;">

        <div "display:none;" id="loader" class="loader">
            <div class="image">
                <i class="fa fa-codepen"></i>
            </div>
            <span></span>
        </div>
        <div style="display:none;" class="page" id="MyPageAll">
            <!-- Main Navbar-->
            <header class="header">
                <nav class="navbar ">
                    <!-- Search Box-->
                    <div class="search-box">
                        <button class="dismiss">
                            <i class="icon-close"></i>
                        </button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="What are you looking for..." class="form-control">
                        </form>
                    </div>
                    <div class="container-fluid">
                        <div class="navbar-holder d-flex align-items-center justify-content-between ">
                            <!-- Navbar Header-->
                            <div class="navbar-header">
                                <!-- Navbar Brand -->
                                <a href="index.html" class="navbar-brand">
                                    <div class="brand-text brand-big">
                                        <span> @lang("Control.Nameincontrolone")
                                        </span><strong>@lang('Control.Nameincontroltow')</strong>
                                    </div>
                                    <div class="brand-text brand-small">
                                        <strong>@lang('Control.Shortcutname')</strong>
                                    </div>
                                </a>
                                <!-- Toggle Button-->
                                <a id="toggle-btn" href="#"
                                    class="menu-btn active"><span></span><span></span><span></span></a>
                            </div>
                            <!-- Navbar Menu -->
                            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                                <!-- Search-->
                                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i
                                            class="icon-search"></i></a></li>
                                <!-- Notifications-->
                                <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#"
                                        href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="nav-link"><i class="fa fa-bell-o"></i><span
                                            class="badge bg-red badge-corner">12</span></a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content">
                                                        <i class="fa fa-envelope bg-green"></i>You have 6 new
                                                        message(s)
                                                    </div>
                                                    <div class="notification-time">
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content">
                                                        <i class="fa fa-thumbs-o-up bg-blue"></i>Your Armay Destry!!
                                                    </div>
                                                    <div class="notification-time">
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content">
                                                        <i class="fa fa-upload bg-orange"></i>Successful attack !! :)
                                                    </div>
                                                    <div class="notification-time">
                                                        <small>4 minutes ago</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item">
                                                <div class="notification">
                                                    <div class="notification-content">
                                                        <i class="fa fa-twitter bg-blue"></i>You have 2 followers
                                                    </div>
                                                    <div class="notification-time">
                                                        <small>10 minutes ago</small>
                                                    </div>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#"
                                                class="dropdown-item all-notifications text-center"> <strong>view
                                                    all notifications </strong></a></li>
                                    </ul>
                                </li>
                                <!-- Messages                        -->
                                <li class="nav-item dropdown"><a id="messages" rel="nofollow" data-target="#" href="#"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        class="nav-link"><i class="fa fa-envelope-o"></i><span
                                            class="badge bg-orange badge-corner">10</span></a>
                                    <ul aria-labelledby="notifications" class="dropdown-menu">
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile">
                                                    <img src="https://www.w3schools.com/howto/img_avatar.png" alt="..."
                                                        class="img-fluid rounded-circle">
                                                </div>
                                                <div class="msg-body">
                                                    <h3 class="h5">From Admin Mess EX!</h3>
                                                    <span>Sent You Message</span>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile">
                                                    <img src="/img/avatar-2.jpg" alt="..."
                                                        class="img-fluid rounded-circle">
                                                </div>
                                                <div class="msg-body">
                                                    <h3 class="h5">From Admin Mess EX!</h3>
                                                    <span>Sent You Message</span>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#" class="dropdown-item d-flex">
                                                <div class="msg-profile">
                                                    <img src="/img/avatar-3.jpg" alt="..."
                                                        class="img-fluid rounded-circle">
                                                </div>
                                                <div class="msg-body">
                                                    <h3 class="h5">From Admin Mess EX!</h3>
                                                    <span>Sent You Message</span>
                                                </div>
                                            </a></li>
                                        <li><a rel="nofollow" href="#"
                                                class="dropdown-item all-notifications text-center"> <strong>Read
                                                    all messages </strong></a></li>
                                    </ul>
                                </li>
                                <!-- Languages dropdown
							<li class="nav-item dropdown">
                            <a id="languages" rel="follow"
								data-target="#" href="#" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false"
								class="nav-link language dropdown-toggle"> @if (
									app()->getLocale() == 'en') <img src="/img/flags/16/GB.png"
									alt="English"><span class="d-none d-sm-inline-block">English</span>
									@elseif ( app()->getLocale() == 'ar') <img
									src="/img/flags/16/AE.png" alt="Arabic"><span
									class="d-none d-sm-inline-block">العربية</span>
                                    @elseif ( app()->getLocale() == 'ru') <img
									src="/img/flags/16/RU.png" alt="Russian"><span
									class="d-none d-sm-inline-block">Russian</span>
                                     @endif
							</a>
								<ul aria-labelledby="languages" class="dropdown-menu">
									@if ( app()->getLocale() != 'ar')
									<li><a rel="follow" href="/lang/ar" class="dropdown-item"> <img
											src="/img/flags/16/AE.png" alt="Arabic" class="mr-2">Arabic
									</a></li>@endif @if ( app()->getLocale() != 'en')
									<li><a rel="follow" href="/lang/en" class="dropdown-item"> <img
											src="/img/flags/16/GB.png" alt="English" class="mr-2">English
									</a></li>
                                    </a></li>@endif @if ( app()->getLocale() != 'ru')
									<li><a rel="follow" href="/lang/ru" class="dropdown-item"> <img
											src="/img/flags/16/RU.png" alt="Russian" class="mr-2">Russian
									</a></li>
                                     @endif

									</a></li>
						        </ul>
						    </li> -->
                                <!-- Logout    -->
                                <li class="nav-item"><a href="{{route('logout')}}"
                                        class="nav-link logout">@lang('Control.Logout')<i
                                            class="fa fa-sign-out"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>
            <div class="page-content d-flex align-items-stretch">
                <!-- Side Navbar -->
                <nav id='side-navbar11' class="side-navbar">
                    <!-- Sidebar Header-->
                    <div class="sidebar-header d-flex align-items-center">
                        <div class="avatar">
                            <img src="/img/avatar-{{rand(1, 6)}}.jpg" alt="..." class="img-fluid rounded-circle">
                        </div>
                        <div class="title">
                            <h1 class="h4">{{Auth::user()->name}} </h1>
                            <p>Type</p>
                        </div>
                    </div>
                    <!-- Sidebar Navidation Menus-->
                    @include('layouts.ListAll')


                    @if (auth::isadmin() )
                    @include('layouts.ListAdmin')
                    @elseif (!auth::isadmin()  )
                    @include('layouts.ListUser')
                    @endif
                </nav>
                <div class="content-inner">
                    <!-- Page Header-->
                    <header class="page-header">
                        <div class="container-fluid">
                            <h2 class="no-margin-bottom whitefont ">@lang("Control.Dashboard")</h2>
                        </div>
                    </header>
                    <!-- Dashboard Counts Section-->
                    @yield('content')
                    <!-- Page Footer-->
                    <footer class="main-footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p> high tech freelancer &copy;2018-{{date("Y")}}</p>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <p>
                                        Design by <a href="http://othman.info" class="external">Me ,version 0.1 beta</a>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <!-- JavaScript files-->
        @if(app()->getLocale() =="ar")
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"
            integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous">
        </script>


        @else



        <script src="/vendor/jquery/jquery.min.js"></script>

        <script src="/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>


        @endif
        <script>
            jQuery.fn.bstooltip = jQuery.fn.tooltip;
        </script>
        <script src="//unpkg.com/babel-polyfill@latest/dist/polyfill.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="/vendor/chart.js/Chart.min.js"></script>
        <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="/js/jquery.form.js"></script>
        <!-- Main File-->
        <script src="/js/front.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <script src="/js/bootstrap-tokenfield.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/en-ca.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js">
        </script>
        <script src="http://malsup.github.com/jquery.form.js"></script>

        <script>
            var num = 0;
function onloadevnetFunction() {
	var  myVar = setTimeout(showPage, 100);
	}
function showPage() {
	if ( num >=100){
	  document.getElementById("loader").style.display = "none";
	  document.getElementById("MyPageAll").style.display = "block";}
	else
	{
		onloadevnetFunction();
	}
}
$(document).ready(function() {

	allElements = document.getElementsByClassName('formales5565');

for (var i=0; i<allElements.length; i++) {
       $( allElements[i]).timepicker({
                minuteStep: 1,
                template: 'modal',
                appendWidgetTo: 'body',
                showSeconds: true,
                showMeridian: false,
                defaultTime: false
            });
    }
		allElements = document.getElementsByClassName('datetimepickerx');

for (var i=0; i<allElements.length; i++) {


				@if(app()->getLocale() =="ar")
				$( allElements[i]).datetimepicker({format: 'ss:mm:HH ,DD.MM.YYYY '  });
				@else
				$( allElements[i]).datetimepicker({format: 'DD.MM.YYYY, HH:mm:ss' }  );
				@endif
		}




	  var counter = 0;

	  // Start the changing images
	  setInterval(function() {
	    if(counter == 9) {
	      counter = 0;
	    }

	    changeImage(counter);
	    counter++;
	  }, 3000);

	  // Set the percentage off
	  loading();
	});

	function changeImage(counter) {
	  var images = [
	    '<i class="fa fa-fighter-jet"></i>',
	    '<i class="fa fa-gamepad"></i>',
	    '<i class="fa fa-headphones"></i>',
	    '<i class="fa fa-cubes"></i>',
	    '<i class="fa fa-paw"></i>',
	    '<i class="fa fa-rocket"></i>',
	    '<i class="fa fa-ticket"></i>',
	    '<i class="fa fa-pie-chart"></i>',
	    '<i class="fa fa-codepen"></i>'
	  ];

	  $(".loader .image").html(""+ images[counter] +"");
	}

	function loading(){


	  for(i=0; i<=100; i++) {
	    setTimeout(function() {
	      $('.loader span').html(num+'%');


	      num++;
	    },i*10);
	  };

	}

		@yield('scriptLoop')
	@yield('script')


        </script>
    </body>

    </html>
