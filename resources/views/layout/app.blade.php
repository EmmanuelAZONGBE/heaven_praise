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
    {{-- <script src="{{asset('assets/js/vendor/jquery.nice-select.min.js')}}"></script> --}}
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
    {{-- <script type="text/javascript" src="{{asset('PlayerTemplate/js/plugins/nice_select/jquery.nice-select.min.js')}}"></script> --}}
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
    $(document).ready(function() {
        // Définition des clés de stockage local
        const LOCAL_STORAGE_KEY = "savedPlaylist";
        const localStorageKeys = {
            volume: 'audio_player_volume',
            currentTrack: 'audio_player_current_track',
            currentTime: 'audio_player_current_time',
            playlist: 'audio_player_playlist',
            progress: 'audio_player_progress', // Ajout pour la progression
            currentMinutes: 'audio_player_current_minutes', // Ajout pour les minutes
            isPlaying: 'audio_player_is_playing' // Ajout pour savoir si la chanson est en cours de lecture
        };

        let currentSong = {}; // Objet pour stocker la chanson en cours

        // Playlist par défaut avec un son d'accueil
        const defaultPlaylist = [
            {
                image: '{{ asset("usx_files/covers/cover-default.jpg") }}',
                title: "Bienvenue",
                artist: "Heavenly Praise",
                mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                option:"",
            }
        ];

        if ($('.audio-player').length) {
            // Récupération de la playlist depuis localStorage ou utilisation de la playlist par défaut
            const savedPlaylist = localStorage.getItem(localStorageKeys.playlist);
            const playlistData = savedPlaylist ? JSON.parse(savedPlaylist) : defaultPlaylist;

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

            // Sauvegarde de la playlist dans le stockage local
            function savePlaylistToStorage() {
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(myPlaylist.playlist));
                console.log("Playlist sauvegardée.");
            }

            // Sauvegarde de l'état du lecteur (volume, piste actuelle, temps de lecture, progression)
            function saveStateToLocalStorage() {
                const current = myPlaylist.current;
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime || 0;
                const volume = $("#jquery_jplayer_1").data("jPlayer").options.volume || 1;
                const progress = (currentTime / $("#jquery_jplayer_1").data("jPlayer").status.duration) * 100; // Pourcentage de progression
                const currentMinutes = Math.floor(currentTime / 60); // Minutes écoulées
                const isPlaying = !$("#jquery_jplayer_1").data("jPlayer").status.paused; // État de lecture (play/pause)

                localStorage.setItem(localStorageKeys.currentTrack, current);
                localStorage.setItem(localStorageKeys.currentTime, currentTime);
                localStorage.setItem(localStorageKeys.volume, volume);
                localStorage.setItem(localStorageKeys.progress, progress);
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
                localStorage.setItem(localStorageKeys.isPlaying, isPlaying); // Sauvegarder l'état de lecture

                console.log("État du lecteur sauvegardé.");
            }

            // Restauration de l'état du lecteur après rechargement de la page
            function restoreStateFromLocalStorage() {
                const currentTrackIndex = localStorage.getItem(localStorageKeys.currentTrack);
                const currentTime = localStorage.getItem(localStorageKeys.currentTime);
                const savedVolume = localStorage.getItem(localStorageKeys.volume);
                const savedProgress = localStorage.getItem(localStorageKeys.progress);
                const savedMinutes = localStorage.getItem(localStorageKeys.currentMinutes);
                const isPlaying = localStorage.getItem(localStorageKeys.isPlaying) === 'true';

                if (currentTrackIndex !== null) {
                    if (currentTrackIndex < myPlaylist.playlist.length) {
                        myPlaylist.play(currentTrackIndex);

                        // Attendre que la piste soit chargée avant de modifier la position
                        setTimeout(() => {
                            if (currentTime !== null) {
                                $("#jquery_jplayer_1").jPlayer("playHead", parseFloat(currentTime / $("#jquery_jplayer_1").data("jPlayer").status.duration * 100));
                            }
                        }, 1000); // Délai pour s'assurer que la durée est disponible
                    }
                }

                if (savedVolume !== null) {
                    $("#jquery_jplayer_1").jPlayer("volume", parseFloat(savedVolume));
                }

                if (savedProgress !== null) {
                    $('.jp-play-bar').css('width', savedProgress + '%');
                }

                if (savedMinutes !== null) {
                    $('.jp-time').text(savedMinutes + ' min');
                }

                if (isPlaying) {
                    $("#jquery_jplayer_1").jPlayer("play"); // Reprendre la lecture si nécessaire
                } else {
                    $("#jquery_jplayer_1").jPlayer("pause"); // Si c'est en pause, laisser en pause
                }
            }

            // Sauvegarde de l'état à chaque changement (play, pause, volume)
            $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause, saveStateToLocalStorage);
            $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, saveStateToLocalStorage);

            // Restauration après chargement du lecteur
            $("#jquery_jplayer_1").on($.jPlayer.event.ready, restoreStateFromLocalStorage);

            // Mise à jour dynamique de la barre de progression
            function updateProgressBar() {
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime;
                const duration = $("#jquery_jplayer_1").data("jPlayer").status.duration;
                const percentage = (currentTime / duration) * 100;
                const currentMinutes = Math.floor(currentTime / 60); // minutes écoulées

                $('.jp-play-bar').css('width', percentage + '%');
                localStorage.setItem(localStorageKeys.currentTime, currentTime);
                localStorage.setItem(localStorageKeys.progress, percentage);
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
            }

            // Suivi du temps de lecture
            $("#jquery_jplayer_1").on($.jPlayer.event.timeupdate, updateProgressBar);

            // Gestion du drag de la barre de progression
            var timeDrag = false;
            $('.jp-seek-bar').mousedown(function(e) {
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

            function updatebar(x) {
                var progress = $('.jp-progress');
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                percentage = Math.max(0, Math.min(100, percentage));
                $("#jquery_jplayer_1").jPlayer("playHead", percentage);
                $('.jp-play-bar').css('width', percentage + '%');
            }

             // Ajout d'une chanson à la playlist
             $('.add-to-playlist').on('click', function() {
                if (currentSong.mp3) {
                    const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === currentSong.mp3);

                    console.log('log song', currentSong);
                    if (!isDuplicate) {
                        currentSong.image = currentSong.img;
                        currentSong.option = "";
                        myPlaylist.add(currentSong);
                        $('.playlist-items').append('<li class="playlist-item" data-title="' + currentSong.title + '" data-artist="' + currentSong.artist + '" data-img="' + currentSong.img + '" data-mp3="' + currentSong.mp3 + '">' + currentSong.title + ' - ' + currentSong.artist + '</li>');
                        savePlaylistToStorage();
                        alert(currentSong.title + ' - ' + currentSong.artist + ' a été ajouté à la playlist.');
                    } else {
                        console.warn("Cette chanson est déjà dans la playlist.");
                        alert("Cette chanson est déjà dans la playlist.");
                    }
                } else {
                    console.error('Aucune chanson en cours de lecture à ajouter.');
                    alert('Aucune chanson en cours de lecture à ajouter.');
                }
            });

            $('.add').on('click', function() {
                var songId = $(this).data('id');
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var mp3 = $(this).data('mp3');
                var img = $(this).data('img');

                if (mp3) {
                    const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === mp3);

                    if (!isDuplicate) {
                        var song = {
                            id: songId,
                            title: title,
                            artist: artist,
                            mp3: mp3,
                            image:img,
                            option: ""
                        };

                        console.log("song", song);

                        myPlaylist.add(song);
                        $('.playlist-items').append('<li class="playlist-item" data-title="' + title + '" data-artist="' + artist + '" data-img="' + img + '" data-mp3="' + mp3 + '">' + title + ' - ' + artist + '</li>');
                        savePlaylistToStorage();

                        alert(title + ' - ' + artist + ' a été ajouté à la playlist.');
                    } else {
                        console.warn("Cette chanson est déjà dans la playlist.");
                        alert("Cette chanson est déjà dans la playlist.");
                    }
                } else {
                    console.error('Aucune chanson en cours de lecture à ajouter.');
                    alert('Aucune chanson en cours de lecture à ajouter.');
                }
            });

            // Lecture d'une chanson sélectionnée
            $('body').on('click', '.play-song, .play-single', function() {
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var img = $(this).data('img');
                var mp3 = $(this).data('mp3');
                localStorage.setItem(localStorageKeys.single, JSON.stringify({title, artist, img, mp3}));
                console.log(" current  song is  playing");

                if (title && artist && img && mp3) {
                    $("#jquery_jplayer_1").jPlayer("setMedia", { mp3, oga: mp3.replace('.mp3', '.ogg') }).jPlayer("play");
                    currentSong = { title, artist, img, mp3 };
                    console.log(currentSong," current");
                    // Mise à jour des informations sur la barre de lecture
                    $('.jp-track-name').text(title);
                    $('.jp-artist-name').text(artist);
                    $('.jp-cover-art').attr('src', img);
                } else {
                    console.error('Données manquantes pour jouer la chanson.');
                }
            });

            // Permettre la lecture en cliquant sur le titre
             $(".single-item__title a").on("click", function (e) {
            e.preventDefault();
            $(this).closest(".single-item").find(".play-single").trigger("click");
            });

            // Suppression de toutes les chansons sauf celle par défaut
            $('.ms_clear').on('click', function() {
                if (confirm("Voulez-vous vraiment réinitialiser la playlist ?")) {
                    myPlaylist.setPlaylist(defaultPlaylist);
                    localStorage.setItem(localStorageKeys.playlist, JSON.stringify(defaultPlaylist));
                    alert("Playlist réinitialisée.");
                }
            });

            // Sauvegarde manuelle de la playlist
            $('#save-playlist').on('click', savePlaylistToStorage);

            $("#jquery_jplayer_1").on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
                     var single = localStorage.getItem(localStorageKeys.single);
                     console.log(single,"single");
                     if(single){
                        localStorage.removeItem(localStorageKeys.single);
                         return;
                     }
                    var current = myPlaylist.current;
                    var playlist = myPlaylist.playlist;
                    var play = myPlaylist.play;
                    console.log(current,"emmanuel");
                    $.each(playlist, function(index, obj) {
                        if (index == current) {
                            $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+obj.image+"'></span><div class='que_data'>" + obj.title + " <div class='jp-artist-name'>" + obj.artist + "</div></div></div>");
                        }
                    });
            });
        }

    });

