<!DOCTYPE html>
<!–– This Code was written By mgi.x.mgi@gmail.com you need information ,send msg ! ––>
    <html lang="{{ app()->getLocale() }}" @if(app()->
    getLocale() =="ar")dir="rtl" @endif >

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@lang('Control.Title')</title>

        <!-- Bootstrap core CSS -->
        @if(app()->getLocale() =="ar")
        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css"
            integrity="sha384-P4uhUIGk/q1gaD/NdgkBIl3a6QywJjlsFJFk7SPRdruoGddvRVSwv5qFnvZ73cpz" crossorigin="anonymous">
        @else
        <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

        @endif

        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link
            href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
            rel='stylesheet' type='text/css'>
        <link
            href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic'
            rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">


        <link href="css/SystX.css" rel="stylesheet">
        <link href="css/Syst.css" rel="stylesheet">

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118599099-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-118599099-2');
        </script>


    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container" style="
      display: contents;
  ">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">@lang('Control.Nameincontrolone')
                    <strong>@lang('Control.Nameincontroltow')</strong></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">@lang('Welcome.about')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">@lang('Welcome.services')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#PricingPlan">@lang('Welcome.PricingPlan')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">@lang('Welcome.contact')</a>
                        </li>

                        <!--
                        <li class="nav-item dropdown">
                            <a id="languages" rel="follow" data-target="#" href="#" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle">
                                @if (
                                app()->getLocale() == 'en') <img src="/img/flags/16/GB.png" alt="English"><span
                                    class="d-none d-sm-inline-block">English</span>
                                @elseif ( app()->getLocale() == 'ar') <img src="/img/flags/16/AE.png" alt="Arabic"><span
                                    class="d-none d-sm-inline-block">العربية</span>
                                @elseif ( app()->getLocale() == 'ru') <img src="/img/flags/16/RU.png"
                                    alt="Russian"><span class="d-none d-sm-inline-block">Russian</span>
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
                                </a>
                        </li>@endif @if ( app()->getLocale() != 'ru')
                        <li><a rel="follow" href="/lang/ru" class="dropdown-item"> <img src="/img/flags/16/RU.png"
                                    alt="Russian" class="mr-2">Russian
                            </a></li>
                        @endif
                       <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="img/flags/16/FR.png" alt="English" class="mr-2">French
                        </a></li>
                    </ul>
                    </li>
                 </ Languages dropdown >    -->

                    @auth
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger"
                            href="{{ url('dashboard') }}">@lang('Control.Dashboard')</a>
                    </li>
                    <!--<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('dashboard') }}">@lang('Welcome.Hello') {{Auth::user()->name}} ! </a>
            </li> -->

                    @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('login') }}">@lang('login.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('register') }}">@lang('login.Signup')</a>
                    </li>

                    @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <header class="masthead text-center text-white d-flex">
            <div class="container my-auto " style="
    background-color: #0000007a;
    border-radius: 30px;
    bottom: 10%;

