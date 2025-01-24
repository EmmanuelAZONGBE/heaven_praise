<!DOCTYPE html>
<html lang="fr"  data-layout=horizontal>

	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		{{ csrf_field() }}
	</form>
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="Heavenly Praise">
		<!-- Favicon icon-->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('Adm_assets/images/favicon/favicon.ico')}}">
		<!-- Libs CSS -->
		<link href="{{asset('Adm_assets/libs/bootstrap-icons/font/bootstrap-icons.css')}}" rel="stylesheet">
		<link href="{{asset('Adm_assets/libs/%40mdi/font/css/materialdesignicons.min.css')}}" rel="stylesheet">
		<link href="{{asset('Adm_assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet">
		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('Adm_assets/css/theme.min.css')}}">
		<link href="{{asset('Adm_assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
		{{-- <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script> --}}
		<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

		<link href="{{asset('Adm_assets/libs/@yaireo/tagify/dist/tagify.css')}}" rel="stylesheet">
		<title>Administration | Heavenly Praise</title>

	</head>
	<body>
	<main id="main-wrapper" class="main-wrapper">
		@include('adm.partials._nav')
		
		<div id="app-content">
			@yield('content')
		</div>
	</main>
	<!-- Scripts -->

	<!-- quill js -->
	<script src="{{asset('Adm_assets/libs/quill/dist/quill.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/@yaireo/tagify/dist/tagify.min.js')}}"></script>
	
	<!-- Libs JS -->
	<script src="{{asset('Adm_assets/libs/jquery/dist/jquery.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/feather-icons/dist/feather.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/simplebar/dist/simplebar.min.js')}}"></script>
	<!-- Theme JS -->
	<script src="{{asset('Adm_assets/js/theme.min.js')}}"></script>
	<!-- popper js -->
	<script src="{{asset('Adm_assets/libs/@popperjs/core/dist/umd/popper.min.js')}}"></script>
	<!-- tippy js -->
	<script src="{{asset('Adm_assets/libs/tippy.js/dist/tippy-bundle.umd.min.js')}}"></script>
	<script src="{{asset('Adm_assets/js/vendors/tooltip.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{asset('Adm_assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('Adm_assets/js/vendors/datatable.js')}}"></script>


    <script>
        ClassicEditor
            .create( document.querySelector( '#texteditor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
	@hasSection ('js')
		@yield('js')
	@endif
</body>
