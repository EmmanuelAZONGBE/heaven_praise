@extends('layout.app', ['title' => 'Détails du Plan - Écoute de chansons'])

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

        .advantages-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .advantages-table th,
        .advantages-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .advantages-table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .advantages-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .advantages-table tr:hover {
            background-color: #f1f1f1;
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
                <h3 class="mt-3">Détails du Plan Basique</h3>
                <p class="lead">Explorez les avantages du Plan Basique et découvrez comment il peut répondre à vos besoins
                    musicaux.</p>
                <div class="bt-1 border-color-1 mt-30 mb-50"></div>
            </div>
        </div>


        <!--main content-->
        <div class="container">
            <div class="plan-header">
                <h1>Plan Basique</h1>
            </div>

            <div class="plan-description">
                <p>
                    Le Plan Basique est une solution économique pour profiter de votre musique préférée. Bien qu'il offre un
                    accès limité aux chansons et inclut des publicités, il reste une excellente option pour découvrir notre
                    plateforme à petit prix.
                </p>
            </div>

            <div class="plan-features">
                <h2>Ce que vous obtenez avec le Plan Basique :</h2>
                <ul>
                    <li><strong>Accès limité aux chansons :</strong> Profitez d'une sélection variée de titres, avec
                        certaines restrictions.</li>
                    <li><strong>Publicités incluses :</strong> Écoutez de la musique entrecoupée de publicités pour
                        maintenir un tarif abordable.</li>
                    <li><strong>Compatibilité multi-appareils :</strong> Accédez à votre musique sur tous vos appareils
                        (smartphone, tablette, ordinateur).</li>
                    <li><strong>Découverte musicale :</strong> Explorez de nouveaux artistes et genres grâce à des
                        recommandations personnalisées.</li>
                </ul>
            </div>

            <div class="why-choose">
                <h2>Pourquoi choisir le Plan Basique ?</h2>
                <p>
                    Le Plan Basique est idéal pour ceux qui souhaitent découvrir notre plateforme sans engager de frais
                    importants. Bien qu'il inclut des publicités et un accès limité, il vous permet de profiter d'une
                    expérience musicale de base à un tarif très accessible.
                </p>
            </div>

            <div class="cta" style="text-align: center;">
                <a href="#" class="btn btn-primary">Souscrire au Plan Basique</a>
            </div>
            <br>
            <div class="container">
                <h2 style="display:flex; justify-content: center;">Vivez la différence</h2>
                <p style="display:flex; justify-content: center;">Passez à Premium et bénéficiez d'un contrôle total sur
                    votre musique. Annulez à tout moment.</p>
                <table class="advantages-table">
                    <thead>
                        <tr>
                            <th>Fonctionnalités</th>
                            <th> Sans Abonnement</th>
                            <th> Premium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Musique sans publicité</strong></td>
                            <td>❌</td>
                            <td>✅</td>
                        </tr>
                        <tr>
                            <td><strong>Téléchargement des titres</strong></td>
                            <td>❌</td>
                            <td>✅ </td>
                        </tr>
                        <tr>
                            <td><strong>Choix de l'ordre des titres</strong></td>
                            <td>❌</td>
                            <td>✅</td>
                        </tr>
                        <tr>
                            <td><strong>Qualité audio exceptionnelle</strong></td>
                            <td>❌</td>
                            <td>✅</td>
                        </tr>
                        <tr>
                            <td><strong>Écoute en temps réel à plusieurs</strong></td>
                            <td>❌</td>
                            <td>✅ </td>
                        </tr>
                        <tr>
                            <td><strong>Gestion de la file d'attente</strong></td>
                            <td>❌</td>
                            <td>✅</td>
                        </tr>
                    </tbody>
                </table>

                <h3 style="display:flex; justify-content: center;">Pourquoi Choisir Premium ?</h3>
                <ul>
                    <li><strong>Liberté totale :</strong> Profitez de votre musique sans publicité et avec un contrôle
                        complet.</li>
                    <li><strong>Écoute hors ligne :</strong> Téléchargez vos titres préférés et écoutez-les même sans
                        connexion Internet.</li>
                    <li><strong>Qualité supérieure :</strong> Découvrez une expérience audio immersive avec un son haute
                        définition.</li>
                    <li><strong>Partage en temps réel :</strong> Écoutez en synchronisation avec vos amis ou votre
                        famille,
                        où que vous soyez.</li>
                </ul>
                <br>
                <div class="cta" style="text-align: center;">
                    <a href="{{ route('detailspremiun') }}" class="btn btn-primary">Découvrir Premium</a>
                </div>
                <br>
            </div>
        </div>
        </div>
    </main>
@endsection
