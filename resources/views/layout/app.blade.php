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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery (nécessaire pour Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js (nécessaire pour les dropdowns de Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.6.0/js/bootstrap.min.js"></script>

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
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/player/audio-player.js.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/player/volume.js')}}"></script>
    <!-- <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/nice_select/jquery.nice-select.min.js')}}"></script>-->
	<script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/scroll/jquery.mCustomScrollbar.js')}}"></script>
    <script type="text/javascript" src="{{asset('PlayerTemplate/js/custom.js')}}"></script>


<!-- originale code  -->
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

{{-- <script>
    $(document).ready(function() {
    if ($('.audio-player').length) {
        // Définition des clés de stockage local
        const localStorageKeys = {
            volume: 'audio_player_volume',
            currentTrack: 'audio_player_current_track',
            currentTime: 'audio_player_current_time',
            playlist: 'audio_player_playlist',
            progress: 'audio_player_progress',
            currentMinutes: 'audio_player_current_minutes',
            currentSeconds: 'audio_player_current_seconds',
            isPlaying: 'audio_player_is_playing',
            single: 'audio_player_single'
        };

        // Variables de gestion du lecteur
        let currentSong = {}; // Objet pour stocker la chanson en cours
        let currentSongId = null; // Variable pour stocker l'ID de la chanson en cours
        let hasPlayedToEnd = false; // Flag pour suivre si la chanson a été lue jusqu'à la fin
        let playTimeout = null; // Pour gérer la limite de lecture des chansons payantes
        let previousState = {}; // Pour optimiser les sauvegardes d'état

        // Playlist par défaut avec un son d'accueil
        const defaultPlaylist = [
            {
                image: '{{ asset("usx_files/covers/cover-default.jpg") }}',
                title: "Bienvenue",
                artist: "Heavenly Praise",
                // mp3: '{{ asset("usx_files/songs/welcome-heavenly-praise.mp3") }}',
                mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                type: "gratuit",
                option: ""
            }
        ];

        // Récupération de la playlist depuis localStorage ou utilisation de la playlist par défaut
        const savedPlaylist = localStorage.getItem(localStorageKeys.playlist);
        const singlefromStorage = localStorage.getItem(localStorageKeys.single);
        console.log('Données single chargées:', singlefromStorage);

        const single = singlefromStorage ? JSON.parse(singlefromStorage) : null;
        const playlistData = !single && savedPlaylist ? JSON.parse(savedPlaylist) : single ? [
            {
                ...single,
                image: single.img,
                option: ""
            }
        ] : defaultPlaylist;

        console.log('Playlist chargée:', playlistData);

        // Initialisation du lecteur avec la playlist récupérée
        const myPlaylist = new jPlayerPlaylist({
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

        /**
         * Sauvegarde la playlist actuelle dans le stockage local
         */
        function savePlaylistToStorage() {
            try {
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(myPlaylist.playlist));
                console.log("Playlist sauvegardée avec succès");
            } catch (error) {
                console.error("Erreur lors de la sauvegarde de la playlist:", error);
            }
        }

        /**
         * Sauvegarde l'état complet du lecteur dans le stockage local
         */
        function saveStateToLocalStorage() {
            try {
                const current = myPlaylist.current;
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");

                if (!jPlayer || !jPlayer.status) return; // Protection contre les erreurs

                const currentTime = jPlayer.status.currentTime || 0;
                const volume = jPlayer.options.volume || 1;
                const duration = jPlayer.status.duration || 1; // Éviter division par zéro
                const progress = (currentTime / duration) * 100; // Pourcentage de progression
                const currentMinutes = Math.floor(currentTime / 60); // Minutes écoulées
                const currentSeconds = Math.floor(currentTime % 60); // Secondes écoulées
                const isPlaying = !jPlayer.status.paused; // État de lecture (play/pause)

                // Construire l'état actuel pour comparaison
                const currentState = {
                    track: current,
                    time: currentTime,
                    volume: volume,
                    isPlaying: isPlaying
                };

                // Ne sauvegarder que si l'état a changé
                if (JSON.stringify(previousState) !== JSON.stringify(currentState)) {
                    localStorage.setItem(localStorageKeys.currentTrack, current);
                    localStorage.setItem(localStorageKeys.currentTime, currentTime);
                    localStorage.setItem(localStorageKeys.volume, volume);
                    localStorage.setItem(localStorageKeys.progress, progress);
                    localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
                    localStorage.setItem(localStorageKeys.currentSeconds, currentSeconds);
                    localStorage.setItem(localStorageKeys.isPlaying, isPlaying);

                    previousState = currentState;
                    console.log("État du lecteur sauvegardé: Temps=" + currentTime + "s, Progression=" + progress.toFixed(1) + "%, En lecture=" + isPlaying);
                }
            } catch (error) {
                console.error("Erreur lors de la sauvegarde de l'état:", error);
            }
        }

        /**
         * Restaure l'état du lecteur depuis le stockage local
         */
        function restoreStateFromLocalStorage() {
            try {
                const currentTrackIndex = localStorage.getItem(localStorageKeys.currentTrack);
                const currentTime = localStorage.getItem(localStorageKeys.currentTime);
                const savedVolume = localStorage.getItem(localStorageKeys.volume);
                const isPlaying = localStorage.getItem(localStorageKeys.isPlaying) === 'true';

                console.log("Tentative de restauration: Piste=" + currentTrackIndex + ", Temps=" + currentTime + "s, En lecture=" + isPlaying);

                if (savedVolume !== null) {
                    $("#jquery_jplayer_1").jPlayer("volume", parseFloat(savedVolume));
                }

                if (currentTrackIndex !== null && playlistData.length > 0) {
                    const trackIndex = parseInt(currentTrackIndex, 10);

                    if (!isNaN(trackIndex) && trackIndex >= 0 && trackIndex < myPlaylist.playlist.length) {
                        // Sélectionner la piste mais ne pas la lire automatiquement
                        console.log("Sélection de la piste " + trackIndex);
                        myPlaylist.select(trackIndex);

                        // Attendre que le média soit chargé avant de définir la position
                        $("#jquery_jplayer_1").one($.jPlayer.event.loadeddata, function() {
                            console.log("Média chargé, définition de la position à " + currentTime + "s");
                            if (currentTime !== null) {
                                // Définir la position exacte en secondes
                                $("#jquery_jplayer_1").jPlayer("play", parseFloat(currentTime));

                                // Si la chanson n'était pas en cours de lecture, mettre en pause immédiatement
                                if (!isPlaying) {
                                    setTimeout(function() {
                                        $("#jquery_jplayer_1").jPlayer("pause");
                                        console.log("Pause automatique appliquée");
                                    }, 50);
                                }
                            }
                        });

                        // Fallback si loadeddata ne se déclenche pas
                        setTimeout(function() {
                            if (currentTime !== null) {
                                console.log("Fallback: définition de la position à " + currentTime + "s");
                                $("#jquery_jplayer_1").jPlayer("play", parseFloat(currentTime));

                                if (!isPlaying) {
                                    setTimeout(function() {
                                        $("#jquery_jplayer_1").jPlayer("pause");
                                    }, 50);
                                }
                            }
                        }, 1500);
                    }
                }

                updateProgressDisplay();
            } catch (error) {
                console.error("Erreur lors de la restauration de l'état:", error);
                // Tenter à nouveau après un délai
                setTimeout(restoreStateFromLocalStorage, 1000);
            }
        }

        /**
         * Mise à jour visuelle de la barre de progression
         */
        function updateProgressDisplay() {
            try {
                const savedProgress = localStorage.getItem(localStorageKeys.progress);
                const savedMinutes = localStorage.getItem(localStorageKeys.currentMinutes);
                const savedSeconds = localStorage.getItem(localStorageKeys.currentSeconds);

                if (savedProgress !== null) {
                    $('.jp-play-bar').css('width', savedProgress + '%');
                }

                if (savedMinutes !== null && savedSeconds !== null) {
                    const formattedSeconds = savedSeconds < 10 ? '0' + savedSeconds : savedSeconds;
                    $('.jp-current-time').text(savedMinutes + ':' + formattedSeconds);
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour de l'affichage:", error);
            }
        }

        /**
         * Mise à jour dynamique de la barre de progression pendant la lecture
         */
        function updateProgressBar() {
            try {
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
                if (!jPlayer || !jPlayer.status) return; // Protection contre les erreurs

                const currentTime = jPlayer.status.currentTime || 0;
                const duration = jPlayer.status.duration || 1; // Éviter division par zéro
                const percentage = (currentTime / duration) * 100;
                const currentMinutes = Math.floor(currentTime / 60);
                const currentSeconds = Math.floor(currentTime % 60);

                // Formater le temps pour l'affichage (MM:SS)
                const formattedSeconds = currentSeconds < 10 ? '0' + currentSeconds : currentSeconds;
                const formattedTime = currentMinutes + ':' + formattedSeconds;

                // Mettre à jour l'affichage visuel
                $('.jp-play-bar').css('width', percentage + '%');
                $('.jp-current-time').text(formattedTime);

                // Sauvegarder les informations précises
                localStorage.setItem(localStorageKeys.currentTime, currentTime.toString());
                localStorage.setItem(localStorageKeys.progress, percentage.toString());
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes.toString());
                localStorage.setItem(localStorageKeys.currentSeconds, currentSeconds.toString());

                // Vérifier si on est à la fin de la chanson
                if (currentTime >= duration - 0.5 && !hasPlayedToEnd && currentSongId) {
                    hasPlayedToEnd = true;
                    console.log("Chanson terminée, comptabilisation de l'écoute");
                    registerListening("ecoute", currentSongId);
                }

                // Vérifier pour les chansons payantes
                const currentTrack = myPlaylist.playlist[myPlaylist.current];
                if (currentTrack && currentTrack.type === 'payant' && currentTime > 30) {
                    // S'assurer que le timeout est nettoyé avant d'en créer un nouveau
                    if (playTimeout) clearTimeout(playTimeout);

                    playTimeout = setTimeout(function() {
                        $("#jquery_jplayer_1").jPlayer("pause");
                        alert("Cette chanson est payante. Abonnez-vous pour écouter en entier.");
                    }, 100); // Presque immédiat à ce stade
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour de la barre de progression:", error);
            }
        }

        /**
         * Gestion du bouton de volume rotatif
         */
        $('.knob-wrapper').mousedown(function() {
            $(window).mousemove(function(e) {
                try {
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
                } catch (error) {
                    console.error("Erreur de contrôle du volume:", error);
                }
            });

            return false;
        }).mouseup(function() {
            $(window).unbind("mousemove");
        });

        /**
         * Gestion du drag de la barre de progression
         */
        var timeDrag = false;
        $('.jp-seek-bar').mousedown(function(e) {
            timeDrag = true;
            updatebar(e.pageX);
        });

        $(document).mouseup(function(e) {
            if (timeDrag) {
                timeDrag = false;
                updatebar(e.pageX);
                // Sauvegarder l'état après le déplacement manuel
                setTimeout(saveStateToLocalStorage, 100);
            }
        });

        $(document).mousemove(function(e) {
            if (timeDrag) {
                updatebar(e.pageX);
            }
        });

        /**
         * Met à jour la position de lecture en fonction de la position du clic
         */
        function updatebar(x) {
            try {
                var progress = $('.jp-progress');
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                percentage = Math.max(0, Math.min(100, percentage));
                $("#jquery_jplayer_1").jPlayer("playHead", percentage);
                $('.jp-play-bar').css('width', percentage + '%');
            } catch (error) {
                console.error("Erreur lors de la mise à jour de la barre:", error);
            }
        }

        /**
         * Ajoute une chanson à la playlist
         */
        function addSongToPlaylist(songData) {
            try {
                if (!songData || !songData.mp3) {
                    alert('Données de chanson incomplètes');
                    return false;
                }

                if (songData.type === 'payant') {
                    alert("Cette chanson est payante. Veuillez l'acheter avant de l'ajouter à votre playlist.");
                    return false;
                }

                const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === songData.mp3);
                if (isDuplicate) {
                    alert("Cette chanson est déjà dans la playlist.");
                    return false;
                }

                // Ajout à la playlist
                const song = {
                    id: songData.id || null,
                    title: songData.title,
                    artist: songData.artist,
                    mp3: songData.mp3,
                    image: songData.img,
                    type: songData.type || 'gratuit',
                    option: ""
                };

                myPlaylist.add(song);
                $('.playlist-items').append('<li class="playlist-item" data-title="' + songData.title + '" data-artist="' + songData.artist + '" data-img="' + songData.img + '" data-mp3="' + songData.mp3 + '">' + songData.title + ' - ' + songData.artist + '</li>');
                savePlaylistToStorage();
                alert(songData.title + ' - ' + songData.artist + ' a été ajouté à la playlist.');
                return true;
            } catch (error) {
                console.error("Erreur lors de l'ajout à la playlist:", error);
                return false;
            }
        }

        /**
         * Gestion des événements du lecteur (play, pause, etc.)
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause + ' ' + $.jPlayer.event.seeked, function(event) {
            saveStateToLocalStorage();
            console.log("Événement détecté: " + event.type + ", état sauvegardé");

            // Réinitialiser le timeout pour les chansons payantes
            if (playTimeout) {
                clearTimeout(playTimeout);
                playTimeout = null;
            }

            // Réinitialiser le flag d'écoute complète au début de la lecture
            if (event.type === $.jPlayer.event.play) {
                hasPlayedToEnd = false;
            }

            // Réinitialiser le flag d'écoute si l'utilisateur revient en arrière dans la chanson
            if (event.type === $.jPlayer.event.seeked) {
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
                if (jPlayer && jPlayer.status) {
                    const currentTime = jPlayer.status.currentTime || 0;
                    const duration = jPlayer.status.duration || 1;

                    // Si l'utilisateur revient à moins de 80% de la chanson, réinitialiser le flag
                    if (currentTime < duration * 0.8) {
                        hasPlayedToEnd = false;
                        console.log("Seek en arrière détecté, réinitialisation du flag d'écoute");
                    }
                }
            }
        });

        /**
         * Sauvegarder l'état périodiquement pendant la lecture
         */
        setInterval(function() {
            const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
            if (jPlayer && !jPlayer.status.paused) {
                saveStateToLocalStorage();
            }
        }, 5000);

        /**
         * Sauvegarder l'état avant que l'utilisateur ne quitte la page
         */
        $(window).on('beforeunload', saveStateToLocalStorage);

        /**
         * Événements supplémentaires du lecteur
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, saveStateToLocalStorage);
        $("#jquery_jplayer_1").on($.jPlayer.event.timeupdate, updateProgressBar);
        $("#jquery_jplayer_1").on($.jPlayer.event.ended, function() {
            playTimeout = null; // Réinitialiser le timeout
            hasPlayedToEnd = false; // Réinitialiser le flag d'écoute

            // Vérifier si l'écoute a été comptabilisée, sinon la comptabiliser maintenant
            if (!hasPlayedToEnd && currentSongId) {
                console.log("Événement ended déclenché - comptabilisation de l'écoute");
                registerListening("ecoute", currentSongId);
            }
        });

        /**
         * Restauration après chargement du lecteur
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ready, function() {
            console.log("Lecteur prêt, tentative de restauration");
            restoreStateFromLocalStorage();
        });

        /**
         * Mise à jour des informations de la chanson en cours
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
            try {
                var single = localStorage.getItem(localStorageKeys.single);
                if (single) {
                    const singleData = JSON.parse(single);
                    $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+singleData.img+"'></span><div class='que_data'>" + singleData.title + " <div class='jp-artist-name'>" + singleData.artist + "</div></div></div>");
                    localStorage.removeItem(localStorageKeys.single);
                } else {
                    var current = myPlaylist.current;
                    var playlist = myPlaylist.playlist;
                    $.each(playlist, function(index, obj) {
                        if (index == current) {
                            $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+obj.image+"'></span><div class='que_data'>" + obj.title + " <div class='jp-artist-name'>" + obj.artist + "</div></div></div>");
                        }
                    });
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour des informations de chanson:", error);
            }
        });

        // Add this near the top with your other variables
        let clickDebounceTimer = null;
        const CLICK_DEBOUNCE_TIME = 5000;
        const listenedSongsKey = 'listened_songs';

        // Improved registerListening function with debounce for clicks
        function registerListening(action, songId) {
            if (!songId) {
                console.error("ID de chanson manquant pour l'enregistrement");
                return;
            }

            // For click actions, implement debounce
            if (action === "click") {
                // Clear any existing timer
                if (clickDebounceTimer) {
                    clearTimeout(clickDebounceTimer);
                }

                // Check if this song was clicked recently
                const clickedSongs = JSON.parse(localStorage.getItem('clicked_songs') || '{}');
                const lastClickTime = clickedSongs[songId] || 0;
                const currentTime = new Date().getTime();

                // If it's been less than the debounce time, don't count this click
                if (currentTime - lastClickTime < CLICK_DEBOUNCE_TIME) {
                    console.log("Click ignored - debounce in effect for song ID " + songId);
                    return;
                }

                // Update the last click time for this song
                clickedSongs[songId] = currentTime;
                localStorage.setItem('clicked_songs', JSON.stringify(clickedSongs));

                // Set the debounce timer
                clickDebounceTimer = setTimeout(() => {
                    clickDebounceTimer = null;
                }, CLICK_DEBOUNCE_TIME);
            }

            // For listen actions, check if the song has been listened to recently
            if (action === "ecoute") {
                const listenedSongs = JSON.parse(localStorage.getItem(listenedSongsKey) || '{}');
                const lastListenTime = listenedSongs[songId] || 0;
                const currentTime = new Date().getTime();

                // Don't count if listened within the last hour (3600000 ms)
                if (currentTime - lastListenTime < 3600000) {
                    console.log("Listen ignored - already counted in the last hour for song ID " + songId);
                    return;
                }

                // Update the last listen time
                listenedSongs[songId] = currentTime;
                localStorage.setItem(listenedSongsKey, JSON.stringify(listenedSongs));
            }

            // Make the AJAX call to register the action
            $.ajax({
                url: "/ecouter-chanson",
                type: "POST",
                data: {
                    single_id: songId,
                    action: action,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        console.log("Action " + action + " enregistrée avec succès:", response);

                        // Update UI counters if needed
                        if (action === "ecoute") {
                            $('#hit-count').text(response.nombre_ecoutes + (response.nombre_ecoutes > 1 ? ' Écoutes' : ' Écoute'));
                        } else if (action === "click") {
                            $('#click-count').text(response.nombre_clicks + (response.nombre_clicks > 1 ? ' Clicks' : ' Click'));
                        }
                    }
                },
                error: function(xhr) {
                    console.error("Erreur lors de l'enregistrement de l'action " + action, xhr.responseText);
                }
            });
        }

        /**
         * Gestion des clics sur les chansons
         */
        $('body').on('click', '.play-song, .play-single, .play-s1, .play-s2', function() {
            try {
                var singleId = $(this).data('id');
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var img = $(this).data('img');
                var mp3 = $(this).data('mp3');
                var type = $(this).data('type');

                if (title && artist && img && mp3) {
                    currentSongId = singleId;
                    // Réinitialiser le flag d'écoute lors du changement de chanson
                    hasPlayedToEnd = false;

                    $("#jquery_jplayer_1").jPlayer("setMedia", { mp3, oga: mp3.replace('.mp3', '.ogg') }).jPlayer("play");
                    currentSong = { title, artist, img, mp3, type };

                    // Mise à jour des informations sur la barre de lecture
                    $('.jp-track-name').text(title);
                    $('.jp-artist-name').text(artist);
                    $('.jp-cover-art').attr('src', img);

                    // Stocker dans localStorage
                    localStorage.setItem(localStorageKeys.single, JSON.stringify({title, artist, img, mp3, type}));
                    $("#jquery_jplayer_1").jPlayer("setMedia", { mp3: single.mp3 }).jPlayer("play");

                    // Enregistrer le clic sur la chanson
                    if (singleId) {
                        registerListening("click", singleId);
                    }

                    // Si c'est une chanson payante, mettre en place la limite de 30 secondes
                    if (type === 'payant') {
                        console.log("Chanson payante détectée, lecture limitée à 30 secondes.");
                        if (playTimeout) clearTimeout(playTimeout);
                        playTimeout = setTimeout(function() {
                            $("#jquery_jplayer_1").jPlayer("pause");
                            console.log("Lecture arrêtée après 30 secondes pour chanson payante.");
                            alert("Cette chanson est payante. Abonnez-vous pour écouter en entier.");
                        }, 30000);
                    }
                } else {
                    console.error('Données manquantes pour jouer la chanson.');
                }
            } catch (error) {
                console.error("Erreur lors de la lecture de la chanson:", error);
            }

        });

        /**
         * Gestion des écoutes sur les chansons
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ended, function() {
            const player = $("#jquery_jplayer_1").data("jPlayer").status;
            if (player.currentTime >= player.duration - 1 && !hasPlayedToEnd && currentSongId) {
                hasPlayedToEnd = true;

                $.ajax({
                    url: "/ecouter-chanson",
                    type: "POST",
                    data: {
                        single_id: currentSongId,
                        action: "ecoute",
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log("Nombre d'écoutes mis à jour :", response.nombre_ecoutes);
                            $('#hit-count').text(response.nombre_ecoutes + (response.nombre_ecoutes > 1 ? ' Écoutes' : ' Écoute'));
                        }
                    },
                    error: function(xhr) {
                        console.error("Erreur lors de l'incrémentation des écoutes", xhr.responseText);
                    }
                });
            }
        });


        /**
         * Permettre la lecture en cliquant sur le titre
         */
        $(".single-item__title a, .titl a, .song a").on("click", function(e) {
            e.preventDefault();
            $(this).closest(".single-item, .song-card").find(".play-single, .play-s2, .play-s1").trigger("click");
        });

        /**
         * Ajout de la chanson en cours à la playlist
         */
        $('.add-to-playlist').on('click', function() {
            var type = $(this).data('type');
            if (currentSong.mp3) {
                addSongToPlaylist(currentSong);
            } else {
                console.error('Aucune chanson en cours de lecture à ajouter.');
                alert('Aucune chanson en cours de lecture à ajouter.');
            }
        });

        /**
         * Ajout d'une chanson depuis un bouton dédié
         */
        $('.add').on('click', function() {
            var songData = {
                id: $(this).data('id'),
                title: $(this).data('title'),
                artist: $(this).data('artist'),
                mp3: $(this).data('mp3'),
                img: $(this).data('img'),
                type: $(this).data('type')
            };

            addSongToPlaylist(songData);
        });

        /**
         * Réinitialisation de la playlist
         */
        $('.ms_clear').on('click', function() {
            if (confirm("Voulez-vous vraiment réinitialiser la playlist ?")) {
                myPlaylist.setPlaylist(defaultPlaylist);
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(defaultPlaylist));
                alert("Playlist réinitialisée.");
            }
        });

        /**
         * Sauvegarde manuelle de la playlist
         */
        $('#save-playlist').on('click', savePlaylistToStorage);

        /**
         * Gestion du partage de chansons
         */
        $('.action-btn.share').on('click', function(event) {
            event.preventDefault();
            try {
                var title = $(this).closest('.song-card').data('title');
                var artist = $(this).closest('.song-card').data('artist');
                var coverUrl = $(this).closest('.song-card').data('cover');
                var shareText = 'Écoutez "' + title + '" par ' + artist + ' sur Heavenly Praise!';
                var shareUrl = window.location.href;
                var type = $(this).data('type');

                // Vérification si la chanson est payante
                if (type === 'payant') {
                    console.warn("Le partage de cette chanson est restreint car elle est payante.");
                    alert("Cette chanson est payante et ne peut pas être partagée publiquement.");
                    return;
                }

                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: shareText,
                        url: shareUrl
                    }).then(() => {
                        console.log('Partage réussi');
                    }).catch((error) => {
                        console.error('Erreur de partage:', error);
                    });
                } else {
                    // Solution de repli pour les navigateurs qui ne supportent pas l'API de partage
                    alert('Fonctionnalité de partage non supportée sur ce navigateur.');
                }
            } catch (error) {
                console.error("Erreur lors du partage:", error);
            }
        });

        /**
         * Gestion des likes
         */
        // $('.action-btn.like').on('click', function(event) {
        //     event.preventDefault();
        //     try {
        //         var likeButton = $(this);
        //         var likeCountElement = likeButton.siblings('.like-count');
        //         var singleId = likeButton.data('id');
        //         var type = $(this).data('type');

        //         // Bloquer le like pour les singles payants
        //         if (type === 'payant') {
        //             console.warn("Le like de cette chanson est restreint car elle est payante.");
        //             alert("Cette chanson est payante. Vous devez l'acheter avant de pouvoir l'aimer.");
        //             return;
        //         }

        //         if (!singleId) {
        //             console.error("ID de chanson manquant pour le like");
        //             return;
        //         }

        //         $.ajax({
        //             url: "/toggle-like",
        //             type: "POST",
        //             data: {
        //                 single_id: singleId,
        //                 _token: $('meta[name="csrf-token"]').attr('content')
        //             },
        //             success: function(response) {
        //                 if (response.success) {
        //                     likeCountElement.text(response.nombre_aimes);
        //                     alert(response.message);
        //                 } else {
        //                     alert(response.message);
        //                 }
        //             },
        //             error: function(xhr) {
        //                 console.error("Erreur lors de la mise à jour des likes", xhr.responseText);
        //             }
        //         });
        //     } catch (error) {
        //         console.error("Erreur lors du like:", error);
        //     }
        // });

        $('.action-btn.like').on('click', function(event) {
            event.preventDefault();
            var likeButton = $(this);
            var likeCountElement = likeButton.siblings('.like-count');
            var singleId = likeButton.data('id');
            var type = likeButton.data('type');

            if (type === 'payant') {
                console.warn("Le like de cette chanson est restreint car elle est payante.");
                alert("Cette chanson est payante. Vous devez l'acheter avant de pouvoir l'aimer.");
                return;
            }

            $.ajax({
                url: "/toggle-like",
                type: "POST",
                data: {
                    single_id: singleId,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        likeCountElement.text(response.nombre_aimes);
                        alert(response.message);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    console.error("Erreur lors de la mise à jour des likes", xhr.responseText);
                }
            });
        });


        /**
         * Gestion des téléchargements
         */
        $('.action-btn.tele').on('click', function(event) {
            event.preventDefault();
            try {
                var songTitle = $(this).attr('data-title') || 'Chanson';
                var artist = $(this).attr('data-artist') || 'Artiste inconnu';
                var mp3Url = $(this).attr('data-mp3');
                var type = $(this).data('type');

                if (!mp3Url) {
                    alert("Le fichier audio est introuvable.");
                    return;
                }

                // Bloquer le téléchargement pour les singles payants
                if (type === 'payant') {
                    console.warn("Le téléchargement de cette chanson est restreint car elle est payante.");
                    alert("Cette chanson est payante. Vous devez l'acheter avant de pouvoir la télécharger.");
                    return;
                }

                // Créer un lien de téléchargement
                var downloadLink = document.createElement("a");
                downloadLink.href = mp3Url;
                downloadLink.download = songTitle + " - " + artist + ".mp3";
                document.body.appendChild(downloadLink);

                // Déclencher le téléchargement
                downloadLink.click();

                // Nettoyer après téléchargement
                document.body.removeChild(downloadLink);
            } catch (error) {
                console.error("Erreur lors du téléchargement:", error);
            }
        });
    }
});
</script> --}}

