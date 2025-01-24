@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')
    <link rel="canonical" href="{{route('badgeevenements',['slug'=>$find->slug])}}"/>
    <meta name="description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}">
    <meta property="og:title" content="{{$find->titre}}"/>
    <meta property="og:description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}"/>
    <meta property="og:url" content="{{route('badgeevenements',['slug'=>$find->slug])}}"/>

    <meta property="og:image:alt" content="{{$find->titre}} | Heavenly Praise"/>

    <meta name="twitter:card" content="summary_large_image"/>
    {{-- <meta name="twitter:site" content="@HeavenlyPraise"/> --}}
    <meta property="twitter:title" content="{{$find->titre}}"/>
    <meta property="twitter:description" content="Ne ratez rien de cet évènement qui se tiendra le {{$find->date}} à {{$find->lieu}}"/>
    <meta name="twitter:alt" content="{{$find->titre}} | Heavenly Praise"/>

@endsection


@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Générer votre badge</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{route('artistes')}}'>Badge Évènement</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('content')
<main class="position-relative">
    <!--main content-->
    <div class="main_content sidebar_right pb-50 pt-20">
        <div class="container">
            <div class="row">
                @include('partials._flash-message')
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div id="JySerai" class="sidebar-widget widget-social-network mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Badge J'y serai</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <form action="{{route('generatebadgeevenements',['slug'=>$find->slug])}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-8 col-sm-12 mx-auto">
                                    <div class="form-group">
                                        <img src="{{asset('usx_files/avatars/default.jpg')}}" class="img-responsive img-thumbnail" alt="" id="blah1">
                                    </div>
                                    <div class="mt-10 form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
                                        <label class="form-label" for="avatar"><small>Selectionnez une photo carrée au format 1500px x 1500px</small></label>
                                        <input type="file" class="form-control" value="" name="avatar" id="avatar"  style="padding: 8px;">
                                        @if ($errors->has('avatar'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('avatar') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button class="btn btn-fill-out" type="submit">Génerer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12">
                    @include('partials._flash-message')
                    <div class="entry-header entry-header-1 mb-30">
                        <div class="entry-meta meta-0 font-small mb-15"><a href='#'><span class="post-cat background2 color-white">{{$find->Categorie->libelle}}</span></a></div>
                        <h1 class="post-title">
                            <a href='{{route('detailsevenements',['slug'=>$find->slug])}}'>{{$find->titre}}</a>
                        </h1>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        
                    </div>
                    <!--end entry header-->
                    <figure class="single-thumnail">
                        <div class="featured-slider-1 border-radius-5">
                            {{-- <div class="featured-slider-1-items">
                                <div class="slider-single"> --}}
                                    <img src="{{asset('usx_files/events/'.$find->banniere)}}" alt="">
                                {{-- </div>
                            </div> --}}
                        </div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
    
	<script>
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#blah1').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		function uploadavatar(){
			$('#avatar').trigger('click');
		}
		
		$("#avatar").change(function(){
			readURL(this);
		});
	</script>
@endsection