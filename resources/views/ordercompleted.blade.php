@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')
    
@endsection

@section('beadcrumb')
@endsection
@section('content')
<main class="position-relative">
    <!--main content-->
    <div class="main_content shop shopping-cart pb-50">
        <div class="container">
            <div class="row justify-content-center mb-100 mt-50">
                <div class="col-md-6">
                    <div class="text-center order_complete">
                        <img src="{{asset('assets/imgs/theme/complete.png')}}" alt="" class="d-inline mb-30">
                        <h2 class="mb-30">Votre achat est finalisé !</h2>
                        <h5 class="mb-30 text-muted">N° de Commande: HP-{{$commande->reference}}{{$commande->session_id}}</h5>
                        <p class="mb-30">La livraison de vos tickets est en cours de traitement. Un e-mail de confirmation de commande vous a été envoyé ainsi que vos identifiants de connexion si vous êtes un nouvel utilisateur.</p>
                        <a class='btn btn-fill-out text-white' href='{{route('evenements')}}'><i class="ti-search mr-5"></i>Parcourir les évènements</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection