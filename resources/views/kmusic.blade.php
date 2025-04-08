@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
@endsection

@section('breadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Nos Services</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{ route('studios') }}'>Nos Services</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <style>
        :root {
            --bs-card-color: #212529;
            /* Couleur du texte dans le card */
            --bs-card-spacer-y: 1.5rem;
            /* Espacement vertical dans le card */
            --bs-card-spacer-x: 1.5rem;
            /* Espacement horizontal dans le card */
        }

        .card {
            border: 1px solid #ddd;
            /* Ajoute une bordure légère */
            border-radius: 8px;
            /* Arrondit les coins de la carte */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Ajoute une ombre pour un effet de profondeur */
            margin-bottom: 2rem;
            /* Ajoute de l'espace en dessous de chaque carte */
            overflow: hidden;
            /* Cache tout contenu dépassant */
        }

        .card-body {
            color: var(--bs-card-color);
            flex: 1 1 auto;
            padding: var(--bs-card-spacer-y) var(--bs-card-spacer-x);
        }

        .image-gallery-icon {
            color: #fff;
            transition: all .3s ease-out;
            appearance: none;
            background-color: transparent;
            border: 0;
            cursor: pointer;
            outline: none;
            position: absolute;
            z-index: 4;
            filter: drop-shadow(0 2px 2px #1a1a1a)
        }

        @media(hover: hover)and (pointer: fine) {
            .image-gallery-icon:hover {
                color: #337ab7
            }

            .image-gallery-icon:hover .image-gallery-svg {
                transform: scale(1.1)
            }
        }

        .image-gallery-icon:focus {
            outline: 2px solid #337ab7
        }

        .image-gallery-using-mouse .image-gallery-icon:focus {
            outline: none
        }

        .image-gallery-fullscreen-button,
        .image-gallery-play-button {
            bottom: 0;
            padding: 20px
        }

        .image-gallery-fullscreen-button .image-gallery-svg,
        .image-gallery-play-button .image-gallery-svg {
            height: 28px;
            width: 28px
        }

        @media(max-width: 768px) {

            .image-gallery-fullscreen-button,
            .image-gallery-play-button {
                padding: 15px
            }

            .image-gallery-fullscreen-button .image-gallery-svg,
            .image-gallery-play-button .image-gallery-svg {
                height: 24px;
                width: 24px
            }
        }

        @media(max-width: 480px) {

            .image-gallery-fullscreen-button,
            .image-gallery-play-button {
                padding: 10px
            }

            .image-gallery-fullscreen-button .image-gallery-svg,
            .image-gallery-play-button .image-gallery-svg {
                height: 16px;
                width: 16px
            }
        }

        .image-gallery-fullscreen-button {
            right: 0
        }

        .image-gallery-play-button {
            left: 0
        }

        .image-gallery-left-nav,
        .image-gallery-right-nav {
            padding: 50px 10px;
            top: 50%;
            transform: translateY(-50%)
        }

        .image-gallery-left-nav .image-gallery-svg,
        .image-gallery-right-nav .image-gallery-svg {
            height: 120px;
            width: 60px
        }

        @media(max-width: 768px) {

            .image-gallery-left-nav .image-gallery-svg,
            .image-gallery-right-nav .image-gallery-svg {
                height: 72px;
                width: 36px
            }
        }

        @media(max-width: 480px) {

            .image-gallery-left-nav .image-gallery-svg,
            .image-gallery-right-nav .image-gallery-svg {
                height: 48px;
                width: 24px
            }
        }

        .image-gallery-left-nav[disabled],
        .image-gallery-right-nav[disabled] {
            cursor: disabled;
            opacity: .6;
            pointer-events: none
        }

        .image-gallery-left-nav {
            left: 0
        }

        .image-gallery-right-nav {
            right: 0
        }

        .image-gallery {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            position: relative
        }

        .image-gallery.fullscreen-modal {
            background: #000;
            bottom: 0;
            height: 100%;
            left: 0;
            position: fixed;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 5
        }

        .image-gallery.fullscreen-modal .image-gallery-content {
            top: 50%;
            transform: translateY(-50%)
        }

        .image-gallery-content {
            position: relative;
            line-height: 0;
            top: 0
        }

        .image-gallery-content.fullscreen {
            background: #000
        }

        .image-gallery-content .image-gallery-slide .image-gallery-image {
            max-height: calc(200vh - 80px)
        }

        .image-gallery-content.image-gallery-thumbnails-left .image-gallery-slide .image-gallery-image,
        .image-gallery-content.image-gallery-thumbnails-right .image-gallery-slide .image-gallery-image {
            max-height: 100vh
        }

        .image-gallery-slide-wrapper {
            position: relative
        }

        .image-gallery-slide-wrapper.image-gallery-thumbnails-left,
        .image-gallery-slide-wrapper.image-gallery-thumbnails-right {
            display: inline-block;
            width: calc(100% - 110px)
        }

        @media(max-width: 768px) {

            .image-gallery-slide-wrapper.image-gallery-thumbnails-left,
            .image-gallery-slide-wrapper.image-gallery-thumbnails-right {
                width: calc(100% - 87px)
            }
        }

        .image-gallery-slide-wrapper.image-gallery-rtl {
            direction: rtl
        }

        .image-gallery-slides {
            line-height: 0;
            overflow: hidden;
            position: relative;
            white-space: nowrap;
            text-align: center
        }

        .image-gallery-slide {
            left: 0;
            position: absolute;
            top: 0;
            width: 100%
        }

        .image-gallery-slide.image-gallery-center {
            position: relative
        }

        .image-gallery-slide .image-gallery-image {
            /* width: 100%; */
            object-fit: contain
        }

        .image-gallery-slide .image-gallery-description {
            background: rgba(0, 0, 0, .4);
            bottom: 70px;
            color: #fff;
            left: 0;
            line-height: 1;
            padding: 10px 20px;
            position: absolute;
            white-space: normal
        }

        @media(max-width: 768px) {
            .image-gallery-slide .image-gallery-description {
                bottom: 45px;
                font-size: .8em;
                padding: 8px 15px
            }
        }

        .image-gallery-bullets {
            bottom: 20px;
            left: 0;
            margin: 0 auto;
            position: absolute;
            right: 0;
            width: 80%;
            z-index: 4
        }

        .image-gallery-bullets .image-gallery-bullets-container {
            margin: 0;
            padding: 0;
            text-align: center
        }

        .image-gallery-bullets .image-gallery-bullet {
            appearance: none;
            background-color: transparent;
            border: 1px solid #fff;
            border-radius: 50%;
            box-shadow: 0 2px 2px #1a1a1a;
            cursor: pointer;
            display: inline-block;
            margin: 0 5px;
            outline: none;
            padding: 5px;
            transition: all .2s ease-out
        }

        @media(max-width: 768px) {
            .image-gallery-bullets .image-gallery-bullet {
                margin: 0 3px;
                padding: 3px
            }
        }

        @media(max-width: 480px) {
            .image-gallery-bullets .image-gallery-bullet {
                padding: 2.7px
            }
        }

        .image-gallery-bullets .image-gallery-bullet:focus {
            transform: scale(1.2);
            background: #337ab7;
            border: 1px solid #337ab7
        }

        .image-gallery-bullets .image-gallery-bullet.active {
            transform: scale(1.2);
            border: 1px solid #fff;
            background: #fff
        }

        @media(hover: hover)and (pointer: fine) {
            .image-gallery-bullets .image-gallery-bullet:hover {
                background: #337ab7;
                border: 1px solid #337ab7
            }

            .image-gallery-bullets .image-gallery-bullet.active:hover {
                background: #337ab7
            }
        }

        .image-gallery-thumbnails-wrapper {
            position: relative
        }

        .image-gallery-thumbnails-wrapper.thumbnails-swipe-horizontal {
            touch-action: pan-y
        }

        .image-gallery-thumbnails-wrapper.thumbnails-swipe-vertical {
            touch-action: pan-x
        }

        .image-gallery-thumbnails-wrapper.thumbnails-wrapper-rtl {
            direction: rtl
        }

        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left,
        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right {
            display: inline-block;
            vertical-align: top;
            width: 100px
        }

        @media(max-width: 768px) {

            .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left,
            .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right {
                width: 81px
            }
        }

        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left .image-gallery-thumbnails,
        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right .image-gallery-thumbnails {
            height: 100%;
            width: 100%;
            left: 0;
            padding: 0;
            position: absolute;
            top: 0
        }

        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left .image-gallery-thumbnails .image-gallery-thumbnail,
        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right .image-gallery-thumbnails .image-gallery-thumbnail {
            display: block;
            margin-right: 0;
            padding: 0
        }

        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left .image-gallery-thumbnails .image-gallery-thumbnail+.image-gallery-thumbnail,
        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right .image-gallery-thumbnails .image-gallery-thumbnail+.image-gallery-thumbnail {
            margin-left: 0;
            margin-top: 2px
        }

        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left,
        .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right {
            margin: 0 5px
        }

        @media(max-width: 768px) {

            .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-left,
            .image-gallery-thumbnails-wrapper.image-gallery-thumbnails-right {
                margin: 0 3px
            }
        }

        .image-gallery-thumbnails {
            overflow: hidden;
            padding: 5px 0
        }

        @media(max-width: 768px) {
            .image-gallery-thumbnails {
                padding: 3px 0
            }
        }

        .image-gallery-thumbnails .image-gallery-thumbnails-container {
            cursor: pointer;
            text-align: center;
            white-space: nowrap
        }

        .image-gallery-thumbnail {
            display: inline-block;
            border: 4px solid transparent;
            transition: border .3s ease-out;
            width: 100px;
            background: transparent;
            padding: 0
        }

        @media(max-width: 768px) {
            .image-gallery-thumbnail {
                border: 3px solid transparent;
                width: 81px
            }
        }

        .image-gallery-thumbnail+.image-gallery-thumbnail {
            margin-left: 2px
        }

        .image-gallery-thumbnail .image-gallery-thumbnail-inner {
            display: block;
            position: relative
        }

        .image-gallery-thumbnail .image-gallery-thumbnail-image {
            vertical-align: middle;
            width: 100%;
            line-height: 0
        }

        .image-gallery-thumbnail.active,
        .image-gallery-thumbnail:focus {
            outline: none;
            border: 4px solid #337ab7
        }

        @media(max-width: 768px) {

            .image-gallery-thumbnail.active,
            .image-gallery-thumbnail:focus {
                border: 3px solid #337ab7
            }
        }

        @media(hover: hover)and (pointer: fine) {
            .image-gallery-thumbnail:hover {
                outline: none;
                border: 4px solid #337ab7
            }
        }

        @media(hover: hover)and (pointer: fine)and (max-width: 768px) {
            .image-gallery-thumbnail:hover {
                border: 3px solid #337ab7
            }
        }

        .image-gallery-thumbnail-label {
            box-sizing: border-box;
            color: #fff;
            font-size: 1em;
            left: 0;
            line-height: 1em;
            padding: 5%;
            position: absolute;
            top: 50%;
            text-shadow: 0 2px 2px #1a1a1a;
            transform: translateY(-50%);
            white-space: normal;
            width: 100%
        }

        @media(max-width: 768px) {
            .image-gallery-thumbnail-label {
                font-size: .8em;
                line-height: .8em
            }
        }

        .image-gallery-index {
            background: rgba(0, 0, 0, .4);
            color: #fff;
            line-height: 1;
            padding: 10px 20px;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 4
        }

        @media(max-width: 768px) {
            .image-gallery-index {
                font-size: .8em;
                padding: 5px 10px
            }
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title">
                    <h3 class="mb-4"><span class="title-repositioning">Studio de répétition</span></h3>
                </div>
            </div>
        </div>
        <div id="aosAnimation" class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-content-between row">
                            <div class="col">
                                <h5 class="mb-3 d-flex gap-2 align-items-start card-title">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-image me-">
                                        <g>
                                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2">
                                            </rect>
                                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                            <polyline points="21 15 16 10 5 21"></polyline>
                                        </g>
                                    </svg>
                                    Images
                                </h5>
                            </div>
                            <div class="d-flex justify-content-end col">
                                <a class="me-2" rel="noopener noreferrer"
                                    href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fstudio-kmusic.fr%2Fservices%2F4"
                                    target="_blank">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-facebook text-info">
                                        <g>
                                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                                <a class="me-2" rel="noopener noreferrer"
                                    href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fstudio-kmusic.fr%2Fservices%2F4"
                                    target="_blank">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-twitter text-blue">
                                        <g>
                                            <path
                                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                            </path>
                                        </g>
                                    </svg>
                                </a>
                                <a class="me-2" rel="noopener noreferrer"
                                    href="https://mail.google.com/mail/?view=cm&fs=1&to=&su=Partage%20de%20lien&body=https%3A%2F%2Fstudio-kmusic.fr%2Fservices%2F4&bcc="
                                    target="_blank">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-mail text-primary">
                                        <g>
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="row">
                                <div class="image-gallery image-gallery-using-mouse" aria-live="polite">
                                    <div class="image-gallery-content image-gallery-thumbnails-bottom">
                                        <div class="image-gallery-slide-wrapper image-gallery-thumbnails-bottom">
                                            <div class="image-gallery-slides">
                                                <div aria-label="Go to Slide 1" tabindex="-1"
                                                    class="image-gallery-slide image-gallery-center" role="button"
                                                    style="display: inherit; transform: translate3d(0%, 0px, 0px); transition: none;">
                                                    <img class="image-gallery-image"
                                                        src="https://api.studio-kmusic.fr/uploads/services_pictures/CkFYBqpfq3JWNgKVXtDHjGkXc.webp">
                                                </div>
                                            </div>
                                            <button type="button" class="image-gallery-icon image-gallery-play-button"
                                                aria-label="Play or Pause Slideshow">
                                                <svg class="image-gallery-svg" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                                </svg>
                                            </button>
                                            <button type="button"
                                                class="image-gallery-icon image-gallery-fullscreen-button"
                                                aria-label="Open Fullscreen">
                                                <svg class="image-gallery-svg" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div
                                            class="image-gallery-thumbnails-wrapper image-gallery-thumbnails-bottom thumbnails-swipe-horizontal">
                                            <div class="image-gallery-thumbnails">
                                                <nav class="image-gallery-thumbnails-container"
                                                    aria-label="Thumbnail Navigation"
                                                    style="transform: translate3d(0px, 0px, 0px); transition: 450ms ease-out;">
                                                    <button type="button" tabindex="0" aria-pressed="true"
                                                        aria-label="Go to Slide 1" class="image-gallery-thumbnail active">
                                                        <span class="image-gallery-thumbnail-inner">
                                                            <img class="image-gallery-thumbnail-image"
                                                                src="https://api.studio-kmusic.fr/uploads/services_pictures/CkFYBqpfq3JWNgKVXtDHjGkXc.webp">
                                                        </span>
                                                    </button>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="counterUp" class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="py-3">
                            <div class="text-center row">
                                <div class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Coût (par heure)</p>
                                    <div class="display-4 fw-light"><span>30€</span></div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Tarif enfant</p>
                                    <div class="display-4 fw-light"><span>0€</span></div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Tarif adulte</p>
                                    <div class="display-4 fw-light"><span>0€</span></div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Transportable</p>
                                    <div class="display-4 fw-light">Non</div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Coût pour transport</p>
                                    <div class="display-4 fw-light"><span>0€</span></div>
                                </div>
                                <div class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Nombre total de places</p>
                                    <div class="display-4 fw-light"><span>30</span></div>
                                </div>
                                <div class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Surface</p>
                                    <div class="display-4 fw-light"><span>25m2</span></div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Nombre total de places</p>
                                    <div class="display-4 fw-light"><span>0</span></div>
                                </div>
                                <div hidden="" class="mb-4 mb-sm-0 col-xl-3 col-md-6">
                                    <p class="mb-2 mb-0 fw-semibold">Total de places disponibles</p>
                                    <div class="display-4 fw-light"><span>0</span></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="mb-3 d-flex gap-2 align-items-center card-title">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-file-text me-1">
                                <g>
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                    <polyline points="10 9 9 9 8 9"></polyline>
                                </g>
                            </svg>
                            Description
                        </h5>
                        <p class="sub-header mt-3">
                            Découvrez notre studio de répétition exceptionnel, l'endroit idéal pour donner vie à votre
                            musique et libérer votre créativité. Niché dans un cadre inspirant, notre studio offre une
                            expérience inégalée pour les musiciens de tous niveaux. Équipé de matériel de pointe, d'une
                            acoustique de qualité supérieure et d'un personnel amical et compétent, notre studio vous
                            permettra de peaufiner vos talents musicaux dans un environnement confortable et professionnel.
                            Réservez dès maintenant pour vivre une expérience musicale exceptionnelle et transformer vos
                            idées en mélodies mémorables. Qu'attendez-vous ? Faites de la musique et créez des souvenirs
                            inoubliables dans notre studio de répétition unique en son genre.
                        </p>
                        <hr>
                        <h5 class="mb-3 d-flex gap-2 align-items-center card-title">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-phone me-1">
                                <g>
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                    </path>
                                </g>
                            </svg>
                            <b>Contact</b>
                        </h5>
                        <p class="sub-header">Nous sommes joignables au : <b><a href="tel:+33611260275" target="_blank"
                                    rel="noreferrer">+33 6 11 26 02 75</a></b></p>
                        <div class="event-rental-buttons" style="justify-content: center; display: flex;">
                            <a href='https://studio-kmusic.fr/services/4'class="btn btn-primary">Réserver
                                maintenant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
