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
						<h3 class="mb-0">Singles En Ligne</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12">
						<div class="card">
                            <div class="card-header">
                              Liste des Singles visibles par les auditeurs
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
                                                    Titre
                                                </th>
                                                <th class="ps-1">
                                                    Genre
                                                </th>
                                                <th>
                                                    Date
                                                </th>
                                                <th>
                                                    Écoutes
                                                </th>
                                                <th>
                                                    Statut
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
                                            @forelse ($singles as $single)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{asset('usx_files/covers/'.$single->cover)}}" alt="" class="img-4by3-sm rounded-3">
                                                            <div class="ms-3">
                                                                <h5 class="mb-0">
                                                                    <span>{{$single->User->nomartiste}}</span> - {{$single->titre}}
                                                                </h5>
                                                                <figure >
                                                                    <audio style="width: 220px; height:30px; margin-top:10px;"
                                                                        controls
                                                                        src="{{asset('usx_files/songs/'.$single->audio)}}">
                                                                            <a href="{{asset('usx_files/songs/'.$single->audio)}}">
                                                                                Jouer
                                                                            </a>
                                                                    </audio>
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$single->Genre->libelle}}
                                                    </td>
                                                    <td>
                                                        {{ $single->created_at->format('d M Y') }}
                                                    </td>
                                                    <td>
                                                        0
                                                    </td>
                                                    <td>
                                                        @if ($single->statut=="En Attente")
                                                            <span class="badge bg-secondary">En Attente</span>
                                                        @endif
                                                        @if ($single->statut=="En Ligne")
                                                            <span class="badge bg-success">En Ligne</span>
                                                        @endif
                                                        @if ($single->statut=="Restreint")
                                                            <span class="badge bg-danger">Restreint</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>
            
                                                            <ul class="dropdown-menu">
                                                                @if ($single->statut=="En Attente")
                                                                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.validatesingle',['id'=>$single->id])}}">Valider</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.unvalidatesingle',['id'=>$single->id])}}">Mettre en attente</a></li>
                                                                @endif
                                                                @if ($single->statut!="Restreint")
                                                                <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.restrictsingle',['id'=>$single->id])}}">Restreindre</a></li>
                                                                @endif
                                                                
                                                                @if ((Route::currentRouteName() == 'admin.visiblessingles') || (Route::currentRouteName() == 'admin.maskedsingles'))
                                                                    @if ($single->masque=="0")
                                                                        <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.masksingle',['id'=>$single->id])}}">Masquer</a></li>
                                                                    @else
                                                                        <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.unmasksingle',['id'=>$single->id])}}">Rendre visible</a></li>
                                                                    @endif
                                                                @endif
    
                                                                <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.editsingle',['id'=>$single->id])}}">Éditer</a></li>
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