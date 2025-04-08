@extends('layout.app', ['title' => 'Que toute la gloire revienne à Dieu'])

@section('meta')
    <meta name="description"
        content="Découvrez les détails du Plan Basique et explorez ses avantages pour écouter vos chansons préférées à un tarif abordable.">
@endsection
@section('content')
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
    <main class="position-relative">
        <div class="archive-header text-center sidebar_right  mt-5 pt-30 pb-30">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('welcome') }}" rel="nofollow">Accueil</a>
                    <span aria-hidden="true"></span>
                    <a href="{{ route('plans') }}">Plans</a>
                    <span aria-hidden="true"></span> Détails du Plan
                </div>
                <h3 class="mt-3">Détails du Plan Standard</h3>
                <p class="lead">Explorez les avantages du Plan Basique et découvrez comment il peut répondre à vos besoins
                    musicaux.</p>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>
        <div class="container">
            <div class="plan-header">
                <h1>Plan Standard</h1>
                <p>Le Plan Standard vous offre une expérience musicale enrichie avec un accès illimité à des
                    millions de titres et une qualité audio supérieure. Parfait pour les amateurs de musique qui souhaitent
                    profiter
                    d'une écoute optimale sans compromis.</p>
            </div>
            <div class="plan-features">
                <h2>Ce que vous obtenez avec le Plan Standard :</h2>
                <ul>
                    <li><strong>Accès illimité aux chansons :</strong> Explorez une bibliothèque musicale complète sans
                        restrictions.</li>
                    <li><strong>Qualité audio améliorée :</strong> Profitez d'un son cristallin avec une qualité audio
                        optimisée.</li>
                    <li><strong>Sans publicité :</strong> Écoutez votre musique sans interruptions publicitaires.</li>
                    <li><strong>Téléchargements hors ligne :</strong> Téléchargez vos titres préférés et écoutez-les même
                        sans connexion Internet.</li>
                    <li><strong>Compatibilité multi-appareils :</strong> Accédez à votre musique sur tous vos appareils
                        (smartphone, tablette, ordinateur).</li>
                </ul>
            </div>

            <div class="why-choose">
                <h2>Pourquoi choisir le Plan Standard ?</h2>
                <p>
                    Le Plan Standard est idéal pour ceux qui souhaitent une expérience musicale complète et de haute
                    qualité. Avec un accès illimité à des millions de titres, une qualité audio améliorée et la possibilité
                    d'écouter hors ligne, ce plan répond à tous vos besoins musicaux.
                </p>
            </div>

            <div class="cta" style="text-align: center;">
                <a href="#" class="btn btn-primary">Souscrire au Plan Standard</a>
            </div>
        </div>
    </main>
@endsection
