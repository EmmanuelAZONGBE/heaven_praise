<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@php
    $allsingles=App\Models\Single::orderBy('id','Desc')->where('album_id',NULL)->where('masque',0)->where('statut','En Ligne')->get();
@endphp
<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}} - Heavenly Praise – Streaming Audio Gospel</title>
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

    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('assets/icons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/icons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('assets/icons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/icons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('assets/icons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/icons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('assets/icons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/icons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/icons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset('assets/icons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/icons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/icons/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{asset('assets/icons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">

    <!-- UltraNews CSS  -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/widgets.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/shop.css')}}">

    <!-- https://kamleshyadav.com/html/miraculous/html/Bootstrap4/version1/index.html Player CSS  -->
    <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/css/fonts.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="PlayerTemplate/css/bootstrap.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/js/plugins/swiper/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/js/plugins/nice_select/nice-select.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/js/plugins/player/volume.css')}}"> --}}
	<link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/js/plugins/scroll/jquery.mCustomScrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('PlayerTemplate/css/style.css')}}">
	@hasSection ('css')
		@yield('css')
	@endif
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-06T9D5TKPN"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-06T9D5TKPN');
	</script>

</head>

<body>
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
        @hasSection ('beadcrumb')
            @yield('beadcrumb')
        @endif
        @yield('content')
        @include('partials._footer')
        @include('partials._player')
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


    <script type="text/javascript" src="{{asset('PlayerTemplate/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/swiper/js/swiper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/player/jplayer.playlist.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/player/jquery.jplayer.min.js')}}"></script>
    {{-- <script type="text/javascript" src="PlayerTemplate/js/plugins/player/audio-player.js"></script> --}}
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/player/volume.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/nice_select/jquery.nice-select.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/scroll/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/custom.js')}}"></script>


