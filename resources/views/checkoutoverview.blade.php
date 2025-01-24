@extends('layout.app',['title'=>"Que toute la gloire revienne à Dieu"])

@section('meta')
    
@endsection

@section('beadcrumb')
    <div class="archive-header shop-header header-bg2 pt-50 pb-50 mb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mx-auto">
                    <h2><span class="color6">Vérification de votre commande</span></h2>
                </div>
                <div class="col-md-6 mx-auto text-center text-md-right">
                    <div class="breadcrumb">
                        <a href='{{route('welcome')}}'><i class="ti-home mr-5"></i>Accueil</a><span></span>
                        <a href='{{route('detailsevenements',['slug'=>$event->slug])}}'>{{$event->titre}}</a><span></span> Ticket
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('content')
<main class="position-relative">
    <!--main content-->
    <div class="main_content shop shopping-cart pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @include('partials._flash-message')
                    @if (Auth::guest())
                        <div class="toggle_info">
                            <span>
                                <i class="ti-user mr-5"></i>
                                <span class="text-muted">Vous avez déjà un compte ?</span>
                                <a href="#loginform" data-toggle="collapse" class="collapsed" aria-expanded="false">Cliquez ici pour vous connecter</a>
                            </span>
                        </div>
                    
                        <div class="panel-collapse collapse login_form" id="loginform">
                            <div class="panel-body">
                                <p>
                                    Si vous avez déjà acheté des tickets chez nous, veuillez saisir vos coordonnées ci-dessous. Si vous êtes nouveau, veuillez passer à la section Détails de la facturation.
                                </p>
                                <form method="post" action="{{route('checkoutlogin')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="text" required="" class="form-control" name="email" placeholder="Adresse Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Mot de Passe">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                                <label class="form-check-label" for="remember"><span>Se souvenir de moi</span></label>
                                            </div>
                                        </div>
                                        <a href="#">Mot de passe oublié?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Connexion</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="divider mt-80 mb-80"></div>
                </div>
            </div>
            <div class="row">
                @php
                    if(!Auth::guest()){
                        $adresse=App\Models\Livraison::where('user_id',Auth::user()->id)->first();
                    }
                @endphp
                <div class="col-md-6">
                    <div class="mb-25">
                        <h5>
                            <i class="ti-bookmark-alt mr-5 text-muted"></i>
                            Détails de la facturation
                        </h5>
                    </div>
                    <form id="checkout-form" method="post" action="{{route('storecheckout',['slug'=>$event->slug])}}">
                        {{ csrf_field() }}
                        <div class="form-group  {{ $errors->has('nom') ? ' has-error' : '' }}">
                            <input type="text" required="" class="form-control" name="nom" placeholder="Nom & Prénom(s) *" value="{{(Auth::guest()) ? old('nom') : Auth::user()->nom}}" {{(!Auth::guest()) ? 'readonly' : ''}}>
                            @if ($errors->has('nom'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('nom') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input class="form-control" required="" type="text" name="email" placeholder="Adresse Email *" value="{{(Auth::guest()) ? old('email') : Auth::user()->email}}" {{(!Auth::guest()) ? 'readonly' : ''}}>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('adresse') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="adresse" required="" placeholder="Adresse de livraison *" value="{{(Auth::guest()) ? old('adresse') : (!empty($adresse) ? $adresse->adresse : old('adresse'))}}">
                            @if ($errors->has('adresse'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('adresse') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('ville') ? ' has-error' : '' }}">
                            <input class="form-control" required="" type="text" name="ville" placeholder="Ville *" value="{{(Auth::guest()) ? old('ville') : (!empty($adresse) ? $adresse->ville : old('ville'))}}">
                            @if ($errors->has('ville'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('ville') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('quartier') ? ' has-error' : '' }}">
                            <input class="form-control" required="" type="text" name="quartier" placeholder="Quartier *" value="{{(Auth::guest()) ? old('quartier') : (!empty($adresse) ? $adresse->quartier : old('quartier'))}}">
                            @if ($errors->has('quartier'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('quartier') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
                            <input class="form-control" required="" type="text" name="telephone" placeholder="Téléphone *" value="{{(Auth::guest()) ? old('telephone') : Auth::user()->telephone}}" {{(!Auth::guest()) ? 'readonly' : ''}}>
                            @if ($errors->has('telephone'))
                                <span class="invalid-feedback has-error" role="alert">
                                    <strong>{{ $errors->first('telephone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="mb-20">
                            <h5>
                                Informations Complémentaires
                            </h5>
                        </div>
                        <div class="form-group mb-30">
                            <textarea rows="5" name="notes" class="form-control" placeholder="Notes de commande  ">{{old('notes')}}</textarea>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h5>
                                <i class="ti-ticket mr-5 text-muted"></i>
                                Vos commandes
                            </h5>
                        </div>
                        <div class="table-responsive order_table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Ticket
                                        </th>
                                        <th>
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total=0;
                                    @endphp
                                    @forelse ($commandes as $commande)
                                        <tr>
                                            <td>
                                                <i class="ti-check-box font-small text-muted mr-10"></i>
                                                <a href='{{route('detailsevenements',['slug'=>$commande->Evenement->slug])}}'><strong>Ticket {{$commande->Ticketevenement->libelle}}</strong> - {{number_format(round($commande->Ticketevenement->prix,2), 0, ',', ' ')}}</a>
                                                <span class="product-qty">x {{$commande->qte}}</span>
                                            </td>
                                            <td>
                                                {{number_format(round($commande->montant,2), 0, ',', ' ')}} FCFA
                                            </td>
                                        </tr>
                                        @php
                                            $total=$total+$commande->montant;
                                        @endphp
                                    @empty
                                        
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            Total
                                        </th>
                                        <td class="product-subtotal">
                                            <strong>{{number_format(round($total,2), 0, ',', ' ')}} F CFA</strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>
                                    Méthode de Paiement
                                </h5>
                            </div>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" checked="">
                                    <label class="form-check-label" for="exampleRadios5" data-toggle="collapse" data-target="#paypal" aria-controls="paypal">Fedapay</label>
                                    <div class="form-group collapse show" id="paypal">
                                        <p class="text-muted mt-5" style="font-size:15px;">
                                            Payez vos tickets par MTN Mobile Money, Moov Money, Carte visa et Mastercard.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($total!=0)
                            <a href="#" class="btn btn-fill-out btn-block mt-30" onclick="event.preventDefault();
                    document.getElementById('checkout-form').submit();">Payer Maintenant</a>
                        @endif
                            
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection