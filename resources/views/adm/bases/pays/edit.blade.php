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
						<h3 class="mb-0">Pays</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="card">
                            <div class="card-header">
                              Éditer Pays
                            </div>
							<div class="card-body">
                                <form action="{{route('admin.updatepays',['id'=>$find->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('libelle') ? ' has-error' : '' }}">
                                            <label class="form-label">Libellé</label>
                                            <input type="text" name="libelle" value="{{$find->libelle}}" class="form-control" placeholder="Entrez le nom du pays">
                                            @if ($errors->has('libelle'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('libelle') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('indicatif') ? ' has-error' : '' }}">
                                            <label class="form-label">Indicatif</label>
                                            <input type="text" name="indicatif" value="{{$find->indicatif}}" class="form-control" placeholder="Indicatif du pays">
                                            @if ($errors->has('indicatif'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('indicatif') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary mb-2">Modifier</button>
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
                              Liste des Pays
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
													Pays
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
                                            @forelse ($pays as $pays)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        {{$pays->libelle}}  (+{{$pays->indicatif}})
                                                    </td>
                                                    <td>
                                                        {{$artistes->where('pays_id',$pays->id)->count()}}
                                                    </td>
                                                    <td>
                                                        {{$utilisateurs->where('pays_id',$pays->id)->count()}}
                                                    </td>
                                                    <td>
                                                        {{App\Models\Forumpays::where('pays_id',$pays->id)->count()}}
                                                    </td>
                                                    
                                                    <td>
                                                        
                                                        <a href="{{route('admin.forumspays',['id'=>$pays->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="forumOne">
                                                            <i data-feather="users" class="icon-xs"></i>
                                                            <div id="forumOne" class="d-none">
                                                                <span>Forums</span>
                                                            </div>
                                                        </a>
                                                        <a href="{{route('admin.editpays',['id'=>$pays->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
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