<div class="dashboard-menu ">
    <ul class="nav flex-column" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.dashboard') ? 'active  pcoded-trigger' : ''}}"  href="{{route('user.dashboard')}}"> <i class="ti-dashboard mr-5"></i> Tableau de bord</a>
        </li>

        @if (Auth::user()->role=="Artiste")
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.singles') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.singles')}}" aria-controls="tab-5" aria-selected="false"><i class="ti-music mr-5"></i> Mes Singles</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.albums') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.titrealbums') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.albums')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-folder mr-5"></i> Mes Albums</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.souscriptions') ? 'active pcoded-trigger' : '' }}" href="{{ route('user.souscriptions') }}" aria-controls="tab-2" aria-selected="false">
                    <i class="ti-money mr-5"></i> Mes Gains
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.tickets') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.detailstickets') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.tickets')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-ticket mr-5"></i> Mes Tickets</a>
        </li>
        @if (Auth::user()->role=="Auditeur")
        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.plans') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.valideplans') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.plans')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-layout-list-thumb mr-5"></i> Mes Plans</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.likes') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.vallikes') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.likes')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-calendar mr-5"></i> Mes Activités</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.telechargements') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.valtelecha') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.telechargements')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-download mr-5"></i> Mes Téléchargements</a>
        </li>

        @endif

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.adresselivraison') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.adresselivraison')}}" aria-controls="tab-2" aria-selected="false"><i class="ti-map-alt mr-5"></i> Adresse de livraison</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ (Route::currentRouteName() == 'user.parametres') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.parametres')}}" aria-controls="tab-4" aria-selected="false"><i class="ti-settings mr-5"></i> Paramètres</a>
        </li>
    </ul>
</div>
