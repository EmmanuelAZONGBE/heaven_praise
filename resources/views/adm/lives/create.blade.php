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
						<h3 class="mb-0 ">Lives / Videos</h3>
					</div>
				</div>
			</div>
			<div>
            <form action="{{route('admin.storelives')}}" method="post" enctype="multipart/form-data">
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
										<label class="form-label">Titre de la vidéo</label>
										<input type="text" name="titre" class="form-control" value="{{old('titre')}}" placeholder="Entrez l'intitulé de la vidéo" >
									    @if ($errors->has('titre'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('titre') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
									<div class="mb-3  {{ $errors->has('lien') ? ' has-error' : '' }}">
										<label class="form-label">Lien</label>
										<input type="text" name="lien" class="form-control" value="{{old('lien')}}" placeholder="Lien vers la vidéo" >
									    @if ($errors->has('lien'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('lien') }}</strong>
                                            </div>
                                        @endif
                                    </div>
									<!-- input -->
								</div>
							</div>
						</div>
						<!-- card -->
						<div class="card mb-4">
							<!-- card body -->
							<div class="card-body">
								<div>
									<div class="mb-4   {{ $errors->has('artiste') ? ' has-error' : '' }}">
										<!-- heading -->
										<h4 class="mb-4">Artiste</h4>
										<p>
											Lier un artiste si la vidéo lui appartient
										</p>
										<!-- input -->
										<select name="artiste" id="artiste" class="form-control">
											<option value="">- Sélectionnez dans la liste -</option>
											@forelse ($artistes as $artiste)
												<option value="{{$artiste->id}}">{{$artiste->nom}}</option>
												
											@empty
												
											@endforelse
										</select>
									    @if ($errors->has('artiste'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('artiste') }}</strong>
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
											Ajouter une miniature sous un format 500px x 340px
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
									
									<div class="mb-3  {{ $errors->has('publie') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">Statut</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="publie" aria-label="Default select example">
											<option  value="1" {{old('publie')==1 ? 'selected' : ''}} >Publié</option>
											<option  value="0"  {{old('publie')==0 ? 'selected' : ''}} >Non Publié</option>
										</select>
									    @if ($errors->has('publie'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('publie') }}</strong>
                                            </div>
                                        @endif
									</div>
									
								</div>
								<div>
									
									<div class="mb-3  {{ $errors->has('en_cours') ? ' has-error' : '' }}">
										<div class="d-flex justify-content-between">
											<label class="form-label">En Cours</label>
										</div>
										<!-- select menu -->
										<select class="form-select" name="en_cours" aria-label="Default select example">
											<option  value="1" {{old('en_cours')==1 ? 'selected' : ''}} >Oui</option>
											<option  value="0"  {{old('en_cours')==0 ? 'selected' : ''}} >Non</option>
										</select>
									    @if ($errors->has('en_cours'))
                                            <div class="alert" role="alert">
                                                <strong>{{ $errors->first('en_cours') }}</strong>
                                            </div>
                                        @endif
									</div>
									
								</div>
							</div>
						</div>
						<!-- button -->
						<div class="d-grid">
							<button type="submit" class="btn btn-primary">Publier la vidéo</button>
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