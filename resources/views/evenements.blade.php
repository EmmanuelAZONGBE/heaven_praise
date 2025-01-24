@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')

@endsection

@section('content')
<main class="position-relative">
    <!--archive header-->
    <div class="archive-header text-center">
        <div class="container">
            <h2><span class="color2">Évènements</span></h2>
            <div class="breadcrumb">
                <a href='{{route('welcome')}}' rel='nofollow'>Accueil</a>
                <span></span> Évènements
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-50"></div>
        </div>
    </div>
    <!--main content-->
    <div class="main_content sidebar_right pb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <!--loop-list-->
                    <div class="loop-metro post-module-1 row">
                        @php
                            $b=1;
                        @endphp
                        @forelse ($evenements as $evenement)
                            <article class="col-lg-4 col-md-6 col-sm-12 mb-30">
                                <div class="post-thumb position-relative">
                                    <div class="thumb-overlay img-hover-slide border-radius-5 position-relative" style="background-image: url({{asset('usx_files/events/'.$evenement->banniere)}})">
                                        <a class='img-link' href='{{route('detailsevenements',['slug'=>$evenement->slug])}}'></a>
                                        <div class="post-content-overlay">
                                            <div class="entry-meta meta-0 font-small mb-15">
                                                <a href='{{route('detailsevenements',['slug'=>$evenement->slug])}}'><span class="post-cat background{{$b}} color-white">{{$evenement->Categorie->libelle}}</span></a>
                                            </div>
                                            <h6 class="post-title">
                                                <a class='color-white' href='{{route('detailsevenements',['slug'=>$evenement->slug])}}'>{{$evenement->titre}}</a>
                                            </h6>
                                            <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                <span class="post-on">{{ Carbon\Carbon::parse($evenement->date)->format('d M Y') }}</span>
                                                <span class="hit-count has-dot">{{$evenement->vues}} Vues</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            @php
                                $b=$b+1;
                            @endphp
                        @empty
                            
                        @endforelse
                    </div>
                    <!--pagination-->
                    {{-- <div class="pagination-area pt-30 text-center bt-1 border-color-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-wrap d-flex justify-content-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-start">
                                                {{$evenements->links()}}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection