@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
    <link rel="canonical" href="{{ route('welcome') }}" />
    <meta name="description"
        content="L'ultime destination pour l'inspiration gospel en streaming. Découvrez une collection divine de musique gospel, trouvez la paix intérieure et partagez la grâce à travers des chansons inspirantes.">
    <meta property="og:title" content="Streaming de musique gospel - Heavenly Praise" />
    <meta property="og:description"
        content="L'ultime destination pour l'inspiration gospel en streaming. Découvrez une collection divine de musique gospel, trouvez la paix intérieure et partagez la grâce à travers des chansons inspirantes." />
    <meta property="og:url" content="{{ route('welcome') }}" />

    <meta property="og:image:alt" content="Accueil | Heavenly Praise" />

    <meta name="twitter:card" content="summary_large_image" />
    {{-- <meta name="twitter:site" content="@HeavenlyPraise"/> --}}
    <meta property="twitter:title" content="Streaming de musique gospel - Heavenly Praise" />
    <meta property="twitter:description"
        content="L'ultime destination pour l'inspiration gospel en streaming. Découvrez une collection divine de musique gospel, trouvez la paix intérieure et partagez la grâce à travers des chansons inspirantes." />
    <meta name="twitter:alt" content="Accueil | Heavenly Praise" />
    <style>
        .hidden-song {
            display: none;
        }

        .py-40 {
            padding: clamp(24px, 2.083vw, 80px) 0;
        }

        @media (max-width: 575px) {
            .py-40 {
                padding: 20px 0;
            }
        }

        .songs-list .song-card {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-top: 0.5px solid #d3d3d3;
            padding: 8px clamp(8px, 0.63vw, 16px);
        }

        .songs-list .song-card:first-child {
            border: none;
        }

        .songs-list .song-card:last-child {
            padding-bottom: 0;
        }

        @media (max-width: 575px) {

            .songs-list .song-card .duration,
            .songs-list .song-card .listens {
                display: none;
            }
        }

        .songs-list .song-card .left-block {
            display: flex;
            align-items: center;
            gap: clamp(12px, 1.25vw, 32px);
        }

        .songs-list .song-card .left-block img {
            border-radius: 4px;
            width: clamp(48px, 3.333vw, 80px);
        }

        .songs-list .song-card .left-block div a {
            /* font-size: clamp(9px, 0.573vw, 13px); */
        }

        @media (max-width: 991px) {
            .songs-list .song-card .left-block div a {
                font-size: 9px;
            }
        }

        @media (max-width: 767px) {
            .songs-list .song-card .left-block div a {
                font-size: 8.5px;
            }
        }

        .songs-list .song-card .left-block .play {
            position: relative;
        }

        .songs-list .song-card .left-block .play a {
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .songs-list .song-card .left-block .play a i {
            font-size: clamp(16px, 1.25vw, 30px);
            color: #ff4500;
        }

        .songs-list .song-card .left-block .play span {
            font-size: clamp(16px, 1.25vw, 30px);
            opacity: 1;
            visibility: visible;
            transition: all 0.3s ease;
        }

        .songs-list .song-card .right-block {
            display: flex;
            align-items: center;
            gap: clamp(12px, 1.25vw, 32px);
        }

        .songs-list .song-card .right-block a {
            position: relative;
        }

        .songs-list .song-card .right-block a i {
            font-size: clamp(16px, 1.25vw, 30px);
        }

        .songs-list .song-card .right-block a svg {
            width: clamp(16px, 1.25vw, 30px);
            height: clamp(16px, 1.25vw, 30px);
        }

        .songs-list .song-card .right-block a svg path {
            fill: #d3d3d3;
            transition: all 0.3s ease;
        }

        .songs-list .song-card .right-block a:hover svg path {
            fill: #ff4500;
        }

        .songs-list .song-card .right-block a .tooltip-pop {
            background: #ff5733;
            display: block;
            position: absolute;
            bottom: 0;
            left: 50%;
            padding: 0.5rem 0.4rem;
            border-radius: 5px;
            font-size: 0.8rem;
            width: max-content;
            font-weight: 600;
            opacity: 0;
            pointer-events: none;
            transform: translate(-50%, -90%);
            transition: all 0.2s ease;
            color: white;
        }

        .songs-list .song-card .right-block a:hover .tooltip-pop {
            opacity: 1;
            transform: translate(-50%, -106%);
        }

        .songs-list .song-card:hover .left-block .play a {
            opacity: 1;
            visibility: visible;
        }

        .songs-list .song-card:hover .left-block .play span {
            opacity: 0;
            visibility: hidden;
        }

        .songs-list .song-card.play-active .left-block .play a {
            opacity: 1;
            visibility: visible;
        }

        .songs-list .song-card.play-active .left-block .play span {
            opacity: 0;
            visibility: hidden;
        }

        .songs-list .accordion-collapse .song-card:first-child {
            border-top: 0.5px solid #d3d3d3 !important;
        }

        .more {
            margin: 0 auto;
            width: fit-content;
            color: $white;

            .collapsed {
                color: $white;

                i {
                    transform: rotate(0);
                    transition: $transition;
                }
            }

            i {
                transform: rotate(-180deg);
                transition: $transition;
            }
        }
    </style>
@endsection

@section('content')
    <main class="position-relative">
        @include('partials._searchform')
        <!--Featured post Start-->
        <div class="home-featured">
            <div class="post-carausel-3 post-module-1">
                @if (!empty($listlastevents))
                    @forelse($listlastevents as $listlastevent)
                        <div class="post-thumb position-relative">
                            <div class="thumb-overlay img-hover-slide position-relative"
                                style="background-image: url({{ asset('usx_files/events/' . $listlastevent->banniere) }})">
                                @if ($listlastevent->flash == 1)
                                    <span class="top-right-icon background8"><i class="mdi mdi-flash-on"></i></span>
                                @endif
                                <a class='img-link'
                                    href='{{ route('detailsevenements', ['slug' => $listlastevent->slug]) }}'></a>


                                <div class="post-content-overlay ml-30 mr-30">
                                    <div class="entry-meta meta-0 font-small mb-20">
                                        <a href='#'><span
                                                class="post-cat background8 color-white">Évènement</span></a>
                                    </div>
                                    <h3 class="post-title">
                                        <a class='color-white'
                                            href='{{ route('detailsevenements', ['slug' => $listlastevent->slug]) }}'>{{ $listlastevent->titre }}</a>
                                    </h3>
                                    <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                        <span
                                            class="post-on">{{ Carbon\Carbon::parse($listlastevent->date)->format('d M Y') }}</span>
                                        <span class="hit-count has-dot">{{ $listlastevent->vues }} Vues</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @empty
                    @endforelse
                @endif

                @php
                    $s = 1;
                @endphp
                @forelse($slidescats as $slidecat)
                    @php
                        $lastactu = App\Models\Actualite::where('publie', 1)
                            ->where('categorie_id', $slidecat->id)
                            ->first();
                    @endphp
                    <div class="post-thumb position-relative">
                        <div class="thumb-overlay img-hover-slide position-relative"
                            style="background-image: url({{ asset('usx_files/actus/' . $lastactu->banniere) }})">
                            @if ($lastactu->flash == 1)
                                <span class="top-right-icon background8"><i class="mdi mdi-flash-on"></i></span>
                            @endif
                            <a class='img-link' href='{{ route('detailsactualites', ['slug' => $lastactu->slug]) }}'></a>
                            <div class="post-content-overlay ml-30 mr-30">
                                <div class="entry-meta meta-0 font-small mb-20">
                                    <a href='{{ route('detailsactualites', ['slug' => $lastactu->slug]) }}'><span
                                            class="post-cat background{{ $s }} color-white">{{ $lastactu->Categorie->libelle }}</span></a>
                                </div>
                                <h3 class="post-title">
                                    <a class='color-white text-limit-3-row'
                                        href='{{ route('detailsactualites', ['slug' => $lastactu->slug]) }}'>{{ $lastactu->titre }}</a>
                                </h3>
                                <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                    <span class="post-on">{{ $lastactu->created_at->format('d M Y') }}</span>
                                    <span class="hit-count has-dot">{{ $lastactu->vues }} Vues</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $s = 1;
                    @endphp
                @empty
                @endforelse
            </div>
        </div>
        <!--Featured post End-->

        <!-- Releases Area Start -->
        <div class="pt-50 pb-50 background-white">
            <div class="container mb-50">
                <div class="sidebar-widget loop-grid">

                    <div class="row row-gap-4">
                        <!-- Left Column: Top songs of the week -->
                        <div class="col-xl-6">
                            <div class="sidebar-widget">
                                <div class="widget-header position-relative mb-30">
                                    <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">Top des chansons
                                        cette semaine</h5>
                                    <div class="letter-background">M</div>
                                </div>
                            </div>
                            <div class="songs-list">
                                @php $i = 1; @endphp
                                @forelse ($topSongsThisWeek as $single)
                                    <div class="song-card">
                                        <div class="left-block">
                                            <div class="play">
                                                <a href="javascript:;" class="joue play-s1" data-id="{{ $single->id }}"
                                                    data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}"
                                                    data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    data-title="{{ $i }}. {{ $single->titre }}"
                                                    data-artist="{{ $single->User->nomartiste ?? 'Artiste inconnu' }}">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                <span>{{ $i }}</span>
                                            </div>
                                            @isset($single->cover)
                                                <img src="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    alt="{{ $single->titre }}">
                                            @endisset
                                            <div>
                                                <h6 class="song mb-1" style="font-size: 15px;"
                                                    data-id="{{ $single->id }}" data-title="{{ $single->titre }}"
                                                    data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}"
                                                    data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}">
                                                    <a href="javascript:;">{{ $i }}.
                                                        {{ $single->titre }}</a>
                                                </h6>
                                                @if ($single->User)
                                                    <a
                                                        href="{{ route('detailsartistes', ['heavenid' => $single->User->heavenid]) }}">
                                                        {{ $single->User->nomartiste }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <a href="javascript:;" class="action-btn add" data-id="{{ $single->id }}"
                                                data-title="{{ $single->titre }}"
                                                data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}"
                                                data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}">
                                                <span class="tooltip-pop">Ajouter à la Playlist</span>
                                                <i class="fa-solid fa-list"></i>
                                            </a>
                                            <a href="javascript:;" class="action-btn share"
                                                data-title="{{ $single->titre }}" data-cover="{{ $single->cover_url }}"
                                                data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}">
                                                <span class="tooltip-pop">Partager</span>
                                                <i class="fa-solid fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @empty
                                @endforelse
                            </div>
                        </div>

                        <!-- Right Column: Recommended songs -->
                        <div class="col-xl-6">
                            <div class="sidebar-widget">
                                <div class="widget-header position-relative mb-30">
                                    <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">Recommandations
                                        de chansons</h5>
                                    <div class="letter-background">M</div>
                                </div>
                            </div>
                            <div class="songs-list">
                                @php $i = 1; @endphp
                                @forelse ($recommendedSongs as $single)
                                    <div class="song-card">
                                        <div class="left-block">
                                            <div class="play">
                                                <a href="javascript:;" class="joue play-s2"
                                                    data-id="{{ $single->id }}"
                                                    data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}"
                                                    data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    data-title="{{ $i }}. {{ $single->titre }}"
                                                    data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}">
                                                    <i class="fas fa-play"></i>
                                                </a>
                                                <span>{{ $i }}</span>
                                            </div>
                                            @isset($single->cover)
                                                <img src="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    alt="{{ $single->titre }}">
                                            @endisset
                                            <div>
                                                <h6 class="titl mb-1" style="font-size: 15px;"
                                                    data-id="{{ $single->id }}" data-title="{{ $single->titre }}"
                                                    data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}"
                                                    data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}">
                                                    <a href="javascript:;">{{ $i }}.
                                                        {{ $single->titre }}</a>
                                                </h6>
                                                @if ($single->User)
                                                    <a
                                                        href="{{ route('detailsartistes', ['heavenid' => $single->User->heavenid]) }}">
                                                        {{ $single->User->nomartiste }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="right-block">
                                            <a href="javascript:;" class="action-btn add" data-id="{{ $single->id }}"
                                                data-title="{{ $single->titre }}"
                                                data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}"
                                                data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}">
                                                <span class="tooltip-pop">Ajouter à la Playlist</span>
                                                <i class="fa-solid fa-list"></i>
                                            </a>
                                            <a href="javascript:;" class="action-btn share"
                                                data-title="{{ $single->titre }}"
                                                data-artist="{{ optional($single->User)->nomartiste ?? 'Artiste inconnu' }}">
                                                <span class="tooltip-pop">Partager</span>
                                                <i class="fa-solid fa-share"></i>
                                            </a>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Releases Area End -->
        <!-- Recent Posts Start -->
        <div class="pt-50 pb-50 background-white">
            <div class="container mb-50">
                <div class="sidebar-widget loop-grid">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="widget-header position-relative mb-30">
                                <h5 class="widget-title mb-30 text-uppercase color4 font-weight-ultra">
                                    Actualités</h5>
                                <div class="letter-background">News</div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            @if (sizeof($flashactus))
                                <div class="news-flash-cover text-right">
                                    <h6 class=""><i class="ti-bolt mr-5"></i>Flash Infos</h6>
                                    <div id="news-flash" class="d-inline-table">
                                        <ul class="right-0">
                                            @forelse ($flashactus as $flashactu)
                                                <li><a class='font-medium'
                                                        href='{{ route('detailsactualites', ['slug' => $flashactu->slug]) }}'>{{ $flashactu->titre }}</a>
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="pt-30 bt-1 border-color-1"></div>
                        </div>
                        @forelse ($actus as $actualite)
                            <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                <div class="post-thumb position-relative thumb-overlay hover-box-shadow-2 mb-30">
                                    <div class="img-hover-slide border-radius-5 position-relative"
                                        style="background-image: url({{ asset('usx_files/actus/' . $actualite->banniere) }})">
                                        <a class='img-link'
                                            href='{{ route('detailsactualites', ['slug' => $actualite->slug]) }}'></a>
                                        @if ($actualite->flash == 1)
                                            <span class="top-right-icon background8"><i
                                                    class="mdi mdi-flash-on"></i></span>
                                        @endif
                                    </div>
                                </div>
                                <div class="post-content">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href='#'><span
                                                class="post-cat background1 color-white">{{ $actualite->Categorie->libelle }}</span></a>
                                    </div>
                                    <h4 class="post-title">
                                        <a
                                            href='{{ route('detailsactualites', ['slug' => $actualite->slug]) }}'>{{ $actualite->titre }}</a>
                                    </h4>
                                    <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                        <span class="post-on">{{ $actualite->created_at->format('d M Y') }}</span>
                                        <span class="hit-count has-dot">{{ $actualite->vues }} Vues</span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <div class="col-12">
                            <div class="mt-30 bt-1 border-color-1"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="sidebar-widget">
                    <div class="widget-header position-relative mb-30">
                        <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">Évènements</h5>
                        <div class="letter-background">E</div>
                    </div>
                    <div class="post-carausel-2 post-module-1 row">
                        @forelse ($evenements as $evenement)
                            <div class="col">
                                <div class="post-thumb position-relative">
                                    <div class="thumb-overlay img-hover-slide border-radius-5 position-relative"
                                        style="background-image: url({{ asset('usx_files/events/' . $evenement->banniere) }})">
                                        <a class='img-link'
                                            href='{{ route('detailsevenements', ['slug' => $evenement->slug]) }}'></a>
                                        <div class="post-content-overlay">
                                            @if ($evenement->gratuit == 1)
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a
                                                        href='{{ route('detailsevenements', ['slug' => $evenement->slug]) }}'><span
                                                            class="post-cat background2 color-white">Gratuit</span></a>
                                                </div>
                                            @endif
                                            <h6 class="post-title">
                                                <a class='color-white'
                                                    href='{{ route('detailsevenements', ['slug' => $evenement->slug]) }}'>{{ $evenement->titre }}</a>
                                            </h6>
                                            <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                <span
                                                    class="post-on text-white">{{ Carbon\Carbon::parse($evenement->date)->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- Recent Posts End -->
        <!-- Start Youtube -->
        @php
            $liveencours = $lives->where('encours', 1)->first();
            if (empty($liveencours)) {
                $firstlive = $lives->first();
            } else {
                $firstlive = $liveencours;
            }
            $otherlives = $lives->where('id', '!=', $firstlive->id)->take(6);
        @endphp
        @if (!empty($firstlive))
            <div class="video-area background_dark area-padding pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="sidebar-widget">
                                <div class="widget-header position-relative mb-30">
                                    <div class="row">
                                        <div class="col-7">
                                            <h5 class="widget-title text-uppercase color4 font-weight-ultra">
                                                HEAVENLY
                                                PRAISE</h5>
                                            <div class="letter-background">LIVE</div>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h6 class="text-uppercase font-medium">
                                                <i class="ti-video-clapper color-white mr-5"></i>
                                                <a class="color-white" href="{{ route('videos') }}">Toutes
                                                    les Videos</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-tab-item post-module-1 post-module-4 mt-50">

                                    <div class="row">
                                        <div class="col-lg-5 col-md-6">
                                            <div class="post-thumb position-relative">
                                                <div class="thumb-overlay img-hover-slide border-radius-5 position-relative"
                                                    style="background-image: url({{ asset('PlayerTemplate/img/live/' . $firstlive->banniere) }})">

                                                    <a class='img-link' href='#'></a>
                                                    <div class="post-content-overlay">
                                                        @if ($firstlive->encours == 1)
                                                            <div class="entry-meta meta-0 font-small mb-20">
                                                                <a href='#'><span
                                                                        class="post-cat background1 color-white">Live
                                                                        en
                                                                        cours</span></a>
                                                            </div>
                                                        @endif
                                                        <h2 class="post-title">
                                                            <a class='color-white'
                                                                href='#'>{{ $firstlive->titre }}</a>
                                                        </h2>
                                                        {{-- <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                        <span class="post-on">02 Jan</span>
                                                        <span class="hit-count has-dot">23k Views</span>
                                                        <a class="float-right" href="#"><i class="ti-heart"></i></a>
                                                    </div> --}}
                                                    </div>
                                                    <div class="play_btn">
                                                        <a class="play-video" href="{{ $firstlive->lien }}"
                                                            data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                                                            <i class="ti-control-play"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="row">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @forelse ($otherlives as $live)
                                                    @php

                                                        $explode = explode('?', $live->lien);
                                                        $id = $explode[1];
                                                        $video_ID = $id;
                                                        // $JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
                                                        // $JSON_Data = json_decode($JSON);
                                                        // $views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
                                                    @endphp
                                                    <div
                                                        class="slider-single col-lg-4 col-md-6 mb-30 {{ $i == 5 ? 'd-none d-lg-block' : '' }}">
                                                        <div class="img-hover-scale border-radius-5">

                                                            <a href='#'>
                                                                <img class="border-radius-5"
                                                                    src="{{ asset('PlayerTemplate/img/live/' . $live->banniere) }}"
                                                                    alt="post-slider">
                                                            </a>
                                                            <div class="play_btn play_btn_small">
                                                                <a class="play-video" href="{{ $live->lien }}"
                                                                    data-animate="zoomIn" data-duration="1.5s"
                                                                    data-delay="0.1s">
                                                                    <i class="ti-control-play"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                                            <a class='color-white' href='#'>{{ $live->titre }}</a>
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
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- End Start youtube -->
        <!--  Recent Articles start -->
        <div class="recent-area pt-50 pb-50 background12">
            <div class="container">
                <!--Editor's Picked Start-->
                <div class="widgets-post-carausel-1 mb-60">
                    <div class="post-carausel-1 border-radius-10 bg-white">
                        <div class="row no-gutters">
                            <div class="col col-1-5 background6 editor-picked-left d-none d-lg-block">
                                <div class="editor-picked">
                                    <h4>Nos Artistes</h4>
                                    <p class="font-medium color-grey mt-20 mb-30">Plongez dans un univers
                                        musical inspirant
                                        où les voix divines et les talents célestes se rejoignent pour élever
                                        l'âme.</p>
                                    <div class="post-carausel-1-arrow"></div>
                                </div>
                            </div>
                            <div class="col col-4-5 col-md-12">
                                <div class="post-carausel-1-items row">
                                    @forelse ($artistes as $artiste)
                                        <div class="slider-single col">
                                            <h6 class="post-title pr-5 pl-5 mb-10 text-limit-2-row"><a
                                                    href='#'>{{ $artiste->nomartiste }}</a></h6>
                                            <div class="img-hover-scale border-radius-5 hover-box-shadow">
                                                <span class="top-right-icon background2">
                                                    <i class="mdi mdi-audiotrack"></i>
                                                </span>
                                                <a href='#'>
                                                    @if (empty($artiste->avatar))
                                                        <img class="border-radius-5"
                                                            src="{{ asset('usx_files/avatars/avatar.jpeg') }}"
                                                            alt="{{ $artiste->nomartiste }}">
                                                    @else
                                                        <img src="{{ asset('usx_files/avatars/' . $artiste->avatar) }}"
                                                            alt="{{ $artiste->nomartiste }}">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                <span
                                                    class="post-on">{{ $countalb = $albums->where('user_id', $artiste->id)->where('statut', 'En Ligne')->where('masque', 0)->count() }}
                                                    {{ $countalb > 1 ? 'Albums' : 'Album' }}</span>
                                                <span
                                                    class="hit-count has-dot">{{ $countsingle = $singles->where('user_id', $artiste->id)->where('statut', 'En Ligne')->where('masque', 0)->count() }}
                                                    {{ $countsingle > 1 ? 'Singles' : 'Single' }}</span>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Editor's Picked End-->
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="widget-header position-relative mb-30">
                            <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">
                                {{ $pays->libelle }}
                            </h5>
                            <div class="letter-background">Zoom</div>
                        </div>
                        <div class="loop-list">
                            @forelse ($actuspays as $actupays)
                                <article class="row mb-50">
                                    <div class="col-md-6">
                                        <div class="post-thumb position-relative thumb-overlay mr-20">
                                            <div class="img-hover-slide border-radius-5 position-relative"
                                                style="background-image: url({{ asset('usx_files/actus/' . $actupays->banniere) }})">
                                                <a class='img-link'
                                                    href='{{ route('detailsactualites', ['slug' => $actupays->slug]) }}'></a>
                                                @if ($actupays->flash == 1)
                                                    <span class="top-right-icon background8"><i
                                                            class="mdi mdi-flash-on"></i></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 align-center-vertical">
                                        <div class="post-content">
                                            <div class="entry-meta meta-0 font-small mb-15"><a href='#'><span
                                                        class="post-cat background2 color-white">{{ $actupays->Categorie->libelle }}</span></a>
                                            </div>
                                            <h4 class="post-title">
                                                <a
                                                    href='{{ route('detailsactualites', ['slug' => $actupays->slug]) }}'>{{ $actupays->titre }}</a>
                                            </h4>
                                            <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                                <span class="post-on"><i
                                                        class="ti-marker-alt"></i>{{ $actupays->created_at->format('d M Y') }}</span>
                                                {{-- <span class="time-reading"><i class="ti-timer"></i>10 mins read</span> --}}
                                                <span class="hit-count"><i class="ti-bolt"></i>
                                                    {{ $actupays->vues }}
                                                    Vues</span>
                                            </div>
                                            @php
                                                $chaine = $actupays->details;
                                                $chaine = strip_tags($chaine);
                                            @endphp
                                            <p class="font-medium text-limit-3-row">{{ $chaine }}</p>
                                            <a class='readmore-btn font-small text-uppercase font-weight-ultra'
                                                href='{{ route('detailsactualites', ['slug' => $actupays->slug]) }}'>Lire
                                                Plus<i class="ti-arrow-right ml-5"></i></a>
                                        </div>
                                    </div>
                                </article>

                            @empty
                            @endforelse
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-area">
                            <!-- Social Network -->
                            <div class="sidebar-widget widget-social-network mb-30">
                                <div class="widget-header position-relative mb-30">
                                    <h5 class="widget-title mt-5 mb-30">Suivez-nous</h5>
                                </div>
                                <div class="social-network">
                                    <div class="follow-us d-flex align-items-center">
                                        <a class="follow-us-facebook clearfix mr-5 mb-10"
                                            href="https://www.facebook.com/Louangeceleste?mibextid=b06tZ0"
                                            target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-facebook mr-5 v-align-space"></i>
                                                <i class="ti-facebook mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Facebook</span>
                                            <span class="social-count counter-number">12</span><span
                                                class="social-count">K</span>
                                        </a>
                                        <a class="follow-us-twitter clearfix ml-5 mb-10"
                                            href="https://twitter.com/HeavenlyPrais12" target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-twitter-alt mr-5 v-align-space"></i>
                                                <i class="ti-twitter-alt mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Twitter</span>
                                            <span class="social-count counter-number">46</span><span
                                                class="social-count"></span>
                                        </a>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <a class="follow-us-instagram clearfix mr-5"
                                            href="https://www.instagram.com/heavenlypraise2/?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"
                                            target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-instagram mr-5 v-align-space"></i>
                                                <i class="ti-instagram mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Instagram</span>
                                            <span class="social-count counter-number">73</span><span
                                                class="social-count"></span>
                                        </a>
                                        <a class="follow-us-youtube clearfix ml-5"
                                            href="https://www.youtube.com/@heavenlypraise-louangeceleste" target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-youtube mr-5 v-align-space"></i>
                                                <i class="ti-youtube mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Youtube</span>
                                            <span class="social-count counter-number">876</span><span
                                                class="social-count"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--taber-->
                            <div class="sidebar-widget widget-taber mb-30">
                                <div class="widget-taber-content background-white pt-30 pb-30 pl-30 pr-30 border-radius-5">
                                    <nav class="tab-nav float-none mb-20">
                                        @php
                                            $i = 1;
                                        @endphp
                                        <div class="nav nav-tabs" role="tablist">
                                            @forelse ($topcats as $topcat)
                                                <a class="nav-item nav-link {{ $i == 1 ? 'active' : ' ' }}"
                                                    id="nav-popular-tab" data-toggle="tab"
                                                    href="#nav-{{ $i }}" role="tab"
                                                    aria-controls="nav-{{ $i }}"
                                                    aria-selected="true">{{ $topcat->libelle }}</a>
                                                @php
                                                    $i = $i + 1;
                                                @endphp
                                            @empty
                                            @endforelse

                                        </div>
                                    </nav>
                                    <div class="tab-content">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($topcats as $topcat)
                                            @php
                                                $actuscats = App\Models\Actualite::where('categorie_id', $topcat->id)
                                                    ->orderBy('id', 'Desc')
                                                    ->where('publie', 1)
                                                    ->get()
                                                    ->take(2);
                                                $eventscats = App\Models\Evenement::where('categorie_id', $topcat->id)
                                                    ->orderBy('id', 'Desc')
                                                    ->get()
                                                    ->take(2);
                                            @endphp
                                            <!--Tab {{ $i }}-->
                                            <div class="tab-pane {{ $i == 1 ? 'active fade show' : ' ' }}"
                                                id="nav-{{ $i }}" role="tabpanel"
                                                aria-labelledby="nav-{{ $i }}-tab">
                                                <div class="post-block-list post-module-1">
                                                    <ul class="list-post">
                                                        @forelse($actuscats as $actuscat)
                                                            <li class="mb-30">
                                                                <div class="d-flex">
                                                                    <div
                                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                                        <a
                                                                            href='{{ route('detailsactualites', ['slug' => $actuscat->slug]) }}'>
                                                                            <img src="{{ asset('usx_files/actus/' . $actuscat->banniere) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content media-body">
                                                                        <div class="entry-meta meta-0 mb-10">
                                                                            <a href='#'><span
                                                                                    class="post-in background1 color-white font-small">Actualité</span></a>
                                                                        </div>
                                                                        <h6 class="post-title mb-10 text-limit-2-row">
                                                                            {{ $actuscat->titre }}</h6>
                                                                        <div
                                                                            class="entry-meta meta-1 font-x-small color-grey">
                                                                            <span
                                                                                class="post-on">{{ $actuscat->created_at->format('d M Y') }}</span>
                                                                            <span
                                                                                class="hit-count has-dot">{{ $actuscat->vues }}
                                                                                Vues</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                        @forelse($eventscats as $eventscat)
                                                            <li class="mb-30">
                                                                <div class="d-flex">
                                                                    <div
                                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                                        <a
                                                                            href='{{ route('detailsevenements', ['slug' => $eventscat->slug]) }}'>
                                                                            <img src="{{ asset('usx_files/events/' . $eventscat->banniere) }}"
                                                                                alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content media-body">
                                                                        <div class="entry-meta meta-0 mb-10">
                                                                            <a href='#'><span
                                                                                    class="post-in background2 color-white font-small">Évènement</span></a>
                                                                        </div>
                                                                        <h6 class="post-title mb-10 text-limit-2-row">
                                                                            {{ $eventscat->titre }}</h6>
                                                                        <div
                                                                            class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                            <span
                                                                                class="post-on">{{ $eventscat->titre }}</span>
                                                                            <span
                                                                                class="hit-count has-dot">{{ $eventscat->vues }}
                                                                                Vues</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                            @php
                                                $i = $i + 1;
                                            @endphp
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <!-- Ads -->
                            @php
                                $ads2 = App\Models\Promotion::where('position', 'Page')->InRandomOrder()->first();
                            @endphp
                            @if (!empty($ads2))
                                <div class="sidebar-widget widget-ads mb-30 text-center">
                                    @if (!empty($ads2->lien))
                                        <a href="{{ $ads->lien }}" target="_blank">
                                    @endif
                                    @if (!empty($ads2->actualite_id))
                                        @php
                                            $actu = App\Models\Actualite::find($ads2->actualite_id);
                                        @endphp
                                        <a href="{{ route('detailsactualites', ['slug' => $actu->slug]) }}"
                                            class="play-video" data-animate="zoomIn" data-duration="1.5s"
                                            data-delay="0.1s" title="{{ $actu->titre }}">
                                    @endif
                                    @if (!empty($ads2->evenement_id))
                                        @php
                                            $event = App\Models\Evenement::find($ads2->evenement_id);
                                        @endphp
                                        <a href="{{ route('detailsevenements', ['slug' => $event->slug]) }}"
                                            class="play-video" data-animate="zoomIn" data-duration="1.5s"
                                            data-delay="0.1s" title="{{ $event->titre }}">
                                    @endif
                                    <img class="d-inline-block"
                                        src="{{ asset('usx_files/promotions/' . $ads2->banniere) }}" alt="">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Recent Articles End -->
    </main>
@endsection
