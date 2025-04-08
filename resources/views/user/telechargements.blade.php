@extends('layout.artiste', ['title' => 'Mes Téléchargements'])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6"> Mes Téléchargements </span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{ route('welcome') }}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Mes Téléchargements
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
                    <h5 class="mb-0">Vous avez <strong>5</strong> <br>
                        <small> <span class="badge badge-success">téléchargements
                                effectués sur un total de 10 autorisés sur le plan Premium.</span></small></h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 order_review">

                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Date et l'heure de Téléchargements</th>
                                            <th>Chanson</th>
                                            <th>Artiste</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($telechargements as $telechargement)
                                        <tr>
                                            <td>{{ $telechargement->created_at }}</td>
                                            <td>{{ $telechargement->single->titre }}</td>
                                            <td>{{ $telechargement->user->nomartiste }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Fermeture de la tab-pane -->
    </div> <!-- Fermeture de la tab-content -->
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
