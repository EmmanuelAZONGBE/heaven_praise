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
                                            <th>Date de Téléchargement</th>
                                            <th>Chanson</th>
                                            <th>Artiste</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>12/03/2025</td>
                                            <td>Chanson 1</td>
                                            <td>Artiste 1</td>
                                        </tr>
                                        <tr>
                                            <td>10/03/2025</td>
                                            <td>Chanson 2</td>
                                            <td>Artiste 2</td>
                                        </tr>
                                        <tr>
                                            <td>08/03/2025</td>
                                            <td>Chanson 3</td>
                                            <td>Artiste 3</td>
                                        </tr>
                                        <tr>
                                            <td>05/03/2025</td>
                                            <td>Chanson 4</td>
                                            <td>Artiste 4</td>
                                        </tr>
                                        <tr>
                                            <td>02/03/2025</td>
                                            <td>Chanson 5</td>
                                            <td>Artiste 5</td>
                                        </tr>
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
