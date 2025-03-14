@extends('layout.artiste', ['title' => 'Mes Plans'])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6"> Forfaits et abonnements </span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Plans
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="tab-content dashboard-content">
        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            @include('partials._flash-message')
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Mes Abonnements</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="border p-md-4 p-30">
                                <div class="heading_s1 mb-3">
                                    <h6><i class="ti-ticket"></i> Forfaits achetés <span class="badge badge-success"> au
                                            Total</h6>
                                    <hr>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nom du Plan</th>
                                                <th>Prix</th>
                                                <th>Date de Souscription</th>
                                                <th>Statut</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Plan Basic</td>
                                                <td>10€/mois</td>
                                                <td>01/03/2025</td>
                                                <td><span class="badge badge-success">Actif</span></td>
                                            </tr>
                                            <tr>
                                                <td>Plan Standard</td>
                                                <td>20€/mois</td>
                                                <td>15/02/2025</td>
                                                <td><span class="badge badge-warning">Expiré</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah1').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function uploadavatar() {
            $('#cover').trigger('click');
        }

        $("#cover").change(function() {
            readURL(this);
        });
    </script>
@endsection
