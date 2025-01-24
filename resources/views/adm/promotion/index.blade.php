@extends('layout.admin')

@section('content')
<!-- Page Content -->
<div id="app-content">
	<!-- Container fluid -->
	<div class="app-content-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
                    @include('partials._flash-message')
					<!-- Page header -->
					<div class="mb-5">
						<h3 class="mb-0">Liste des Promotions</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12">
						<div class="card">
                            <div class="card-header">
                              Liste des Promotions publiés sur Heavenly Praise
                            </div>
							<div class="card-body">
								<div class="table-responsive" style="overflow-x: auto !important;">
								
                                    <table id="myTable" class="table text-nowrap table-centered mt-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="pe-0">
                                                    #
                                                </th>
                                                <th class="ps-1">
                                                    Détails
                                                </th>
                                                <th>
                                                    Position
                                                </th>
                                                <th>
                                                    Destination
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @forelse ($promotions as $promotion)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{asset('usx_files/promotions/'.$promotion->banniere)}}" alt="" class="img-4by3-sm rounded-3">
                                                            <div class="ms-3">
                                                                <h5 class="mb-0">
                                                                    Bannière @if ($promotion->position =="En-tête") 380px x 56px @else 370px x 171px @endif
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$promotion->position}}
                                                    </td>
                                                    <td>
                                                        @if (!empty($promotion->lien))
                                                            <p><strong>Externe: </strong>{{$promotion->lien}}</p>
                                                        @endif
                                                        @if (!empty($promotion->actualite_id))
                                                            @php
                                                                $actu=App\Models\Actualite::find($promotion->actualite_id);
                                                            @endphp
                                                            <p><strong>Actualité: </strong>{{$actu->titre}}</p>
                                                        @endif
                                                        @if (!empty($promotion->evenement_id))
                                                            @php
                                                                $event=App\Models\Actualite::find($promotion->evenement_id);
                                                            @endphp
                                                            <p><strong>Actualité: </strong>{{$event->titre}}</p>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>
            
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Supprimer</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
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
</div>

@endsection
@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        var tbl = $('#myTable');
        $("#myTable").dataTable().fnDestroy();
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
            
        } );
    });
</script>
@endsection