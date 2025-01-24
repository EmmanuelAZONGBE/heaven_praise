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
						<h3 class="mb-0">Créer Artistes</h3>
					</div>
				</div>
			</div>
			
			<div>
                <form action="{{route('admin.storeartists')}}" method="post" enctype="multipart/form-data">
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
                                        <div class="mb-3  {{ $errors->has('nom') ? ' has-error' : '' }}">
                                            <label class="form-label">Nom & Prénoms</label>
                                            <input type="text"  value="{{old('nom')}}" name="nom" id="nom"  class="form-control" placeholder="Nom & Prénoms">
                                            @if ($errors->has('nom'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('nom') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('nom_d_artiste') ? ' has-error' : '' }}">
                                            <label class="form-label">Nom d'Artiste</label>
                                            <input type="text"  value="{{old('nom_d_artiste')}}" name="nom_d_artiste" id="nom_d_artiste"  class="form-control" placeholder="Nom d'Artiste">
                                            @if ($errors->has('nom_d_artiste'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('nom_d_artiste') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3  {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Email">
                                            @if ($errors->has('email'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3  {{ $errors->has('mot_de_passe') ? ' has-error' : '' }}">
                                            <label class="form-label">Mot de passe</label>
                                            <input type="password" name="mot_de_passe" class="form-control" placeholder="Votre Mot de passe">
                                            @if ($errors->has('mot_de_passe'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('mot_de_passe') }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="mb-3  {{ $errors->has('mot_de_passe_confirmation') ? ' has-error' : '' }}">
                                            <label class="form-label">Mot de passe Confirmation</label>
                                            <input type="password" name="mot_de_passe_confirmation" class="form-control" placeholder="Confirmez Mot de passe">
                                            @if ($errors->has('mot_de_passe_confirmation'))
                                                <div class="alert" role="alert">
                                                    <strong>{{ $errors->first('mot_de_passe_confirmation') }}</strong>
                                                </div>
                                            @endif
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
                                        <div class="mb-3  {{ $errors->has('pays') ? ' has-error' : '' }}">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label">Pays de l'Artiste</label>
                                            </div>
                                            <!-- select menu -->
                                            <select class="form-select" name="pays" aria-label="Default select example">
                                                @forelse ($pays as $pays)
                                                    <option  value="{{$pays->id}}" {{old('pays')==$pays->id ? 'selected' : ''}} >{{$pays->libelle}}</option>
                                                    
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
                            </div>
                            <!-- button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Creer l'Artiste</button>
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
@endsection