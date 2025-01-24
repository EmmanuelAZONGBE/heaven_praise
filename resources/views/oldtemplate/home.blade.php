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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row vertical-tabs">
                <div class="col-sm-3">
                    <!-- Nav tabs -->
                    <ul class="nav" role="tablist">
                        <li class="active"> 
                            <a href="#vertical-tab1" role="tab" data-toggle="tab">
                            <i class="rt-icon2-home2"></i> Tableau de bord</a> 
                        </li>
                        <li> 
                            <a href="#vertical-tab2" role="tab" data-toggle="tab">
                                <i class="rt-icon2-vynil"></i> Ma playlist
                            </a> 
                        </li>
                        <li> 
                            <a href="#vertical-tab3" role="tab" data-toggle="tab">
                                <i class="rt-icon2-book"></i> Mon abonnement
                            </a> 
                        </li>
                        <li> 
                            <a href="#vertical-tab4" role="tab" data-toggle="tab">
                            <i class="rt-icon2-user"></i> Mon Profil</a> 
                        </li>
                        <li> 
                            <a href="#vertical-tab4" role="tab" data-toggle="tab">
                            <i class="fa fa-sign-out"></i> Déconnexion</a> 
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="vertical-tab1">
                            <p><i class="rt-icon2-anchor"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quia, ad natus corrupti inventore mollitia, dolor omnis nesciunt, molestias officiis eum debitis dolore. Minima magnam odit cupiditate labore accusantium
                                eaque!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi minus tenetur sunt aspernatur vitae, corporis nostrum quibusdam molestias, laudantium quia in a natus facilis beatae culpa inventore quidem illo atque.</p>
                        </div>
                        <div class="tab-pane fade" id="vertical-tab2">
                            <p><i class="rt-icon2-compass"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit voluptate, quas fugit facere possimus facilis odio delectus laborum id nobis expedita vitae molestiae a. Magnam aliquid architecto magni, quos
                                omnis.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, enim saepe libero iure tenetur optio nisi aliquam molestias ratione magnam ab ut quod possimus hic suscipit doloremque, deleniti ipsa quia!</p>
                        </div>
                        <div class="tab-pane fade" id="vertical-tab3">
                            <p><i class="rt-icon2-laptop"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque repellat, reiciendis sint officia quia iure nam! Dicta omnis ex ipsa fugiat maiores, vero expedita facilis, suscipit quam obcaecati veniam voluptate.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis est, dolores, ex ducimus cumque iusto ipsam odit voluptatum autem error impedit obcaecati quisquam molestiae, optio porro inventore nostrum deleniti cupiditate.</p>
                        </div>
                        <div class="tab-pane fade" id="vertical-tab4">
                            <p><i class="fa fa-trophy"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium impedit asperiores illum nulla sint itaque laborum perferendis deleniti quo cumque, quisquam repudiandae molestias sunt ea delectus porro odio
                                recusandae!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus omnis quod eligendi mollitia vel optio neque id, assumenda! Quae at quisquam eum, dolorum ullam, maxime nesciunt ex modi minus illum!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