<script>
    $(document).ready(function() {
    if ($('.audio-player').length) {
        // Définition des clés de stockage local
        const localStorageKeys = {
            volume: 'audio_player_volume',
            currentTrack: 'audio_player_current_track',
            currentTime: 'audio_player_current_time',
            playlist: 'audio_player_playlist',
            progress: 'audio_player_progress',
            currentMinutes: 'audio_player_current_minutes',
            currentSeconds: 'audio_player_current_seconds',
            isPlaying: 'audio_player_is_playing',
            single: 'audio_player_single'
        };

        // Variables de gestion du lecteur
        let currentSong = {}; // Objet pour stocker la chanson en cours
        let currentSongId = null; // Variable pour stocker l'ID de la chanson en cours
        let hasPlayedToEnd = false; // Flag pour suivre si la chanson a été lue jusqu'à la fin
        let playTimeout = null; // Pour gérer la limite de lecture des chansons payantes
        let previousState = {}; // Pour optimiser les sauvegardes d'état

        // Playlist par défaut avec un son d'accueil
        const defaultPlaylist = [
            {
                image: '{{ asset("usx_files/covers/cover-default.jpg") }}',
                title: "Bienvenue",
                artist: "Heavenly Praise",
                // mp3: '{{ asset("usx_files/songs/welcome-heavenly-praise.mp3") }}',
                mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                type: "gratuit",
                option: ""
            }
        ];

        // Récupération de la playlist depuis localStorage ou utilisation de la playlist par défaut
        const savedPlaylist = localStorage.getItem(localStorageKeys.playlist);
        const singlefromStorage = localStorage.getItem(localStorageKeys.single);
        console.log('Données single chargées:', singlefromStorage);

        const single = singlefromStorage ? JSON.parse(singlefromStorage) : null;
        const playlistData = !single && savedPlaylist ? JSON.parse(savedPlaylist) : single ? [
            {
                ...single,
                image: single.img,
                option: ""
            }
        ] : defaultPlaylist;

        console.log('Playlist chargée:', playlistData);

        // Initialisation du lecteur avec la playlist récupérée
        const myPlaylist = new jPlayerPlaylist({
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

        /**
         * Sauvegarde la playlist actuelle dans le stockage local
         */
        function savePlaylistToStorage() {
            try {
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(myPlaylist.playlist));
                console.log("Playlist sauvegardée avec succès");
            } catch (error) {
                console.error("Erreur lors de la sauvegarde de la playlist:", error);
            }
        }

        /**
         * Sauvegarde l'état complet du lecteur dans le stockage local
         */
        function saveStateToLocalStorage() {
            try {
                const current = myPlaylist.current;
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");

                if (!jPlayer || !jPlayer.status) return; // Protection contre les erreurs

                const currentTime = jPlayer.status.currentTime || 0;
                const volume = jPlayer.options.volume || 1;
                const duration = jPlayer.status.duration || 1; // Éviter division par zéro
                const progress = (currentTime / duration) * 100; // Pourcentage de progression
                const currentMinutes = Math.floor(currentTime / 60); // Minutes écoulées
                const currentSeconds = Math.floor(currentTime % 60); // Secondes écoulées
                const isPlaying = !jPlayer.status.paused; // État de lecture (play/pause)

                // Construire l'état actuel pour comparaison
                const currentState = {
                    track: current,
                    time: currentTime,
                    volume: volume,
                    isPlaying: isPlaying
                };

                // Ne sauvegarder que si l'état a changé
                if (JSON.stringify(previousState) !== JSON.stringify(currentState)) {
                    localStorage.setItem(localStorageKeys.currentTrack, current);
                    localStorage.setItem(localStorageKeys.currentTime, currentTime);
                    localStorage.setItem(localStorageKeys.volume, volume);
                    localStorage.setItem(localStorageKeys.progress, progress);
                    localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
                    localStorage.setItem(localStorageKeys.currentSeconds, currentSeconds);
                    localStorage.setItem(localStorageKeys.isPlaying, isPlaying);

                    previousState = currentState;
                    console.log("État du lecteur sauvegardé: Temps=" + currentTime + "s, Progression=" + progress.toFixed(1) + "%, En lecture=" + isPlaying);
                }
            } catch (error) {
                console.error("Erreur lors de la sauvegarde de l'état:", error);
            }
        }

        /**
         * Restaure l'état du lecteur depuis le stockage local
         */
        function restoreStateFromLocalStorage() {
            try {
                const currentTrackIndex = localStorage.getItem(localStorageKeys.currentTrack);
                const currentTime = localStorage.getItem(localStorageKeys.currentTime);
                const savedVolume = localStorage.getItem(localStorageKeys.volume);
                const isPlaying = localStorage.getItem(localStorageKeys.isPlaying) === 'true';

                console.log("Tentative de restauration: Piste=" + currentTrackIndex + ", Temps=" + currentTime + "s, En lecture=" + isPlaying);

                if (savedVolume !== null) {
                    $("#jquery_jplayer_1").jPlayer("volume", parseFloat(savedVolume));
                }

                if (currentTrackIndex !== null && playlistData.length > 0) {
                    const trackIndex = parseInt(currentTrackIndex, 10);

                    if (!isNaN(trackIndex) && trackIndex >= 0 && trackIndex < myPlaylist.playlist.length) {
                        // Sélectionner la piste mais ne pas la lire automatiquement
                        console.log("Sélection de la piste " + trackIndex);
                        myPlaylist.select(trackIndex);

                        // Attendre que le média soit chargé avant de définir la position
                        $("#jquery_jplayer_1").one($.jPlayer.event.loadeddata, function() {
                            console.log("Média chargé, définition de la position à " + currentTime + "s");
                            if (currentTime !== null) {
                                // Définir la position exacte en secondes
                                $("#jquery_jplayer_1").jPlayer("play", parseFloat(currentTime));

                                // Si la chanson n'était pas en cours de lecture, mettre en pause immédiatement
                                if (!isPlaying) {
                                    setTimeout(function() {
                                        $("#jquery_jplayer_1").jPlayer("pause");
                                        console.log("Pause automatique appliquée");
                                    }, 50);
                                }
                            }
                        });

                        // Fallback si loadeddata ne se déclenche pas
                        setTimeout(function() {
                            if (currentTime !== null) {
                                console.log("Fallback: définition de la position à " + currentTime + "s");
                                $("#jquery_jplayer_1").jPlayer("play", parseFloat(currentTime));

                                if (!isPlaying) {
                                    setTimeout(function() {
                                        $("#jquery_jplayer_1").jPlayer("pause");
                                    }, 50);
                                }
                            }
                        }, 1500);
                    }
                }

                updateProgressDisplay();
            } catch (error) {
                console.error("Erreur lors de la restauration de l'état:", error);
                // Tenter à nouveau après un délai
                setTimeout(restoreStateFromLocalStorage, 1000);
            }
        }

        /**
         * Mise à jour visuelle de la barre de progression
         */
        function updateProgressDisplay() {
            try {
                const savedProgress = localStorage.getItem(localStorageKeys.progress);
                const savedMinutes = localStorage.getItem(localStorageKeys.currentMinutes);
                const savedSeconds = localStorage.getItem(localStorageKeys.currentSeconds);

                if (savedProgress !== null) {
                    $('.jp-play-bar').css('width', savedProgress + '%');
                }

                if (savedMinutes !== null && savedSeconds !== null) {
                    const formattedSeconds = savedSeconds < 10 ? '0' + savedSeconds : savedSeconds;
                    $('.jp-current-time').text(savedMinutes + ':' + formattedSeconds);
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour de l'affichage:", error);
            }
        }

        /**
         * Mise à jour dynamique de la barre de progression pendant la lecture
         */
        function updateProgressBar() {
            try {
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
                if (!jPlayer || !jPlayer.status) return; // Protection contre les erreurs

                const currentTime = jPlayer.status.currentTime || 0;
                const duration = jPlayer.status.duration || 1; // Éviter division par zéro
                const percentage = (currentTime / duration) * 100;
                const currentMinutes = Math.floor(currentTime / 60);
                const currentSeconds = Math.floor(currentTime % 60);

                // Formater le temps pour l'affichage (MM:SS)
                const formattedSeconds = currentSeconds < 10 ? '0' + currentSeconds : currentSeconds;
                const formattedTime = currentMinutes + ':' + formattedSeconds;

                // Mettre à jour l'affichage visuel
                $('.jp-play-bar').css('width', percentage + '%');
                $('.jp-current-time').text(formattedTime);

                // Sauvegarder les informations précises
                localStorage.setItem(localStorageKeys.currentTime, currentTime.toString());
                localStorage.setItem(localStorageKeys.progress, percentage.toString());
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes.toString());
                localStorage.setItem(localStorageKeys.currentSeconds, currentSeconds.toString());

                // Vérifier si on est à la fin de la chanson
                if (currentTime >= duration - 0.5 && !hasPlayedToEnd && currentSongId) {
                    hasPlayedToEnd = true;
                    console.log("Chanson terminée, comptabilisation de l'écoute");
                    registerListening("ecoute", currentSongId);
                }

                // Vérifier pour les chansons payantes
                const currentTrack = myPlaylist.playlist[myPlaylist.current];
                if (currentTrack && currentTrack.type === 'payant' && currentTime > 30) {
                    // S'assurer que le timeout est nettoyé avant d'en créer un nouveau
                    if (playTimeout) clearTimeout(playTimeout);

                    playTimeout = setTimeout(function() {
                        $("#jquery_jplayer_1").jPlayer("pause");
                        alert("Cette chanson est payante. Abonnez-vous pour écouter en entier.");
                    }, 100); // Presque immédiat à ce stade
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour de la barre de progression:", error);
            }
        }

        /**
         * Gestion du bouton de volume rotatif
         */
        $('.knob-wrapper').mousedown(function() {
            $(window).mousemove(function(e) {
                try {
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
                } catch (error) {
                    console.error("Erreur de contrôle du volume:", error);
                }
            });

            return false;
        }).mouseup(function() {
            $(window).unbind("mousemove");
        });

        /**
         * Gestion du drag de la barre de progression
         */
        var timeDrag = false;
        $('.jp-seek-bar').mousedown(function(e) {
            timeDrag = true;
            updatebar(e.pageX);
        });

        $(document).mouseup(function(e) {
            if (timeDrag) {
                timeDrag = false;
                updatebar(e.pageX);
                // Sauvegarder l'état après le déplacement manuel
                setTimeout(saveStateToLocalStorage, 100);
            }
        });

        $(document).mousemove(function(e) {
            if (timeDrag) {
                updatebar(e.pageX);
            }
        });

        /**
         * Met à jour la position de lecture en fonction de la position du clic
         */
        function updatebar(x) {
            try {
                var progress = $('.jp-progress');
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                percentage = Math.max(0, Math.min(100, percentage));
                $("#jquery_jplayer_1").jPlayer("playHead", percentage);
                $('.jp-play-bar').css('width', percentage + '%');
            } catch (error) {
                console.error("Erreur lors de la mise à jour de la barre:", error);
            }
        }

        /**
         * Ajoute une chanson à la playlist
         */
        function addSongToPlaylist(songData) {
            try {
                if (!songData || !songData.mp3) {
                    alert('Données de chanson incomplètes');
                    return false;
                }

                if (songData.type === 'payant') {
                    alert("Cette chanson est payante. Veuillez l'acheter avant de l'ajouter à votre playlist.");
                    return false;
                }

                const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === songData.mp3);
                if (isDuplicate) {
                    alert("Cette chanson est déjà dans la playlist.");
                    return false;
                }

                // Ajout à la playlist
                const song = {
                    id: songData.id || null,
                    title: songData.title,
                    artist: songData.artist,
                    mp3: songData.mp3,
                    image: songData.img,
                    type: songData.type || 'gratuit',
                    option: ""
                };

                myPlaylist.add(song);
                $('.playlist-items').append('<li class="playlist-item" data-title="' + songData.title + '" data-artist="' + songData.artist + '" data-img="' + songData.img + '" data-mp3="' + songData.mp3 + '">' + songData.title + ' - ' + songData.artist + '</li>');
                savePlaylistToStorage();
                alert(songData.title + ' - ' + songData.artist + ' a été ajouté à la playlist.');
                return true;
            } catch (error) {
                console.error("Erreur lors de l'ajout à la playlist:", error);
                return false;
            }
        }

        /**
         * Gestion des événements du lecteur (play, pause, etc.)
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause + ' ' + $.jPlayer.event.seeked, function(event) {
            saveStateToLocalStorage();
            console.log("Événement détecté: " + event.type + ", état sauvegardé");

            // Réinitialiser le timeout pour les chansons payantes
            if (playTimeout) {
                clearTimeout(playTimeout);
                playTimeout = null;
            }

            // Réinitialiser le flag d'écoute complète au début de la lecture
            if (event.type === $.jPlayer.event.play) {
                hasPlayedToEnd = false;
            }

            // Réinitialiser le flag d'écoute si l'utilisateur revient en arrière dans la chanson
            if (event.type === $.jPlayer.event.seeked) {
                const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
                if (jPlayer && jPlayer.status) {
                    const currentTime = jPlayer.status.currentTime || 0;
                    const duration = jPlayer.status.duration || 1;

                    // Si l'utilisateur revient à moins de 80% de la chanson, réinitialiser le flag
                    if (currentTime < duration * 0.8) {
                        hasPlayedToEnd = false;
                        console.log("Seek en arrière détecté, réinitialisation du flag d'écoute");
                    }
                }
            }
        });

        /**
         * Sauvegarder l'état périodiquement pendant la lecture
         */
        setInterval(function() {
            const jPlayer = $("#jquery_jplayer_1").data("jPlayer");
            if (jPlayer && !jPlayer.status.paused) {
                saveStateToLocalStorage();
            }
        }, 5000);

        /**
         * Sauvegarder l'état avant que l'utilisateur ne quitte la page
         */
        $(window).on('beforeunload', saveStateToLocalStorage);

        /**
         * Événements supplémentaires du lecteur
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, saveStateToLocalStorage);
        $("#jquery_jplayer_1").on($.jPlayer.event.timeupdate, updateProgressBar);
        $("#jquery_jplayer_1").on($.jPlayer.event.ended, function() {
            playTimeout = null; // Réinitialiser le timeout
            hasPlayedToEnd = false; // Réinitialiser le flag d'écoute

            // Vérifier si l'écoute a été comptabilisée, sinon la comptabiliser maintenant
            if (!hasPlayedToEnd && currentSongId) {
                console.log("Événement ended déclenché - comptabilisation de l'écoute");
                registerListening("ecoute", currentSongId);
            }
        });

        /**
         * Restauration après chargement du lecteur
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ready, function() {
            console.log("Lecteur prêt, tentative de restauration");
            restoreStateFromLocalStorage();
        });

        /**
         * Mise à jour des informations de la chanson en cours
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
            try {
                var single = localStorage.getItem(localStorageKeys.single);
                if (single) {
                    const singleData = JSON.parse(single);
                    $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+singleData.img+"'></span><div class='que_data'>" + singleData.title + " <div class='jp-artist-name'>" + singleData.artist + "</div></div></div>");
                    localStorage.removeItem(localStorageKeys.single);
                } else {
                    var current = myPlaylist.current;
                    var playlist = myPlaylist.playlist;
                    $.each(playlist, function(index, obj) {
                        if (index == current) {
                            $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+obj.image+"'></span><div class='que_data'>" + obj.title + " <div class='jp-artist-name'>" + obj.artist + "</div></div></div>");
                        }
                    });
                }
            } catch (error) {
                console.error("Erreur lors de la mise à jour des informations de chanson:", error);
            }
        });

        // Add this near the top with your other variables
        let clickDebounceTimer = null;
        const CLICK_DEBOUNCE_TIME = 5000;
        const listenedSongsKey = 'listened_songs';

        // Improved registerListening function with debounce for clicks
        function registerListening(action, songId) {
            if (!songId) {
                console.error("ID de chanson manquant pour l'enregistrement");
                return;
            }

            // For click actions, implement debounce
            if (action === "click") {
                // Clear any existing timer
                if (clickDebounceTimer) {
                    clearTimeout(clickDebounceTimer);
                }

                // Check if this song was clicked recently
                const clickedSongs = JSON.parse(localStorage.getItem('clicked_songs') || '{}');
                const lastClickTime = clickedSongs[songId] || 0;
                const currentTime = new Date().getTime();

                // If it's been less than the debounce time, don't count this click
                if (currentTime - lastClickTime < CLICK_DEBOUNCE_TIME) {
                    console.log("Click ignored - debounce in effect for song ID " + songId);
                    return;
                }

                // Update the last click time for this song
                clickedSongs[songId] = currentTime;
                localStorage.setItem('clicked_songs', JSON.stringify(clickedSongs));

                // Set the debounce timer
                clickDebounceTimer = setTimeout(() => {
                    clickDebounceTimer = null;
                }, CLICK_DEBOUNCE_TIME);
            }

            // For listen actions, check if the song has been listened to recently
            if (action === "ecoute") {
                const listenedSongs = JSON.parse(localStorage.getItem(listenedSongsKey) || '{}');
                const lastListenTime = listenedSongs[songId] || 0;
                const currentTime = new Date().getTime();

                // Don't count if listened within the last hour (3600000 ms)
                if (currentTime - lastListenTime < 3600000) {
                    console.log("Listen ignored - already counted in the last hour for song ID " + songId);
                    return;
                }

                // Update the last listen time
                listenedSongs[songId] = currentTime;
                localStorage.setItem(listenedSongsKey, JSON.stringify(listenedSongs));
            }

            // Make the AJAX call to register the action
            $.ajax({
                url: "/ecouter-chanson",
                type: "POST",
                data: {
                    single_id: songId,
                    action: action,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        console.log("Action " + action + " enregistrée avec succès:", response);

                        // Update UI counters if needed
                        if (action === "ecoute") {
                            $('#hit-count').text(response.nombre_ecoutes + (response.nombre_ecoutes > 1 ? ' Écoutes' : ' Écoute'));
                        } else if (action === "click") {
                            $('#click-count').text(response.nombre_clicks + (response.nombre_clicks > 1 ? ' Clicks' : ' Click'));
                        }
                    }
                },
                error: function(xhr) {
                    console.error("Erreur lors de l'enregistrement de l'action " + action, xhr.responseText);
                }
            });
        }

        /**
         * Gestion des clics sur les chansons
         */
        // $('body').on('click', '.play-song, .play-single, .play-s1, .play-s2', function() {
        //     try {
        //         var singleId = $(this).data('id');
        //         var title = $(this).data('title');
        //         var artist = $(this).data('artist');
        //         var img = $(this).data('img');
        //         var mp3 = $(this).data('mp3');
        //         var type = $(this).data('type');

        //         if (!mp3) {
        //             console.error('Le fichier mp3 est manquant pour cette chanson');
        //             return;
        //         }

        //         if (title && artist && img && mp3) {
        //             currentSongId = singleId;
        //             // Réinitialiser le flag d'écoute lors du changement de chanson
        //             hasPlayedToEnd = false;

        //             $("#jquery_jplayer_1").jPlayer("setMedia", { mp3, oga: mp3.replace('.mp3', '.ogg') }).jPlayer("play");
        //             currentSong = { title, artist, img, mp3, type };

        //             // Mise à jour des informations sur la barre de lecture
        //             $('.jp-track-name').text(title);
        //             $('.jp-artist-name').text(artist);
        //             $('.jp-cover-art').attr('src', img);

        //             // Stocker dans localStorage
        //             localStorage.setItem(localStorageKeys.single, JSON.stringify({title, artist, img, mp3, type}));
        //             $("#jquery_jplayer_1").jPlayer("setMedia", { mp3: single.mp3 }).jPlayer("play");

        //             // Enregistrer le clic sur la chanson
        //             if (singleId) {
        //                 registerListening("click", singleId);
        //             }

        //             // Si c'est une chanson payante, mettre en place la limite de 30 secondes
        //             if (type === 'payant') {
        //                 console.log("Chanson payante détectée, lecture limitée à 30 secondes.");
        //                 if (playTimeout) clearTimeout(playTimeout);
        //                 playTimeout = setTimeout(function() {
        //                     $("#jquery_jplayer_1").jPlayer("pause");
        //                     console.log("Lecture arrêtée après 30 secondes pour chanson payante.");
        //                     alert("Cette chanson est payante. Abonnez-vous pour écouter en entier.");
        //                 }, 30000);
        //             }
        //         } else {
        //             console.error('Données manquantes pour jouer la chanson.');
        //         }
        //     } catch (error) {
        //         console.error("Erreur lors de la lecture de la chanson:", error);
        //     }

        // });

        $('body').on('click', '.play-song, .play-single, .play-s1, .play-s2', function() {
            try {
                var singleId = $(this).data('id');
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var img = $(this).data('img');
                var mp3 = $(this).data('mp3');
                var type = $(this).data('type');

                if (!singleId || !mp3) {
                    console.error('ID de chanson ou fichier MP3 manquants:', {
                        singleId,
                        mp3,
                        element: $(this).prop('outerHTML')
                    });
                    return;
                }

                if (title && artist && img && mp3) {
                    currentSongId = singleId;
                    // Réinitialiser le flag d'écoute lors du changement de chanson
                    hasPlayedToEnd = false;

                    // Stocker dans localStorage
                    const currentSong = {title, artist, img, mp3, type};
                    localStorage.setItem(localStorageKeys.single, JSON.stringify(currentSong));

                    // Mise à jour des informations sur la barre de lecture
                    $('.jp-track-name').text(title);
                    $('.jp-artist-name').text(artist);
                    $('.jp-cover-art').attr('src', img);

                    // Définir le média et lancer la lecture - CORRIGÉ: n'utiliser qu'une seule fois
                    $("#jquery_jplayer_1").jPlayer("setMedia", {
                        mp3: mp3,
                        oga: mp3.replace('.mp3', '.ogg')
                    }).jPlayer("play");

                    // Enregistrer le clic sur la chanson
                    if (singleId) {
                        registerListening("click", singleId);
                    }

                    // Si c'est une chanson payante, mettre en place la limite de 30 secondes
                    if (type === 'payant') {
                        console.log("Chanson payante détectée, lecture limitée à 30 secondes.");
                        if (playTimeout) clearTimeout(playTimeout);
                        playTimeout = setTimeout(function() {
                            $("#jquery_jplayer_1").jPlayer("pause");
                            console.log("Lecture arrêtée après 30 secondes pour chanson payante.");
                            alert("Cette chanson est payante. Abonnez-vous pour écouter en entier.");
                        }, 30000);
                    }
                } else {
                    console.error('Données manquantes pour jouer la chanson:', {
                        title,
                        artist,
                        img,
                        mp3,
                        type
                    });
                }
            } catch (error) {
                console.error("Erreur lors de la lecture de la chanson:", error);
            }
        });
        /**
         * Gestion des écoutes sur les chansons
         */
        $("#jquery_jplayer_1").on($.jPlayer.event.ended, function() {
            const player = $("#jquery_jplayer_1").data("jPlayer").status;
            if (player.currentTime >= player.duration - 1 && !hasPlayedToEnd && currentSongId) {
                hasPlayedToEnd = true;

                $.ajax({
                    url: "/ecouter-chanson",
                    type: "POST",
                    data: {
                        single_id: currentSongId,
                        action: "ecoute",
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            console.log("Nombre d'écoutes mis à jour :", response.nombre_ecoutes);
                            $('#hit-count').text(response.nombre_ecoutes + (response.nombre_ecoutes > 1 ? ' Écoutes' : ' Écoute'));
                        }
                    },
                    error: function(xhr) {
                        console.error("Erreur lors de l'incrémentation des écoutes", xhr.responseText);
                    }
                });
            }
        });

        /**
         * Permettre la lecture en cliquant sur le titre
         */
        $(".single-item__title a, .titl a, .song a").on("click", function(e) {
            e.preventDefault();
            $(this).closest(".single-item, .song-card").find(".play-single, .play-s2, .play-s1").trigger("click");
        });

        /**
         * Ajout de la chanson en cours à la playlist
         */
        $('.add-to-playlist').on('click', function() {
            var type = $(this).data('type');
            if (currentSong.mp3) {
                addSongToPlaylist(currentSong);
            } else {
                console.error('Aucune chanson en cours de lecture à ajouter.');
                alert('Aucune chanson en cours de lecture à ajouter.');
            }
        });

        /**
         * Ajout d'une chanson depuis un bouton dédié
         */
        $('.add').on('click', function() {
            var songData = {
                id: $(this).data('id'),
                title: $(this).data('title'),
                artist: $(this).data('artist'),
                mp3: $(this).data('mp3'),
                img: $(this).data('img'),
                type: $(this).data('type')
            };

            addSongToPlaylist(songData);
        });

        /**
         * Réinitialisation de la playlist
         */
        $('.ms_clear').on('click', function() {
            if (confirm("Voulez-vous vraiment réinitialiser la playlist ?")) {
                myPlaylist.setPlaylist(defaultPlaylist);
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(defaultPlaylist));
                alert("Playlist réinitialisée.");
            }
        });

        /**
         * Sauvegarde manuelle de la playlist
         */
        $('#save-playlist').on('click', savePlaylistToStorage);

        /**
         * Gestion du partage de chansons
         */
        $('.action-btn.share').on('click', function(event) {
            event.preventDefault();
            try {
                var title = $(this).closest('.song-card').data('title');
                var artist = $(this).closest('.song-card').data('artist');
                var coverUrl = $(this).closest('.song-card').data('cover');
                var shareText = 'Écoutez "' + title + '" par ' + artist + ' sur Heavenly Praise!';
                var shareUrl = window.location.href;
                var type = $(this).data('type');

                // Vérification si la chanson est payante
                if (type === 'payant') {
                    console.warn("Le partage de cette chanson est restreint car elle est payante.");
                    alert("Cette chanson est payante et ne peut pas être partagée publiquement.");
                    return;
                }

                if (navigator.share) {
                    navigator.share({
                        title: title,
                        text: shareText,
                        url: shareUrl
                    }).then(() => {
                        console.log('Partage réussi');
                    }).catch((error) => {
                        console.error('Erreur de partage:', error);
                    });
                } else {
                    // Solution de repli pour les navigateurs qui ne supportent pas l'API de partage
                    alert('Fonctionnalité de partage non supportée sur ce navigateur.');
                }
            } catch (error) {
                console.error("Erreur lors du partage:", error);
            }
        });

        /**
         * Gestion des likes
         */
        $('.action-btn.like').on('click', function(event) {
            event.preventDefault();
            try {
                var likeButton = $(this);
                var likeCountElement = likeButton.siblings('.like-count');
                var singleId = likeButton.data('id');
                var type = $(this).data('type');

                // Bloquer le like pour les singles payants
                if (type === 'payant') {
                    console.warn("Le like de cette chanson est restreint car elle est payante.");
                    alert("Cette chanson est payante. Vous devez l'acheter avant de pouvoir l'aimer.");
                    return;
                }

                if (!singleId) {
                    console.error("ID de chanson manquant pour le like");
                    return;
                }

                $.ajax({
                    url: "/toggle-like",
                    type: "POST",
                    data: {
                        single_id: singleId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            likeCountElement.text(response.nombre_aimes);
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error("Erreur lors de la mise à jour des likes", xhr.responseText);
                    }
                });
            } catch (error) {
                console.error("Erreur lors du like:", error);
            }
        });

       /**
         * Gestion des téléchargements
         */
        $('.action-btn.tele').on('click', function(event) {
            event.preventDefault();
            try {
                var songTitle = $(this).attr('data-title') || 'Chanson';
                var artist = $(this).attr('data-artist') || 'Artiste inconnu';
                var mp3Url = $(this).attr('data-mp3');
                var type = $(this).data('type');
                var singleId = $(this).data('id');
                var userId = $(this).data('user-id');

                if (!mp3Url) {
                    alert("Le fichier audio est introuvable.");
                    return;
                }

                // Bloquer le téléchargement pour les singles payants
                if (type === 'payant') {
                    console.warn("Le téléchargement de cette chanson est restreint car elle est payante.");
                    alert("Cette chanson est payante. Vous devez l'acheter avant de pouvoir la télécharger.");
                    return;
                }

                // Créer un lien de téléchargement
                var downloadLink = document.createElement("a");
                downloadLink.href = mp3Url;
                downloadLink.download = songTitle + " - " + artist + ".mp3";
                document.body.appendChild(downloadLink);


                // Déclencher le téléchargement
                downloadLink.click();

                // Nettoyer après téléchargement
                document.body.removeChild(downloadLink);
                console.log("Téléchargement de " + songTitle + " par " + artist + " déclenché.");

                // Correction: Assurer que l'ID utilisateur est présent
                if (!userId) {
                    console.error("ID utilisateur manquant");
                    return;
                }

                // Correction: Assurer que l'ID du single est présent
                if (!singleId) {
                    console.error("ID du single manquant");
                    return;
                }

                // Enregistrer le téléchargement dans la base de données
                $.ajax({
                    url: '/telechargement',
                    type: 'POST',
                    data: {
                        single_id: singleId,
                        user_id: userId,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log("Téléchargement enregistré avec succès:", response);
                    },
                    error: function(error) {
                        console.error("Erreur lors de l'enregistrement du téléchargement:", error);
                        console.log("Détails de l'erreur: ", error.responseText)
                    }
                });

            } catch (error) {
                console.error("Erreur lors du téléchargement:", error);
                console.log("Détails de l'erreur: ", error.responseText);
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
