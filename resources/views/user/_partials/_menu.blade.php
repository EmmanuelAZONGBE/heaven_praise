
<div class="profile">
    <div class="profile__user">
        <div class="profile__avatar">
            @if (empty(Auth::user()->avatar))
                <img src="{{asset('usx_files/avatars/avatar.svg')}}" alt="">
            @else
            <img src="{{asset('usx_files/avatars/'.Auth::user()->avatar)}}">
            @endif
        </div>
        <div class="profile__meta">
            <h3>{{Auth::user()->nom}}</h3>
            <span>Heaven ID: {{Auth::user()->heavenid}}</span>
        </div>
    </div>
    @if (Auth::user()->role=="Auditeur")
        <!-- tabs nav -->
        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.dashboard') ? 'active  pcoded-trigger' : ''}}"  href="{{route('user.dashboard')}}" aria-controls="tab-1" aria-selected="true">Profil</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.tracks') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.tracks')}}" aria-controls="tab-5" aria-selected="false">Tracks</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.playlists') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.playlists')}}" aria-controls="tab-2" aria-selected="false">Playlists</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.likes') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.likes')}}" aria-controls="tab-3" aria-selected="false">Likes</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.parametres') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.parametres')}}" aria-controls="tab-4" aria-selected="false">Paramètres</a>
            </li>
        </ul>
        <!-- end tabs nav -->
    @else
        <!-- tabs nav -->
        <ul class="nav nav-tabs profile__tabs" id="profile__tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.dashboard') ? 'active  pcoded-trigger' : ''}}"  href="{{route('user.dashboard')}}" aria-controls="tab-1" aria-selected="true">Profil</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.singles') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.singles')}}" aria-controls="tab-5" aria-selected="false">Mes Singles</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.albums') ? 'active  pcoded-trigger' : ''}} {{ (Route::currentRouteName() == 'user.titrealbums') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.albums')}}" aria-controls="tab-2" aria-selected="false">Mes Albums</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link {{ (Route::currentRouteName() == 'user.parametres') ? 'active  pcoded-trigger' : ''}}" href="{{route('user.parametres')}}" aria-controls="tab-4" aria-selected="false">Paramètres</a>
            </li>
        </ul>
        <!-- end tabs nav -->
    @endif

    <a class="profile__logout"   href="{{ route('logout') }}"onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        <span>Déconnexion</span>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4,12a1,1,0,0,0,1,1h7.59l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l4-4a1,1,0,0,0,.21-.33,1,1,0,0,0,0-.76,1,1,0,0,0-.21-.33l-4-4a1,1,0,1,0-1.42,1.42L12.59,11H5A1,1,0,0,0,4,12ZM17,2H7A3,3,0,0,0,4,5V8A1,1,0,0,0,6,8V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V16a1,1,0,0,0-2,0v3a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V5A3,3,0,0,0,17,2Z"/></svg>
    </a>
</div>