@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
@endsection

@section('content')
    <main class="position-relative">
        <!--archive header-->
        <div class="archive-header text-center bg-grey mt-5 pt-30">
            <div class="container">
                <div class="breadcrumb">
                    <a href='{{ route('welcome') }}' rel='nofollow'>Accueil</a>
                    <span></span>
                    <a href='{{ route('welcome') }}'>Musique</a>
                    <span></span> Détails Artiste
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <!--main content-->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--author box-->
                    <div class="author-bio mb-50">
                        <div class="author-image mb-30">
                            <a href="{{ route('detailsartistes', ['heavenid' => $artistes->heavenid]) }}">
                                @if (empty($artistes->avatar))
                                    <img src="{{ asset('usx_files/avatars/avatar.svg') }}"
                                        alt="Photo de {{ $artistes->nomartiste }}" class="avatar">
                                @else
                                    <img src="{{ asset('usx_files/avatars/' . $artistes->avatar) }}"
                                        alt="Photo de {{ $artistes->nomartiste }}" class="avatar">
                                @endif
                            </a>
                        </div>
                        <div class="author-info">
                            <h3><span class="vcard author"><span class="fn"><a
                                            href="{{ route('detailsartistes', ['heavenid' => $artistes->heavenid]) }}"
                                            title="A propos de {{ $artistes->nomartiste }}"
                                            rel="author">{{ $artistes->nomartiste }}</a></span></span>
                            </h3>
                            <h5>Description</h5>
                            <div class="author-description">
                                {!! $artistes->description !!}
                            </div>
                            <a href="#" class="author-bio-link mb-15">#{{ $artistes->heavenid }}</a>
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook"><a href="#"><i class="ti-folder"></i>
                                            {{ $countalb = $albums->where('statut', 'En Ligne')->where('masque', 0)->count() }}
                                            {{ $countalb > 1 ? 'Albums' : 'Album' }}</a></li>
                                    <li class="author-social-link-twitter"><a href="#"><i class="ti-music"></i>
                                            {{ $countsingle = $singles->where('statut', 'En Ligne')->where('masque', 0)->count() }}
                                            {{ $countsingle > 1 ? 'Singles' : 'Single' }}</a></li>
                                    <li class="author-social-link-ecoute">
                                        <a href="#"><i class="ti-headphone-alt"></i>
                                            {{ $totalEcoutes }}
                                            {{ $totalEcoutes > 1 ? 'Écoutes' : 'Écoute' }}
                                        </a>
                                    </li>
                                    <li class="author-social-link-click">
                                        <a href="#"><i class="ti-mouse-alt"></i>
                                            {{ $totalClicks }}
                                            {{ $totalClicks > 1 ? 'Clics' : 'Clic' }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!--Editor's Picked Start-->
                    <h5 class="widget-title mb-10">Albums</h5>
                    <div class="background12 pt-40 pb-40">
                        <div class="widgets-post-carausel-1">
                            <div class="container">
                                <div class="post-carausel-1 border-radius-10 bg-white">
                                    <div class="row no-gutters">
                                        <div class="col col-5-6 col-md-12">
                                            <div class="post-carausel-1-items row">
                                                @forelse ($albums as $album)
                                                    <div class="slider-single col">
                                                        <h6 class="post-title mb-3 pr-5 pl-5 mb-10 text-limit-2-row"><a
                                                                href="{{ route('detailsalbums', ['slug' => $album->slug]) }}">{{ $album->titre }}</a>
                                                        </h6>
                                                        <div class="img-hover-scale border-radius-5 hover-box-shadow">
                                                            <a
                                                                href="{{ route('detailsalbums', ['slug' => $album->slug]) }}"><img
                                                                    class="border-radius-5"
                                                                    src="{{ asset('usx_files/covers/' . $album->cover) }}"
                                                                    alt="post-slider"></a>
                                                        </div>
                                                    </div>
                                                @empty
                                                    <p class="text-center">Aucun Album disponible</p>
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <h5 class="widget-title mt-20 mb-10">Vidéos</h5>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">

                                @php
                                    $i = 1;
                                @endphp
                                @forelse ($videos as $video)
                                    @php

                                        $explode = explode('?', $video->lien);
                                        $id = $explode[1];
                                    $video_ID = $id; @endphp
                                    <div class="slider-single col-lg-4 col-md-6 mb-30 ">
                                        <div class="img-hover-scale border-radius-5">

                                            <a href='#'>
                                                <img class="border-radius-5"
                                                    src="{{ asset('PlayerTemplate/img/live/' . $video->banniere) }}"
                                                    alt="post-slider">
                                            </a>
                                            <div class="play_btn play_btn_small">
                                                <a class="play-video" href="{{ $video->lien }}" data-animate="zoomIn"
                                                    data-duration="1.5s" data-delay="0.1s">
                                                    <i class="ti-control-play"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                            <a class='' href='#'>{{ $video->titre }}</a>
                                        </h6>
                                        {{-- <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                        <span class="post-on">03 Jan</span>
                                        <span class="hit-count has-dot">{{$views}} Vues</span>
                                        <a class="float-right" href="#"><i class="ti-heart"></i></a>
                                    </div> --}}
                                    </div>
                                    @php
                                        $i = $i + 1;
                                    @endphp
                                @empty
                                    <p class="text-center">Aucune video Disponible</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <!--col-lg-8-->
                <!--Right sidebar-->
                <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                    <div class="widget-area pl-30">
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Singles</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="row">
                                @php $i = 1; @endphp
                                @forelse ($singles as $single)
                                    <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                            <a href="javascript:;" class="jp-playlist-item"
                                                data-title="{{ $i }}. {{ $single->titre }}"
                                                data-artist="{{ $single->User->nomartiste }}"
                                                data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}"
                                                {{-- data-mp3="{{ asset('usx_files/songs/' . $single->audio) }}" --}}
                                                data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                data-type="{{ $single->type }}">
                                                <span class="que_img">
                                                    <img src="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                        class="mCS_img_loaded">
                                                </span>
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-10 text-limit-2-row">{{ $i }}.
                                                {{ $single->titre }}</h6>

                                            <!-- Menu affiché au survol -->
                                            <ul class="data-hover-menu">
                                                <li>
                                                    <a href="javascript:;" class="add" data-id="{{ $single->id }}"
                                                        data-artiste-id="{{ $artistes->id }}"
                                                        data-title="{{ $i }}. {{ $single->titre }}"
                                                        data-artist="{{ $single->User->nomartiste }}"
                                                        data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}"
                                                        {{-- data-mp3="{{ asset('usx_files/songs/' . $single->audio) }}" --}}
                                                        data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                        data-type="{{ $single->type }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <line x1="12" y1="5" x2="12"
                                                                y2="19"></line>
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12"></line>
                                                        </svg>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;" class="play-song"
                                                        data-id="{{ $single->id }}"
                                                        data-artiste-id="{{ $artistes->id }}"
                                                        data-title="{{ $i }}. {{ $single->titre }}"
                                                        data-artist="{{ $single->User->nomartiste }}"
                                                        data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}"
                                                        {{-- data-mp3="{{ asset('usx_files/songs/' . $single->audio) }}" --}}
                                                        data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                        data-type="{{ $single->type }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                                        </svg>

                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @empty
                                    <p class="text-center">Aucun Single disponible</p>
                                @endforelse

                            </div>
                        </div>
                    </div>
                </div>
                <!--End sidebar-->
            </div>
        </div>
    </main>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".ms_more_icon").on("click", function() {
            var $menu = $(this).next(".more_option");
            $(".more_option").not($menu).slideUp(); // Cache les autres menus ouverts
            $menu.slideToggle(); // Affiche ou cache le menu actuel
        });

        // Fermer le menu si on clique ailleurs sur la page
        $(document).on("click", function(e) {
            if (!$(e.target).closest(".ms_more_icon, .more_option").length) {
                $(".more_option").slideUp();
            }
        });
    });
</script>
{{-- <script>
    document.querySelectorAll('.play-song').forEach(item => {
    item.addEventListener('click', function() {
        const singleType = this.getAttribute('data-type'); // Récupérer le type de chanson
        const mp3Url = this.getAttribute('data-mp3'); // URL du MP3
        const imgUrl = this.getAttribute('data-img'); // URL de l'image de couverture

        if (singleType === 'payant') {
            // Si c'est une chanson payante, jouer 30 secondes
            const audio = new Audio(mp3Url);
            audio.play();

            // Arrêter la musique après 30 secondes
            setTimeout(() => {
                audio.pause();
                audio.currentTime = 0; // Remise à zéro de la lecture
                alert('Pour écouter ce morceau, vous devez vous abonner.');
            }, 30000); // 30 secondes

        } else {
            // Si c'est une chanson gratuite, jouer directement
            const audio = new Audio(mp3Url);
            audio.play();
        }
    });
});
</script> --}}
