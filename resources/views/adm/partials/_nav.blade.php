<div class="header">
    <!-- navbar -->
    <div class="navbar-custom navbar navbar-expand-lg">
        <div class="container-fluid px-0">
            <a class="navbar-brand d-block d-md-none" href="{{route('admin.dashboard')}}"><img src="{{asset('assets/imgs/logo.png')}}" alt="Image" style="width:125px"></a>
            <a id="nav-toggle" href="#!" class="ms-auto ms-md-0 me-0 me-lg-3 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-text-indent-left text-muted" viewBox="0 0 16 16">
                    <path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708zM7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </a>
            <div class="d-none d-md-none d-lg-block">
                <!-- Form -->
                <form action="#">
                    <div class="input-group ">
                        <input class="form-control rounded-3" type="search" value="" id="searchInput" placeholder="Search">
                        <span class="input-group-append">
                            <button class="btn  ms-n10 rounded-0 rounded-end" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="feather feather-search text-dark">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!--Navbar nav -->
            <ul class="navbar-nav navbar-right-wrap ms-lg-auto d-flex nav-top-wrap align-items-center ms-4 ms-lg-0">
                <li class="dropdown stopevent ms-2">
                    <a href="#" class="form-check form-switch theme-switch btn btn-ghost btn-icon rounded-circle mb-0 ">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                    </a>
                </li>
                <li class="dropdown stopevent ms-2">
                    <a class="btn btn-ghost btn-icon rounded-circle" href="#!" role="button"id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false"><i class="icon-xs" data-feather="bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"aria-labelledby="dropdownNotification">
                        <div>
                            <div class="border-bottom px-3 pt-2 pb-3 d-flexjustify-content-between align-items-center">
                                <p class="mb-0 text-dark fw-medium fs-4">
                                    Notifications
                                </p>
                                <a href="#!" class="text-muted">
                                    <span><i class="me-1 icon-xs" data-feather="settings"></i></span>
                                </a>
                            </div>
                            <div  data-simplebar style="height: 250px;">
                                <!-- List group -->
                                <ul class="list-group list-group-flush notification-list-scroll">
                                    <!-- List group item -->
                                    <li class="list-group-item bg-light">
                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">
                                                Rishi Chopra
                                            </h5>
                                            <p class="mb-0">
                                                Mauris blandit erat id nunc blandit, ac eleifend dolor pretium.
                                            </p>
                                        </a>
                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">
                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">
                                                Neha Kannned
                                            </h5>
                                            <p class="mb-0">
                                                Proin at elit vel est condimentum elementum id in ante. Maecenas et sapien metus.
                                            </p>
                                        </a>
                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">
                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">
                                                Nirmala Chauhan
                                            </h5>
                                            <p class="mb-0">
                                                Morbi maximus urna lobortis elit sollicitudin sollicitudieget elit vel pretium.
                                            </p>
                                        </a>
                                    </li>
                                    <!-- List group item -->
                                    <li class="list-group-item">
                                        <a href="#!" class="text-muted">
                                            <h5 class=" mb-1">
                                                Sina Ray
                                            </h5>
                                            <p class="mb-0">
                                                Sed aliquam augue sit amet mauris volutpat hendrerit sed nunc eu diam.
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="border-top px-3 py-2 text-center">
                                <a href="#!" class="text-inherit ">View all Notifications</a>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- List -->
                <li class="dropdown ms-2">
                    <a class="rounded-circle" href="#!" role="button" id="dropdownUser"data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" src="{{asset('Adm_assets/images/avatar/avatar-11.jpg')}}" class="rounded-circle">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end"aria-labelledby="dropdownUser">
                        <div class="px-4 pb-0 pt-2">
                            <div class="lh-1 ">
                                <h5 class="mb-1">
                                    {{Auth::user()->nom}}
                                </h5>
                                <a href="#!" class="text-inherit fs-6">View my profile</a>
                            </div>
                            <div class=" dropdown-divider mt-3 mb-2"></div>
                        </div>
                        <ul class="list-unstyled">
                            {{-- <li>
                                <a class="dropdown-item d-flex align-items-center" href="#!"><i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>EditProfile</a>
                            </li>
                            <li>
                                <a class="dropdown-item"href="#!"><i class="me-2 icon-xxs dropdown-item-icon"data-feather="activity"></i>Activity Log</a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#!"><i class="me-2 icon-xxs dropdown-item-icon"data-feather="settings"></i>Settings</a>
                            </li> --}}
                            <li>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="me-2 icon-xxs dropdown-item-icon"data-feather="power"></i>
                                Déconnexion
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- navbar horizontal -->
<!-- navbar -->
<div class="navbar-horizontal nav-dashboard">
    <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg navbar-default navbar-dropdown p-0 py-lg-2">
            <div class="d-flex d-lg-block justify-content-between align-items-center w-100 w-lg-0 py-2  px-4 px-md-2 px-lg-0">
                <span class="d-lg-none">Menu</span>
                <!-- Button -->
                <button class="navbar-toggler collapsed ms-2" type="button" data-bs-toggle="collapse"data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <!-- Collapse -->
            <div class="collapse navbar-collapse  px-6 px-lg-0" id="navbar-default">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.dashboard')}}" id="navbarDashboard" >Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarApps" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Bases</a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarApps">
                            <li><a class="dropdown-item" href="{{route('admin.pays')}}">Pays</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.categorie')}}">Catégories</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.communaute')}}">Communautés</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.paroisse')}}">Paroisses</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.genre')}}">Genres</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAuthentication" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Artistes</a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAuthentication">
                            <li><a class="dropdown-item" href="{{route('admin.createartists')}}">Créer</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.newartists')}}">Nouveaux Artistes</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.artists')}}">Liste des Artistes</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.restrictedartists')}}">Artistes Restreints</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="layoutsDropdown" role="button" data-bs-toggle="dropdown"aria-expanded="false">Singles</a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="layoutsDropdown">
                            <li><span class="dropdown-header"> Actions Admin</span></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.newsingles')}}">Nouveaux Singles</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.singles')}}">En Ligne</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.restrictedsingles')}}">Restreints</a></li>

                            <li><span class="dropdown-header"> Actions Artiste</span></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.maskedsingles')}}">Masqués</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.visiblessingles')}}">Visibles</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarPages" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false">Albums</a>
                        <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="layoutsDropdown">
                            <li><span class="dropdown-header"> Actions Admin</span></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.newalbums')}}">Nouveaux Albums</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.albums')}}">En Ligne</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.restrictedalbums')}}">Restreints</a></li>

                            <li><span class="dropdown-header"> Actions Artiste</span></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.maskedalbums')}}">Masqués</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('admin.visiblesalbums')}}">Visibles</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarBaseUI" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Publications</a>
                        <div class="dropdown-menu dropdown-menu-xl" aria-labelledby="navbarBaseUI">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="list-unstyled">
                                        {{-- <li><span class="dropdown-header"> PLAYLISTS</span></li>
                                        <li class="nav-item"><a href="components/accordions.html" class="dropdown-item">Créer une playlist</a></li>
                                        <li class="nav-item"><a class="dropdown-item" href="components/alerts.html"> Liste des playlists</a></li> --}}
                                        <li><span class="dropdown-header"> LIVES / VIDEOS</span></li>
                                        <li class="nav-item"><a href="{{route('admin.newlives')}}" class="dropdown-item">Nouvelle video</a></li>
                                        <li class="nav-item"><a href="{{route('admin.listlives')}}" class="dropdown-item">Liste des videos</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="list-unstyled">
                                        <li><span class="dropdown-header"> ÉVÈNEMENTS</span></li>
                                        <li class="nav-item"><a href="{{route('admin.newevents')}}" class="dropdown-item">Nouvel Évènement</a></li>
                                        <li class="nav-item"><a href="{{route('admin.listevents')}}" class="dropdown-item">Liste des Évènements</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4">
                                    <ul class="list-unstyled">
                                        <li><span class="dropdown-header"> ACTUALITÉS</span></li>
                                        <li class="nav-item"><a href="{{route('admin.newactus')}}" class="dropdown-item">Nouvelle Actualité</a></li>
                                        <li class="nav-item"><a href="{{route('admin.listactus')}}" class="dropdown-item">Liste des Actualités</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarAuthentication" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Promotions</a>
                        <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarAuthentication">
                            <li><a class="dropdown-item" href="{{route('admin.createpromotion')}}">Créer</a></li>
                            <li><a class="dropdown-item" href="{{route('admin.promotion')}}">Liste des Promotions</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
