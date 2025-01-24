@extends('layout.admin')

@section('content')
<!-- page content -->
<div id="app-content">
	<div class="app-content-area">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-12">
                    @include('partials._flash-message')
					<!-- Page header -->
					<div class="d-flex justify-content-between align-items-center mb-5">
						<h3 class="mb-0 ">Vue Globale</h3>
                        <ul class="list-unstyled list-inline">
                            @if ($find->valide =="oui")
                                <li class="list-inline-item">
                                    <a href="{{route('admin.unvalidateartist',['id'=>$find->id])}}" class="btn btn-warning">Suspendre</a>
                                </li>
                            @else
                                <li class="list-inline-item">
                                    <a href="{{route('admin.validateartist',['id'=>$find->id])}}" class="btn btn-success">Valider</a>
                                </li>
                            @endif
                            @if ($find->restreint =="0")
                                <li class="list-inline-item">
                                    <a href="{{route('admin.restrictartist',['id'=>$find->id])}}" class="btn btn-danger">Restreindre</a>
                                </li>
                            @else
                                <li class="list-inline-item">
                                    <a href="{{route('admin.unrestrictartist',['id'=>$find->id])}}" class="btn btn-primary">Lever Restriction</a>
                                </li>
                            @endif
                        </ul>
					</div>
				</div>
			</div>
            <div class="row">
                <div class="col-lg-6 mb-5">
					<div class="card h-100">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h4 class="mb-0">A Propos de l'Artiste</h4>
						</div>
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-center mb-8">
								<div class="d-flex align-items-center">
                                    @if (empty($find->avatar))
                                        <img src="{{asset('usx_files/avatars/avatar.svg')}}" class="avatar-lg avatar rounded-circle">
                                    @else
                                        <img src="{{asset('usx_files/avatars/'.$find->avatar)}}" class="avatar-lg avatar rounded-circle">
                                    @endif
									<div class="ms-3">
										<h4 class="mb-0">@if (!empty($find->nomartiste)){{$find->nomartiste}}@else <small><em>Nom d'artiste non défini</em></small>@endif</h4>
										<small>
											Artiste
										</small>
									</div>
								</div>
								<div>
									<a href="{{route('admin.editartist',['id'=>$find->id])}}" class="btn btn-primary">Editer Profile</a>
								</div>
							</div>
							<div class="mb-8">
								<h5>
									Bio
								</h5>
								<p>
									{{$find->description}}
								</p>
							</div>
							<div class="row">
								<div class="col-md-6 col-12">
									<div class="mb-6">
										<span>HeavenID</span>
										<h5 class="mb-0 mt-2">
											#{{$find->heavenid}}
										</h5>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="mb-6">
										<span>Email</span>
										<h5 class="mb-0 mt-2">
											{{$find->email}}
										</h5>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="mb-6">
										<span>Téléphone</span>
										<h5 class="mb-0 mt-2">
											{{$find->telephone}}
										</h5>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="mb-6">
										<span>Pays / Communauté</span>
										<h5 class="mb-0 mt-2">
											@if (!empty($find->pays_id)){{$find->Pays->libelle}}@else <em>Non Défini</em>@endif / @if (!empty($find->communaute_id)){{$find->Communaute->libelle}}@else <em>Non Défini</em>@endif 
										</h5>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div class="mb-6">
										<span>Paroisse</span>
										<h5 class="mb-0 mt-2">
                                            @if (!empty($find->paroisse_id))
											    {{$find->Paroisse->libelle}}
                                            @else
                                                <em>Non Défini</em>
                                            @endif
										</h5>
									</div>
								</div>
								<div class="col-md-6 col-12">
									<div  class="mb-6">
										<span>Date d'inscription</span>
										<h5 class="mb-0 mt-2">
											{{$find->created_at}}
										</h5>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row">
                        <div class="col-xxl-3 col-lg-6 mb-5">
                            <div class="card bg-gray-200 shadow-none card-lift">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="mb-0">
                                            Earnings
                                            <span class="texttooltip" data-template="alertOne">
                                                <i class="text-muted icon-xxs"data-feather="alert-circle"></i>
                                                <span id="alertOne" class="d-none"><span class="mb-0 text-white fs-6">Text</span></span>
                                            </span>
                                        </h4>
                                    </div>
                                    <div class="mb-6">
                                        <h1 class="text-dark fw-bold ">$4500.34</h1>
                                        <span>
                                            <span class="text-success "><i data-feather="arrow-up" class="icon-xxs"></i>20.00%</span>
                                            <span class="text-muted">vs </span>
                                            <span>Last Month</span>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#!" class="btn-link fw-semi-bold">View Statement</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 mb-5">
                            <div class="card bg-gray-200 shadow-none card-lift">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="mb-0">Monthly Visitors</h4>
                                    </div>
                                    <div class="mb-6">
                                        <h1 class="text-dark fw-bold ">2,348</h1>
                                        <span>
                                            <span class="text-danger "><i data-feather="arrow-down" class="icon-xxs"></i>7.00%</span>
                                            <span class="text-muted">vs </span>
                                            <span>Last Month</span>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#!" class="btn-link fw-semi-bold">View Analytics</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 mb-5">
                            <div class="card bg-gray-200 shadow-none card-lift">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="mb-0">Total Posts</h4>
                                    </div>
                                    <div class="mb-6">
                                        <h1 class="text-dark fw-bold ">1,543</h1>
                                        <span>
                                            <span class="text-dark ">3</span>
                                            <span class="ms-1">Post in Draft</span>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#!" class="btn-link fw-semi-bold">View All Posts</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-lg-6 mb-5">
                            <div class="card bg-gray-200 shadow-none card-lift">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <h4 class="mb-0">Followers</h4>
                                    </div>
                                    <div class="mb-6">
                                        <h1 class="text-dark ">7,500</h1>
                                        <span>
                                            <span class="text-success "><i data-feather="arrow-up" class="icon-xxs"></i>28+</span>
                                            <spanclass="text-muted">
                                                vs 
                                            </span>
                                            <span>Last Month</span>
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#!" class="btn-link fw-semi-bold">Manage Followers</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card h-100">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h4 class="mb-0">Singles</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive table-card">
								
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
                                                                {{$single->titre}}
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
                                                {{-- <td>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="viewOne">
                                                        <i data-feather="check-square" class="icon-xs"></i>
                                                        <div id="viewOne" class="d-none">
                                                            <span>Valider</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="loadOne">
                                                        <i data-feather="load" class="icon-xs"></i>
                                                        <div id="loadOne" class="d-none">
                                                            <span>En Attente</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="restrOne">
                                                        <i data-feather="x-square" class="icon-xs"></i>
                                                        <div id="restrOne" class="d-none">
                                                            <span>Restreindre</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
                                                        <i data-feather="edit" class="icon-xs"></i>
                                                        <div id="editOne" class="d-none">
                                                            <span>Éditer</span>
                                                        </div>
                                                    </a>
                                                    <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="trashOne">
                                                        <i data-feather="trash-2" class="icon-xs"></i>
                                                        <div id="trashOne" class="d-none">
                                                            <span>Supprimer</span>
                                                        </div>
                                                    </a>
                                                </td> --}}
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
			<div class="row">
				<div class="col-lg-12 mb-5">
					<div class="card h-100">
						<div class="card-header d-flex justify-content-between align-items-center">
							<h4 class="mb-0">Albums</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive table-card">
								
                                <table id="myTable2" class="table text-nowrap table-centered mt-0">
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
                                                                <a href="{{route('admin.detailsalbum',['id'=>$album->id])}}" class="text-inherit">{{$album->titre}}</a>
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
                                                            <li><a class="dropdown-item d-flex align-items-center" href="{{route('admin.editalbum',['id'=>$album->id])}}">Éditer</a></li>
                                                            <li><a class="dropdown-item d-flex align-items-center" href="#!">Supprimer</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                {{-- <td>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="viewOne">
                                                        <i data-feather="check-square" class="icon-xs"></i>
                                                        <div id="viewOne" class="d-none">
                                                            <span>Valider</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="loadOne">
                                                        <i data-feather="load" class="icon-xs"></i>
                                                        <div id="loadOne" class="d-none">
                                                            <span>En Attente</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="restrOne">
                                                        <i data-feather="x-square" class="icon-xs"></i>
                                                        <div id="restrOne" class="d-none">
                                                            <span>Restreindre</span>
                                                        </div>
                                                    </a>
                                                    <a href="" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
                                                        <i data-feather="edit" class="icon-xs"></i>
                                                        <div id="editOne" class="d-none">
                                                            <span>Éditer</span>
                                                        </div>
                                                    </a>
                                                    <a href="#!" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="trashOne">
                                                        <i data-feather="trash-2" class="icon-xs"></i>
                                                        <div id="trashOne" class="d-none">
                                                            <span>Supprimer</span>
                                                        </div>
                                                    </a>
                                                </td> --}}
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
<script type="text/javascript">
    $(document).ready(function(){
        var tbl = $('#myTable');
        var tbl2 = $('#myTable2');
        $("#myTable").dataTable().fnDestroy();
        $('#myTable').DataTable({
            dom: 'Bfrtip',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
            
        } );

        $("#myTable2").dataTable().fnDestroy();
        $('#myTable2').DataTable({
            dom: 'Bfrtip',
            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            }
            
        } );
    });
</script>
@endsection