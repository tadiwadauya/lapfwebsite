<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from s-u.mnsithub.com/html/bixola/index3-one-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Dec 2025 13:55:46 GMT -->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> LAPF Website </title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/assets/images/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/assets/images/favicons/favicon-32x32.png')}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/assets/images/favicons/favicon-16x16.png')}}" />
    <link rel="manifest" href="{{ asset('front/assets/images/favicons/site.webmanifest')}}" />
    <meta name="description" content="bixola HTML 5 Template " />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/assets/vendors/bootstrap/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/animate/animate.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/animate/custom-animate.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/fontawesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/jarallax/jarallax.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/odometer/odometer.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/swiper/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/bixola-icons/style.css')}}">
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/owl-carousel/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/owl-carousel/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/jquery-ui/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/vendors/timepicker/timePicker.css')}}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/bixola.css')}}" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/bixola-responsive.css')}}" />
</head>

<body class="custom-cursor">

    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">

    <main >
            @yield('content')
        </main>

        

        </div><!-- /.page-wrapper -->

<div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{ asset('front/assets/images/resources/logo-1.png')}}" width="145"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="#">10th Floor Throgmorton House/a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+263 8677 008420/1">+263 8677 008420/1</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

        <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>


<script src="{{ asset('front/assets/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jarallax/jarallax.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/odometer/odometer.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/swiper/swiper.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/wnumb/wNumb.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/wow/wow.js')}}"></script>
<script src="{{ asset('front/assets/vendors/isotope/isotope.js')}}"></script>
<script src="{{ asset('front/assets/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
<script src="{{ asset('front/assets/vendors/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{ asset('front/assets/vendors/timepicker/timePicker.js')}}"></script>
<script src="{{ asset('front/assets/vendors/circleType/jquery.circleType.js')}}"></script>
<script src="{{ asset('front/assets/vendors/circleType/jquery.lettering.min.js')}}"></script>




<!-- template js -->
<script src="{{ asset('front/assets/js/bixola.js')}}"></script>
</body>


<!-- Mirrored from s-u.mnsithub.com/html/bixola/index3-one-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Dec 2025 13:56:33 GMT -->
</html>