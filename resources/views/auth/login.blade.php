@extends('layout.app',['title'=>"Se connecter"])

@section('content')
<main class="position-relative background12">
    <!--Search Form-->
    <div class="main-search-form transition-02s">
        <div class="container">
            <div class="pt-50 pb-50 main-search-form-cover">
                <div class="row mb-20">
                    <div class="col-12">
                        <form action="#" method="get" class="search-form position-relative">
                            <div class=" search-form-icon"><i class="ti-search"></i></div>
                            <label>
                                <input type="text" class="search_field" placeholder="Enter keywords for search..." value="" name="s">
                            </label>
                            <div class="search-switch">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#" class="active">Articles</a></li>
                                    <li class="list-inline-item"><a href="#">Authors</a></li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 font-small suggested-area">
                        <p class="d-inline font-small suggested"><strong>Suggested:</strong></p>
                        <ul class="list-inline d-inline-block">
                            <li class="list-inline-item"><a href="#">Covid-19</a></li>
                            <li class="list-inline-item"><a href="#">Health</a></li>
                            <li class="list-inline-item"><a href="#">WFH</a></li>
                            <li class="list-inline-item"><a href="#">UltraNet</a></li>
                            <li class="list-inline-item"><a href="#">Hospital</a></li>
                            <li class="list-inline-item"><a href="#">Policies</a></li>
                            <li class="list-inline-item"><a href="#">Energy</a></li>
                            <li class="list-inline-item"><a href="#">Business</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                                <h3 class="mb-30">Connexion</h3>
                            </div>
                            <form action="{{route('login')}}" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" class="form-control" placeholder="Email ou Téléphone">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" name="password" class="form-control" placeholder="Mot de passe">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback has-error" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="login_footer form-group">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" id="remember" name="remember" type="checkbox" checked="checked">
                                            <label class="form-check-label" for="exampleCheckbox1"><span>Se souvenir de moi</span></label>
                                        </div>
                                    </div>
                                    <a class="text-muted" href="#">Mot de passe oublié?</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="login">Connexion</button>
                                </div>
                            </form>
                            <div class="divider-text-center mt-15 mb-15">
                                <span> ou</span>
                            </div>
                            <div class="text-muted text-center">Vous n'avez pas un compte? <a href='{{route('register')}}'>Inscrivez-vous Ici</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
