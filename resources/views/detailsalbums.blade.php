@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
@endsection

@section('content')
    <main class="position-relative">
        <!-- Archive Header -->
        <div class="archive-header text-center bg-grey mt-5 pt-30">
            <div class="container">
                <div class="breadcrumb">
                    <a href='{{ route('welcome') }}' rel='nofollow'>Accueil</a>
                    <span></span>
                    <a href='{{ route('welcome') }}'>Musique</a>
                    <span></span> {{ $album->titre }}
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <!-- Album Details -->
                    <h5 class="widget-title mb-10">{{ $album->User->nomartiste }} – {{ $album->titre }}</h5>
                    <div class="background12 pt-40 pb-40">
                        <div class="widgets-post-carausel-1">
                            <div class="container">
                                <div class="post-carausel-1 border-radius-10 bg-white">
                                    <div class="row no-gutters">
                                        <div class="col-12 text-center">
                                            <img src="{{ asset('usx_files/covers/' . $album->cover) }}"
                                                alt="{{ $album->titre }}" class="img-fluid rounded shadow-sm"
                                                style="max-width: 300px; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="widget-title mt-20 mb-10">A propos de l'album</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>{{ $album->description }}</p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                    <div class="widget-area pl-30">
                        <!-- Widget: Singles List -->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Singles</h5>
                                <div class="bt-1 border-color-1">
                                    <ul class="main__list main__list--playlist main__list--dashbox">
                                        @php $i = 1; @endphp
                                        <style>
                                            .content-details-hover {
                                                display: none;
                                                top: 0.6rem;
                                                left: 0.7rem;
                                                border-radius: 100%;
                                                padding: 0.3rem;
                                            }

                                            .hover-details:hover .content-details-hover {
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                background-color: #00000060;
                                            }
                                        </style>
                                        @forelse ($singles as $single)
                                            <li class="single-item hover-details  d-flex align-items-center mb-3">
                                                <a href="javascript:;"
                                                    class="position-relative jp-playlist-item play-single "
                                                    data-id="{{ $single->id }}" data-artiste-id="{{ $artistes->id }}"
                                                    data-title="{{ $i }}. {{ $single->titre }}"
                                                    data-artist="{{ $single->User->nomartiste }}"
                                                    data-img="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                    data-mp3="https://heavenly-praise.com/usx_files/songs/{{ $single->audio }}">
                                                    <span
                                                        class="single-item__cover d-flex align-items-center justify-content-center bg-light rounded-circle shadow-sm"
                                                        style="width: 50px; height: 50px; overflow: hidden;">
                                                        <img src="{{ asset('usx_files/covers/' . $single->cover) }}"
                                                            alt="{{ $single->titre }}" class="img-fluid"
                                                            style="width: 100%; height: auto;">
                                                    </span>
                                                    <span class="position-absolute content-details-hover">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" viewBox="0 0 24 24" fill="none" stroke="#fff"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="single-item__title ml-3">
                                                    <h4 class="mb-1" style="font-size: 14px;">
                                                        <a href="#">{{ $i }}. {{ $single->titre }}</a>
                                                    </h4>
                                                    <span style="font-size: 12px;">
                                                        <a
                                                            href="{{ route('detailsartistes', ['heavenid' => $single->User->heavenid]) }}">{{ $single->User->nomartiste }}</a>
                                                    </span>
                                                </div>
                                            </li>
                                            @php $i++; @endphp
                                        @empty
                                            <p>Aucun single disponible.</p>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </main>
@endsection
