@extends('layout.app',['title'=>"Créer un compte"])

@section('content')
<main class="position-relative background12">
    @include('partials._searchform')
    <!--main content-->
    <div class="main_content shop pb-100 mt-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 mx-auto">
                    @include('partials._flash-message')
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3 class="mb-30">Inscription</h3>
                            </div>
                            <form action="{{route('register')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('nom') ? ' has-error' : '' }}">
                                    <input type="text"  value="{{old('nom')}}" name="nom" id="nom"  class="form-control" placeholder="Nom & Prénoms">

                                    @if ($errors->has('nom'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('nom') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('nom_d_artiste') ? ' has-error' : '' }}">
                                    <input type="text"  value="{{old('nom_d_artiste')}}" name="nom_d_artiste" id="nom_d_artiste"  class="form-control" placeholder="Nom d'Artiste">

                                    @if ($errors->has('nom_d_artiste'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('nom_d_artiste') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" class="form-control" placeholder="Email">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('pays') ? ' has-error' : '' }}">
                                    <select name="pays" id="pays"  class="form-control first_null not_chosen full-width" required>
                                        <option value="">Pays</option>
                                        @php
                                            $pays=App\Models\Pays::get()
                                        @endphp
                                        @forelse ($pays as $pays)
                                            <option value="{{$pays->id}}">{{$pays->libelle}}</option>
                                        @empty

                                        @endforelse
                                    </select>
                                    @if ($errors->has('pays'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('pays') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('mot_de_passe') ? ' has-error' : '' }}">
                                    <input type="password" name="mot_de_passe" class="form-control" placeholder="Mot de passe">

                                    @if ($errors->has('mot_de_passe'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('mot_de_passe') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('mot_de_passe_confirmation') ? ' has-error' : '' }}">
                                    <input type="password" name="mot_de_passe_confirmation" class="form-control" placeholder="Confirmez le Mot de passe">

                                    @if ($errors->has('mot_de_passe_confirmation'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('mot_de_passe_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block">Je m'inscris</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
