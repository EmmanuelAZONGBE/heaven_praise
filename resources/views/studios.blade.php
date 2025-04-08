@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
@endsection

@section('content')
    <main class="position-relative">
        <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 mx-auto">
                        <h2><span class="color6">Nos Studios</span></h2>
                    </div>
                    <div class="col-md-6 mx-auto text-center text-md-right">
                        <div class="breadcrumb">
                            <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                            <a href='{{ route('studios') }}'>Nos Studios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="section-ptb light-bg">
            <div class="container">
                <style>
                    .event-rental-section {
                        padding: 60px 0;
                    }

                    .event-rental-section h5 {
                        font-size: 1.5rem;
                        margin-bottom: 1rem;
                    }

                    .event-rental-section p {
                        font-size: 1rem;
                        color: #777;
                        margin-bottom: 1.5rem;
                    }

                    .event-rental-section ul {
                        list-style-type: none;
                        padding: 0;
                    }

                    .event-rental-section ul li {
                        margin-bottom: 0.5rem;
                    }

                    .event-rental-buttons {
                        margin-top: 20px;
                    }

                    .event-rental-buttons .btn {
                        margin-right: 10px;
                    }

                    .event-rental-buttons .btn-primary {
                        background-color: #007bff;
                        color: #fff;
                    }

                    .event-rental-buttons .btn-secondary {
                        background-color: #6c757d;
                        color: #fff;
                    }

                    /* General Styles */
                    body {
                        font-family: 'Helvetica Neue', Arial, sans-serif;
                        color: #333;
                        line-height: 1.6;
                    }

                    .container {
                        max-width: 1200px;
                        margin: 0 auto;
                        padding: 0 15px;
                    }

                    /* Header Styles */
                    .archive-header {
                        background-color: #f4f4f4;
                        padding: 60px 0;
                    }

                    .archive-header h1 {
                        font-size: 2.5rem;
                        margin-bottom: 0.5rem;
                    }

                    .archive-header .lead {
                        font-size: 1.25rem;
                        color: #777;
                    }

                    .breadcrumb a {
                        color: #007bff;
                        text-decoration: none;
                    }

                    .breadcrumb span {
                        margin: 0 0.5rem;
                    }

                    /* Service Section Styles */
                    .service {
                        background: #fff;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        padding: 20px;
                        transition: transform 0.3s ease;
                    }

                    .service:hover {
                        transform: translateY(-10px);
                    }

                    .service i {
                        font-size: 4rem;
                        color: #007bff;
                        margin-bottom: 1rem;
                    }

                    .service h2 {
                        font-size: 1.75rem;
                        margin-bottom: 1rem;
                    }

                    .service-description {
                        margin-bottom: 1rem;
                    }

                    .service ul {
                        list-style-type: none;
                        padding: 0;
                    }

                    .service ul li {
                        margin-bottom: 0.5rem;
                    }

                    /* Responsive Design */
                    @media (max-width: 992px) {
                        .service {
                            margin-bottom: 20px;
                        }
                    }

                    /* Service Center Section Styles */
                    .service-center {
                        padding: 60px 0;
                    }

                    .service-center h5 {
                        font-size: 1.5rem;
                        margin-bottom: 1rem;
                    }

                    .service-center p {
                        font-size: 1rem;
                        color: #777;
                        margin-bottom: 1.5rem;
                    }

                    .service-center ul {
                        list-style-type: none;
                        padding: 0;
                    }

                    .service-center ul li {
                        margin-bottom: 0.5rem;
                    }

                    .service-center img {
                        max-width: 100%;
                        height: auto;
                        border-radius: 5px;
                    }
                </style>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="section-title-new text-center">
                            <span class="sub-title">Nos Studios</span>
                            <h2 class="main-title">Explorez notre gamme complète de Studios pour vos projets musicaux.</h2>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- Studios Section -->
                    <div class="col-lg-8">
                        <div class="row">
                            <!-- Service 1: Enregistrement Studio -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-microphone" aria-hidden="true"></i>
                                    <h6 class="mt-2">Enregistrement Studio</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Profitez de notre studio équipé des dernières technologies pour un
                                            enregistrement de qualité professionnelle.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Prise de son haute qualité</li>
                                            <li>Accompagnement par un ingénieur du son</li>
                                            <li>Mixage et mastering inclus</li>
                                            <li>Location d'instruments sur demande</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Service 2: Mixage & Mastering -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                    <h6 class="mt-2">Mixage / Mastering</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Offrez à votre musique une finition impeccable avec notre service de mixage et
                                            de mastering.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Équilibrage des fréquences et ajustement des niveaux</li>
                                            <li>Ajout d'effets pour enrichir votre son</li>
                                            <li>Conversion et exportation dans différents formats (WAV, MP3, etc.)</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Service 3: Création de Bandes-Sons & Publicités Audio -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-headphones" aria-hidden="true"></i>
                                    <h6 class="mt-2">Création de Bandes-Sons / Publicités Audio</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Nous composons des musiques originales adaptées à vos projets audiovisuels.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Musiques originales pour vidéos et spots publicitaires</li>
                                            <li>Voix-off professionnelles</li>
                                            <li>Sound design et effets sonores</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Service 4: Coaching Vocal & Artistique -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-microphone-alt" aria-hidden="true"></i>
                                    <h6 class="mt-2">Coaching Vocal / Artistique</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Améliorez votre technique vocale et votre présence scénique avec nos coachs
                                            expérimentés.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Exercices de respiration et de posture</li>
                                            <li>Travail sur l'interprétation et l'émotion</li>
                                            <li>Conseils en image et en performance scénique</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Service 5: Production Musicale & Arrangements -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-guitar" aria-hidden="true"></i>
                                    <h6 class="mt-2">Production Musicale / Arrangements</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Transformez vos idées en morceaux finalisés avec l'aide de nos experts en
                                            production musicale.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Création d'instrumentales sur-mesure</li>
                                            <li>Ajout de sonorités et d'effets personnalisés</li>
                                            <li>Collaboration avec des musiciens professionnels</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>

                            <!-- Service 6: Location de Studio -->
                            <div class="col-lg-4 col-md-6 mb-3">
                                <div class="service fadeInUp">
                                    <i class="fa fa-building" aria-hidden="true"></i>
                                    <h6 class="mt-2">Location de Studio</h6>
                                    <div class="service-card">
                                        <div class="service-description">
                                            Bénéficiez d'un espace professionnel pour enregistrer ou mixer votre musique.
                                        </div>
                                        {{-- <ul class="mt-2 mb-0">
                                            <li>Studio entièrement équipé</li>
                                            <li>Accès à un large choix de matériel audio</li>
                                            <li>Possibilité de louer des instruments sur place</li>
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar Section -->
                    <div class="col-lg-4 col-md-12">
                        <div class="widget-area">
                            <!-- Social Network -->
                            <div class="sidebar-widget widget-social-network mb-30">
                                <div class="widget-header position-relative mb-30">
                                    <h5 class="widget-title mt-5 mb-30">Suivez-nous</h5>
                                </div>
                                <div class="social-network">
                                    <div class="follow-us d-flex align-items-center">
                                        <a class="follow-us-facebook clearfix mr-5 mb-10"
                                            href="https://www.facebook.com/Louangeceleste?mibextid=b06tZ0" target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-facebook mr-5 v-align-space"></i>
                                                <i class="ti-facebook mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Facebook</span>
                                            <span class="social-count counter-number">12</span><span
                                                class="social-count">K</span>
                                        </a>
                                        <a class="follow-us-twitter clearfix ml-5 mb-10"
                                            href="https://twitter.com/HeavenlyPrais12" target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-twitter-alt mr-5 v-align-space"></i>
                                                <i class="ti-twitter-alt mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Twitter</span>
                                            <span class="social-count counter-number">46</span><span
                                                class="social-count"></span>
                                        </a>
                                    </div>
                                    <div class="follow-us d-flex align-items-center">
                                        <a class="follow-us-instagram clearfix mr-5"
                                            href="https://www.instagram.com/heavenlypraise2/?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"
                                            target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-instagram mr-5 v-align-space"></i>
                                                <i class="ti-instagram mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Instagram</span>
                                            <span class="social-count counter-number">73</span><span
                                                class="social-count"></span>
                                        </a>
                                        <a class="follow-us-youtube clearfix ml-5"
                                            href="https://www.youtube.com/@heavenlypraise-louangeceleste" target="_blank">
                                            <div class="social-icon">
                                                <i class="ti-youtube mr-5 v-align-space"></i>
                                                <i class="ti-youtube mr-5 v-align-space nth-2"></i>
                                            </div>
                                            <span class="social-name">Youtube</span>
                                            <span class="social-count counter-number">876</span><span
                                                class="social-count"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Tabs -->
                            <div class="sidebar-widget widget-taber mb-30">
                                <div class="widget-taber-content background-white pt-30 pb-30 pl-30 pr-30 border-radius-5">
                                    <nav class="tab-nav float-none mb-20">
                                        @php
                                            $i = 1;
                                        @endphp
                                        <div class="nav nav-tabs" role="tablist">
                                            @forelse ($topcats as $topcat)
                                                <a class="nav-item nav-link {{ $i == 1 ? 'active' : ' ' }}"
                                                    id="nav-popular-tab" data-toggle="tab"
                                                    href="#nav-{{ $i }}" role="tab"
                                                    aria-controls="nav-{{ $i }}"
                                                    aria-selected="true">{{ $topcat->libelle }}</a>
                                                @php
                                                    $i = $i + 1;
                                                @endphp
                                            @empty
                                            @endforelse
                                        </div>
                                    </nav>
                                    <div class="tab-content">
                                        @php
                                            $i = 1;
                                        @endphp
                                        @forelse ($topcats as $topcat)
                                            @php
                                                $actuscats = App\Models\Actualite::where('categorie_id', $topcat->id)
                                                    ->orderBy('id', 'Desc')
                                                    ->where('publie', 1)
                                                    ->get()
                                                    ->take(2);
                                                $eventscats = App\Models\Evenement::where('categorie_id', $topcat->id)
                                                    ->orderBy('id', 'Desc')
                                                    ->get()
                                                    ->take(2);
                                            @endphp
                                            <!-- Tab {{ $i }} -->
                                            <div class="tab-pane {{ $i == 1 ? 'active fade show' : ' ' }}"
                                                id="nav-{{ $i }}" role="tabpanel"
                                                aria-labelledby="nav-{{ $i }}-tab">
                                                <div class="post-block-list post-module-1">
                                                    <ul class="list-post">
                                                        @forelse($actuscats as $actuscat)
                                                            <li class="mb-30">
                                                                <div class="d-flex">
                                                                    <div
                                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                                        <a
                                                                            href='{{ route('detailsactualites', ['slug' => $actuscat->slug]) }}'>
                                                                            <img src="{{ asset('usx_files/actus/' . $actuscat->banniere) }}"
                                                                                alt="{{ $actuscat->titre }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content media-body">
                                                                        <div class="entry-meta meta-0 mb-10">
                                                                            <a href='#'><span
                                                                                    class="post-in background1 color-white font-small">Actualité</span></a>
                                                                        </div>
                                                                        <h6 class="post-title mb-10 text-limit-2-row">
                                                                            {{ $actuscat->titre }}</h6>
                                                                        <div
                                                                            class="entry-meta meta-1 font-x-small color-grey">
                                                                            <span
                                                                                class="post-on">{{ $actuscat->created_at->format('d M Y') }}</span>
                                                                            <span
                                                                                class="hit-count has-dot">{{ $actuscat->vues }}
                                                                                Vues</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                        @forelse($eventscats as $eventscat)
                                                            <li class="mb-30">
                                                                <div class="d-flex">
                                                                    <div
                                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                                        <a
                                                                            href='{{ route('detailsevenements', ['slug' => $eventscat->slug]) }}'>
                                                                            <img src="{{ asset('usx_files/events/' . $eventscat->banniere) }}"
                                                                                alt="{{ $eventscat->titre }}">
                                                                        </a>
                                                                    </div>
                                                                    <div class="post-content media-body">
                                                                        <div class="entry-meta meta-0 mb-10">
                                                                            <a href='#'><span
                                                                                    class="post-in background2 color-white font-small">Évènement</span></a>
                                                                        </div>
                                                                        <h6 class="post-title mb-10 text-limit-2-row">
                                                                            {{ $eventscat->titre }}</h6>
                                                                        <div
                                                                            class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                            <span
                                                                                class="post-on">{{ $eventscat->titre }}</span>
                                                                            <span
                                                                                class="hit-count has-dot">{{ $eventscat->vues }}
                                                                                Vues</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @empty
                                                        @endforelse
                                                    </ul>
                                                </div>
                                            </div>
                                            @php
                                                $i = $i + 1;
                                            @endphp
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                            <!-- Ads -->
                            @php
                                $ads2 = App\Models\Promotion::where('position', 'Page')->InRandomOrder()->first();
                            @endphp
                            @if (!empty($ads2))
                                <div class="sidebar-widget widget-ads mb-30 text-center">
                                    @if (!empty($ads2->lien))
                                        <a href="{{ $ads2->lien }}" target="_blank">
                                    @endif
                                    @if (!empty($ads2->actualite_id))
                                        @php
                                            $actu = App\Models\Actualite::find($ads2->actualite_id);
                                        @endphp
                                        <a href="{{ route('detailsactualites', ['slug' => $actu->slug]) }}"
                                            class="play-video" data-animate="zoomIn" data-duration="1.5s"
                                            data-delay="0.1s" title="{{ $actu->titre }}">
                                    @endif
                                    @if (!empty($ads2->evenement_id))
                                        @php
                                            $event = App\Models\Evenement::find($ads2->evenement_id);
                                        @endphp
                                        <a href="{{ route('detailsevenements', ['slug' => $event->slug]) }}"
                                            class="play-video" data-animate="zoomIn" data-duration="1.5s"
                                            data-delay="0.1s" title="{{ $event->titre }}">
                                    @endif
                                    <img class="d-inline-block"
                                        src="{{ asset('usx_files/promotions/' . $ads2->banniere) }}" alt="Promotion">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <section class="event-rental-section white-bg page-section-ptb">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>Location instrumentales</h5>
                                <p>Organisez vos événements avec des instruments de qualité dans un cadre exceptionnel avec
                                    notre service de location. Que
                                    ce soit pour des concerts, des conférences ou des événements privés, nous offrons des
                                    espaces adaptés à vos besoins. Notre équipe est là pour vous accompagner à chaque étape,
                                    de la planification à la réalisation.</p>
                                <ul class="list-style-1">
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Espaces modulables pour tous types
                                        d'événements.</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Équipements audiovisuels de pointe.
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Assistance technique sur place.
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Options de restauration
                                        disponibles.</li>
                                </ul>
                                <div class="event-rental-buttons">
                                    <a href='https://studio-kmusic.fr/services/4'class="btn btn-primary" target="_blank"
                                        rel="noopener noreferrer">Réserver
                                        maintenant</a>
                                    <a href='{{ route('kmusic') }}' class="btn btn-secondary">En savoir plus</a>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <img class="img-fluid center-block" src="http://127.0.0.1:8000/usx_files/actus/music.jpg"
                                    alt="Location d'Événements" style="width: 414px; height: 350px;">
                            </div>
                        </div>
                    </div>
                </section>

                <section class="service-center white-bg page-section-ptb">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <h5>Pourquoi choisir Studio K Music ?</h5>
                                <p>Chez Studio K Music, nous nous engageons à offrir une expérience musicale inégalée. Notre
                                    studio
                                    est équipé des technologies les plus avancées pour garantir une qualité sonore
                                    exceptionnelle.
                                    Notre équipe de professionnels passionnés vous accompagne à chaque étape de votre
                                    projet, de
                                    l'enregistrement à la post-production. Nous croyons que la collaboration et l'innovation
                                    sont
                                    essentielles pour créer des œuvres musicales qui se démarquent. Rejoignez-nous et
                                    découvrez
                                    comment nous pouvons donner vie à votre vision artistique.</p>
                                <ul class="list-style-1">
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Équipements professionnels dernier
                                        cri.
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Équipe expérimentée pour vous
                                        accompagner.
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Ambiance conviviale et inspirante.
                                    </li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i> Tarifs accessibles pour tous les
                                        budgets.
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6 mt-4 mt-lg-0">
                                <img class="img-fluid center-block"
                                    src="http://127.0.0.1:8000/usx_files/actus/16943620211.jpg" alt="Studio K Music"
                                    style="width: 414px; height: 300px;">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </main>
@endsection
