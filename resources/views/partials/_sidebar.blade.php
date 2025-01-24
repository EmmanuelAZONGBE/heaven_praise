<!-- sidebar -->
<div class="sidebar">
	<!-- sidebar logo -->
	<div class="sidebar__logo">
		<img src="{{asset('assets/images/logo-white.png')}}" alt="">
	</div>
	<!-- end sidebar logo -->

	<!-- sidebar nav -->
	<ul class="sidebar__nav">
		<li class="sidebar__nav-item">
			<a href="{{route('welcome')}}" class="sidebar__nav-link
				{{ (Route::currentRouteName() == 'welcome') ? 'sidebar__nav-link--active' : ''}}
			">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"></path></svg> 
				<span>Découvrir</span>
			</a>
		</li>

		<li class="sidebar__nav-item">
			<a href="{{route('artistes')}}" class="sidebar__nav-link
			{{ (Route::currentRouteName() == 'artistes') ? 'sidebar__nav-link--active' : ''}}
			{{ (Route::currentRouteName() == 'detailsartistes') ? 'sidebar__nav-link--active' : ''}}
			">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg> 
				<span>Artistes</span>
			</a>
		</li>

		<li class="sidebar__nav-item">
			<a href="{{route('singles')}}" class="sidebar__nav-link
			{{ (Route::currentRouteName() == 'singles') ? 'sidebar__nav-link--active' : ''}}
			">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-music-note-list" viewBox="0 0 16 16">
					<path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
					<path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
					<path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
					<path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
				</svg>
				<span>Singles</span>
			</a>
		</li>

		<li class="sidebar__nav-item">
			<a href="{{route('albums')}}" class="sidebar__nav-link
			{{ (Route::currentRouteName() == 'albums') ? 'sidebar__nav-link--active' : ''}}
			{{ (Route::currentRouteName() == 'detailsalbums') ? 'sidebar__nav-link--active' : ''}}
			">
			<svg xmlns="http://www.w3.org/2000/svg"  class="bi bi-disc" viewBox="0 0 16 16">
				<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
				<path d="M10 8a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 4a4 4 0 0 0-4 4 .5.5 0 0 1-1 0 5 5 0 0 1 5-5 .5.5 0 0 1 0 1zm4.5 3.5a.5.5 0 0 1 .5.5 5 5 0 0 1-5 5 .5.5 0 0 1 0-1 4 4 0 0 0 4-4 .5.5 0 0 1 .5-.5z"/>
			  </svg>
				<span>Albums</span>
			</a>
		</li>

		<li class="sidebar__nav-item">
			<a href="{{route('evenements')}}" class="sidebar__nav-link
			{{ (Route::currentRouteName() == 'evenements') ? 'sidebar__nav-link--active' : ''}}
			{{ (Route::currentRouteName() == 'detailsevenements') ? 'sidebar__nav-link--active' : ''}}
			">
			<svg xmlns="http://www.w3.org/2000/svg" class="bi bi-calendar-heart" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1Zm7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"/>
			  </svg>
				<span>Evènements</span>
			</a>
		</li>
		<li class="sidebar__nav-item">
			<a href="{{route('actualites')}}" class="sidebar__nav-link
			{{ (Route::currentRouteName() == 'actualites') ? 'sidebar__nav-link--active' : ''}}
			{{ (Route::currentRouteName() == 'detailsactualites') ? 'sidebar__nav-link--active' : ''}}
			">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,14H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Zm0-4H10a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm4-6H17V3a1,1,0,0,0-2,0V4H13V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H4A1,1,0,0,0,3,5V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V5A1,1,0,0,0,20,4ZM19,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V6H7V7A1,1,0,0,0,9,7V6h2V7a1,1,0,0,0,2,0V6h2V7a1,1,0,0,0,2,0V6h2Z"/></svg> 
				<span>Actualités</span>
			</a>
		</li>
	</ul>
	<!-- end sidebar nav -->
</div>
<!-- end sidebar -->