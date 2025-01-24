@extends('layout.artiste',['title'=>"Mon compte"])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Mon Compte</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{route('user.dashboard')}}'>Tableau de bord</a><span></span> Profil
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="tab-content dashboard-content">
    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Tableau de bord</h5>
            </div>
            <div class="card-body">
                <p>Depuis le tableau de bord de votre compte, vous pouvez facilement publier vos <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">singles</a>, manager vos <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">Albums</a> et <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">modifier votre mot de passe et les détails de votre compte.</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
