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
                        <a class="nav-link js-scroll-trigger" href="#PrivacyPolicy">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("FeesTOT")}}">Fees&terms</a>
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




    <section id="PrivacyPolicy">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h1 class="section-heading PPd">Privacy Policy</h1>

                    <hr class="my-4">
                    <p class="mb-5">This is the Privacy Policy for the High tech freelancer<br>website: <a
                            href="{{env("APP_URL")}}">hi-Freelancer.com</a></p>

                    <p class="mb-5">It describes the information that we collect from you as part of the normal
                        operation of our site, and how we disclose and secure this information. It also describes your
                        choices regarding use, access and correction of your personal information. What personal data we
                        collect and why we collect it. By accepting the Privacy Policy in registration or by visiting
                        and using the Site, you expressly consent to our collection, use and disclosure of your personal
                        information in accordance with this Privacy Policy.</p>
                    <h2 class="section-heading cv6 ">Data collection on our website</h2>

                    <h3 class="section-heading h3x"> 1. How do we collect your data? </h3>
                    <h4 class="h4x"> Some data are collected when you provide it to us. This could, for example, be data
                        you enter
                        on a contact form.
                        Other data are collected automatically by our IT systems when you visit the website. These data
                        are primarily technical data such as the browser and operating system you are using or when you
                        accessed the page. These data are collected automatically as soon as you enter our website.
                    </h4>
                    <h3 class="section-heading h3x">2. What do we use your data for? </h3>
                    <h4 class="h4x">Part of the data is collected to ensure the proper functioning of the website. Other
                        data can be
                        used to analyze how visitors use the site.
                    </h4>


                    <h3 class="section-heading h3x"> 3. What rights do you have regarding your data?</h3>
                    <h4 class="h4x">You always have the right to request information about your stored data, its origin,
                        its
                        recipients, and the purpose of its collection at no charge. You also have the right to request
                        that it be corrected, blocked, or deleted.
                    </h4>

                    <h3 class="section-heading h3x"> 4. Analytics and third-party tools</h3>
                    <h4 class="h4x">When visiting our website, statistical analysis may be made of your surfing
                        behavior. This
                        happens primarily using cookies and analytics. The analysis of your surfing behavior is usually
                        anonymous, i.e. we will not be able to identify you from this data. You can object to this
                        analysis or prevent it by not using certain tools. Detailed information can be found in the
                        following privacy policy.
                    </h4>

                    <h3 class="section-heading h3x">5. Data protection</h3>
                    <h4 class="h4x">If you use this website, various pieces of personal data will be collected. Personal
                        information
                        is any data with which you could be personally identified. This privacy policy explains what
                        information we collect and what we use it for. It also explains how and for what purpose this
                        happens.
                        Please note that data transmitted via the internet (e.g. via email communication) may be subject
                        to security breaches. Complete protection of your data from third-party access is not possible.

                    </h4>

                    <h3 class="section-heading h3x">6. Revocation of your consent to the processing of your data</h3>
                    <h4 class="h4x"> Many data processing operations are only possible with your express consent. You
                        may revoke
                        your consent at any time with future effect. An informal email to info@hi-Freelancer.com making
                        this request is sufficient. The data processed before we receive your request may still be
                        legally processed.
                    </h4>
                    <h3 class="section-heading h3x">7. Right to data portability</h3>
                    <h4 class="h4x"> You have the right to have data which we process based on your consent or in
                        fulfillment of a
                        contract automatically delivered to yourself or to a third party in a standard, machine-readable
                        format. If you require the direct transfer of data to another responsible party, this will only
                        be done to the extent technically feasible.
                    </h4>
                    <h3 class="section-heading h3x">8. SSL or TLS encryption</h3>
                    <h4 class="h4x"> This site uses SSL or TLS encryption for security reasons and for the protection of
                        the
                        transmission of confidential content, such as the inquiries you send to us as the site operator.
                        You can recognize an encrypted connection in your browser’s address line when it changes from
                        “http://” to “https://” and the lock icon is displayed in your browser’s address bar.
                        If SSL or TLS encryption is activated, the data you transfer to us cannot be read by third
                        parties.

                    </h4>
                    <h3 class="section-heading h3x">9. Information, blocking, deletion</h3>
                    <h4 class="h4x"> You have the right to be provided at any time with information free of charge about
                        any of your
                        personal data that is stored as well as its origin, the recipient and the purpose for which it
                        has been processed. You also have the right to have this data corrected, blocked or deleted. You
                        can contact us at any time at info@hi-Freelancer.com if you have further questions on the topic
                        of personal data.
                    </h4>
                    <h3 class="section-heading h3x">10. Cookies</h3>
                    <h4 class="h4x"> Some of our web pages use cookies. Cookies do not harm your computer and do not
                        contain any
                        viruses. Cookies help make our website more user-friendly, efficient, and secure. Cookies are
                        small text files that are stored on your computer and saved by your browser.
                        Most of the cookies we use are so-called “session cookies.” They are automatically deleted after
                        your visit. Other cookies remain in your device’s memory until you delete them. These cookies
                        make it possible to recognize your browser when you next visit the site.
                        You can configure your browser to inform you about the use of cookies so that you can decide on
                        a case-by-case basis whether to accept or reject a cookie. Alternatively, your browser can be
                        configured to automatically accept cookies under certain conditions or to always reject them, or
                        to automatically delete cookies when closing your browser. Disabling cookies may limit the
                        functionality of this website.

                    </h4>
                    <h3 class="section-heading h3x">11. Server log files</h3>
                    <h4 class="h4x">
                        The website provider automatically collects and stores information that your browser
                        automatically transmits to us in “server log files”. These are:<br>
                        <div style="text-align: left;"> • Browser type and browser version </div>
                        <div style="text-align: left;"> • Operating system used</div>
                        <div style="text-align: left;"> • Referrer URL</div>
                        <div style="text-align: left;"> • Host name of the accessing computer</div>
                        <div style="text-align: left;"> • Time of the server request</div>
                        <div style="text-align: left;"> • IP address</div><br>
                        These data will not be combined with data from other sources


                    </h4>
                    <h3 class="section-heading h3x">12. Forms</h3>
                    <h4 class="h4x">
                        Should you send us questions via the contact form or other forms on the website, we do not
                        always
                        store that data. Some forms however will collect the data entered on the form, including the
                        contact
                        details you provide, to answer your question and any follow-up questions. We do not share this
                        information without your permission.<br><br>
                        We will, therefore, process any data you enter onto the contact form only with your consent. You
                        may
                        revoke your consent at any time. An informal email to info@hi-Freelancer.com making this request
                        is
                        sufficient. The data processed before we receive your request may still be legally processed.
                        We will retain the data you provide on the contact form until you request its deletion, revoke
                        your
                        consent for its storage, or the purpose for its storage no longer pertains (e.g. after
                        fulfilling
                        your request).
                    </h4>
                    <h3 class="section-heading h3x">13. Social media</h3>
                    <h4 class="h4x">

                    </h4>


                    <h3 class="section-heading h3x">13. Social media</h3>
                    <h4 class="h4x">
                        Our Web site includes Social Media Features, such as the Facebook and Twitter buttons and
                        Widgets,
                        such as the Share this button or interactive mini-programs that run on our site. These Features
                        may
                        collect your IP address, which page you are visiting on our site, and may set a cookie to enable
                        the
                        Feature to function properly. Social Media Features and Widgets are either hosted by a third
                        party
                        or hosted directly on our Site. Your interactions with these Features are governed by the
                        privacy
                        policy of the company providing it.
                    </h4>



                    <h3 class="section-heading h3x">14. Google Analytics</h3>
                    <h4 class="h4x">
                        This website uses Google Analytics, a web analytics service operated by Google Inc.
                        Google Analytics uses so-called “cookies”. These are text files that are stored on your computer
                        and
                        that allow an analysis of the use of the website by you. The information generated by the cookie
                        about your use of this website is usually transmitted to a Google server in the USA and stored
                        there.
                        The website operator has a legitimate interest in analyzing user behavior to optimize both its
                        website and its advertising.


                    </h4>


                    <h3 class="section-heading h3x">15. IP anonymization</h3>
                    <h4 class="h4x">
                        We have activated the IP anonymization feature on this website. Your IP address will be
                        shortened by
                        Google within the European Union or other parties to the Agreement on the European Economic Area
                        prior to transmission to the United States. Only in exceptional cases is the full IP address
                        sent to
                        a Google server in the US and shortened there. Google will use this information on behalf of the
                        operator of this website to evaluate your use of the website, to compile reports on website
                        activity, and to provide other services regarding website activity and Internet usage for the
                        website operator. The IP address transmitted by your browser as part of Google Analytics will
                        not be
                        merged with any other data held by Google.

                    </h4>


                    <h3 class="section-heading h3x">16. Browser plugin</h3>
                    <h4 class="h4x">
                        You can prevent these cookies being stored by selecting the appropriate settings in your
                        browser.
                        However, we wish to point out that doing so may mean you will not be able to enjoy the full
                        functionality of this website. You can also prevent the data generated by cookies about your use
                        of
                        the website (incl. your IP address) from being passed to Google, and the processing of these
                        data by
                        Google, by downloading and installing the browser plugin available at the following link:
                        https://tools.google.com/dlpage/gaoptout?hl=en.
                        For more information about how Google Analytics handles user data, see Google’s privacy policy:
                        https://support.google.com/analytics/answer/6004245?hl=en.


                    </h4>

                    <h3 class="section-heading h3x">17. MailChimp</h3>
                    <h4 class="h4x">This website uses the services of MailChimp to send newsletters. MailChimp is a
                        service which
                        organizes and analyzes the distribution of newsletters. If you provide data (e.g. your email
                        address) to subscribe to our newsletter, it will be stored on MailChimp servers in the USA.
                        MailChimp is certified under the EU-US Privacy Shield. The Privacy Shield is an agreement
                        between
                        the European Union (EU) and the US to ensure compliance with European privacy standards in the
                        United States.
                        We use MailChimp to analyze our newsletter campaigns. When you open an email sent by MailChimp,
                        a
                        file included in the email (called a web beacon) connects to MailChimp’s servers in the United
                        States. This allows us to determine if a newsletter message has been opened and which links you
                        click on. In addition, technical information is collected (e.g. time of retrieval, IP address,
                        browser type, and operating system). This information cannot be assigned to a specific
                        recipient. It
                        is used exclusively for the statistical analysis of our newsletter campaigns. The results of
                        these
                        analyses can be used to better tailor future newsletters to your interests.
                        If you do not want your usage of the newsletter to be analyzed by MailChimp, you will have to
                        unsubscribe from the newsletter. For this purpose, we provide a link in every newsletter we
                        send.
                        For details, see the MailChimp privacy policy at https://mailchimp.com/legal/terms/.



                    </h4>


                    <h3 class="section-heading h3x">18. YouTube</h3>
                    <h4 class="h4x">Our website uses plugins from YouTube, which is operated by Google. If you visit one
                        of our
                        pages
                        featuring a YouTube plugin, a connection to the YouTube servers is established. Here the YouTube
                        server is informed about which of our pages you have visited.
                        If you’re logged in to your YouTube account, YouTube allows you to associate your browsing
                        behavior
                        directly with your personal profile. You can prevent this by logging out of your YouTube
                        account.
                        Further information about handling user data, can be found in the data protection declaration of
                        YouTube under https://www.google.de/intl/de/policies/privacy.




                    </h4>
                    <h3 class="section-heading h3x">19. Google Web Fonts</h3>
                    <h4 class="h4x">
                        For uniform representation of fonts, this site uses web fonts provided by Google. When you open
                        a
                        page, your browser loads the required web fonts into your browser cache to display texts and
                        fonts
                        correctly.
                        For this purpose your browser has to establish a direct connection to Google servers. Google
                        thus
                        becomes aware that our web page was accessed via your IP address. The use of Google Web fonts is
                        done in the interest of a uniform and attractive presentation of our website. If your browser
                        does
                        not support web fonts, a standard font is used by your computer.
                        Further information about handling user data, can be found at
                        https://developers.google.com/fonts/faq and in Google’s privacy policy at
                        https://www.google.com/policies/privacy/.

                    </h4>
                    <h3 class="section-heading h3x">20. WP Security & Firewall:</h3>
                    <h4 class="h4x">
                        For details about the plugin please see:
                        https://wordpress.org/plugins/all-in-one-wp-security-and-firewall/

                    </h4>
                    <h3 class="section-heading h3x">21. 2checkout:</h3>
                    <h4 class="h4x">
                        To allow customer to pay their invoices online, this site has a payment process integrated using
                        2checkout, head quartered in San Francisco, California, United States.
                        2checkout is a technology company. Its software allows individuals and businesses to receive
                        payments over the Internet. 2checkout provides the technical, fraud prevention, and banking
                        infrastructure required to operate on-line payment systems.
                        Further information about handling user data, can be found at
                        https://www.2checkout.com/legal/privacy/
                    </h4>
                    <h3 class="section-heading h3x">22. Twilio:</h3>
                    <h4 class="h4x">
                        This site uses Twilio to allow customers to send sms messages to the support team.
                        Twilio is a cloud communications platform as a service company based in San Francisco,
                        California. Twilio allows software developers to programmatically make and receive phone calls
                        and send and receive text messages using its web service APIs.
                        Further information about Twilio handles personal data can be found at:
                        https://www.twilio.com/legal/privacy
                    </h4>

                    <h3 class="section-heading h3x">23. Hotjar:</h3>
                    <h4 class="h4x">
                        Hotjar is a new, powerful tool that reveals the online behavior and voice of your users. By
                        combining both Analysis and Feedback tools, Hotjar gives you the 'big picture' of how to improve
                        your site's user experience and performance/conversion rates.
                        This site uses Hotjar to learn about visitor behavior and heat maps to improve user experience.
                        Hotjar’s privacy policy can be found at https://www.hotjar.com/legal/policies/privacy


                    </h4>
                    <h3 class="section-heading h3x">23. Tawk.to:</h3>
                    <h4 class="h4x">tawk.to is a free messaging app that lets you monitor and chat with. visitors on
                        your website,
                        mobile app or from a free customizable page.
                        This site uses tawk.to to effectively communicate with its visitors in real time.
                        To learn more about how tawk.to handles user data, please view
                        https://www.tawk.to/privacy-policy/


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
