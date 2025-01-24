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
						<h3 class="mb-0 ">Publier une Promotion</h3>
					</div>
				</div>
			</div>
			<div>
            <form action="{{route('admin.storepromotion')}}" method="post" enctype="multipart/form-data">
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
									<div class="mb-3  {{ $errors->has('destination') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">Destination</label>
										</div>
										<!-- select menu -->
										<select class="form-select" id="destination" name="destination" aria-label="Default select example">
											<option  value="Externe" {{old('destination')=='Externe' ? 'selected' : ''}} >Externe</option>
                                            <option  value="Actualité"  {{old('Actualité')=='Actualité' ? 'selected' : ''}} >Actualité</option>
											<option  value="Évènement"  {{old('destination')=='Évènement' ? 'selected' : ''}} >Évènement</option>
										</select>
									    @if ($errors->has('destination'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('destination') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div id="divlien" class="mb-3  {{ $errors->has('lien') ? ' has-error' : '' }}">
										<label class="form-label">Lien</label>
										<input type="text" name="lien" class="form-control" value="{{old('lien')}}" placeholder="Lien Externe vers la pub" >
									    @if ($errors->has('lien'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('lien') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div id="divactu" class="mb-3  {{ $errors->has('actualite') ? ' has-error' : '' }}" style="display: none;">
										<div class="d-flex justify-content-between">
											<label class="form-label">Actualité</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="actualite" aria-label="Default select example">
                                            @forelse ($actualites as $actualite)
											    <option  value="{{$actualite->id}}" {{old('actualite')==$actualite->id ? 'selected' : ''}} >{{$actualite->titre}}</option>
                                            @empty
                                                
                                            @endforelse
										</select>
									    @if ($errors->has('actualite'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('actualite') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div id="divevent" class="mb-3  {{ $errors->has('evenement') ? ' has-error' : '' }}" style="display: none;">
										<div class="d-flex justify-content-between">
											<label class="form-label">Évènement</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="evenement" aria-label="Default select example">
                                            @forelse ($evenements as $evenement)
											    <option  value="{{$evenement->id}}" {{old('evenement')==$evenement->id ? 'selected' : ''}} >{{$evenement->titre}}</option>
                                            @empty
                                                
                                            @endforelse
										</select>
									    @if ($errors->has('evenement'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('evenement') }}</strong>
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
											Ajouter l'affiche de l'actualité sous un format selon la position
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
											<img src="{{asset('PlayerTemplate/img/covers/image.png')}}" id="blah1" class="img-fluid" alt="">
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
								<div>
									<!-- input -->
									<div class="mb-3  {{ $errors->has('position') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">Position</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="position" aria-label="Default select example">
											<option  value="En-tête" {{old('En-tête')==1 ? 'selected' : ''}} >En-tête de page (380px x 56px)</option>
											<option  value="Page"  {{old('Page')==0 ? 'selected' : ''}} >Page (370px x 171px)</option>
										</select>
									    @if ($errors->has('position'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </div>
                                        @endif
                                    </div>
								</div>
							</div>
						</div>
						<!-- button -->
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Publier</button>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#destination').change(function () {
            if ($('#destination').val()== "Externe") {
                $("#divlien").show('slow');
                $("#divevent").hide('slow');
                $("#divactu").hide('slow');
            }
            if ($('#destination').val()== "Actualité") {
                $("#divlien").hide('slow');
                $("#divevent").hide('slow');
                $("#divactu").show('slow');
            }
            if ($('#destination').val()== "Évènement") {
                $("#divlien").hide('slow');
                $("#divevent").show('slow');
                $("#divactu").hide('slow');
            }
        });
    });
</script>
@endsection