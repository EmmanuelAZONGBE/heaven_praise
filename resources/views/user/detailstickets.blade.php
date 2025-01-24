@extends('layout.artiste',['title'=>"Mes Tickets"])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Détails Commande</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{route('user.dashboard')}}'>Tableau de bord</a><span></span> Mes Tickets
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
                <h5 class="mb-0">Ticket(s) achetés pour l'évènement <strong>{{$event->titre}}</strong> <small> <span class="badge badge-success">HP-{{$commandes->first()->reference}}{{$commandes->first()->session_id}}</span></small></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 order_review">

                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Ticket
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @forelse ($commandes as $commande)
                                        <tr>
                                            <td>
                                                <i class="ti-check-box font-small text-muted mr-10"></i>
                                                <a href='{{route('detailsevenements',['slug'=>$commande->Evenement->slug])}}'><strong>Ticket {{$commande->Ticketevenement->libelle}}</strong> - {{number_format(round($commande->Ticketevenement->prix,2), 0, ',', ' ')}}</a>
                                                <span class="product-qty">x {{$commande->qte}}</span>
                                            </td>
                                            <td>
                                                {{number_format(round($commande->montant,2), 0, ',', ' ')}} FCFA
                                            </td>
                                        </tr>
                                        @php
                                            $total=$total+$commande->montant;
                                        @endphp
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Total
                                        </th>
                                        <td class="product-subtotal">
                                            <strong>{{number_format(round($total,2), 0, ',', ' ')}} F CFA</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
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
