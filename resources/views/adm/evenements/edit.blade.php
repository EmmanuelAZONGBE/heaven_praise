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
						<h3 class="mb-0 ">Éditer Évènements</h3>
					</div>
				</div>
			</div>
			<div>
            <form action="{{route('admin.updateevents',['id'=>$find->id])}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
				<!-- row -->
				<div class="row">
					<div class="col-lg-8 col-12">
						<!-- card -->
						<div class="card mb-4">
							<!-- card body -->
							<div class="card-body">
								<div>
									<!-- input -->
									<div class="mb-3  {{ $errors->has('titre') ? ' has-error' : '' }}">
										<label class="form-label">Titre de l'Évènement</label>
										<input type="text" name="titre" class="form-control" value="{{$find->titre}}" placeholder="Entrez l'intitulé de l'évènement" >
									    @if ($errors->has('titre'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('titre') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div class="mb-3  {{ $errors->has('slug') ? ' has-error' : '' }}">
										<label class="form-label">Slug</label>
										<input type="text" name="slug" class="form-control" value="{{$find->slug}}" placeholder="Exemple : nom-de-l-evenement" >
									    @if ($errors->has('slug'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('slug') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div class="  {{ $errors->has('description') ? ' has-error' : '' }}">
										<label class="form-label">Description</label>
										<textarea  class="form-control" name="description" id="texteditor" cols="30" rows="10">{!!$find->description!!}
                                        </textarea>
									    @if ($errors->has('description'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </div>
                                        @endif
                                    </div>
								</div>
							</div>
						</div>
						<!-- card -->
						<div class="card mb-4">
							<!-- card body -->
							<div class="card-body">
								<div>
									<div class="mb-4   {{ $errors->has('banniere') ? ' has-error' : '' }}">
										<!-- heading -->
										<h4 class="mb-4">Bannière</h4>
										<p>
											Ajouter l'affiche de l'évènement sous un format 1920px x 1280px
										</p>
										<!-- input -->
										<input type="file" class="form-control" name="banniere" id="banniere">
									    @if ($errors->has('banniere'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('banniere') }}</strong>
                                            </div>
                                        @endif
									</div>
									<div>
									
										<!-- input -->
										<div class="d-block dropzone border-dashed rounded-2 text-center">
											<img src="{{asset('usx_files/events/'.$find->banniere)}}" id="blah1" class="img-fluid" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<!-- card -->
						<div class="card mb-4">
							<!-- card body -->
							<div class="card-body">
								<!-- input -->
								<div class="form-check form-switch mb-4">
									<input class="form-check-input" name="billeterie" type="checkbox" role="switch" id="flexSwitchStock" {{$find->billeterie==1 ? 'checked' : ''}} >
									<label class="form-check-label" for="flexSwitchStock">Parametrer Billeterie</label>
								</div>
								<!-- input -->
								<div>
									
									<div class="mb-3  {{ $errors->has('statut') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">Statut</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="statut" aria-label="Default select example">
											<option  value="Publié" {{$find->statut=="Publié" ? 'selected' : ''}} >Publié</option>
											<option  value="Non Publié"  {{$find->statut=="Non Publié" ? 'selected' : ''}} >Non Publié</option>
										</select>
									    @if ($errors->has('statut'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('statut') }}</strong>
                                            </div>
                                        @endif
									</div>
									<div class="mb-3  {{ $errors->has('pays') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">Catégorie de l'Évènement</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="categorie" aria-label="Default select example">
											@forelse ($categories as $categorie)
												<option  value="{{$categorie->id}}" {{$find->categorie_id==$categorie->id ? 'selected' : ''}} >{{$categorie->libelle}}</option>
												
											@empty
												
											@endforelse
										</select>
										@if ($errors->has('categorie'))
											<div class="alert" role="alert">
												<strong>{{ $errors->first('categorie') }}</strong>
											</div>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!-- card -->
						<div class="card mb-4">
							<!-- card body -->
							<div class="card-body">
								<!-- select -->
								<div class="mb-3">
									<label class="form-label" id="productSKU">Gratuit</label><br>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="gratuit" id="inlineRadio1"
										value="1" {{$find->gratuit==1 ? 'checked' : ''}}>
									  <label class="form-check-label" for="inlineRadio1">Oui</label>
									</div>
									  <!-- input -->
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="gratuit" id="inlineRadio2"
										value="0" {{$find->gratuit==0 ? 'checked' : ''}}>
									  <label class="form-check-label" for="inlineRadio2">Non</label>
									</div>
								</div>
								<div class="mb-3">
									<label class="form-label" id="productSKU">Diffuser en Flash</label><br>
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="flash" id="inlineRadio1"
										value="1" {{$find->flash==1 ? 'checked' : ''}}>
									  <label class="form-check-label" for="inlineRadio1">Oui</label>
									</div>
									  <!-- input -->
									<div class="form-check form-check-inline">
									  <input class="form-check-input" type="radio" name="flash" id="inlineRadio2"
										value="0" {{$find->flash==0 ? 'checked' : ''}}>
									  <label class="form-check-label" for="inlineRadio2">Non</label>
									</div>
								</div>
								<div class="mb-3 {{ $errors->has('lieu') ? ' has-error' : '' }}">
									<label class="form-label">Lieu</label>
									<input type="text" class="form-control" name="lieu" value="{{$find->lieu}}" placeholder="Où se déroulera l'évènement?">
                                    @if ($errors->has('lieu'))
                                        <div class="alert" role="alert">
                                            <strong>{{ $errors->first('lieu') }}</strong>
                                        </div>
                                    @endif
								</div>
								<!-- date -->
								<div class="mb-3 {{ $errors->has('date') ? ' has-error' : '' }}">
									<label class="form-label">Date</label>
                                    <input class="form-control " type="date" name="date" value="{{$find->date}}" placeholder="Selectionner la Date"aria-describedby="basic-addon2">
                                    @if ($errors->has('date'))
                                        <div class="alert" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                        </div>
                                    @endif
								</div>
								<div class="mb-3  {{ $errors->has('pays') ? ' has-error' : '' }}">
									<div class="d-flex justify-content-between">
										<label class="form-label">Pays de l'Évènement</label>
									</div>
									<!-- select menu -->
									<select class="form-select" name="pays" aria-label="Default select example">
										@forelse ($pays as $pay)
											<option  value="{{$pay->id}}" {{$find->pays_id==$pay->id ? 'selected' : ''}} >{{$pay->libelle}}</option>
											
										@empty
											
										@endforelse
									</select>
									@if ($errors->has('pays'))
										<div class="alert" role="alert">
											<strong>{{ $errors->first('pays') }}</strong>
										</div>
									@endif
								</div>
							</div>
						</div>
						<!-- button -->
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Modifier l'Évènement</button>
						</div>
					</div>
				</div>
            </form>    
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
        $('#banniere').trigger('click');
    }
    
    $("#banniere").change(function(){
        readURL(this);
    });
</script>
@endsection