@extends('layout.artiste',['title'=>"Paramètres du compte"])


@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Paramètres</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{route('user.dashboard')}}'>Dashboard</a><span></span> Paramètres
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
                <h5 class="mb-0">Paramètres</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="border p-md-4 p-30">
                            <div class="heading_s1 mb-3">
                                <h6><i class="ti-info"></i> Informations Générales</h6><hr>
                            </div>
                            <form action="{{route('user.updateprofil')}}" class="sign__form sign__form--profile" method="POST" enctype="multipart/form-data">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-4">
										<a href="#!" class="sign__logo text-center">
											@if (empty(Auth::user()->avatar))
												<img src="{{asset('usx_files/avatars/avatar.svg')}}" class="img-responsive" alt="" id="blah1">
											@else
												<img src="{{asset('usx_files/avatars/'.Auth::user()->avatar)}}" class="img-responsive" alt="" id="blah1">
											@endif
										</a>
									</div>
									<div class="col-md-8">
										<div class="form-group {{ $errors->has('avatar') ? ' has-error' : '' }}">
											<label class="form-label" for="avatar"><small>Selectionnez votre profil (500px x 500px)</small></label>
											<input type="file" class="form-control" value="" name="avatar" id="avatar"  style="padding: 8px;">
											@if ($errors->has('avatar'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('avatar') }}</strong>
												</span>
											@endif
										</div>
									</div>
									<div class="col-12 col-md-12">
										<div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }}">
											<label class="form-label" for="nom">Nom</label>
											<input type="text" class="form-control" value="{{Auth::user()->nom}}" name="nom" id="nom"  placeholder="Nom & Prénoms">
											@if ($errors->has('nom'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('nom') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-12 col-md-12">
										<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
											<label class="form-label" for="email">Email</label>
											<input type="text" class="form-control"  value="{{Auth::user()->email}}" name="email" id="email" placeholder="Email">
											@if ($errors->has('email'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-12 col-md-6">
										<div class="form-group {{ $errors->has('pays') ? ' has-error' : '' }}">
											<label class="form-label" for="pays">Pays</label>
											<div class="custom_select">
												<select type="text" name="pays" id="pays" class="form-control js-example-basic-single form-control first_null not_chosen full-width" required>
													<option value="">Pays</option>
													@php
														$pays=App\Models\Pays::get()
													@endphp
													@forelse ($pays as $pays)
														@if ($pays->id == Auth::user()->pays_id)
															<option value="{{$pays->id}}" selected>{{$pays->libelle}}</option>
														@else
															<option value="{{$pays->id}}">{{$pays->libelle}}</option>
														@endif
													@empty
														
													@endforelse
												</select>
											</div>
											@if ($errors->has('pays'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('pays') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-12 col-md-6">
										<div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
											<label class="form-label" for="telephone">Téléphone</label>
											<input type="text" class="form-control" value="{{Auth::user()->telephone}}" name="telephone" id="telephone"  placeholder="Téléphone">
											@if ($errors->has('telephone'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('telephone') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-6">
										<button class="btn btn-fill-out" type="submit">Modifier</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="border p-md-4 p-30">
                            <div class="heading_s1 mb-3">
                                <h6><i class="ti-lock"></i> Modifier Mot de passe</h6><hr>
                            </div>
                            
							<form action="{{route('user.updatepassword')}}" class="sign__form sign__form--profile" method="POST">
								{{ csrf_field() }}
								<div class="row">

									<div class="col-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group {{ $errors->has('ancien_mot_de_passe') ? ' has-error' : '' }}">
											<label class="form-label" for="ancien_mot_de_passe">Mot de passe Actuel</label>
											<input id="ancien_mot_de_passe" type="password" name="ancien_mot_de_passe" class="form-control">
											@if ($errors->has('ancien_mot_de_passe'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('ancien_mot_de_passe') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group {{ $errors->has('nouveau_mot_de_passe') ? ' has-error' : '' }}">
											<label class="form-label" for="nouveau_mot_de_passe">Nouveau Mot de passe</label>
											<input id="nouveau_mot_de_passe" type="password" name="nouveau_mot_de_passe" class="form-control">
											@if ($errors->has('nouveau_mot_de_passe'))
												<span class="invalid-feedback" role="alert">
													<strong>{{ $errors->first('nouveau_mot_de_passe') }}</strong>
												</span>
											@endif
										</div>
									</div>

									<div class="col-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form-group {{ $errors->has('nouveau_mot_de_passe') ? ' has-error' : '' }}">
											<label class="form-label" for="nouveau_mot_de_passe_confirmation">Confirmer Mot de passe</label>
											<input id="nouveau_mot_de_passe_confirmation" type="password" name="nouveau_mot_de_passe_confirmation" class="form-control">
										</div>
									</div>

									<div class="col-12">
										<button class="btn btn-fill-out" type="submit">Changer</button>
									</div>
								</div>
							</form>
                        </div>
                    </div>
                </div><br>
				@if (Auth::user()->role =="Artiste")
					<div class="row">
						<div class="col-md-12">

							<div class="border p-md-4 p-30">
								<div class="heading_s1 mb-3">
									<h6><i class="ti-user"></i>  Profil Artiste</h6><hr>
								</div>
								
								<form action="{{route('user.updateartist')}}" class="sign__form sign__form--profile" method="POST">
									{{ csrf_field() }}
									<div class="row">
										<div class="col-12 col-md-6">
											<div class="form-group {{ $errors->has('nom_d_artiste') ? ' has-error' : '' }}">
												<label class="form-label" for="nom_d_artiste">Nom d'Artiste</label>
												<input id="nom_d_artiste" type="text" name="nom_d_artiste" value="{{Auth::user()->nomartiste}}" class="form-control">
												@if ($errors->has('nom_d_artiste'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('nom_d_artiste') }}</strong>
													</span>
												@endif
											</div>
										</div>

										<div class="col-12 col-md-6">
											<div class="form-group {{ $errors->has('communaute') ? ' has-error' : '' }}">
												<label class="form-label" for="communaute">Communauté</label>
												<div class="custom_select">
													<select name="communaute" id="" class="form-control first_null not_chosen full-width">

														<option value="">- Sélectionnez votre communauté -</option>
														@forelse ($communautes as $communaute)
															<option value="{{$communaute->id}}" {{Auth::user()->communaute_id ==$communaute->id ? 'selected' :'' }}>{{$communaute->libelle}}</option>
														@empty
															
														@endforelse
													</select>
												</div>
												@if ($errors->has('communaute'))
													<span class="invalid-feedback" role="alert">
														<strong>{{ $errors->first('communaute') }}</strong>
													</span>
												@endif
											</div>
										</div>

										<div class="col-12 col-md-12 col-lg-12 col-xl-12">
											<div class="form-group {{ $errors->has('paroisse') ? ' has-error' : '' }}">
												<label class="form-label" for="paroisse">Paroisse</label> 
												<div class="custom_select">
													<select name="paroisse" id="" class="form-control first_null not_chosen full-width">
														<option value="">- Sélectionnez votre paroisse -</option>
														@forelse ($paroisses as $paroisse)
														<option value="{{$paroisse->id}}" {{Auth::user()->paroisse_id ==$paroisse->id ? 'selected' :'' }}>{{$paroisse->libelle}}</option>
															
														@empty
															
														@endforelse
													</select>
												</div>
											</div>
										</div>

										<div class="col-12 col-md-12 col-lg-12 col-xl-12">
											<div class="form-group {{ $errors->has('presentation') ? ' has-error' : '' }}">
												<label class="form-label" for="presentation">Présentez-vous</label>
												<textarea class="form-control" name="presentation" id="presentation" cols="30" rows="10">{{Auth::user()->description}}</textarea>
											</div>
										</div>

										<div class="col-12">
											<button class="btn btn-fill-out" type="submit">Changer</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				@endif
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
			$('#avatar').trigger('click');
		}
		
		$("#avatar").change(function(){
			readURL(this);
		});
	</script>
@endsection
