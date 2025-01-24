@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')

@endsection

@section('content')
<main class="position-relative">
    <!--archive header-->
    <div class="archive-header text-center">
        <div class="container">
            <h2><span class="color2">Vidéos</span></h2>
            <div class="breadcrumb">
                <a href='{{route('welcome')}}' rel='nofollow'>Accueil</a>
                <span></span> Vidéos
            </div>
            <div class="bt-1 border-color-1 mt-30 mb-50"></div>
        </div>
    </div>
    <!--main content-->
    
    <!-- Start Youtube -->
    <div class="area-padding pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sidebar-widget">
                        <div class="block-tab-item post-module-1 post-module-4 mt-50">
                            @forelse ($artistes as $artiste =>$key)
                            {{-- {{$artiste}} --}}
                                @php
                                    $findartiste=App\User::find($artiste);
                                    $listvideos=$videos->where('user_id',$artiste)
                                @endphp
                                <div class="entry-main-content">
                                    <h2>{{$findartiste->nomartiste}}</h2>
                                    <hr class="wp-block-separator is-style-wide">
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="row">
                                            
                                            @php
                                                $i=1;
                                            @endphp
                                            @forelse ($listvideos as $video)
                                                @php
                                                    
                                                    $explode=explode('?',$video->lien);
                                                    $id=$explode[1];
                                                    $video_ID = $id;
                                                    // $JSON = file_get_contents("https://gdata.youtube.com/feeds/api/videos/{$video_ID}?v=2&alt=json");
                                                    // $JSON_Data = json_decode($JSON);
                                                    // $views = $JSON_Data->{'entry'}->{'yt$statistics'}->{'viewCount'};
                                                @endphp
                                                <div class="slider-single col-lg-4 col-md-6 mb-30 ">
                                                    <div class="img-hover-scale border-radius-5">
                                                        
                                                        <a href='#'>
                                                            <img class="border-radius-5" src="{{asset('PlayerTemplate/img/live/'.$video->banniere)}}" alt="post-slider">
                                                        </a>
                                                        <div class="play_btn play_btn_small">
                                                            <a class="play-video" href="{{$video->lien}}" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                                                                <i class="ti-control-play"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                                                        <a class='' href='#'>{{$video->titre}}</a>
                                                    </h6>
                                                    {{-- <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                                        <span class="post-on">03 Jan</span>
                                                        <span class="hit-count has-dot">{{$views}} Vues</span>
                                                        <a class="float-right" href="#"><i class="ti-heart"></i></a>
                                                    </div> --}}
                                                </div>
                                                @php
                                                    $i=$i+1;
                                                @endphp
                                            @empty
                                                
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <!--pagination-->
            {{-- <div class="pagination-area pt-30 text-center bt-1 border-color-1">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="single-wrap d-flex justify-content-center">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{$videos->links()}}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    <!-- End Start youtube -->
    
</main>
@endsection