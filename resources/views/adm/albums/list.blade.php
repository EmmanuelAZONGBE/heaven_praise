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
						<h3 class="mb-0">{{$titre}}</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12">
						<div class="card">
                            <div class="card-header">
                              {{$desctable}}
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
                                                    Tracks
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
                                            @forelse ($albums as $album)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <img src="{{asset('usx_files/covers/'.$album->cover)}}" alt="" class="img-4by3-sm rounded-3">
                                                            <div class="ms-3">
                                                                <h5 class="mb-0">
                                                                    <a href="{{route('admin.detailsalbum',['id'=>$album->id])}}" class="text-inherit">{{$album->titre}}<br><small>{{$album->User->nomartiste}}</small></a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{App\Models\Single::where('album_id',$album->id)->count()}}
                                                    </td>
                                                    <td>
                                                        {{ $album->created_at->format('d M Y') }}
                                                    </td>
                                                    <td>
                                                        0
                                                    </td>
                                                    <td>
                                                        @if ($album->statut=="En Attente")
                                                            <span class="badge bg-secondary">En Attente</span>
                                                        @endif
                                                        @if ($album->statut=="En Ligne")
                                                            <span class="badge bg-success">En Ligne</span>
                                                        @endif
                                                        @if ($album->statut=="Restreint")
                                                            <span class="badge bg-danger">Restreint</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                            </a>
            
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.detailsalbum',['id'=>$album->id])}}">Détails</a></li>
                                                                @if ($album->statut=="En Attente")
                                                                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.validatealbum',['id'=>$album->id])}}">Valider</a></li>
                                                                @else
                                                                    <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.unvalidatealbum',['id'=>$album->id])}}">Mettre en attente</a></li>
                                                                @endif
                                                                @if ($album->statut!="Restreint")
                                                                <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.restrictalbum',['id'=>$album->id])}}">Restreindre</a></li>
                                                                @endif
                                                                
                                                                @if ((Route::currentRouteName() == 'admin.visiblesalbums') || (Route::currentRouteName() == 'admin.maskedalbums'))
                                                                    @if ($album->masque=="0")
                                                                        <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.maskalbum',['id'=>$album->id])}}">Masquer</a></li>
                                                                    @else
                                                                        <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.unmaskalbum',['id'=>$album->id])}}">Rendre visible</a></li>
                                                                    @endif
                                                                @endif

                                                                <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.editalbum',['id'=>$album->id])}}">Éditer</a></li>
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