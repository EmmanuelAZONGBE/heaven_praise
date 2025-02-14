@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
@endsection


@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Musique</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{ route('artistes') }}'>Musique</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="main_content sidebar_right pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!--loop-list-->
                    <div class="loop-metro post-module-1 row">
                        @php
                            $b = 1;
                        @endphp
                        @forelse ($artistes as $artiste)
                            <div class="slider-single col-3 mt-10">
                                <h6 class="post-title pr-5 pl-5 mb-10 text-limit-2-row"><a
                                        href='#'>{{ $artiste->nomartiste }}</a></h6>
                                <div class="img-hover-scale border-radius-5 hover-box-shadow">
                                    <span class="top-right-icon background2">
                                        <i class="mdi mdi-audiotrack"></i>
                                    </span>
                                    <a href='{{ route('detailsartistes', ['heavenid' => $artiste->heavenid]) }}'>
                                        @if (empty($artiste->avatar))
                                            <img class="border-radius-5" src="{{ asset('usx_files/avatars/avatar.jpeg') }}"
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
                                    {{-- Affichage du nombre total d'écoutes des singles de l'artiste
                                    <span id="hit-count" class="hit-count has-dot">
                                        {{ $artiste->totalEcoutes }}
                                        {{ $artiste->totalEcoutes > 1 ? 'Écoutes' : 'Écoute' }}
                                    </span> --}}
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
