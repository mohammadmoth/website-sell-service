<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}" @if(app()->
getLocale() =="ar")dir="rtl" @endif >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Freelancer working online">
    <meta name="author" content="it-softsolutions.com">
    <meta name="keywords" content="freelancer, work online ,website , support, online support,">
    <meta property="og:title" content="High tech Freelanser" />
    <meta property="og:description" content="Freelancer working online" />
    <meta property="og:image"
        content="{{env("APP_URL")}}/img/web.jpg" />

    <title>High tech Freelanser</title>

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
            <a class="navbar-brand js-scroll-trigger" href="#page-top">High
                <strong>Tech</strong></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">


                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("/")}}#about">@lang('Welcome.about')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("PrivacyPolicy")}}">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#FeesTOT">Fees&terms</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("/")}}#services">Our</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("/")}}#PricingPlan">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("/")}}#contact">@lang('Welcome.contact')</a>
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
                        <a class="nav-link js-scroll-trigger" href="{{ url('home') }}">@lang('Control.Dashboard')</a>
                    </li>
                    <!--<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{ url('home') }}">@lang('Welcome.Hello') {{Auth::user()->name}} ! </a>
            </li> -->

                    @else
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('login') }}">@lang('login.login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{ url('register') }}">New Freelancer</a>
                    </li>

                    @endauth

                </ul>
            </div>
        </div>
    </nav>




    <section id="FeesTOT">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="section-heading PPd">High Tech Freelancer Fees and Charges</h1>

                    <hr class="my-4">
                    <p class="mb-5">This is the Fees and Charges for the High tech freelancer<br>website: <a
                            href="{{env("APP_URL")}}">hi-Freelancer.com</a></p>

                    <h2 class="section-heading cv6 ">For Employers</h2>

                    <h3 class="section-heading h3x">Projects </h3>
                    <h4 class="h4x"> High Tech Freelancer is free to sign up.post a project, receive bids from High Tech
                        Freelancers, review the High Tech Freelancer's portfolio and discuss the project requirements.
                        If you choose to award the project, and the High Tech Freelancer accepts, we charge you a small
                        project fee relative to the value of the selected bid, as an introduction fee.
                        The cost and how this fee is charged depends on the type of project.
                        For fixed price projects, a fee of 3% or $3.00 USD (whichever is greater) is levied at the time
                        a project that has been awarded by you has been accepted by each High Tech Freelancer you award.
                        If you subsequently pay the High Tech Freelancer more than the original bid amount we will also
                        charge the project fee on any overage payments.
                        For hourly projects, a fee of 3% is levied on each payment that you make to the High Tech
                        Freelancer.
                        You can cancel the project exclusively by contacting us. You can only request a refund with our
                        approval.

                    </h4>
                    <h3 class="section-heading h3x">Contests</h3>
                    <h4 class="h4x">At the time of posting a contest, employers must provide funds equivalent to the
                        total contest prize.
                        Note that refunds are not available on 'Guaranteed contests', and this refund does not include
                        any upgrades that you may have selected for the contest. If you've already selected an entry as
                        the winner and completed the contest handover, which has released the prize money to them, you
                        are not eligible for a refund.
                        There is no contest fee for posting and awarding the contest for employers.
                        Each additional awarded entry will also require payment of the prize for that entry.

                    </h4>


                    <h3 class="section-heading h3x"> Refunds as Bonus Credit</h3>
                    <h4 class="h4x">In some instances, refund of fees may be done as bonus credit. This bonus may only
                        be used on site, and can not be withdrawn or transferred. The bonus will expire in 90 days from
                        the date of receipt.
                    </h4>

                    <h3 class="section-heading h3x">0% Fees Promotion</h3>
                    <h4 class="h4x">High Tech Freelancer project commissions charged for High Tech Freelancers who refer
                        new employers that do not have an existing account on High Tech Freelancer.com and who join and
                        create a new account, will be reduced from 10% to 0%, for all future projects performed by the
                        referring High Tech Freelancer for the referred employer.
                        This is subject to the following conditions:<br>
                        <div style="text-align: left;"> • For the avoidance of doubt, the reduced High Tech Freelancer
                            project commission of 0% applies only in relation to new work performed by the High Tech
                            Freelancer who has successfully applied for this promotion for the specific employer to whom
                            the application relates. The new projects must commence after the employer creates a new
                            account on High Tech Freelancer.com and be initiated using that new account.</div><br>
                        <div style="text-align: left;"> • Project commission fees for the High Tech Freelancer only are
                            lowered from 10% to 0% under this promotion. All other fees and charges remain unaffected
                            including but not limited to employer commissions and transaction fees.</div><br>
                        <div style="text-align: left;"> • This promotion does not apply to contests.</div><br>
                        <div style="text-align: left;"> • High Tech Freelancer reserves the right to review
                            classifications of employers as new employers for the purpose of this promotion, to ensure
                            fair use of this promotion. Employers must have worked with, and paid, the High Tech
                            Freelancer applying to use this promotion before the beginning of this promotion, for
                            example from another platform. High Tech Freelancers may be required to provide evidence of
                            this prior work and payment before being eligible for the commission reduction. To be
                            eligible for this promotion, employers must not have had any active account on High Tech
                            Freelancer.com from which a payment was made within the 6 months immediately prior to
                            creating the new account.</div><br>
                        <div style="text-align: left;"> • All other elements of the Fees and Charges component of the
                            Additional Terms continue to apply - see https://www.Hi-Freelancer.com/Fess.</div><br>
                        <div style="text-align: left;"> • High Tech Freelancer may require that both parties fill in and
                            complete their profiles and/or pass identity checks before payments are released.</div><br>
                        <div style="text-align: left;"> • High Tech Freelancer may require that the details for any
                            project for which the commission reduction applies are appropriately complete.</div><br>
                        <div style="text-align: left;"> • This promotion may be withdrawn for a specific user, if
                            significant reversals, fraud or chargebacks are observed, if High Tech Freelancer believes
                            that there is a risk of funds being subject to reversal or chargeback, in cases of disputes
                            between employer and High Tech Freelancer, or for any other reason.</div><br>
                        <table class="table">
                            <tbody>
                                <tr>

                                    <td>RECRUITER</td>
                                    <td>$9.50</td>

                                </tr>
                                <tr>
                                    <td>NON-DISCLOSURE AGREEMENT (NDA) </td>
                                    <td>$9.50 </td>

                                </tr>
                                <tr>
                                    <td>IP AGREEMENT </td>
                                    <td>$19.00 USD</td>

                                </tr>
                                <tr>
                                    <td>SEALED </td>
                                    <td>$9.00 USD</td>

                                </tr>
                                <tr>
                                    <td>PRIORITY </td>
                                    <td>$5.00 USD</td>

                                </tr>
                                <tr>
                                    <td>EXTEND </td>
                                    <td>$9.00 USD</td>

                                </tr>

                            </tbody>
                        </table>

                    </h4>

                    <h3 class="section-heading h3x">Directory Fees</h3>
                    <h4 class="h4x">DIRECTORY SPONSORSHIP AS SELECTED AT TIME OF SPONSORING (MINIMUM $50.00 USD)

                    </h4>

                    <h3 class="section-heading h3x">Exams</h3>
                    <h4 class="h4x"> TAKING AN EXAM DEPENDENT ON EXAM. AS SPECIFIED PRIOR TO PURCHASE.<br>
                        TYPICALLY EITHER FREE, $5.00 USD, $10.00 USD, OR $15.00 USD.

                    </h4>
                    <h3 class="section-heading h3x">Transaction Fees</h3>
                    <h4 class="h4x"> TRANSACTION FEES INCURRED FOR USING CREDIT CARD, PAYPAL OR SKRILL.* $0.30 USD +
                        2.3%<br>
                        LOCAL BANK DEPOSIT FREE<br>
                        INTERNATIONAL WIRE TRANSFER $15.00 USD<br>
                        *Australian users incur $0.30AUD + 0.99% for Credit/Debit card transactions.
                    </h4>
                    <h3 class="section-heading h3x">Arbitration Fees</h3>
                    <h4 class="h4x">The arbitration fee for a milestone dispute is $5.00 USD or 5%, whichever is
                        greater.<br>
                        Our dispute resolution system is designed to allow both parties to resolve issues regarding
                        milestone payments amongst themselves without arbitration.<br>
                        After 4 days of a dispute being filed (or 7 days if the dispute is filed by the High Tech
                        Freelancer) either party may elect to move the dispute to paid arbitration. The other party will
                        then have a further 4 days to agree to pay this fee and for both parties to submit any final
                        evidence. If the other party fails to pay within time, they will lose the dispute.
                        The arbitration fee will then be refunded to the winner of the dispute.




                    </h4>
                    <h3 class="section-heading h3x">Withdrawal Fees</h3>
                    <h4 class="h4x"> Fees may be optionally levied depending on the method of withdrawal. Additional
                        fees may be levied by the third party offering the withdrawal method.<br>
                        <table class="table">
                            <tbody>
                                <tr>

                                    <td>EXPRESS WITHDRAWAL</td>
                                    <td>10% *min $9.50 </td>

                                </tr>
                                <tr>
                                    <td>PAYPAL </td>
                                    <td>Free *Paypal Fees </td>

                                </tr>
                                <tr>
                                    <td>PAYONEER DEBIT CARD </td>
                                    <td>Free *PAYONEER Fees</td>

                                </tr>
                                <tr>
                                    <td>INTERNATIONAL WIRE </td>
                                    <td>10% *min $25.00 USD</td>

                                </tr>

                            </tbody>
                        </table><br>We impose a minimum withdrawal, after fees, of USD $30.
                    </h4>
                    <h3 class="section-heading h3x">Maintenance Fee</h3>
                    <h4 class="h4x"> User Accounts that have not logged in for six months will incur a maintenance fee
                        of up to $10.00 USD per month until either the account is terminated or reactivated for storage,
                        bandwidth, support and management costs of providing hosting of the user's profile, portfolio
                        storage, listing in directories, provision of the HireMe service, file storage and message
                        storage. These fees will be refunded upon request by users on subsequent reactivation.

                    </h4>

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
