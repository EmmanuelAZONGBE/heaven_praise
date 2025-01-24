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
						<h3 class="mb-0">Paroisses</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="card">
                            <div class="card-header">
                              Éditer Paroisse
                            </div>
							<div class="card-body">
                                <form action="{{route('admin.updateparoisse',['id'=>$find->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div>
                                        <!-- select -->
                                        <div class="mb-3  {{ $errors->has('pays') ? ' has-error' : '' }}">
                                            <label class="form-label">Pays</label>
                                            <select name="pays" id="" class="form-control">
                                                @forelse ($pays as $pays)
                                                    @if ($find->pays_id==$pays->id)
                                                        <option value="{{$pays->id}}" selected>{{$pays->libelle}}</option>
                                                    @else
                                                        <option value="{{$pays->id}}">{{$pays->libelle}}</option>
                                                    @endif
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </select>
                                            @if ($errors->has('pays'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('pays') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- select -->
                                        <!-- select -->
                                        <div class="mb-3  {{ $errors->has('communaute') ? ' has-error' : '' }}">
                                            <label class="form-label">Communauté</label>
                                            <select name="communaute" id="" class="form-control">
                                                @forelse ($communautes as $communaute)
                                                    @if ($find->communaute_id ==$communaute->id)
                                                        <option value="{{$communaute->id}}" selected>{{$communaute->libelle}}</option>
                                                    @else
                                                        <option value="{{$communaute->id}}">{{$communaute->libelle}}</option>
                                                    @endif
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </select>
                                            @if ($errors->has('communaute'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('communaute') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- select -->
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('libelle') ? ' has-error' : '' }}">
                                            <label class="form-label">Libellé</label>
                                            <input type="text" name="libelle" value="{{$find->libelle}}" class="form-control" placeholder="Entrez le nom de la Paroisse">
                                            @if ($errors->has('libelle'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('libelle') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
                                        </div>
                                        <!-- input -->
                                    </div>
                                </form>
                            </div>
                            
						</div>
					</div>
					<div class="col-12 col-md-8">
						<div class="card">
                            <div class="card-header">
                              Liste des Paroisses
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
													Libellé
												</th>
												<th>
													Pays / Communauté
												</th>
												<th>
													Artistes
												</th>
												<th>
													Utilisateurs
												</th>
												<th>
													Forums
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
                                            @forelse ($paroisses as $paroisse)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        {{$paroisse->libelle}}
                                                    </td>
                                                    <td>
                                                        {{$paroisse->Pays->libelle}} / {{$paroisse->Communaute->libelle}}
                                                    </td>
                                                    <td>
                                                        {{$artistes->where('paroisse_id',$paroisse->id)->count()}}
                                                    </td>
                                                    <td>
                                                        {{$utilisateurs->where('paroisse_id',$paroisse->id)->count()}}
                                                    </td>
                                                    <td>
                                                        {{App\Models\Forumparoisse::where('paroisse_id',$paroisse->id)->count()}}
                                                    </td>
                                                    
                                                    <td>
                                                        
                                                        <a href="{{route('admin.forumsparoisse',['id'=>$paroisse->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="forumOne">
                                                            <i data-feather="users" class="icon-xs"></i>
                                                            <div id="forumOne" class="d-none">
                                                                <span>Forums</span>
                                                            </div>
                                                        </a>
                                                        <a href="{{route('admin.editparoisse',['id'=>$paroisse->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
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