@extends('layout.artiste',['title'=>"Adresse de livraison"])

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Adresse de livraison</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='/demo/shop-category'>Tableau de bord</a><span></span> Adresse de livraison
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="tab-content dashboard-content">
    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        @include('partials._flash-message')
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Modifier votre adresse</h5>
                <small class="text-muted">Les informations fournies ci-dessous nous permettent de livrer les tichets commandés à votre localisation.</small>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('user.updateadresselivraison')}}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-6 {{ $errors->has('ville') ? ' has-error' : '' }}">
                            <label>Ville <span class="required">*</span></label>
                            <input required="" class="form-control" name="ville" type="text" value="{{(!empty($adresse)) ? $adresse->ville : old('ville')}}">
                            @if ($errors->has('ville'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('ville') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-6 {{ $errors->has('quartier') ? ' has-error' : '' }}">
                            <label>Quartier <span class="required">*</span></label>
                            <input required="" class="form-control" name="quartier" value="{{(!empty($adresse)) ? $adresse->quartier : old('quartier')}}">
                            @if ($errors->has('quartier'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('quartier') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12 {{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <label>Indication / Maison / Ilot <span class="required">*</span></label>
                            <input required="" class="form-control" name="adresse" type="text" value="{{(!empty($adresse)) ? $adresse->adresse : old('adresse')}}">
                            @if ($errors->has('adresse'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('adresse') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Modifier</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
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
			$('#cover').trigger('click');
		}
		
		$("#cover").change(function(){
			readURL(this);
		});
	</script>
@endsection
