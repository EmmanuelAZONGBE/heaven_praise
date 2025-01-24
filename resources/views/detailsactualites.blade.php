@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')
    <link rel="canonical" href="{{route('detailsevenements',['slug'=>$find->slug])}}"/>
    <meta name="description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}">
    <meta property="og:title" content="{{$find->titre}}"/>
    <meta property="og:description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}"/>
    <meta property="og:url" content="{{route('detailsevenements',['slug'=>$find->slug])}}"/>

    <meta property="og:image:alt" content="{{$find->titre}} | Heavenly Praise"/>

    <meta name="twitter:card" content="summary_large_image"/>
    {{-- <meta name="twitter:site" content="@HeavenlyPraise"/> --}}
    <meta property="twitter:title" content="{{$find->titre}}"/>
    <meta property="twitter:description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}"/>
    <meta name="twitter:alt" content="{{$find->titre}} | Heavenly Praise"/>

@endsection

@section('content')
<main class="position-relative">
    <!--main content-->
    <div class="main_content sidebar_right pb-50 pt-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="entry-header entry-header-1 mb-30">
                        <div class="entry-meta meta-0 font-small mb-15"><a href='#'><span class="post-cat background2 color-white">{{$find->Categorie->libelle}}</span></a></div>
                        <h1 class="post-title">
                            <a href='{{route('detailsactualites',['slug'=>$find->slug])}}'>{{$find->titre}}</a>
                        </h1>
                        <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                            <span class="post-by">Publié par <a href='#'>Heavenly Praise</a></span>
                            <span class="post-on has-dot">{{ $find->created_at->format('d M Y') }}</span>
                            <span class="hit-count"><i class="ti-bolt"></i> {{$find->vues}} Vues</span>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="single-social-share clearfix ">
                            <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                                <span class="hit-count"><i class="ti-comment mr-5"></i>{{$count=$comments->count()}} {{($count>1) ? "Commentaires" : "Commentaire"}}</span>
                            </div>
                            <ul class="d-inline-block list-inline float-right">
                                <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                                <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                                <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                                <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!--end entry header-->
                    <figure class="single-thumnail">
                        <div class="featured-slider-1 border-radius-5">
                            <div class="featured-slider-1-items">
                                <div class="slider-single">
                                    <img src="{{asset('usx_files/actus/'.$find->banniere)}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="arrow-cover"></div>
                    </figure>
                    <div class="entry-main-content">
                        {!!$find->details!!}
                    </div>
                    
                    <div class="single-social-share clearfix ">
                        <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                            <span class="hit-count"><i class="ti-comment"></i>{{$comments->count()}}  {{($count>1) ? "Commentaires" : "Commentaire"}}</span>
                        </div>
                        <ul class="d-inline-block list-inline float-right">
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    @if (sizeof($connexes)>0)
                        <!--related posts-->
                        <div class="related-posts">
                            <h3 class="mb-30">Articles connexes</h3>
                            <div class="loop-list">
                                @php
                                    $s=1;
                                @endphp
                                @forelse ($connexes as $connexe)
                                    <article class="row mb-30">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative thumb-overlay">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{asset('usx_files/actus/'.$connexe->banniere)}})">
                                                    <a class='img-link' href='{{route('detailsactualites',['slug'=>$connexe->slug])}}'></a>
                                                    @if ($connexe->flash==1)
                                                        <span class="top-right-icon background8"><i class="mdi mdi-flash-on"></i></span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-center-vertical">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-15"><a href='{{route('detailsactualites',['slug'=>$connexe->slug])}}'><span class="post-cat background{{$s}} color-white">{{$connexe->Categorie->libelle}}</span></a></div>
                                                <h4 class="post-title">
                                                    <a href='{{route('detailsactualites',['slug'=>$connexe->slug])}}'>{{$connexe->titre}}</a>
                                                </h4>
                                                <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                                    <span class="post-on"><i class="ti-marker-alt"></i>{{ Carbon\Carbon::parse($connexe->date)->format('d M Y') }}</span>
                                                    <span class="hit-count has-dot">{{$connexe->vues}} Vues</span>
                                                </div>
                                                @php
                                                    $chaine=$connexe->description;
                                                    $chaine=strip_tags($chaine);
                                                @endphp
                                                <p class="font-medium  text-limit-3-row">{{$chaine}}</p>
                                            </div>
                                        </div>
                                    </article>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                        
                    @endif
                    <!--Comments-->
                    <div class="comments-area">
                        <h3 class="mb-30">{{$comments->count()}}  {{($count>1) ? "Commentaires" : "Commentaire"}}</h3>
                        
                        @forelse ($comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{asset('usx_files/avatars/avatar.jpeg')}}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{$comment->commentaire}}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="#">{{$comment->nom}}</a>
                                                    </h5>
                                                    <p class="date">{{$comment->created_at->format('d M Y') }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            
                        @endforelse

                    </div>
                    <!--comment form-->
                    <div class="comment-form">
                        <h3 class="mb-30">Laisser un commentaire</h3>
                        <form class="form-contact comment_form" method="POST" action="{{route('storecommentevent',['slug'=>$find->slug])}}" id="commentForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="commentaire" id="commentaire" cols="30" rows="9" placeholder="Votre Commentaire ici" required></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="nom" id="nom" type="text" placeholder="Nom">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button button-contactForm">Poster</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--col-lg-8-->
                <!--Right sidebar-->
                <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                    <div class="widget-area pl-30">
                        
                        <!--Widget social-->
                        <div class="sidebar-widget widget-social-network mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Follow Us</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="social-network">
                                <div class="follow-us d-flex align-items-center">
                                    <a class="follow-us-facebook clearfix mr-5 mb-10" href="#" target="_blank">
                                        <div class="social-icon">
                                            <i class="ti-facebook mr-5 v-align-space"></i>
                                            <i class="ti-facebook mr-5 v-align-space nth-2"></i>
                                        </div>
                                        <span class="social-name">Facebook</span>
                                        <span class="social-count counter-number">65</span><span class="social-count">K</span>
                                    </a>
                                    <a class="follow-us-twitter clearfix ml-5 mb-10" href="#" target="_blank">
                                        <div class="social-icon">
                                            <i class="ti-twitter-alt mr-5 v-align-space"></i>
                                            <i class="ti-twitter-alt mr-5 v-align-space nth-2"></i>
                                        </div>
                                        <span class="social-name">Twitter</span>
                                        <span class="social-count counter-number">75</span><span class="social-count">K</span>
                                    </a>
                                </div>
                                <div class="follow-us d-flex align-items-center">
                                    <a class="follow-us-instagram clearfix mr-5" href="#" target="_blank">
                                        <div class="social-icon">
                                            <i class="ti-instagram mr-5 v-align-space"></i>
                                            <i class="ti-instagram mr-5 v-align-space nth-2"></i>
                                        </div>
                                        <span class="social-name">Instagram</span>
                                        <span class="social-count counter-number">32</span><span class="social-count">K</span>
                                    </a>
                                    <a class="follow-us-youtube clearfix ml-5" href="#" target="_blank">
                                        <div class="social-icon">
                                            <i class="ti-youtube mr-5 v-align-space"></i>
                                            <i class="ti-youtube mr-5 v-align-space nth-2"></i>
                                        </div>
                                        <span class="social-name">Youtube</span>
                                        <span class="social-count counter-number">28</span><span class="social-count">K</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-50">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">Categories</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="post-block-list post-module-1 post-module-5">
                                @php
                                    $categories=App\Models\Categorie::get();
                                    $cat=2;
                                @endphp
                                <ul> 
                                    @forelse ($categories as $categorie)
                                        @php
                                            $count=App\Models\Actualite::where('publie',1)->where('categorie_id',$categorie->id)->count();
                                        @endphp
                                        <li class="cat-item cat-item-{{$cat}}"><a href='#'>{{$categorie->libelle}}</a> ({{$count}})</li>
                                        @php
                                            $cat=$cat+1;
                                        @endphp
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        @if (sizeof($lastevents)>0)
                            <!--Widget latest posts style 2-->
                            <div class="sidebar-widget widget_alitheme_lastpost mb-50">
                                <div class="widget-header position-relative mb-20 pb-10">
                                    <h5 class="widget-title mb-10">Dernières Publications</h5>
                                    <div class="bt-1 border-color-1"></div>
                                </div>
                                <div class="post-block-list">
                                    @forelse ($lastevents as $lastevent)
                                        <article class="mb-30">
                                            <div class="post-thumb position-relative thumb-overlay hover-box-shadow-2 mb-30">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{asset('usx_files/events/'.$lastevent->banniere)}})">
                                                    <a class='img-link' href='{{route('detailsactualites',['slug'=>$lastevent->slug])}}'></a>
                                                </div>
                                            </div>
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-15">
                                                    <a href='{{route('detailsactualites',['slug'=>$lastevent->slug])}}'><span class="post-cat background4 color-white">{{$lastevent->Categorie->libelle}}</span></a>
                                                </div>
                                                <h4 class="post-title">
                                                    <a href='{{route('detailsactualites',['slug'=>$lastevent->slug])}}'>{{$lastevent->titre}}</a>
                                                </h4>
                                                <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                                    <span class="post-on">{{ $lastevent->created_at->format('d M Y') }}</span>
                                                    <span class="hit-count has-dot">{{$lastevent->vues}} Vues</span>
                                                </div>
                                            </div>
                                        </article>
                                    @empty
                                        
                                    @endforelse
                                </div>
                            </div>
                            
                        @endif
                    </div>
                </div>
                <!--End sidebar-->
            </div>
        </div>
    </div>
</main>
@endsection