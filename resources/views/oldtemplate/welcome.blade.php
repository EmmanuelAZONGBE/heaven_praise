@extends('layout.player')

@section('content')
<section class="intro_section page_mainslider ds">
    <div class="flexslider" data-dots="true" data-nav="te">
        <ul class="slides">
            <li> <img src="assets/images/slide01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="slide_description_wrapper">
                                <div class="slide_description">
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <h2> <span class="small" style="margin-bottom: 20px !important" >Heavenly Praise</span> Louange Céleste </h2>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p> Que toute la gloire revienne à Dieu... </p>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p class="topmargin_25 inline-content vertical-margin"> <a href="about.html" class="theme_button inverse min_width_button">
                                    A Propos
                                </a> <a href="albums.html" class="theme_button color1 min_width_button">
                                    My albums
                                </a> </p>
                                    </div>
                                </div>
                                <!-- eof .slide_description -->
                            </div>
                            <!-- eof .slide_description_wrapper -->
                        </div>
                        <!-- eof .col-* -->
                    </div>
                    <!-- eof .row -->
                </div>
                <!-- eof .container -->
            </li>
            <li> <img src="assets/images/slide01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="slide_description_wrapper">
                                <div class="slide_description">
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <h2> <span class="small">Let the</span> Music speak! </h2>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p> We hold our notes longer, better, and higher. We put the mental in instrumental and the cool in musicool. </p>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p class="topmargin_25 inline-content vertical-margin"> <a href="about.html" class="theme_button inverse min_width_button">
                                    About me
                                </a> <a href="albums.html" class="theme_button color1 min_width_button">
                                    My albums
                                </a> </p>
                                    </div>
                                </div>
                                <!-- eof .slide_description -->
                            </div>
                            <!-- eof .slide_description_wrapper -->
                        </div>
                        <!-- eof .col-* -->
                    </div>
                    <!-- eof .row -->
                </div>
                <!-- eof .container -->
            </li>
            <li> <img src="assets/images/slide01.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <div class="slide_description_wrapper">
                                <div class="slide_description">
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <h2> <span class="small">Like music</span> to my ears. </h2>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p> We hold our notes longer, better, and higher. We put the mental in instrumental and the cool in musicool. </p>
                                    </div>
                                    <div class="intro-layer" data-animation="fadeInUp">
                                        <p class="topmargin_25 inline-content vertical-margin"> <a href="about.html" class="theme_button inverse min_width_button">
                                    About me
                                </a> <a href="albums.html" class="theme_button color1 min_width_button">
                                    My albums
                                </a> </p>
                                    </div>
                                </div>
                                <!-- eof .slide_description -->
                            </div>
                            <!-- eof .slide_description_wrapper -->
                        </div>
                        <!-- eof .col-* -->
                    </div>
                    <!-- eof .row -->
                </div>
                <!-- eof .container -->
            </li>
        </ul>
    </div>
    <!-- eof flexslider -->
</section>
<section id="about" class="ls section_padding_top_40 section_padding_bottom_40 table_section table_section_md columns_margin_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-6 text-center"> <img src="assets/images/about.png" alt=""> </div>
            <div class="col-md-6 col-md-pull-6">
                {{-- <h6 class="highlight">about me</h6> --}}
                <h2 class="section_header">Notre Bio</h2>
                <p class="fontsize_20">At only 30 years of age, DJ has already established himself as the most successful american artist of the past two decades.</p>
                <p>American DJ and EDM producer DJ Bishop has released one studio album, and eight singles. Black sunglasses, a baseball cap flipped backwards, and his amazingly strong sense for hits that generate 9-digit streams and move crowds across the globe
                    is what distinguishes him as an extremely talented and one of the most successful USA artists: Tyler Bishop. The Lower Saxony native is actually more the reserved type, who would much rather stand behind... <a href="about.html" class="more-link">Read more</a></p>
                <div class="inline-content topmargin_25"> <span class="small-text">Follow Me:</span> <span>
            <a class="social-icon socicon-facebook" href="#" title="Facebook"></a>
            <a class="social-icon socicon-twitter" href="#" title="Twitter"></a>
            <a class="social-icon socicon-google" href="#" title="Twitter"></a>
            <a class="social-icon socicon-linkedin" href="#" title="Twitter"></a>
            <a class="social-icon socicon-youtube" href="#" title="Youtube"></a>
        </span> </div>
            </div>
        </div>
    </div>
