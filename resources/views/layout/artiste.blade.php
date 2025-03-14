<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}} - Heavenly Praise – Dashboard Artiste</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	@hasSection ('meta')
		@yield('meta')
	@endif
    <style>
        .post-title{
            font-size: 15px !important  ;
        }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.png">
    <!-- UltraNews CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/widgets.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shop.css')}}">

    <!-- https://kamleshyadav.com/html/miraculous/html/Bootstrap4/version1/index.html Player CSS  -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('player/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('player/js/plugins/swiper/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('player/js/plugins/nice_select/nice-select.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('player/js/plugins/player/volume.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('player/js/plugins/scroll/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('player/css/style.css')}}"> --}}

	@hasSection ('css')
		@yield('css')
	@endif
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-06T9D5TKPN"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-06T9D5TKPN');
	</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="category archive js">
    <div class="scroll-progress primary-bg"></div>
    {{-- <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <div data-loader="spinner"></div>
                    <p>Patientez un instant...</p>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="main-wrap">
        <!--Offcanvas sidebar-->
        @include('partials._nav')
        <!--main content-->
        @yield('beadcrumb')
        <div class="main_content shop pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        @include('user._partials._nav')
                    </div>
                    <div class="col-lg-9 col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </main>
        @include('partials._footer')
        {{-- @include('partials._player') --}}
    </div>
    <!-- Main Wrap End-->
    <div class="dark-mark"></div>
    <!-- Vendor JS-->
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/vendor/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/animated.headline.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.ticker.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/js/vendor/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery.theia.sticky.js')}}"></script>
    <!-- UltraNews JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>



    {{-- <script type="text/javascript" src="{{asset('player/js/plugins/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/plugins/player/jplayer.playlist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/plugins/player/jquery.jplayer.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/plugins/player/audio-player.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/plugins/player/volume.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/plugins/nice_select/jquery.nice-select.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('player/js/plugins/scroll/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('player/js/custom.js')}}"></script> --}}
	@hasSection ('js')
		@yield('js')
	@endif
</body>
</html>
