@extends('layout.app', ['title' => "Plans d'abonnement - Écoute de chansons"])

@section('meta')
<meta name="description" content="Choisissez un plan d'abonnement pour écouter vos chansons préférées sans interruption.">
@endsection

@section('content')
<main class="position-relative">
    <div class="archive-header text-center bg-grey mt-5 pt-30 pb-30">
        <div class="container">
            <div class="breadcrumb">
                <a href='{{ route('welcome') }}' rel='nofollow'>Accueil</a>
                <span></span>
                <a href='{{ route('plans') }}'>Plans</a>
                <span></span> Abonnements
            </div>
            <h2 class="mt-3">Choisissez votre abonnement</h2>
            <p class="lead">Profitez de votre musique préférée sans interruption.</p>
            <div class="bt-1 border-color-1 mt-30 mb-50"></div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
           <div class="col-md-4">
                <div class="card text-center shadow-lg p-4 mb-4">
                    <h3 class="text-primary">Plan Basique</h3>
                    <p class="price h4 font-weight-bold text-dark">1000 FCFA / mois</p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><i class="fa fa-check text-success"></i> Accès limité aux chansons</li>
                        <li><i class="fa fa-check text-success"></i> Publicités incluses</li>
                    </ul>

                    <a href="{{ route('details_basique') }}"  class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-lg p-4 mb-4">
                    <h3 class="text-primary">Plan Standard</h3>
                    <p class="price h4 font-weight-bold text-dark">3000 FCFA / mois</p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><i class="fa fa-check text-success"></i> Accès illimité aux chansons</li>
                        <li><i class="fa fa-check text-success"></i> Qualité audio améliorée</li>
                    </ul>
                    <a href="{{ route('details_standard') }}" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-lg p-4 mb-4">
                    <h3 class="text-primary">Plan Premium</h3>
                    <p class="price h4 font-weight-bold text-dark">5000 FCFA / mois</p>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li><i class="fa fa-check text-success"></i> Accès illimité et hors ligne</li>
                        <li><i class="fa fa-check text-success"></i> Aucune publicité</li>
                        <li><i class="fa fa-check text-success"></i> Qualité HD</li>
                    </ul>
                    <a href="{{ route('details_premiun') }}" class="btn btn-primary">Voir plus</a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
