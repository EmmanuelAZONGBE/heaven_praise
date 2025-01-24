@extends('layout.app')

@section('content')
<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65 table_section table_section_md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center text-md-left">
                <h2>About</h2>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <ol class="breadcrumb">
                    <li> <a href="./">
                Home
            </a> </li>
                    <li> <a href="#">Pages</a> </li>
                    <li class="active">About</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="ls section_padding_top_40 section_padding_bottom_40 table_section table_section_md columns_margin_bottom_30">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-6 text-center"> <img src="assets/images/about.png" alt=""> </div>
            <div class="col-md-6 col-md-pull-6">
                <h6 class="highlight">about me</h6>
                <h2 class="section_header">Info/Bio</h2>
                <p class="fontsize_20">At only 30 years of age, DJ has already established himself as the most successful american artist of the past two decades.</p>
                <p>American DJ and EDM producer DJ Bishop has released one studio album, and eight singles. Black sunglasses, a baseball cap flipped backwards, and his amazingly strong sense for hits that generate 9-digit streams and move crowds across the globe
                    is what distinguishes him as an extremely talented and one of the most successful USA artists: Tyler Bishop. The Lower Saxony native is actually more the reserved type, who would much rather stand behind his decks and let his music speak for itself.
                    Mr. Bishop: a picture-perfect career. Making his way from a local insider to the nation’s “next big thing” and eventually to an internationally acclaimed mega star. At only 30 years of age, the producer and DJ has already established himself as
                    the most successful American artist of the past two decades.</p>
            </div>
        </div>
    </div>
</section>
<section id="gallery" class="ls ms section_padding_top_65 columns_padding_0">
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
</section>
<section id="gigs" class="ls section_padding_top_150 section_padding_bottom_150">
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
@endsection
