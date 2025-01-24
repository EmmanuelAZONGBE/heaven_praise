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
						<h3 class="mb-0">Billeterie "{{$event->titre}}"</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="card">
                            <div class="card-header">
                              Nouveau ticket
                            </div>
							<div class="card-body">
                                <form action="{{route('admin.storebilleterieevents',['id'=>$event->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('libelle') ? ' has-error' : '' }}">
                                            <label class="form-label">Libellé</label>
                                            <input type="text" name="libelle" value="{{old('libelle')}}" class="form-control" placeholder="Exemple: VIP">
                                            @if ($errors->has('libelle'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('libelle') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('prix') ? ' has-error' : '' }}">
                                            <label class="form-label">Prix</label>
                                            <div class="input-group">
                                                <input type="number" name="prix" value="{{old('prix')}}" class="form-control" placeholder="5000">
                                                <button class="input-group-addon" disabled>F CFA</button>
                                            </div>
                                            @if ($errors->has('prix'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('prix') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('nombre') ? ' has-error' : '' }}">
                                            <label class="form-label">Nombre disponible</label>
                                            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Exemple: 50">
                                            @if ($errors->has('nombre'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('nombre') }}</strong>
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
                              Tickets en vente
                            </div>
							<div class="card-body">
								<div class="table-responsive" style="overflow-x: auto !important;">
									<table id="myTable" class="table text-nowrap table-centered mt-0">
										<thead class="table-light">
											<tr>
												<th class="pe-0">
													#
												</th>
												<th class="">
													Type
												</th>
												<th>
													Nbre. Mis en vente
												</th>
												<th>
													Nbre. Vendus
												</th>
												<th>
													Actions
												</th>
											</tr>
										</thead>
										<tbody>
                                            @php
                                                $i=1;
                                            @endphp
                                            @forelse ($tickets as $ticket)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        <strong>{{$ticket->libelle}}</strong> - {{$ticket->prix}} F CFA
                                                    </td>
                                                    <td>
                                                        {{$ticket->nombre}} Ticket(s)
                                                    </td>
                                                    <td>
                                                        -
                                                    </td>
                                                    <td>
                                                        
                                                        {{-- <a href="{{route('admin.forumscommunaute',['id'=>$communaute->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="forumOne">
                                                            <i data-feather="users" class="icon-xs"></i>
                                                            <div id="forumOne" class="d-none">
                                                                <span>Forums</span>
                                                            </div>
                                                        </a>
                                                        <a href="{{route('admin.editcommunaute',['id'=>$communaute->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
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
                                                        </a> --}}
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