<!DOCTYPE html>
<!–– This Code was written By mgi.x.mgi@gmail.com you need information ,send msg ! -->
    <html lang="{{ app()->getLocale() }}" @if(app()->getLocale() =="ar")dir="rtl" @endif >

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Freelancer working online">
        <meta name="author" content="it-softsolutions.com">
        <title>High tech Freelanser</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="all,follow">
        <!-- Bootstrap CSS-->
        @if(app()->getLocale() =="ar")
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css"
            integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
        @else
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">

        @endif
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
        <style>
            .login-page::before {
                background: url(@lang("login.url"));
            }

            .jconfirm.jconfirm-light .jconfirm-box .jconfirm-buttons button {
                color: white;

            }

            .btn {
                background-color: #6458bb;
            }

            input.input-material~label {
                @lang('login.Postionoflapl')
            }
        </style>
        <!-- Font Awesome CSS-->
        <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Fontastic Custom icon font-->
        <link rel="stylesheet" href="/css/fontastic.css">
        <!-- Google fonts - Poppins -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="/css/style.default.css" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="/css/custom.css">
        <!-- Favicon-->
        <link rel="shortcut icon" href="/img/favicon.ico">
        <!-- Tweaks for older IEs-->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <!-- Begin Inspectlet Asynchronous Code -->

        <!-- End Inspectlet Asynchronous Code -->
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118599099-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118599099-2');
        </script>

    </head>

    <body>

        <div class="page login-page">
            @yield('content')


            <!--  <div class="copyrights text-center">
                @if ( app()->getLocale() != 'ar')
                <li><a style="color:red" rel="follow" href="/lang/ar" class="dropdown-item"> <img
                            src="/img/flags/16/AE.png" alt="Arabic" class="mr-2">Arabic</a></li>
                @endif @if ( app()->getLocale() != 'en')
                <li><a style="color:red" rel="follow" href="/lang/en" class="dropdown-item"> <img
                            src="/img/flags/16/GB.png" alt="English" class="mr-2">English</a></li>
                @endif
                @if ( app()->getLocale() != 'ru')
                <li><a style="color:red" rel="follow" href="/lang/ru" class="dropdown-item"> <img
                            src="/img/flags/16/RU.png" alt="Russian" class="mr-2">Russian</a></li>
                @endif
                </p>
            </div> -->
        </div>

        <!-- JavaScript files-->
        @if(app()->getLocale() =="ar")
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"
            integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH" crossorigin="anonymous">
        </script>
        @else

        <script src="/vendor/jquery/jquery.min.js"></script>
        <script src="/vendor/popper.js/umd/popper.min.js"> </script>
        <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
        @endif


        <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="/vendor/chart.js/Chart.min.js"></script>
        <script src="/vendor/jquery-validation/jquery.validate.min.js"></script>
        <!-- Main File-->
        <script src="/js/front.js"></script>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
        <?php if (!isset($ok)) $ok=0 ?>
        @if ( $ok )
        <script>
            $(document).ready(function() {
	$.alert({
	    title: '@lang("login.An_S")',
	    content: '@lang("login.DescrptionDilog")',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Ok")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});
});
        </script>
        @endif
        @if ($errors->has('email'))
        <script>
            $(document).ready(function() {
	$.alert({
	    title: '@lang("login.An_error")',
	    content: '{{$errors->first('email')}}',


	    typeAnimated: true,
	    buttons: {
	        tryAgain: {
	            rtl: true,
	            text: '@lang("login.Try_again")',
	            btnClass: 'btn',
	            action: function(){
	            }
	        }

	    }
	});
});
        </script>
        @endif
    </body>

    </html>