">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">
                            <strong>@lang("Welcome.Welcome1")</strong>
                        </h1>
                        <hr>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <p class="text-faded mb-5" style="color: white;">@lang("Welcome.Welcome2")</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger"
                            href="#about">@lang('Welcome.FindOutMore')</a>
                        <p> </p>
                    </div>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading text-white">@lang('Welcome.got')</h2>
                        <hr class="light my-4">
                        <p class="text-faded mb-4">@lang('Welcome.Desc')</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger"
                            href="#services">@lang('Welcome.Get_Started')</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="MedelMo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">@lang('Welcome.Your_Service')</h2>
                        <hr class="my-4">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fa fa-4x fa-diamond text-primary mb-3 sr-icons"></i>
                            <h3 class="mb-3">@lang('Welcome.ActiveServe')</h3>
                            <p class="text-muted mb-0">@lang('Welcome.Server_works')</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fa fa-4x fa-paper-plane text-primary mb-3 sr-icons"></i>
                            <h3 class="mb-3">@lang('Welcome.Easy_for_beginners')</h3>
                            <p class="text-muted mb-0">@lang('Welcome.Very_easy') </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fa fa-4x fa-newspaper-o text-primary mb-3 sr-icons"></i>
                            <h3 class="mb-3">@lang('Welcome.Up_to_Date')</h3>
                            <p class="text-muted mb-0">@lang('Welcome.We_sought')</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box mt-5 mx-auto">
                            <i class="fa fa-4x fa-heart text-primary mb-3 sr-icons"></i>
                            <h3 class="mb-3">@lang('Welcome.Made_Love')</h3>
                            <p class="text-muted mb-0">@lang('Welcome.make_happiness')</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="p-0" id="PricingPlan">
            <div class="row no-gutters">
                <div class="col-12">
                    <!-- Heading Text  -->
                    <div class="section-heading text-center">
                        <h2>@lang('Welcome.Pricing_Plan')</h2>

                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                @if (false)
                @foreach ($array as $Plan )
                <?php $datapaln = json_decode($Plan->decr);?>

                <div class="col-12 col-md-6 col-lg-3">
                    <!-- Package Price  -->
                    <div class="single-price-plan text-center">
                        <!-- Package Text  -->
                        <div class="package-plan">

                            <h5>@lang('Welcome.'. $Plan->name)</h5>
                            <div class="ca-price d-flex justify-content-center">
                                <!-- <a href="https://wa.me/0037379752939">
                                    <img  src="https://static.adweek.com/adweek.com-prod/wp-content/uploads/sites/2/2015/09/WhatsAppIcon640x480.jpg" alt="Smiley face" height="50" width="70"></i>
                                    <div>@lang('Welcome.CallMe')</div> <div><p>+37379752939</p></div></a> -->
                                <span>$</span>
                                <h4>@foreach (App\RunBots\BotHelper::$priceing as $price )
                                    @if( $price['plannumberindatabase'] == $Plan->id)
                                    {{ ceil( ( $price['price'] * App\RunBots\BotHelper::$procetTransfer + App\RunBots\BotHelper::$proTransfer ) *100 )/100}}
                                    @break
                                    @endif
                                    @endforeach</h4>
                            </div>
                        </div>
                        <div class="package-description">
                            <p>@lang('Welcome.Advenced_Plan2') @if(isset($datapaln->allowbots->Thif))
                                @if(!$datapaln->allowbots->Thif) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan4') @if(isset($datapaln->allowbots->BilidingUpdade))
                                @if(!$datapaln->allowbots->BilidingUpdade) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan6') @if(isset($datapaln->allowbots->AuthTuch))
                                @if(!$datapaln->allowbots->AuthTuch) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan9') @if(isset($datapaln->allowbots->CoinMakerBot))
                                @if(!$datapaln->allowbots->CoinMakerBot) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.plandec1') @if(isset($datapaln->allowbots->SendResSnob))
                                @if(!$datapaln->allowbots->SendResSnob) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan10') @if(isset($datapaln->allowbots->ResourceBalancer))
                                @if(!$datapaln->allowbots->ResourceBalancer) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan11') @if(isset($datapaln->allowbots->MakeNewNabilBot))
                                @if(!$datapaln->allowbots->MakeNewNabilBot) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan3') @if(isset($datapaln->allowbots->scavengebot))
                                @if(!$datapaln->allowbots->scavengebot) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.plandec2') @if(isset($datapaln->allowbots->SendResourceViliges))
                                @if(!$datapaln->allowbots->SendResourceViliges) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan13') @if(isset($datapaln->allowbots->NewBarbarAttack))
                                @if(!$datapaln->allowbots->NewBarbarAttack) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan12') @if(isset($datapaln->allowbots->smashingwalls))
                                @if(!$datapaln->allowbots->smashingwalls) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan17') @if(isset($datapaln->allowbots->MakeArrmy))
                                @if(!$datapaln->allowbots->MakeArrmy) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan19') @if(isset($datapaln->allowbots->FakeAttaks))
                                @if(!$datapaln->allowbots->FakeAttaks) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan23') @if(isset($datapaln->allowbots->SendAttakByTime))
                                @if(!$datapaln->allowbots->SendAttakByTime) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.plandec3') @if(isset($datapaln->allowbots->SendAttakByTime))
                                @if(!$datapaln->allowbots->SendAttakByTime) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan21') @if(isset($datapaln->allowbots->SendAttakByTime))
                                @if(!$datapaln->allowbots->SendAttakByTime) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Community_Plan23') @if(isset($datapaln->allowbots->SendAttakByTime))
                                @if(!$datapaln->allowbots->SendAttakByTime) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.Advenced_Plan15') @if(isset($datapaln->allowbots->ThifHelperPlayers))
                                @if(!$datapaln->allowbots->ThifHelperPlayers) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.plandec4') @if(isset($datapaln->allowbots->SetExceptionVillages))
                                @if(!$datapaln->allowbots->SetExceptionVillages) @lang('Welcome.locked') @endif @else
                                @lang('Welcome.locked') @endif</p>
                            <p>@lang('Welcome.plandec5' , ["attribute" => $datapaln->world])</p>
                        </div>
                        <!-- Plan Button  -->
                        <div class="plan-button">
                            <a href="{{ url('dashboard') }}">@lang('Welcome.Select_Plan')</a>
                        </div>
                    </div>
                </div>
                @endforeach

                @endif

                <!-- start -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />



                <div class="pricing-table">
                    <div class="pricing-option">
                        <i class="material-icons">important_devices</i>
                        <h1>Ui design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">199 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">perm_identity</i>
                        <h1>Ux design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">399 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">art_track</i>
                        <h1>Print design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">999 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pricing-table">
                    <div class="pricing-option">
                        <i class="material-icons">important_devices</i>
                        <h1>Ui design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">199 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">perm_identity</i>
                        <h1>Ux design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">399 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">art_track</i>
                        <h1>Print design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">999 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pricing-table">
                    <div class="pricing-option">
                        <i class="material-icons">important_devices</i>
                        <h1>Ui design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">199 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">perm_identity</i>
                        <h1>Ux design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">399 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>

                    <div class="pricing-option">
                        <i class="material-icons">art_track</i>
                        <h1>Print design</h1>
                        <hr />
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente harum voluptatum, sit cum
                            voluptatibus inventore quae qui provident eveniet dicta at, quibusdam ipsam iusto
                            reprehenderit hic saepe nesciunt sed illo.</p>
                        <hr />
                        <div class="price">
                            <div class="front">
                                <span class="price">999 <b>$</b></span>
                            </div>
                            <div class="back">
                                <a href="#" class="button">Purchase now</a>
                            </div>
                        </div>
                    </div>
                </div>












                <!-- End        -->
            </div>

        </section>



        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading">@lang('Welcome.Let_Get')</h2>
                        <hr class="my-4">
                        <p class="mb-5">@lang('Welcome.suggestions')</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center">
                        <i class=" fa-3x mb-3 sr-contact"><a href="https://wa.me/0037379752939"><img
                                    src="https://static.adweek.com/adweek.com-prod/wp-content/uploads/sites/2/2015/09/WhatsAppIcon640x480.jpg"
                                    alt="Smiley face" height="50" width="70"></i>
                        <p>+37379752939</p></a>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                        <p>
                            <a href="mailto:it-softsolutions.com">CEO@it-softsolutions.com</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        @if(app()->getLocale() =="ar")
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"
            integrity="sha384-54+cucJ4QbVb99v8dcttx/0JRx4FHMmhOWi4W+xrXpKcsKQodCBwAvu3xxkZAwsH" crossorigin="anonymous">
        </script>
        @else
        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        @endif



        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <script src="js/Syst.min.js"></script>

    </body>

    </html>