{{-- originale code --}}
    {{-- <script type="text/javascript">

        if ($('.audio-player').length) {
		var myPlayListOtion = '<ul class="more_option"><li><a href="#"><span class="opt_icon" title="Add To Favourites"><span class="icon icon_fav"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Queue"><span class="icon icon_queue"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Download Now"><span class="icon icon_dwn"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Add To Playlist"><span class="icon icon_playlst"></span></span></a></li><li><a href="#"><span class="opt_icon" title="Share"><span class="icon icon_share"></span></span></a></li></ul>';

        var myPlaylist = new jPlayerPlaylist({
            jPlayer: "#jquery_jplayer_1",
            cssSelectorAncestor: "#jp_container_1"
        }, [

        {
			image : '{{asset('usx_files/covers/cover-default.jpg')}}',
            title: "Bienvenue",
            artist: "Heavenly Praise",
            mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
            oga: "usx_files/songs/welcome-heavenly-praise.ogg",
			option : myPlayListOtion
        },
        @php
            $i=1;
        @endphp
        // @foreach($allsingles   as $single)

        // {
        //         image : '{{asset('usx_files/covers/'.$single->cover)}}',
        //         title: "{{$single->titre}}",
        //         artist: "{{$single->User->nomartiste}}",
        //         mp3: "https://heavenly-praise.com/usx_files/songs/"+"{{$single->audio}}",
        //         // oga: "http://www.jplayer.org/audio/ogg/TSP-05-Your_face.ogg",
        //         option : myPlayListOtion
        // }@if($i!=sizeof($allsingles)), @endif
        // @php
        //     $i=$i+1;
        // @endphp
        // @endforeach
        // {
		// 	image : 'PlayerTemplate/images/weekly/song2.jpg',
        //     title: "Thin Ice",
        //     artist: "Screaming Trees",
        //     mp3: "http://www.jplayer.org/audio/mp3/Miaow-10-Thin-ice.mp3",
        //     oga: "http://www.jplayer.org/audio/ogg/Miaow-10-Thin-ice.ogg",
		// 	option : myPlayListOtion

        // }
        ], {
            swfPath: "PlayerTemplate/js/plugins",
            supplied: "mp3",
            wmode: "window",
            useStateClassSkin: true,
            autoBlur: false,
            smoothPlayBar: true,
            keyEnabled: true,
            playlistOptions: {
                autoPlay: false
            }
        });
        $("#jquery_jplayer_1").on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
            var current = myPlaylist.current;
            var playlist = myPlaylist.playlist;
            $.each(playlist, function(index, obj) {
                if (index == current) {
                    $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+obj.image+"'></span><div class='que_data'>" + obj.title + " <div class='jp-artist-name'>" + obj.artist + "</div></div></div>");
                }
            });
			$('.knob-wrapper').mousedown(function() {
                $(window).mousemove(function(e) {
                    var angle1 = getRotationDegrees($('.knob')),
					volume = angle1 / 270

                    if (volume > 1) {
                        $("#jquery_jplayer_1").jPlayer("volume", 1);
                    } else if (volume <= 0) {
                        $("#jquery_jplayer_1").jPlayer("mute");
                    } else {
                        $("#jquery_jplayer_1").jPlayer("volume", volume);
                        $("#jquery_jplayer_1").jPlayer("unmute");
                    }
                });

                return false;
            }).mouseup(function() {
                $(window).unbind("mousemove");
            });


			function getRotationDegrees(obj) {
				var matrix = obj.css("-webkit-transform") ||
				obj.css("-moz-transform")    ||
				obj.css("-ms-transform")     ||
				obj.css("-o-transform")      ||
				obj.css("transform");
				if(matrix !== 'none') {
					var values = matrix.split('(')[1].split(')')[0].split(',');
					var a = values[0];
					var b = values[1];
					var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
				} else { var angle = 0; }
				return (angle < 0) ? angle + 360 : angle;
			}





            var timeDrag = false;
            $('.jp-play-bar').mousedown(function(e) {
                timeDrag = true;
                updatebar(e.pageX);

            });
            $(document).mouseup(function(e) {
                if (timeDrag) {
                    timeDrag = false;
                    updatebar(e.pageX);
                }
            });
            $(document).mousemove(function(e) {
                if (timeDrag) {
                    updatebar(e.pageX);
                }
            });
            var updatebar = function(x) {
                var progress = $('.jp-progress');
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                if (percentage > 100) {
                    percentage = 100;
                }
                if (percentage < 0) {
                    percentage = 0;
                }
                $("#jquery_jplayer_1").jPlayer("playHead", percentage);
                $('.jp-play-bar').css('width', percentage + '%');
            };
            $('#playlist-toggle, #playlist-text, #playlist-wrap li a').unbind().on('click', function() {
                $('#playlist-wrap').fadeToggle();
                $('#playlist-toggle, #playlist-text').toggleClass('playlist-is-visible');
            });
            $('.hide_player').unbind().on('click', function() {
                $('.audio-player').toggleClass('is_hidden');
                $(this).html($(this).html() == '<i class="fa fa-angle-down"></i> HIDE' ? '<i class="fa fa-angle-up"></i> SHOW PLAYER' : '<i class="fa fa-angle-down"></i> HIDE');
            });
            $('body').unbind().on('click', '.audio-play-btn', function() {
                $('.audio-play-btn').removeClass('is_playing');
                $(this).addClass('is_playing');
                var playlistId = $(this).data('playlist-id');
                myPlaylist.play(playlistId);
            });

        });
    }
    </script> --}}

    {{-- <script type="text/javascript">
        if ($('.audio-player').length) {
            const localStorageKeys = {
                volume: 'audio_player_volume',
                currentTrack: 'audio_player_current_track',
                currentTime: 'audio_player_current_time',
            };

            var myPlayListOtion = `
                <ul class="more_option">
                    <li><a href="#"><span class="opt_icon" title="Add To Favourites"><span class="icon icon_fav"></span></span></a></li>
                    <li><a href="#"><span class="opt_icon" title="Add To Queue"><span class="icon icon_queue"></span></span></a></li>
                    <li><a href="#"><span class="opt_icon" title="Download Now"><span class="icon icon_dwn"></span></span></a></li>
                    <li><a href="#"><span class="opt_icon" title="Add To Playlist"><span class="icon icon_playlst"></span></span></a></li>
                    <li><a href="#"><span class="opt_icon" title="Share"><span class="icon icon_share"></span></span></a></li>
                </ul>`;

            var playlistData = [
                {
                    image: '{{ asset('usx_files/covers/cover-default.jpg') }}',
                    title: "Bienvenue",
                    artist: "Heavenly Praise",
                    mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                    oga: "usx_files/songs/welcome-heavenly-praise.ogg",
                    option: myPlayListOtion
                }
                /*
                @foreach ($allsingles as $single)
                {
                    image: '{{ asset("usx_files/covers/".$single->cover) }}',
                    title: "{{ $single->titre }}",
                    artist: "{{ $single->User->nomartiste }}",
                    mp3: "https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}",
                    option: myPlayListOtion
                }@if(!$loop->last), @endif
                @endforeach
                */
            ];

            var myPlaylist = new jPlayerPlaylist({
                jPlayer: "#jquery_jplayer_1",
                cssSelectorAncestor: "#jp_container_1"
            }, playlistData, {
                swfPath: "PlayerTemplate/js/plugins",
                supplied: "mp3",
                wmode: "window",
                useStateClassSkin: true,
                autoBlur: false,
                smoothPlayBar: true,
                keyEnabled: true,
                playlistOptions: {
                    autoPlay: false // Désactivation de la lecture automatique
                }
            });

            // Sauvegarde de l'état dans localStorage
            const saveStateToLocalStorage = () => {
                const current = myPlaylist.current;
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime;
                const volume = $("#jquery_jplayer_1").data("jPlayer").options.volume;

                localStorage.setItem(localStorageKeys.currentTrack, current);
                localStorage.setItem(localStorageKeys.currentTime, currentTime);
                localStorage.setItem(localStorageKeys.volume, volume);
            };

            // Restauration de l'état depuis localStorage
            const restoreStateFromLocalStorage = () => {
                const savedTrack = localStorage.getItem(localStorageKeys.currentTrack);
                const savedTime = localStorage.getItem(localStorageKeys.currentTime);
                const savedVolume = localStorage.getItem(localStorageKeys.volume);

                if (savedTrack !== null && savedTime !== null && savedVolume !== null) {
                    $("#jquery_jplayer_1").jPlayer("volume", parseFloat(savedVolume));

                    const trackIndex = parseInt(savedTrack, 10);
                    const trackTime = parseFloat(savedTime);

                    if (!isNaN(trackIndex) && !isNaN(trackTime)) {
                        // Charge le morceau sans démarrer la lecture
                        myPlaylist.select(trackIndex);
                        $("#jquery_jplayer_1").jPlayer("pause", trackTime);
                    }
                }
            };

            // Sauvegarde des événements de lecture/pause
            $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause, function () {
                saveStateToLocalStorage();
            });

            // Sauvegarde des changements de volume
            $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, function () {
                saveStateToLocalStorage();
            });

            // Restauration lors du chargement
            $("#jquery_jplayer_1").on($.jPlayer.event.ready, function () {
                restoreStateFromLocalStorage();
            });

            // Gestion du contrôle manuel du volume via un bouton rotatif
            $('.knob-wrapper').mousedown(function () {
                $(window).mousemove(function (e) {
                    var angle1 = getRotationDegrees($('.knob')),
                        volume = angle1 / 270;

                    if (volume > 1) {
                        $("#jquery_jplayer_1").jPlayer("volume", 1);
                    } else if (volume <= 0) {
                        $("#jquery_jplayer_1").jPlayer("mute");
                    } else {
                        $("#jquery_jplayer_1").jPlayer("volume", volume);
                        $("#jquery_jplayer_1").jPlayer("unmute");
                    }
                });

                return false;
            }).mouseup(function () {
                $(window).unbind("mousemove");
            });

            // Fonction pour obtenir la rotation actuelle d'un élément
            function getRotationDegrees(obj) {
                var matrix = obj.css("-webkit-transform") ||
                    obj.css("-moz-transform") ||
                    obj.css("-ms-transform") ||
                    obj.css("-o-transform") ||
                    obj.css("transform");
                if (matrix !== 'none') {
                    var values = matrix.split('(')[1].split(')')[0].split(',');
                    var a = values[0];
                    var b = values[1];
                    var angle = Math.round(Math.atan2(b, a) * (180 / Math.PI));
                } else {
                    var angle = 0;
                }
                return (angle < 0) ? angle + 360 : angle;
            }
        }
    </script> --}}

    <script type="text/javascript">
        $(document).ready(function () {
            if ($('.audio-player').length) {
                const localStorageKeys = {
                    volume: 'audio_player_volume',
                    currentTrack: 'audio_player_current_track',
                    currentTime: 'audio_player_current_time',
                    playlist:'audio_player_playlist'
                };

                const savedPlaylist = localStorage.getItem(localStorageKeys.playlist);


                var playlistData = savedPlaylist ? JSON.parse(savedPlaylist) : [
                    {
                        image: '{{ asset('usx_files/covers/cover-default.jpg') }}',
                        title: "Bienvenue",
                        artist: "Heavenly Praise",
                        mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                    }
                ];

                // Initialisation de la playlist
                var myPlaylist = new jPlayerPlaylist({
                    jPlayer: "#jquery_jplayer_1",
                    cssSelectorAncestor: "#jp_container_1"
                }, playlistData, {
                    swfPath: "PlayerTemplate/js/plugins",
                    supplied: "mp3",
                    wmode: "window",
                    useStateClassSkin: true,
                    autoBlur: false,
                    smoothPlayBar: true,
                    keyEnabled: true,
                    playlistOptions: {
                        autoPlay: false
                    }
                });

                // Gestion du clic sur un single
                $('.play-single').on('click', function (e) {
                    e.preventDefault();

                    const title = $(this).data('title');
                    const artist = $(this).data('artist');
                    const mp3 = $(this).data('mp3');
                    const cover = $(this).data('cover');

                    myPlaylist.add({
                        title: title,
                        artist: artist,
                        mp3: mp3,
                        poster: cover
                    });

                    // Sauvegarde  la playlist pour  permettre  la restoration
                    const currentPlaylist = JSON.stringify(myPlaylist.playlist)
                    localStorage.setItem(localStorageKeys.playlist, currentPlaylist);

                    const newTrackIndex = myPlaylist.playlist.length - 1;
                    myPlaylist.play(newTrackIndex);
                });

                // Sauvegarde dans localStorage
                const saveStateToLocalStorage = () => {
                    const current = myPlaylist.current;
                    const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime || 0;
                    const volume = $("#jquery_jplayer_1").data("jPlayer").options.volume || 1;

                    localStorage.setItem(localStorageKeys.currentTrack, current);
                    localStorage.setItem(localStorageKeys.currentTime, currentTime);
                    localStorage.setItem(localStorageKeys.volume, volume);
                };

                // Restauration depuis localStorage
                const restoreStateFromLocalStorage = () => {
                    const savedTrack = localStorage.getItem(localStorageKeys.currentTrack);
                    const savedTime = localStorage.getItem(localStorageKeys.currentTime);
                    const savedVolume = localStorage.getItem(localStorageKeys.volume);

                    if (savedTrack !== null && savedTime !== null && savedVolume !== null) {
                        const trackIndex = parseInt(savedTrack, 10);
                        const trackTime = parseFloat(savedTime);
                        const volume = parseFloat(savedVolume);

                        $("#jquery_jplayer_1").jPlayer("volume", volume);

                        if (!isNaN(trackIndex) && !isNaN(trackTime)) {
                            myPlaylist.select(trackIndex);
                            $("#jquery_jplayer_1").jPlayer("pause", trackTime);
                        }
                    }
                };

                // Sauvegarde de l'état à chaque changement
                $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause, function () {
                    saveStateToLocalStorage();
                });

                $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, function () {
                    saveStateToLocalStorage();
                });

                // Restauration lors de l'initialisation
                $("#jquery_jplayer_1").on($.jPlayer.event.ready, function () {
                    restoreStateFromLocalStorage();
                });

                // Restauration après un changement de playlist
                $("#jquery_jplayer_1").on($.jPlayer.event.setmedia, function () {
                    const currentTime = localStorage.getItem(localStorageKeys.currentTime);
                    if (currentTime) {
                        $("#jquery_jplayer_1").jPlayer("pause", parseFloat(currentTime));
                    }
                });
            }
        });
    </script>

	@hasSection ('js')
		@yield('js')
	@endif
</body>
</html>
