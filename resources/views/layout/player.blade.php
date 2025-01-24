<!DOCTYPE html>
<html lang="fr">
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>{{$title}} - Heavenly Praise – Streaming Audio Gospel</title>

		<!-- CSS -->
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/bootstrap-reboot.min.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/bootstrap-grid.min.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/select2.min.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/paymentfont.min.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/slider-radio.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/plyr.css')}}">
		<link rel="stylesheet" href="{{asset('PlayerTemplate/css/main.css')}}">

		<!-- Favicons -->
        
		<link rel="icon" href="{{asset('PlayerTemplate/icon/favicon-32x32.png')}}" type="image/x-icon">
		<!--<link rel="apple-touch-icon" sizes="180x180" href="{{asset('PlayerTemplate/icon/apple-touch-icon.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{asset('PlayerTemplate/icon/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{asset('PlayerTemplate/icon/favicon-16x16.png')}}">
		<link rel="mask-icon" href="{{asset('PlayerTemplate/icon/safari-pinned-tab.svg')}}" color="#5bbad5">
		<link href="{{asset('PlayerTemplate/icon/favicon.ico')}}" rel="shortcut icon" type="image/x-icon">-->

		<meta name="author" content="Emmac Corporation - https://emmaccorporation.com/fr/">
		<meta name="keywords" content="Fireboy DML,Burna Boy,Olamide,Simi,Stonebwoy,Otile Brown,Aslay,freemusic,webplayer">

		<meta property="og:type" content="website"/>
		<meta property="og:site_name" content="Heavenly Praise - Streaming Audio Gospel"/>

		@hasSection ('meta')
			@yield('meta')
		@endif

		<meta property="og:image" content="{{asset('assets/images/logo-white.png')}}"/>
		<meta name="twitter:image" content="{{asset('assets/images/logo-white.png')}}"/>
		@hasSection ('css')
			@yield('css')
		@endif
		@livewireStyles
		{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}
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
		@include('partials._nav')
		@include('partials._sidebar')
		@include('partials._player')

		<!-- main content -->
		<main class="main">
			@yield('content')
		</main>
		<!-- end main content -->

		@include('partials._footer')

		<!-- modal playlist -->
		<form action="{{route('addtoplaylist')}}" method="POST" id="modal-playlist" class="zoom-anim-dialog mfp-hide modal modal--form">
			{{ csrf_field() }}
			<button class="modal__close" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l4.3-4.29a1,1,0,1,0-1.42-1.42L12,10.59,7.71,6.29A1,1,0,0,0,6.29,7.71L10.59,12l-4.3,4.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l4.29,4.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg></button>

			<h4 class="sign__title">Ajouter à la playlist</h4>
			@php
				if(Auth::guest()){
					$playlists=[];
				}else{
					$playlists=App\Models\Playlist::where('user_id',Auth::user()->id)->get();
				}
			@endphp
			<input type="hidden" name="singleid" id="singleid">
			@if (sizeof($playlists)>0)
				<div class="sign__group sign__group--row">
					<label class="sign__label" for="value">Sélectionnez dans votre liste:</label>
					<select class="sign__select" name="userplaylists" id="userplaylists" required>
						@foreach ($playlists as $playlist)
							<option value="{{$playlist->slug}}">{{$playlist->libelle}}</option>
						@endforeach
						<option value="Nouveau">Nouvelle Playlist</option>
					</select>
				</div>
			@endif

			<div class="sign__group sign__group--row" id="playlistname" style="display: {{sizeof($playlists)>0 ? 'none' : 'block'}};">
				<label class="sign__label" for="value">Nom de la Playlist:</label>
				<input type="text" class="sign__input" name="playlistname"  id="userplaylistsinput" autocomplete="off" {{sizeof($playlists)>0 ? '' : 'required'}} >
			</div>

			<button class="sign__btn" type="submit">Ajouter</button>
		</form>
		<!-- end modal ticket -->

		<!-- JS -->
		<script src="{{asset('PlayerTemplate/js/jquery-3.5.1.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/owl.carousel.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/smooth-scrollbar.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/select2.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/slider-radio.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/jquery.inputmask.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/plyr.min.js')}}"></script>
		<script src="{{asset('PlayerTemplate/js/main.js')}}"></script>
		@hasSection ('js')
			@yield('js')
		@endif
		<script type="text/javascript">
			$(document).ready(function(){
				$('#userplaylists').on('change', function() {
					if(this.value == "Nouveau") {
						$('#playlistname').show();
					} else {
						$('#userplaylistsinput').val('');
						$('#playlistname').hide();
					}
				});
			});
		</script>
		<script>
			$('.addtoplaylist').click(function(){
				var data = $.parseJSON($(this).attr('data-button'));
				$('#singleid').val(data.func1);
			});

		</script>

		<script>
			$(document).ready(function () {
				$('.js-example-basic-single').select2();
			});
			$(".js-example-responsive").select2({
				height: 'resolve' // need to override the changed default
			});
		</script>
		@livewireScripts
	</body>
</html>
