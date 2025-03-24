@extends('layout.app', ['title' => 'Détails du Plan - Écoute de chansons'])

@section('meta')
    <meta name="description"
        content="Découvrez les détails du Plan Basique et explorez ses avantages pour écouter vos chansons préférées à un tarif abordable.">
@endsection
@section('content')
    <main class="position-relative">
        <style>
            .plan-header {
                text-align: center;
                margin-bottom: 30px;
            }

            .plan-header h1 {
                font-size: 2.5rem;
                color: #333;
                margin-bottom: 10px;
            }

            .plan-header .price {
                font-size: 1.8rem;
                color: #1DB954;
                /* Vert Spotify */
                font-weight: bold;
            }

            .plan-header .price span {
                font-size: 1rem;
                color: #777;
            }

            .plan-description {
                text-align: center;
                margin-bottom: 30px;
                font-size: 1.1rem;
                color: #555;
            }

            .plan-features {
                margin-bottom: 30px;
            }

            .plan-features h2 {
                font-size: 1.8rem;
                color: #333;
                margin-bottom: 15px;
            }

            .plan-features ul {
                list-style-type: none;
                padding: 0;
            }

            .plan-features ul li {
                font-size: 1rem;
                color: #555;
                margin-bottom: 10px;
                padding-left: 20px;
                position: relative;
            }

            .plan-features ul li::before {
                content: "✓";
                color: #1DB954;
                /* Vert Spotify */
                font-weight: bold;
                position: absolute;
                left: 0;
            }

            .why-choose {
                margin-bottom: 30px;
            }

            .why-choose h2 {
                font-size: 1.8rem;
                color: #333;
                margin-bottom: 15px;
            }

            .why-choose p {
                font-size: 1rem;
                color: #555;
                line-height: 1.6;
            }
        </style>
        <div class="archive-header text-center sidebar_right  mt-5 pt-30 pb-30">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('welcome') }}" rel="nofollow">Accueil</a>
                    <span aria-hidden="true"></span>
                    <a href="{{ route('plans') }}">Plans</a>
                    <span aria-hidden="true"></span> Détails du Plan
                </div>
                <h3 class="mt-3">Détails du Plan Premium</h3>
                <p class="lead">Explorez les avantages du Plan Basique et découvrez comment il peut répondre à vos besoins
                    musicaux.</p>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="container">
            <div class="plan-header">
                <h1>Plan Premium</h1>
            </div>

            <div class="plan-description">
                <p>
                    Le Plan Premium est la solution ultime pour les passionnés de musique. Profitez d'un accès illimité à
                    des millions de titres, d'une qualité audio exceptionnelle et d'une expérience sans publicité. Parfait
                    pour ceux qui veulent le meilleur de la musique, où qu'ils soient.
                </p>
            </div>

            <div class="plan-features">
                <h2>Ce que vous obtenez avec le Plan Premium :</h2>
                <ul>
                    <li><strong>Accès illimité et hors ligne :</strong> Téléchargez vos titres préférés et écoutez-les sans
                        connexion Internet.</li>
                    <li><strong>Aucune publicité :</strong> Profitez de votre musique sans interruptions publicitaires.</li>
                    <li><strong>Qualité HD :</strong> Découvrez une qualité audio supérieure pour une expérience immersive.
                    </li>
                    <li><strong>Contrôle total :</strong> Choisissez l'ordre des titres, créez des playlists personnalisées
                        et organisez votre file d'attente.</li>
                    <li><strong>Écoute en temps réel à plusieurs :</strong> Partagez votre musique avec des amis ou votre
                        famille en synchronisation parfaite.</li>
                    <li><strong>Compatibilité multi-appareils :</strong> Accédez à votre musique sur tous vos appareils
                        (smartphone, tablette, ordinateur).</li>
                </ul>
            </div>

            <div class="why-choose">
                <h2>Pourquoi choisir le Plan Premium ?</h2>
                <p>
                    Le Plan Premium est conçu pour les amateurs de musique exigeants. Avec un accès illimité, une qualité
                    audio HD et la possibilité d'écouter hors ligne, ce plan vous offre une expérience musicale inégalée. De
                    plus, sans publicité, vous profitez de votre musique sans aucune interruption.
                </p>
            </div>

            <div class="cta" style="text-align: center;">
                <a href="#" class="btn btn-primary">Souscrire au Plan Premium</a>
            </div>
        </div>
    </main>
@endsection
