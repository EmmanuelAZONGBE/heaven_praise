<header class="page_header header_white toggler_xs_right tall_header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table">
                <div class="header_left_logo display_table_cell"> <a href="./" class="logo top_logo">
            <img src="{{asset('assets/images/logo.png')}}" alt="">
        </a> </div>
                <div class="header_mainmenu display_table_cell text-center">
                    <!-- main nav start -->
                    <nav class="mainmenu_wrapper">
                        <ul class="mainmenu nav sf-menu">
                            <li  class="active"> <a href="{{route('welcome')}}">Accueil</a> </li>
                            <li> <a href="{{route('about')}}">A Propos</a> </li>
                            <li> <a href="{{route('albums')}}">Discographie</a>
                                <ul>
                                    <li> <a href="{{route('albums')}}">Albums</a> </li>
                                    <li> <a href="timetable.html">Artistes</a> </li>
                                    <li> <a href="timetable.html">Oeuvres Musicales</a> </li>
                                    
                                </ul>
                            </li>
                            <li> <a href="about.html">Evenements</a> </li>
                            <li> <a href="about.html">Galerie</a> </li>
                            
                        </ul>
                    </nav>
                    <!-- eof main nav -->
                    <!-- header toggler --><span class="toggle_menu"><span></span></span>
                </div>
                <div class="header_right_buttons display_table_cell text-right hidden-xs"> <a href="{{route('register')}}" class="theme_button color1">S'incrire</a> </div>
            </div>
        </div>
    </div>
</header>