</section>
<section id="featured-video" class="ds background_cover section_padding_top_150 section_padding_bottom_150">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center"> <a href="https://www.youtube.com/watch?v=2Kvl0vpV6lM" class="theme_button inverse round_button margin_0" data-gal="prettyPhoto[gal-video]">
        <i class="fa fa-play" aria-hidden="true"></i>
    </a>
                <h5 class="highlight topmargin_40">Suivre en Direct </h5>
                <h2 class="section_header bottommargin_0"> Grand concert gospel Live à Imeko - Nigéria </h2>
            </div>
        </div>
    </div>
</section>
<section id="latest-album" class="ls ms section_padding_top_150 section_padding_bottom_100 columns_margin_bottom_30 columns_padding_25">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h6 class="highlight">À Découvrir</h6>
                <h2 class="section_header">Nouvel Album</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-sm-7">
                <div class="vertical-item slide-media opened-media">
                    <div class="item-media-wrap"> <img src="assets/images/albums/02.jpg" alt="">
                        <div class="item-media back-media"> <img src="assets/images/albums/cd.png" alt=""> </div>
                        <div class="item-media "> <img src="assets/images/albums/02.jpg" alt="">
                            <div class="media-links no-overlay">
                                <div class="links-wrap"> <span>
                            <i class="fa fa-play highlight" aria-hidden="true"></i>
                        </span> </div>
                            </div>
                        </div>
                    </div>
                    <div class="item-content topmargin_35">
                        <div class="star-rating" title="Rated 4.0 out of 5"> <span style="width:80%">
                    <strong class="rating">4.0</strong> out of 5
                </span> </div>
                        <h4 class="entry-title topmargin_5"> <a href="single-album.html">"Welcome to my hood"</a> </h4>
                        <p> <strong class="grey">Released:</strong> 13/09/2017 <br> <strong class="grey">Label:</strong> I am the Best, RED <br> <strong class="grey">Format:</strong> Digital download, CD <br> <strong class="grey">Certifications:</strong> RIAA: Gold </p>
                        {{-- <p class="topmargin_30"> <a href="#" class="theme_button color1">Get on itunes now!</a> </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <article>
                    <div class="entry-content">
                        <div class="cue-playlist-container">
                            <div class="cue-playlist cue-theme-default">
                                <ol class="cue-tracks"></ol>
                            </div>
                            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="application/json" class="cue-playlist-data">
                                {
                                    "embed_link": "",
                                    "permalink": "",
                                    "skin": "",
                                    "thumbnail": "assets/images/albums/background.jpg",
                                    "tracks": [
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 1,
                                        "audioUrl": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "format": "mp3",
                                        "length": "5:55",
                                        "title": "Upbeat & Inspiring",
                                        "order": 0,
                                        "mp3": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "5:55"
                                        },
                                        "src": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/01.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 2,
                                        "audioUrl": "https://0.s3.envato.com/files/216844247/preview.mp3",
                                        "format": "mp3",
                                        "length": "7:48",
                                        "title": "Inspiring Uplifting Corporate",
                                        "order": 0,
                                        "mp3": "https://0.s3.envato.com/files/216844247/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "7:48"
                                        },
                                        "src": "https://0.s3.envato.com/files/216844247/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/02.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 3,
                                        "audioUrl": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "format": "mp3",
                                        "length": "11:36",
                                        "title": "Inspiration Kit",
                                        "order": 0,
                                        "mp3": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "11:36"
                                        },
                                        "src": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/03.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 4,
                                        "audioUrl": "https://0.s3.envato.com/files/179391137/preview.mp3",
                                        "format": "mp3",
                                        "length": "4:26",
                                        "title": "Happy Upbeat Ukulele",
                                        "order": 0,
                                        "mp3": "https://0.s3.envato.com/files/179391137/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "4:26"
                                        },
                                        "src": "https://0.s3.envato.com/files/179391137/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/04.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 5,
                                        "audioUrl": "https://0.s3.envato.com/files/175505487/preview.mp3",
                                        "format": "mp3",
                                        "length": "3:30",
                                        "title": "Motivational and Inspiring",
                                        "order": 0,
                                        "mp3": "https://0.s3.envato.com/files/175505487/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "3:30"
                                        },
                                        "src": "https://0.s3.envato.com/files/175505487/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/05.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 3,
                                        "audioUrl": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "format": "mp3",
                                        "length": "11:36",
                                        "title": "Inspiration Kit",
                                        "order": 0,
                                        "mp3": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "11:36"
                                        },
                                        "src": "https://0.s3.envato.com/files/196824856/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/03.jpg"
                                        }
                                    },
                                    {
                                        "artist": "AndreySkarlat",
                                        "artworkId": 0,
                                        "artworkUrl": "#0",
                                        "audioId": 1,
                                        "audioUrl": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "format": "mp3",
                                        "length": "5:55",
                                        "title": "Upbeat & Inspiring",
                                        "order": 0,
                                        "mp3": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "meta":
                                        {
                                            "artist": "AndreySkarlat",
                                            "length_formatted": "5:55"
                                        },
                                        "src": "https://s3.envato.com/files/229455919/preview.mp3",
                                        "thumb":
                                        {
                                            "src": "assets/images/albums/01.jpg"
                                        }
                                    }]
                                }
                            </script>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</section>
{{-- <section id="gallery" class="ls section_padding_top_65 columns_padding_0">
    <div class="container-fluid">
        <div class="col-sm-12 bottommargin_0">
            <div class="filters carousel_filters"> <a href="#" class="selected" data-filter="*">All</a> <a href="#" data-filter=".music">Music</a> <a href="#" data-filter=".life">Life</a> <a href="#" data-filter=".concerts">Concerts</a> <a href="#" data-filter=".backstage">Backstage</a> <a href="#"
                    data-filter=".new">New</a> </div>
            <div class="owl-carousel owl-center-scale gallery-carousel" data-nav="true" data-dots="false" data-margin="0" data-center="true" data-loop="true" data-responsive-xlg="6" data-responsive-lg="5" data-responsive-md="4"
                data-responsive-sm="3" data-responsive-xs="2" data-responsive-xxs="1" data-filters=".carousel_filters">
                <div class="vertical-item music">
                    <div class="item-media"> <img src="assets/images/gallery-square/01.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/01.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item life">
                    <div class="item-media"> <img src="assets/images/gallery-square/02.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/02.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item concerts">
                    <div class="item-media"> <img src="assets/images/gallery-square/03.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/03.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item backstage">
                    <div class="item-media"> <img src="assets/images/gallery-square/04.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/04.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item new">
                    <div class="item-media"> <img src="assets/images/gallery-square/05.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/05.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item music">
                    <div class="item-media"> <img src="assets/images/gallery-square/06.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/06.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item life">
                    <div class="item-media"> <img src="assets/images/gallery-square/07.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/07.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item concerts">
                    <div class="item-media"> <img src="assets/images/gallery-square/08.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/08.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item backstage">
                    <div class="item-media"> <img src="assets/images/gallery-square/09.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/09.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item new">
                    <div class="item-media"> <img src="assets/images/gallery-square/10.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/10.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item farming">
                    <div class="item-media"> <img src="assets/images/gallery-square/11.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/11.jpg"></a> </div>
                        </div>
                    </div>
                </div>
                <div class="vertical-item farm">
                    <div class="item-media"> <img src="assets/images/gallery-square/12.jpg" alt="" />
                        <div class="media-links">
                            <div class="links-wrap"> <a class="p-view prettyPhoto" title="" data-gal="prettyPhoto[gal]" href="assets/images/gallery/12.jpg"></a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<section id="gigs" class="ls  section_padding_bottom_150">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h6 class="highlight">Évènements</h6>
                <h2 class="section_header">À Venir</h2>
                <div class="owl-carousel topmargin_60" data-dots="false" data-nav="true" data-responsive-lg="3">
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/01.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Évènement 1 </a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 11/08/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 11/08/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="#" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/02.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Évènement 2</a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 13/09/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 13/09/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="#" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/03.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Évènement 3</a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 25/07/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 25/07/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="event-single-right.html" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/01.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Music art united</a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 11/08/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 11/08/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="#" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/02.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Minimal Music night</a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 13/09/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 13/09/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="#" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="vertical-item content-absolute hover-entry-content">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/events/03.jpg" alt=""> </div>
                        <div class="item-content ds">
                            <h4 class="entry-title bottommargin_0"> <a href="team-single.html">Summer night party</a> </h4>
                            <div class="media small-media small-text grey inline-block margin_0 hover-hidden">
                                <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                <div class="media-body"> 25/07/2017 </div>
                            </div>
                            <div class="entry-content grey">
                                <div class="entry-meta small-text text-left">
                                    <div class="content-justify">
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-calendar cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 25/07/2017 </div>
                                        </div>
                                        <div class="media small-media inline-block margin_0">
                                            <div class="media-left"> <i class="fa fa-clock-o cons-width highlight" aria-hidden="true"></i> </div>
                                            <div class="media-body"> 05:00 PM </div>
                                        </div>
                                    </div>
                                    <div class="media small-media margin_0">
                                        <div class="media-left"> <i class="fa fa-map-marker cons-width highlight" aria-hidden="true"></i> </div>
                                        <div class="media-body"> Square Hilbrow, Milan, Italy. </div>
                                    </div>
                                </div>
                                <div class="topmargin_20"> <a href="#" class="theme_button inverse">Buy Tickets</a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="subscribe" class="ds parallax section_subscribe section_padding_top_150 section_padding_bottom_150 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 text-center text-md-left">
                <h6 class="highlight margin_0">Abonnement à notre</h6>
                <h3 class="margin_0">Newsletter:</h3>
            </div>
            <div class="col-lg-9 col-md-8 text-center">
                <div class="widget widget_mailchimp">
                    <form class="signup" action="./" method="get">
                        <div class="subs-elements-wrapper">
                            <div class="form-group margin_0"> <input class="mailchimp_email form-control text-center" name="email" type="email" placeholder="Entrez votre Email"> </div> <button type="submit" class="theme_button color1">Subscribe now!</button> </div>
                        <div class="response"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="news" class="ls section_padding_top_150 section_padding_bottom_150">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h6 class="highlight">Blog</h6>
                <h2 class="section_header">Dernières Actualités</h2>
                <div class="owl-carousel topmargin_60" data-responsive-lg="3" data-dots="true">
                    <article class="vertical-item content-padding with_background rounded overflow_hidden text-center">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/gallery/11.jpg" alt="">
                            <div class="media-links"> <a href="blog-single-right.html" class="abs-link"></a> </div>
                        </div>
                        <div class="item-content">
                            <header class="entry-header">
                                <div class="entry-meta small-text content-justify"> <span class="categories-links highlightlinks">
                            <a href="#0">Life</a>
                        </span> <span class="greylinks">
                            <a href="blog-single-right.html">
                                <time datetime="2017-10-03T08:50:40+00:00">
                                    14/09/2017
                                </time>
                            </a>
                        </span> </div>
                                <h4 class="entry-title"> <a href="blog-single-right.html">I stayed at the Resident Hotel In Miami</a> </h4>
                            </header>
                            <div class="entry-content">
                                <p>Jowl pork beef ball tip burgdoggen. Pork chop jowl boudin, pork loin alcatra leberkas cow tenderloin rump shankle bacon.</p>
                            </div>
                        </div>
                        <footer class="entry-meta entry-footer small-text greylinks bottom_color_border">
                            <div class="inline-content"> <a href="#0">
                        <i class="fa fa-user rightpadding_5" aria-hidden="true"></i>
                        <span>Admin</span>
                    </a> <a href="#0">
                        <i class="fa fa-comment rightpadding_5" aria-hidden="true"></i>
                        <span class="value">1263</span>
                    </a> <span>
                        <i class="fa fa-eye rightpadding_5" aria-hidden="true"></i>
                        <span class="value">3698</span> </span>
                            </div>
                        </footer>
                    </article>
                    <article class="vertical-item content-padding with_background rounded overflow_hidden text-center">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/gallery/18.jpg" alt="">
                            <div class="media-links"> <a href="blog-single-right.html" class="abs-link"></a> </div>
                        </div>
                        <div class="item-content">
                            <header class="entry-header">
                                <div class="entry-meta small-text content-justify"> <span class="categories-links highlightlinks">
                            <a href="#0">Music</a>
                        </span> <span class="greylinks">
                            <a href="blog-single-right.html">
                                <time datetime="2017-10-03T08:50:40+00:00">
                                    15/09/2017
                                </time>
                            </a>
                        </span> </div>
                                <h4 class="entry-title"> <a href="blog-single-right.html">My new album out "Tired eyes"</a> </h4>
                            </header>
                            <div class="entry-content">
                                <p>Swine biltong tenderloin, ball tip andouille cupim kevin filet mignon sirloin drumstick shoulder. Salami ham hock ground.</p>
                            </div>
                        </div>
                        <footer class="entry-meta entry-footer small-text greylinks bottom_color_border">
                            <div class="inline-content"> <a href="#0">
                        <i class="fa fa-user rightpadding_5" aria-hidden="true"></i>
                        <span>Admin</span>
                    </a> <a href="#0">
                        <i class="fa fa-comment rightpadding_5" aria-hidden="true"></i>
                        <span class="value">7523</span>
                    </a> <span>
                        <i class="fa fa-eye rightpadding_5" aria-hidden="true"></i>
                        <span class="value">7812</span> </span>
                            </div>
                        </footer>
                    </article>
                    <article class="vertical-item content-padding with_background rounded overflow_hidden text-center">
                        <div class="item-media top_rounded overflow_hidden"> <img src="assets/images/gallery/19.jpg" alt="">
                            <div class="media-links"> <a href="blog-single-right.html" class="abs-link"></a> </div>
                        </div>
                        <div class="item-content">
                            <header class="entry-header">
                                <div class="entry-meta small-text content-justify"> <span class="categories-links highlightlinks">
                            <a href="#0">Concerts</a>
                        </span> <span class="greylinks">
                            <a href="blog-single-right.html">
                                <time datetime="2017-10-03T08:50:40+00:00">
                                    18/09/2017
                                </time>
                            </a>
                        </span> </div>
                                <h4 class="entry-title"> <a href="blog-single-right.html">Non-stop party in Berlin</a> </h4>
                            </header>
                            <div class="entry-content">
                                <p>Shankle biltong boudin doner. Jerky prosciutto flank burgdoggen pork beef ribs. Tenderloin tongue chicken beef ribs.</p>
                            </div>
                        </div>
                        <footer class="entry-meta entry-footer small-text greylinks bottom_color_border">
                            <div class="inline-content"> <a href="#0">
                        <i class="fa fa-user rightpadding_5" aria-hidden="true"></i>
                        <span>Admin</span>
                    </a> <a href="#0">
                        <i class="fa fa-comment rightpadding_5" aria-hidden="true"></i>
                        <span class="value">8459</span>
                    </a> <span>
                        <i class="fa fa-eye rightpadding_5" aria-hidden="true"></i>
                        <span class="value">9852</span> </span>
                            </div>
                        </footer>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
