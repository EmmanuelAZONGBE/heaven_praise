<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner">
        <!--Categories-->
        <div class="sidebar-widget widget_categories mb-50">
            <div class="widget-header position-relative mb-20">
                <h5 class="widget-title mt-5">Catégories</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                @php
                    $categories = App\Models\Categorie::get();
                @endphp
                <ul>
                    @forelse ($categories as $categorie)
                        @php
                            $count = App\Models\Actualite::where('publie', 1)
                                ->where('categorie_id', $categorie->id)
                                ->count();
                        @endphp
                        <li class="cat-item cat-item-2"><a href='#'>{{ $categorie->libelle }}</a>
                            ({{ $count }})
                        </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        {{-- <div class="sidebar-widget widget-latest-posts mb-30">
            <div class="widget-header position-relative mb-30">
                <h5 class="widget-title mt-5 mb-30">Fashion</h5>
            </div>
            <div class="post-block-list post-module-1 post-module-5">
                <ul class="list-post">
                    <li class="mb-30">
                        <div class="d-flex">
                            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                <a class='color-white' href='/demo/single'>
                                    <img src="assets/imgs/thumbnail-1.jpeg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row"><a href='/demo/single'>Traveling Tends to Magnify All Human Emotions</a></h6>
                                <div class="entry-meta meta-1 font-x-small color-grey">
                                    <span class="post-on">25 April</span>
                                    <span class="hit-count has-dot">26k Views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex">
                            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                <a class='color-white' href='/demo/single'>
                                    <img src="assets/imgs/thumbnail-2.jpeg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row"><a href='/demo/single'>The Luxury Of Traveling With Yacht</a></h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                    <span class="post-on">25 April</span>
                                    <span class="hit-count has-dot">37k Views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex">
                            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                <a class='color-white' href='/demo/single'>
                                    <img src="assets/imgs/thumbnail-3.jpeg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row"><a href='/demo/single'>Last Minute Festive Packages From Superbreak</a></h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                    <span class="post-on">25 April</span>
                                    <span class="hit-count has-dot">54k Views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex">
                            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                <a class='color-white' href='/demo/single'>
                                    <img src="assets/imgs/thumbnail-4.jpeg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row"><a href='/demo/single'>Last Minute Festive Packages From Superbreak</a></h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                    <span class="post-on">25 April</span>
                                    <span class="hit-count has-dot">54k Views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="mb-30">
                        <div class="d-flex">
                            <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                <a class='color-white' href='/demo/single'>
                                    <img src="assets/imgs/thumbnail-5.jpeg" alt="">
                                </a>
                            </div>
                            <div class="post-content media-body">
                                <h6 class="post-title mb-10 text-limit-2-row"><a href='/demo/single'>Last Minute Festive Packages From Superbreak</a></h6>
                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                    <span class="post-on">25 April</span>
                                    <span class="hit-count has-dot">54k Views</span>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div> --}}
        <div class="sidebar-widget widget-ads mb-30">
            <a href="assets/imgs/news-1.jpeg" class="play-video" data-animate="zoomIn" data-duration="1.5s"
                data-delay="0.1s">
                <img src="assets/imgs/ads-1.jpeg" alt="">
            </a>
        </div>
    </div>