</script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        // Définition des clés de stockage local
        const LOCAL_STORAGE_KEY = "savedPlaylist";
        const localStorageKeys = {
            volume: 'audio_player_volume',
            currentTrack: 'audio_player_current_track',
            currentTime: 'audio_player_current_time',
            playlist: 'audio_player_playlist',
            progress: 'audio_player_progress', // Ajout pour la progression
            currentMinutes: 'audio_player_current_minutes', // Ajout pour les minutes
            isPlaying: 'audio_player_is_playing' // Ajout pour savoir si la chanson est en cours de lecture
        };

        let currentSong = {}; // Objet pour stocker la chanson en cours

        // Playlist par défaut avec un son d'accueil
        const defaultPlaylist = [
            {
                image: '{{ asset("usx_files/covers/cover-default.jpg") }}',
                title: "Bienvenue",
                artist: "Heavenly Praise",
                mp3: "https://heavenly-praise.com/usx_files/songs/welcome-heavenly-praise.mp3",
                option:"",
            }
        ];

        if ($('.audio-player').length) {
            // Récupération de la playlist depuis localStorage ou utilisation de la playlist par défaut
            const savedPlaylist = localStorage.getItem(localStorageKeys.playlist);
            const playlistData = savedPlaylist ? JSON.parse(savedPlaylist) : defaultPlaylist;

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

            // Sauvegarde de la playlist dans le stockage local
            function savePlaylistToStorage() {
                localStorage.setItem(localStorageKeys.playlist, JSON.stringify(myPlaylist.playlist));
                console.log("Playlist sauvegardée.");
            }

            // Sauvegarde de l'état du lecteur (volume, piste actuelle, temps de lecture, progression)
            function saveStateToLocalStorage() {
                const current = myPlaylist.current;
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime || 0;
                const volume = $("#jquery_jplayer_1").data("jPlayer").options.volume || 1;
                const progress = (currentTime / $("#jquery_jplayer_1").data("jPlayer").status.duration) * 100; // Pourcentage de progression
                const currentMinutes = Math.floor(currentTime / 60); // Minutes écoulées
                const isPlaying = !$("#jquery_jplayer_1").data("jPlayer").status.paused; // État de lecture (play/pause)

                localStorage.setItem(localStorageKeys.currentTrack, current);
                localStorage.setItem(localStorageKeys.currentTime, currentTime);
                localStorage.setItem(localStorageKeys.volume, volume);
                localStorage.setItem(localStorageKeys.progress, progress);
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
                localStorage.setItem(localStorageKeys.isPlaying, isPlaying); // Sauvegarder l'état de lecture

                console.log("État du lecteur sauvegardé.");
            }

            // Restauration de l'état du lecteur après rechargement de la page
            function restoreStateFromLocalStorage() {
                const currentTrackIndex = localStorage.getItem(localStorageKeys.currentTrack);
                const currentTime = localStorage.getItem(localStorageKeys.currentTime);
                const savedVolume = localStorage.getItem(localStorageKeys.volume);
                const savedProgress = localStorage.getItem(localStorageKeys.progress);
                const savedMinutes = localStorage.getItem(localStorageKeys.currentMinutes);
                const isPlaying = localStorage.getItem(localStorageKeys.isPlaying) === 'true';

                if (currentTrackIndex !== null) {
                    if (currentTrackIndex < myPlaylist.playlist.length) {
                        myPlaylist.play(currentTrackIndex);

                        // Attendre que la piste soit chargée avant de modifier la position
                        setTimeout(() => {
                            if (currentTime !== null) {
                                $("#jquery_jplayer_1").jPlayer("playHead", parseFloat(currentTime / $("#jquery_jplayer_1").data("jPlayer").status.duration * 100));
                            }
                        }, 1000); // Délai pour s'assurer que la durée est disponible
                    }
                }

                if (savedVolume !== null) {
                    $("#jquery_jplayer_1").jPlayer("volume", parseFloat(savedVolume));
                }

                if (savedProgress !== null) {
                    $('.jp-play-bar').css('width', savedProgress + '%');
                }

                if (savedMinutes !== null) {
                    $('.jp-time').text(savedMinutes + ' min');
                }

                if (isPlaying) {
                    $("#jquery_jplayer_1").jPlayer("play"); // Reprendre la lecture si nécessaire
                } else {
                    $("#jquery_jplayer_1").jPlayer("pause"); // Si c'est en pause, laisser en pause
                }
            }

            // Sauvegarde de l'état à chaque changement (play, pause, volume)
            $("#jquery_jplayer_1").on($.jPlayer.event.play + ' ' + $.jPlayer.event.pause, saveStateToLocalStorage);
            $("#jquery_jplayer_1").on($.jPlayer.event.volumechange, saveStateToLocalStorage);

            // Restauration après chargement du lecteur
            $("#jquery_jplayer_1").on($.jPlayer.event.ready, restoreStateFromLocalStorage);

            // Mise à jour dynamique de la barre de progression
            function updateProgressBar() {
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime;
                const duration = $("#jquery_jplayer_1").data("jPlayer").status.duration;
                const percentage = (currentTime / duration) * 100;
                const currentMinutes = Math.floor(currentTime / 60); // minutes écoulées

                $('.jp-play-bar').css('width', percentage + '%');
                localStorage.setItem(localStorageKeys.currentTime, currentTime);
                localStorage.setItem(localStorageKeys.progress, percentage);
                localStorage.setItem(localStorageKeys.currentMinutes, currentMinutes);
            }

            // Suivi du temps de lecture
            $("#jquery_jplayer_1").on($.jPlayer.event.timeupdate, updateProgressBar);

            // Gestion du drag de la barre de progression
            var timeDrag = false;
            $('.jp-seek-bar').mousedown(function(e) {
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

            function updatebar(x) {
                var progress = $('.jp-progress');
                var position = x - progress.offset().left;
                var percentage = 100 * position / progress.width();
                percentage = Math.max(0, Math.min(100, percentage));
                $("#jquery_jplayer_1").jPlayer("playHead", percentage);
                $('.jp-play-bar').css('width', percentage + '%');
            }

             // Ajout d'une chanson à la playlist
             $('.add-to-playlist').on('click', function() {
                if (currentSong.mp3) {
                    const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === currentSong.mp3);

                    console.log('log song', currentSong);
                    if (!isDuplicate) {
                        currentSong.image = currentSong.img;
                        currentSong.option = "";
                        myPlaylist.add(currentSong);
                        $('.playlist-items').append('<li class="playlist-item" data-title="' + currentSong.title + '" data-artist="' + currentSong.artist + '" data-img="' + currentSong.img + '" data-mp3="' + currentSong.mp3 + '">' + currentSong.title + ' - ' + currentSong.artist + '</li>');
                        savePlaylistToStorage();
                        alert(currentSong.title + ' - ' + currentSong.artist + ' a été ajouté à la playlist.');
                    } else {
                        console.warn("Cette chanson est déjà dans la playlist.");
                        alert("Cette chanson est déjà dans la playlist.");
                    }
                } else {
                    console.error('Aucune chanson en cours de lecture à ajouter.');
                    alert('Aucune chanson en cours de lecture à ajouter.');
                }
            });

            $('.add').on('click', function() {
                var songId = $(this).data('id');
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var mp3 = $(this).data('mp3');
                var img = $(this).data('img');

                if (mp3) {
                    const isDuplicate = myPlaylist.playlist.some(track => track.mp3 === mp3);

                    if (!isDuplicate) {
                        var song = {
                            id: songId,
                            title: title,
                            artist: artist,
                            mp3: mp3,
                            image:img,
                            option: ""
                        };

                        console.log("song", song);

                        myPlaylist.add(song);
                        $('.playlist-items').append('<li class="playlist-item" data-title="' + title + '" data-artist="' + artist + '" data-img="' + img + '" data-mp3="' + mp3 + '">' + title + ' - ' + artist + '</li>');
                        savePlaylistToStorage();

                        alert(title + ' - ' + artist + ' a été ajouté à la playlist.');
                    } else {
                        console.warn("Cette chanson est déjà dans la playlist.");
                        alert("Cette chanson est déjà dans la playlist.");
                    }
                } else {
                    console.error('Aucune chanson en cours de lecture à ajouter.');
                    alert('Aucune chanson en cours de lecture à ajouter.');
                }
            });

          // Lecture d'une chanson sélectionnée
          $('body').on('click', '.play-song, .play-single, .play-s1, .play-s2', function() {
                var singleId = $(this).data('id');
                var title = $(this).data('title');
                var artist = $(this).data('artist');
                var img = $(this).data('img');
                var mp3 = $(this).data('mp3');
                localStorage.setItem(localStorageKeys.single, JSON.stringify({title, artist, img, mp3}));
                console.log(" current  song is  playing");



                if (title && artist && img && mp3) {
                    currentSongId = singleId;
                    $("#jquery_jplayer_1").jPlayer("setMedia", { mp3, oga: mp3.replace('.mp3', '.ogg') }).jPlayer("play");
                    currentSong = { title, artist, img, mp3 };

                    console.log(currentSong," current");
                    // Mise à jour des informations sur la barre de lecture
                    $('.jp-track-name').text(title);
                    $('.jp-artist-name').text(artist);
                    $('.jp-cover-art').attr('src', img);

                        // Envoi de la requête AJAX pour incrémenter l'écoute
                        // $.ajax({
                        //     url: "/ecouter-chanson",
                        //     type: "POST",
                        //     data: {
                        //         single_id: singleId, // Envoyer l'ID de la chanson
                        //         _token: $('meta[name="csrf-token"]').attr('content')
                        //     },
                        //     success: function(response) {
                        //         if (response.success) {
                        //             console.log("Nombre d'écoutes mis à jour :", response.nombre_ecoutes);
                        //         }
                        //     },
                        //     error: function(xhr) {
                        //         console.error("Erreur lors de l'incrémentation des écoutes", xhr.responseText);
                        //     }
                        // });
                } else {
                    console.error('Données manquantes pour jouer la chanson.');
                }
            });
            let currentSongId = null; // Variable globale pour stocker l'ID de la chanson en cours

            let hasPlayedToEnd = false;

            $("#jquery_jplayer_1").on($.jPlayer.event.timeupdate, function(event) {
                const currentTime = $("#jquery_jplayer_1").data("jPlayer").status.currentTime;
                const duration = $("#jquery_jplayer_1").data("jPlayer").status.duration;

                // Vérifiez si la chanson a été écoutée jusqu'à la fin
                if (currentTime >= duration - 1 && !hasPlayedToEnd) {
                    hasPlayedToEnd = true;

                    // Envoi de la requête AJAX pour incrémenter l'écoute
                    const singleId = $(this).data('id');
                    const artisteId = $(this).attr('data-artiste-id'); // Assure-toi que cet attribut est bien défini
                    $.ajax({
                        url: "/ecouter-chanson",
                        type: "POST",
                        data: {
                            single_id: currentSongId, // Utiliser l'ID stocké
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log("Réponse complète:", response);
                            if (response.success) {
                                console.log("Nombre d'écoutes mis à jour :", response.nombre_ecoutes);
                                // Mettre à jour l'interface utilisateur
                                var hitCountElement = $('#hit-count');
                                var newHitCount = response.nombre_ecoutes;
                                var ecouteText = newHitCount > 1 ? 'Écoutes' : 'Écoute';

                                // Mettre à jour le texte de l'élément
                                hitCountElement.text(newHitCount + ' ' + ecouteText);
                            }
                        },
                        error: function(xhr) {
                            console.error("Erreur lors de l'incrémentation des écoutes",xhr.responseText);
                        }
                    });
                }
            });

            // Réinitialiser le flag lorsque la chanson change
            $("#jquery_jplayer_1").on($.jPlayer.event.play, function(event) {
                hasPlayedToEnd = false;
            });

             // Permettre la lecture en cliquant sur le titre
             $(".single-item__title a,.titl a, .song a ").on("click", function (e) {
            e.preventDefault();
            $(this).closest(".single-item,.song-card").find(".play-single,.play-s2, .play-s1").trigger("click");
            });

            // Suppression de toutes les chansons sauf celle par défaut
            $('.ms_clear').on('click', function() {
                if (confirm("Voulez-vous vraiment réinitialiser la playlist ?")) {
                    myPlaylist.setPlaylist(defaultPlaylist);
                    localStorage.setItem(localStorageKeys.playlist, JSON.stringify(defaultPlaylist));
                    alert("Playlist réinitialisée.");
                }
            });

            // Sauvegarde manuelle de la playlist
            $('#save-playlist').on('click', savePlaylistToStorage);

            $("#jquery_jplayer_1").on($.jPlayer.event.ready + ' ' + $.jPlayer.event.play, function(event) {
                     var single = localStorage.getItem(localStorageKeys.single);
                     console.log(single,"single");
                     if(single){
                        localStorage.removeItem(localStorageKeys.single);
                         return;
                     }
                    var current = myPlaylist.current;
                    var playlist = myPlaylist.playlist;
                    var play = myPlaylist.play;
                    console.log(current,"emmanuel");
                    $.each(playlist, function(index, obj) {
                        if (index == current) {
                            $(".jp-now-playing").html("<div class='jp-track-name'><span class='que_img'><img src='"+obj.image+"'></span><div class='que_data'>" + obj.title + " <div class='jp-artist-name'>" + obj.artist + "</div></div></div>");
                        }
                    });
            });
        }

         // Partager
        $('.action-btn.share').on('click', function(event) {
            event.preventDefault();
            var title = $(this).closest('.song-card').data('title');
            var artist = $(this).closest('.song-card').data('artist');
            var coverUrl = $(this).closest('.song-card').data('cover');
            var shareText = 'Écoutez "' + title + '" par ' + artist + ' sur Heavenly Praise!' + coverUrl;
            var shareUrl = window.location.href;

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
        });
    });

</script>



	@hasSection ('js')
		@yield('js')
	@endif
</body>
</html>
