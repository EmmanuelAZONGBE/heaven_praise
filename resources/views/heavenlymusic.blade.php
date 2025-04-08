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
        <style>
            .feature-box {
                border: 1px solid #ddd;
                border-radius: 8px;
                padding: 20px;
                transition: transform 0.3s, box-shadow 0.3s;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                margin-bottom: 30px;
                /* Espace entre les cartes */
            }

            .feature-box:hover {
                transform: translateY(-10px);
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            }

            .icon i {
                font-size: 3rem;
                color: #007BFF;
                /* Couleur bleue */
            }

            .event-rental-buttons .btn {
                margin-right: 10px;
            }

            .list-style-1 {
                list-style-type: none;
                padding: 0;
            }

            .list-style-1 li {
                margin-bottom: 10px;
            }

            .list-style-1 i {
                margin-right: 5px;
                color: #007BFF;
            }

            .section-spacing {
                margin-bottom: 10px;
                /* Espace entre les sections */
            }
        </style>

        <section class="welcome-block objects-car why-choose page-section-ptb white-bg section-spacing">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <span>Nos Studios</span>
                            <h2>Enregistrez votre louange et adoration</h2>
                            <div class="separator"></div>
                            <p>Nos studios sont entièrement dédiés à la musique gospel et chrétienne. Que vous soyez un
                                artiste solo, une chorale ou un groupe, nous mettons à votre disposition des équipements
                                professionnels pour produire des morceaux inspirants qui glorifient le Seigneur.</p>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- Studios Section -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6">
                                <div class="feature-box text-center">
                                    <div class="icon">
                                        <i class="fas fa-video" aria-hidden="true"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Production Vidéo</h6>
                                        <p>Capturez vos moments de louange et réalisez des clips vidéos inspirants pour
                                            votre
                                            ministère.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="feature-box text-center">
                                    <div class="icon">
                                        <i class="fas fa-church" aria-hidden="true"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Evénements & Concerts</h6>
                                        <p>Organisez et participez à des concerts et événements dédiés à la louange et à
                                            l’adoration.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="feature-box text-center">
                                    <div class="icon">
                                        <i class="fas fa-microphone" aria-hidden="true"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Enregistrement Audio</h6>
                                        <p>Enregistrez vos chansons de louange avec une qualité professionnelle.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10">
                                    <h5>Location d'Instruments et d'Espaces</h5>
                                    <p>Organisez vos événements de louange et d'adoration avec des instruments de qualité
                                        dans un cadre
                                        inspirant grâce à notre service de location. Que ce soit pour des concerts de
                                        louange, des
                                        conférences spirituelles ou des événements privés, nous offrons des espaces adaptés
                                        à vos
                                        besoins. Notre équipe dévouée vous accompagne à chaque étape, de la planification à
                                        la
                                        réalisation, pour garantir que votre événement soit une réussite et glorifie le
                                        Seigneur.</p>
                                    <ul class="list-style-1">
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Espaces modulables pour tous
                                            types
                                            d'événements de louange.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Équipements audiovisuels de
                                            pointe pour une
                                            expérience immersive.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Assistance technique sur place
                                            pour un
                                            soutien constant.</li>
                                        <li><i class="fa fa-check" aria-hidden="true"></i> Options de restauration
                                            disponibles pour
                                            vos
                                            invités.</li>
                                    </ul>

                                    <div class="event-rental-buttons">
                                        <a href='#' class="btn btn-primary">Réserver maintenant</a>
                                        <a href='#' class="btn btn-secondary">En savoir plus</a>
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
            </div>
        </section>

        <section class="service-center white-bg page-section-ptb section-spacing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h5>Pourquoi choisir Heavenly Praise Studio ?</h5>
                        <p>Chez Heavenly Praise Studio, nous nous engageons à offrir une expérience musicale divine. Notre
                            studio est spécialement conçu pour capturer l'essence de la louange et de l'adoration. Équipé
                            des technologies les plus avancées, nous garantissons une qualité sonore qui élève les âmes.
                            Notre équipe de professionnels passionnés vous accompagne à chaque étape de votre projet, de
                            l'enregistrement à la post-production. Nous croyons que la collaboration et l'inspiration divine
                            sont essentielles pour créer des œuvres musicales qui touchent les cœurs. Rejoignez-nous et
                            découvrez comment nous pouvons donner vie à votre vision artistique et spirituelle.</p>
                        <ul class="list-style-1">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Équipements professionnels pour une qualité
                                sonore céleste.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Équipe dévouée et expérimentée pour vous
                                guider.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Ambiance inspirante et propice à la
                                création spirituelle.</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Tarifs adaptés pour répondre à tous les
                                besoins.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <img class="img-fluid center-block" src="http://127.0.0.1:8000/usx_files/actus/16943620211.jpg"
                            alt="Studio K Music">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