</aside>
<!-- Main Wrap Start -->
<header class="main-header header-style-2 header-style-3">
    <div class="top-bar background4 d-none d-md-block color-white">
        <div class="container">
            <div class="topbar-inner pt-10 pb-10">
                <div class="row">
                    <div class="col-6">
                        <div class="language d-inline-block font-small">
                            <div id="langMenuDropdow" class="dropdown-menu dropdown-menu-left"
                                aria-labelledby="langMenu">
                                <a class="dropdown-item" href="#">Français</a>
                                <a class="dropdown-item" href="#">English</a>
                                <a class="dropdown-item" href="#">Deutsch</a>
                                <a class="dropdown-item" href="#">РУССКИЙ</a>
                            </div>
                            <a class="dropdown-toggle color-white" href="#" role="button" id="langMenu"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-world mr-5"></i>
                                <span>FR</span>
                            </a>
                        </div>
                        <div id="datetime" class="d-inline-block">
                            <ul>
                                {{-- <li><span class="font-small"><i class="wi wi-day-cloudy mr-5"></i>34ºc, Sunny. <a class="color-white" href="#">London</a></span></li> --}}
                                <li><span class="font-small"><i class="ti-calendar mr-5"></i>{{ date('d M Y') }}</span>
                                </li>
                                <li><a class="color-white" href="#"><span class="font-small"><i
                                                class="ti-book mr-5"></i>Lire les dernières actus</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="header-social-network d-inline-block list-inline color-white">
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center color-white"
                                    target="_blank" href="https://www.facebook.com/Louangeceleste?mibextid=b06tZ0"><i
                                        class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center color-white"
                                    target="_blank" href="https://twitter.com/HeavenlyPrais12"><i
                                        class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a
                                    class="social-icon instagram-icon text-xs-center color-white" target="_blank"
                                    href="https://www.instagram.com/heavenlypraise2/?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><i
                                        class="ti-instagram"></i></a></li>
                            <li class="list-inline-item"><a
                                    class="social-icon pinterest-icon text-xs-center color-white" target="_blank"
                                    href="https://www.youtube.com/@heavenlypraise-louangeceleste"><i
                                        class="ti-youtube"></i></a></li>
                        </ul>
                        <div class="vline-space d-inline-block"></div>
                        <div class="user-account d-inline-block font-small">
                            @if (Auth::guest())
                                <a class="color-white" href="{{ route('login') }}" role="button" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ti-user"></i>
                                    <span>Connexion / Insciption</span>
                                </a>
                            @else
                                <a class="dropdown-toggle color-white" href="#" role="button" id="userMenu"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-user"></i>
                                    <span>Compte</span>
                                </a>
                                <div id="userMenuDropdow" class="dropdown-menu dropdown-menu-right"
                                    aria-labelledby="userMenu">
                                    @if (Auth::user()->role == 'Auditeur')
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i
                                                class="ti-home"></i>Dashboard</a>
                                    @endif
                                    @if (Auth::user()->role == 'Artiste')
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}"><i
                                                class="ti-home"></i>Dashboard</a>
                                    @endif
                                    @if (Auth::user()->role == 'Adm')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                                class="ti-home"></i>Dashboard</a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class='dropdown-item' href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="ti-share"></i>Déconnexion</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End top bar-->
    <!--End top bar-->
    <div class="header-logo background-white pt-10 pb-10 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-12 align-center-vertical">
                    <a href='{{ route('welcome') }}'>
                        <img class="logo-img d-inline" src="{{ asset('assets/imgs/logo.png') }}" alt="">
                    </a>
                </div>
                @php
                    $ads = App\Models\Promotion::where('position', 'En-tête')->InRandomOrder()->first();
                @endphp
                @if (!empty($ads))
                    <div class="col-lg-10 col-md-12 align-center-vertical d-none d-lg-inline text-right">
                        @if (!empty($ads->lien))
                            <a href="{{ $ads->lien }}" target="_blank">
                        @endif
                        @if (!empty($ads->actualite_id))
                            @php
                                $actu = App\Models\Actualite::find($ads->actualite_id);
                            @endphp
                            <a href="{{ route('detailsactualites', ['slug' => $actu->slug]) }}"
                                title="{{ $actu->titre }}">
                        @endif
                        @if (!empty($ads->evenement_id))
                            @php
                                $event = App\Models\Evenement::find($ads->evenement_id);
                            @endphp
                            <a href="{{ route('detailsevenements', ['slug' => $event->slug]) }}"
                                title="{{ $event->titre }}">
                        @endif

                        <img class="ads-img d-inline" src="{{ asset('usx_files/promotions/' . $ads->banniere) }}"
                            alt="">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--End logo-->
    <div class="header-bottom header-sticky background-white text-center">
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="off-canvas-toggle-cover">
                        <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
                            <span></span>
                            <p class="font-small d-none d-md-inline">Catégories</p>
                        </div>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href='{{ route('welcome') }}'>
                            <img class="logo-img d-inline" src="{{ asset('assets/imgs/logo.png') }}" alt="">
                        </a>
                    </div>
                    <div class="logo-mobile d-inline d-md-none">
                        <a href='{{ route('welcome') }}'>
                            <img class="logo-img d-inline" src="{{ asset('assets/imgs/logo.png') }}" alt=""
                                style="width:120px;">
                        </a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-nav text-left d-none d-lg-block">
                        <nav>
                            <ul id="navigation" class="main-menu">
                                <li><a href='{{ route('welcome') }}'>Accueil</a></li>
                                <li class="mega-menu-item">
                                    <a href='#'>Actualités</a>
                                    <div class="sub-mega-menu">
                                        <div class="nav flex-column nav-pills" role="tablist">
                                            <a class="nav-link active" data-toggle="pill" href="#news-0"
                                                role="tab">Tous</a>
                                            @php
                                                $categories = App\Models\Categorie::InRandomOrder()
                                                    ->orderBy('libelle', 'Asc')
                                                    ->get()
                                                    ->take(5);
                                                $l = 1;
                                            @endphp
                                            @forelse ($categories as $categorie)
                                                <a class="nav-link" data-toggle="pill"
                                                    href="#news-{{ $l }}"
                                                    role="tab">{{ $categorie->libelle }}</a>
                                                @php
                                                    $l = $l + 1;
                                                @endphp
                                            @empty
                                            @endforelse
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="news-0" role="tabpanel">
                                                <div class="row">
                                                    @php
                                                        $allactus = App\Models\Actualite::where('publie', 1)
                                                            ->orderBy('id', 'Desc')
                                                            ->get()
                                                            ->take(4);
                                                    @endphp
                                                    @forelse($allactus as $allactu)
                                                        <div class="col-3 post-module-1">
                                                            <div
                                                                class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                <a
                                                                    href='{{ route('detailsactualites', ['slug' => $allactu->slug]) }}'>
                                                                    <img src="{{ asset('usx_files/actus/' . $allactu->banniere) }}"
                                                                        alt="">
                                                                </a>
                                                                @if ($allactu->flash == 1)
                                                                    <span class="top-right-icon background8"><i
                                                                            class="mdi mdi-flash-on"></i></span>
                                                                @endif
                                                            </div>
                                                            <div class="post-content media-body">
                                                                <h6 class="post-title mb-10 text-limit-2-row">
                                                                    {{ $allactu->titre }}</h6>
                                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                                    <span
                                                                        class="post-on">{{ $allactu->created_at->format('d M Y') }}</span>
                                                                    <span
                                                                        class="hit-count has-dot">{{ $allactu->vues }}
                                                                        Vues</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                    @endforelse
                                                </div>
                                            </div>
                                            @php
                                                $l = 1;
                                            @endphp
                                            @forelse($categories as $categorie)
                                                <div class="tab-pane" id="news-{{ $l }}" role="tabpanel">
                                                    <div class="row">
                                                        @php
                                                            $actus = App\Models\Actualite::where('publie', 1)
                                                                ->orderBy('id', 'Desc')
                                                                ->where('categorie_id', $categorie->id)
                                                                ->get()
                                                                ->take(4);
                                                        @endphp
                                                        @forelse($actus as $actu)
                                                            <div class="col-3 post-module-1">
                                                                <div
                                                                    class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                                    <a
                                                                        href='{{ route('detailsactualites', ['slug' => $actu->slug]) }}'>
                                                                        <img src="{{ asset('usx_files/actus/' . $actu->banniere) }}"
                                                                            alt="">
                                                                    </a>
                                                                    @if ($actu->flash == 1)
                                                                        <span class="top-right-icon background8"><i
                                                                                class="mdi mdi-flash-on"></i></span>
                                                                    @endif
                                                                </div>
                                                                <div class="post-content media-body">
                                                                    <h6 class="post-title mb-10 text-limit-2-row">
                                                                        {{ $actu->titre }}</h6>
                                                                    <div
                                                                        class="entry-meta meta-1 font-x-small color-grey">
                                                                        <span
                                                                            class="post-on">{{ $actu->created_at->format('d M Y') }}</span>
                                                                        <span
                                                                            class="hit-count has-dot">{{ $actu->vues }}
                                                                            Vues</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                        @endforelse
                                                    </div>
                                                </div>
                                                @php
                                                    $l = $l + 1;
                                                @endphp
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </li>
                                <li><a href='{{ route('evenements') }}'>Évènements</a></li>
                                {{-- <li class="menu-item-has-children"><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href='/demo/404'>404</a></li>
                                        <li><a href='/demo/author'>Author</a></li>
                                        <li><a href='/demo/search'>Search</a></li>
                                        <li><a href='/demo/login'>Login</a></li>
                                        <li><a href='/demo/signup'>Signup</a></li>
                                    </ul>
                                </li> --}}
                                <li><a href='{{ route('artistes') }}'>Musique</a></li>
                                <li><a href='{{ route('videos') }}'>Vidéos</a></li>
                                <li><a href='{{ route('plans') }}'>Plan</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Search -->
                    <div class="search-button">
                        <button class="search-icon"><i class="ti-search"></i></button>
                        <span class="search-close float-right font-small"><i class="ti-close mr-5"></i>FERMER</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<script>
    $(document).ready(function() {
        $('#userMenu').on('click', function(e) {
            e.preventDefault();
            $(this).next('.dropdown-menu').toggleClass('show');
        });
    });
</script>
