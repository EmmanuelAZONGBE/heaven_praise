@extends('layout.artiste',['title'=>"Mes Tickets"])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Tickets Commandés</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Tickets
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
                <h5 class="mb-0">Mes Commandes</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">

                        <div class="border p-md-4 p-30">
                            <div class="heading_s1 mb-3">
                                <h6><i class="ti-ticket"></i>  Tickets achetés <span class="badge badge-success">{{sizeof($tickets)}} au Total</h6><hr>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Date</th>
                                            <th>Réf</th>
                                            <th>Évènement</th>
                                            <th>Statut</th>
                                            <th>Total</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @forelse ($tickets as $reference=>$ticket)
                                            @php
                                                $firstcommande=App\Models\Commande::where('reference',$reference)->first();
                                                $event=App\Models\Evenement::find($firstcommande->evenement_id);
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="main__table-text main__table-text--number"><a href="#!" class="">{{$i}}</a></div>
                                                </td>
                                                <td>
                                                    {{$firstcommande->created_at->format('d-m-Y')}}
                                                </td>
                                                <td>
                                                    <small class="badge badge-default"><strong><a href="{{route('user.detailstickets',['sessionid'=>$firstcommande->session_id])}}">HP-{{$reference}}{{$firstcommande->session_id}}</a></strong></small>
                                                </td>
                                                <td>
                                                    {{$event->titre}}
                                                </td>
                                                <td>
                                                    @if ($event->livre ==1)
                                                        <span class="badge badge-success"><span class="ti-check"></span> Livré</span>
                                                    @else
                                                        <span class="badge badge-warning"><span class="ti-clock"></span>Livraison en cours</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <small><strong>{{number_format(round($commandes->sum('montant'),2), 0, ',', ' ')}} FCFA</strong> <br>Pour {{$commandes->sum('qte')}} Ticket(s)</small>
                                                </td>
                                                <td><a href="{{route('user.detailstickets',['sessionid'=>$firstcommande->session_id])}}" class="btn btn-fill-out btn-small d-block">Voir</a></td>

                                            </tr>
                                            @php
                                                $i=$i+1;
                                            @endphp
                                        @empty

                                        @endforelse
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

				reader.onload = function (e) {
					$('#blah1').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		function uploadavatar(){
			$('#cover').trigger('click');
		}

		$("#cover").change(function(){
			readURL(this);
		});
	</script>
@endsection
