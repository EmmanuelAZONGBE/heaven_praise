@extends('layout.artiste', ['title' => 'Mes Activités'])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6"> Mes Activités </span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Activités
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Onglets -->
                @include('partials._flash-message')
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true">Mes Statistiques</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="link1-tab" data-bs-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="false">Mes Favories</a>
                    </li>
                </ul>

                <!-- Contenu des onglets -->
                <div class="tab-content" id="myTabContent">
                    <!-- Onglet Dashboard -->
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="active-tab">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Historique des Statistiques</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Chanson</th>
                                                <th>Artiste</th>
                                                <th>Nombre d'écoutes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/03/2025</td>
                                                <td>Chanson A</td>
                                                <td>Artiste 1</td>
                                                <td>500</td>
                                            </tr>
                                            <tr>
                                                <td>15/03/2025</td>
                                                <td>Chanson B</td>
                                                <td>Artiste 2</td>
                                                <td>320</td>
                                            </tr>
                                            <tr>
                                                <td>01/04/2025</td>
                                                <td>Chanson C</td>
                                                <td>Artiste 3</td>
                                                <td>700</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Onglet Mes Activités -->
                    <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="link1-tab">
                        @include('partials._flash-message')
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Mes Activités</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="border p-md-4 p-30">
                                            <div class="heading_s1 mb-3">
                                                {{-- <h6><i class="ti-ticket"></i> Tickets achetés <span
                                                        class="badge badge-success">{{ sizeof($tickets) }} au Total</h6>
                                                <hr> --}}
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Total Écoutes</th>
                                                            <th>Total Clicks</th>
                                                            <th>Total Aimes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ auth()->user()->albums ? auth()->user()->albums->sum('totalEcoutes') : 0 }}</td>
                                                            <td>{{ auth()->user()->albums ? auth()->user()->albums->sum('totalClicks') : 0 }}</td>
                                                            <td>
                                                                {{-- {{ auth()->user()->singles ? auth()->user()->singles->sum(fn($single) => optional($single->aimes)->count() ?? 0) : 0 }} --}}
                                                            </td>
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
            </div>
        </div>
    </div>
@endsection
