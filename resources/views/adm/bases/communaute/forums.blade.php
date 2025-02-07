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
						<h3 class="mb-0">Forums</h3>
					</div>
				</div>
			</div>
			<div>
				<!-- row -->
				<div class="row">
					<div class="col-12 col-md-4">
						<div class="card">
                            <div class="card-header">
                              Enregistrer un nouveau forum
                            </div>
							<div class="card-body">
                                <form action="{{route('admin.storeforumscommunaute',['id'=>$find->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('lien') ? ' has-error' : '' }}">
                                            <label class="form-label">Lien</label>
                                            <textarea name="lien" id="" cols="30" rows="2" class="form-control">{{old('lien')}}</textarea>
                                            @if ($errors->has('lien'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('lien') }}</strong>
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
                                Listes des forums de <strong>{{$find->libelle}}</strong>
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
													Lien
												</th>
												<th>
													Actif
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
                                            @forelse ($forums as $forum)
                                                <tr>
                                                    <td>
                                                        {{$i}}
                                                    </td>
                                                    <td>
                                                        <a href="{{$forum->lien}}" target="_blank">{{$forum->lien}}</a>
                                                    </td>
                                                    <td>
                                                        @if ($forum->actif ==0)
                                                            <span class="badge bg-danger">Non</span>
                                                        @else
                                                            <span class="badge bg-success">Oui</span>

                                                        @endif
                                                    </td>

                                                    <td>
                                                        @if ($forum->actif ==0)
                                                            <a href="{{route('admin.activateforumscommunaute',['id'=>$forum->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="forumOne">
                                                                <i data-feather="check" class="icon-xs"></i>
                                                                <div id="forumOne" class="d-none">
                                                                    <span>Activer</span>
                                                                </div>
                                                            </a>
                                                        @endif
                                                        <a href="{{route('admin.editforumscommunaute',['id'=>$find->id,'idforum'=>$forum->id])}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip"data-template="editOne">
                                                            <i data-feather="edit" class="icon-xs"></i>
                                                            <div id="editOne" class="d-none">
                                                                <span>Éditer</span>
                                                            </div>
                                                        </a>
                                                        <form action="{{ route('admin.deletecommunaute', ['id' => $communaute->id]) }}" method="POST"
                                                            onsubmit="return confirm('Voulez-vous vraiment supprimer cette communauté ?');" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
                                                                <i data-feather="trash-2" class="icon-xs"></i>
                                                                <div id="trashOne" class="d-none">
                                                                    <span>Supprimer</span>
                                                                </div>
                                                            </button>
                                                        </form>
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