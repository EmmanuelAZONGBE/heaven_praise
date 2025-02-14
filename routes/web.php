<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('welcome');

Route::post('/ecouter-chanson', [App\Http\Controllers\GuestController::class, 'ecouterChanson'])->name('ecouterChanson');
Route::get('/checkout-login', [App\Http\Controllers\GuestController::class, 'index'])->name('checkoutloginindex');
Route::post('/checkout-login', [App\Http\Controllers\GuestController::class, 'checkoutlogin'])->name('checkoutlogin');

Route::post('/addtoplaylist', [App\Http\Controllers\GuestController::class, 'addtoplaylist'])->name('addtoplaylist');

Route::get('/a-propos', [App\Http\Controllers\GuestController::class, 'about'])->name('about');
Route::get('/videos', [App\Http\Controllers\GuestController::class, 'videos'])->name('videos');

Route::get('/compte-premium', [App\Http\Controllers\GuestController::class, 'premium'])->name('premium');

Route::get('/artistes', [App\Http\Controllers\GuestController::class, 'artistes'])->name('artistes');
Route::get('/artistes/{heavenid}', [App\Http\Controllers\GuestController::class, 'detailsartistes'])->name('detailsartistes');

Route::get('/evenements', [App\Http\Controllers\GuestController::class, 'evenements'])->name('evenements');
Route::get('/evenements/{slug}', [App\Http\Controllers\GuestController::class, 'detailsevenements'])->name('detailsevenements');

Route::post('/evenements/{slug}/commentaire', [App\Http\Controllers\GuestController::class, 'storecommentevent'])->name('storecommentevent');
Route::get('/evenements/{slug}/badge', [App\Http\Controllers\GuestController::class, 'badgeevenements'])->name('badgeevenements');
Route::post('/evenements/{slug}/badge', [App\Http\Controllers\GuestController::class, 'generatebadgeevenements'])->name('generatebadgeevenements');

Route::get('/actualites', [App\Http\Controllers\GuestController::class, 'actualites'])->name('actualites');
Route::get('/actualites/{slug}', [App\Http\Controllers\GuestController::class, 'detailsactualites'])->name('detailsactualites');
Route::post('/actualites/{slug}/commentaire', [App\Http\Controllers\GuestController::class, 'storecommentactu'])->name('storecommentactu');

Route::get('/singles', [App\Http\Controllers\GuestController::class, 'singles'])->name('singles');

Route::get('/albums', [App\Http\Controllers\GuestController::class, 'albums'])->name('albums');
Route::get('/albums/{slug}', [App\Http\Controllers\GuestController::class, 'detailsalbums'])->name('detailsalbums');

Route::group(['prefix' => 'evenements/{slug}/'], function () {

    Route::get('/checkout', [App\Http\Controllers\GuestController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [App\Http\Controllers\GuestController::class, 'storecheckout'])->name('storecheckout');


    Route::get('/payer', [App\Http\Controllers\FedapayController::class, 'pay'])->name('paywithfedapay');
    Route::get('/paiement-statuts', [App\Http\Controllers\FedapayController::class, 'checkstatus'])->name('fedapaypaiementstatus');

    Route::get('/{sessionid}/order-completed', [App\Http\Controllers\GuestController::class, 'ordercompleted'])->name('ordercompleted');

    Route::get('/commande', [App\Http\Controllers\GuestController::class, 'index'])->name('commande');
    Route::post('/commande', [App\Http\Controllers\GuestController::class, 'storecommande'])->name('storecommande');

});

Route::group(['prefix' => 'tabeau-de-bord/'], function () {


    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.dashboard');

    Route::get('/tracks', [App\Http\Controllers\UserController::class, 'tracks'])->name('user.tracks');

    Route::get('/playlists', [App\Http\Controllers\UserController::class, 'playlists'])->name('user.playlists');

    Route::get('/likes', [App\Http\Controllers\UserController::class, 'likes'])->name('user.likes');

    Route::get('/parametres', [App\Http\Controllers\UserController::class, 'parametres'])->name('user.parametres');

    Route::get('/adresse-de-livraison', [App\Http\Controllers\UserController::class, 'adresselivraison'])->name('user.adresselivraison');
    Route::post('/adresse-de-livraison', [App\Http\Controllers\UserController::class, 'updateadresselivraison'])->name('user.updateadresselivraison');

    Route::get('/tickets', [App\Http\Controllers\UserController::class, 'tickets'])->name('user.tickets');
    Route::get('/tickets/{sessionid}/details', [App\Http\Controllers\UserController::class, 'detailstickets'])->name('user.detailstickets');

    Route::post('/parametres/update-profil', [App\Http\Controllers\UserController::class, 'updateprofil'])->name('user.updateprofil');
    Route::post('/parametres/update-password', [App\Http\Controllers\UserController::class, 'updatepassword'])->name('user.updatepassword');
    Route::post('/parametres/update-artist', [App\Http\Controllers\UserController::class, 'updateartist'])->name('user.updateartist');

    Route::get('/singles', [App\Http\Controllers\UserController::class, 'singles'])->name('user.singles');
    Route::post('/singles', [App\Http\Controllers\UserController::class, 'storesingles'])->name('user.storesingles');
    Route::get('/singles/{id}/masquer', [App\Http\Controllers\UserController::class, 'masksingles'])->name('user.masksingles');
    Route::get('/singles/{id}/demasquer', [App\Http\Controllers\UserController::class, 'unmasksingles'])->name('user.unmasksingles');
    Route::delete('/singles/{id}/destroysingle', [App\Http\Controllers\UserController::class, 'destroysingle'])->name('user.deletesingles');


    Route::get('/albums', [App\Http\Controllers\UserController::class, 'albums'])->name('user.albums');
    Route::post('/albums', [App\Http\Controllers\UserController::class, 'storealbums'])->name('user.storealbums');
    Route::get('/albums/{slug}/masquer', [App\Http\Controllers\UserController::class, 'maskalbums'])->name('user.maskalbums');
    Route::get('/albums/{slug}/demasquer', [App\Http\Controllers\UserController::class, 'unmaskalbums'])->name('user.unmaskalbums');
    Route::get('/albums/{slug}/titres', [App\Http\Controllers\UserController::class, 'titrealbums'])->name('user.titrealbums');
    Route::post('/albums/{slug}/titres', [App\Http\Controllers\UserController::class, 'storetitrealbums'])->name('user.storetitrealbums');
    Route::delete('/albums/{slug}/destroyalbum', [App\Http\Controllers\UserController::class, 'destroyalbum'])->name('user.deletealbums');

});

Route::group(['prefix' => 'adm/'], function () {

    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');

    Route::group(['prefix' => 'bases/'], function () {


        Route::group(['prefix' => 'pays/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'pays'])->name('admin.pays');
            Route::post('/', [App\Http\Controllers\AdminController::class, 'storepays'])->name('admin.storepays');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editpays'])->name('admin.editpays');
            Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updatepays'])->name('admin.updatepays');
            Route::delete('/{id}/destroypays', [App\Http\Controllers\AdminController::class, 'destroypays'])->name('admin.deletepays');

            Route::get('/{id}/forums', [App\Http\Controllers\AdminController::class, 'forumspays'])->name('admin.forumspays');
            Route::post('/{id}/forums', [App\Http\Controllers\AdminController::class, 'storeforumspays'])->name('admin.storeforumspays');
            Route::delete('/{id}/destroy', [App\Http\Controllers\AdminController::class, 'destroy'])->name('admin.deleteforum');

            Route::get('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'editforumspays'])->name('admin.editforumspays');
            Route::post('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'updateforumspays'])->name('admin.updateforumspays');

            Route::get('/forums/{id}/activer', [App\Http\Controllers\AdminController::class, 'activateforumspays'])->name('admin.activateforumspays');
        });

        Route::group(['prefix' => 'communaute/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'communaute'])->name('admin.communaute');
            Route::post('/', [App\Http\Controllers\AdminController::class, 'storecommunaute'])->name('admin.storecommunaute');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editcommunaute'])->name('admin.editcommunaute');
            Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updatecommunaute'])->name('admin.updatecommunaute');

            Route::get('/{id}/forums', [App\Http\Controllers\AdminController::class, 'forumscommunaute'])->name('admin.forumscommunaute');
            Route::post('/{id}/forums', [App\Http\Controllers\AdminController::class, 'storeforumscommunaute'])->name('admin.storeforumscommunaute');

            Route::get('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'editforumscommunaute'])->name('admin.editforumscommunaute');
            Route::post('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'updateforumscommunaute'])->name('admin.updateforumscommunaute');

            Route::get('/forums/{id}/activer', [App\Http\Controllers\AdminController::class, 'activateforumscommunaute'])->name('admin.activateforumscommunaute');
            Route::delete('/{id}/destroycommunaute', [App\Http\Controllers\AdminController::class, 'destroycommunaute'])->name('admin.deletecommunaute');
        });

        Route::group(['prefix' => 'paroisse/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'paroisse'])->name('admin.paroisse');
            Route::post('/', [App\Http\Controllers\AdminController::class, 'storeparoisse'])->name('admin.storeparoisse');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editparoisse'])->name('admin.editparoisse');
            Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updateparoisse'])->name('admin.updateparoisse');
            Route::delete('/{id}/destroyparoisse', [App\Http\Controllers\AdminController::class, 'destroyparoisse'])->name('admin.deleteparoisse');

            Route::get('/{id}/forums', [App\Http\Controllers\AdminController::class, 'forumsparoisse'])->name('admin.forumsparoisse');
            Route::post('/{id}/forums', [App\Http\Controllers\AdminController::class, 'storeforumsparoisse'])->name('admin.storeforumsparoisse');
            Route::delete('/{id}/destroyforums', [App\Http\Controllers\AdminController::class, 'destroyforums'])->name('admin.deleteforumsparoisse');

            Route::get('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'editforumsparoisse'])->name('admin.editforumsparoisse');
            Route::post('/{id}/forums/{idforum}/editer', [App\Http\Controllers\AdminController::class, 'updateforumsparoisse'])->name('admin.updateforumsparoisse');

            Route::get('/forums/{id}/activer', [App\Http\Controllers\AdminController::class, 'activateforumsparoisse'])->name('admin.activateforumsparoisse');

        });

        Route::group(['prefix' => 'categorie/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'categorie'])->name('admin.categorie');
            Route::post('/', [App\Http\Controllers\AdminController::class, 'storecategorie'])->name('admin.storecategorie');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editcategorie'])->name('admin.editcategorie');
            Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updatecategorie'])->name('admin.updatecategorie');
            Route::delete('/{id}/destroycategorie', [App\Http\Controllers\AdminController::class, 'destroycategorie'])->name('admin.deletecategorie');
        });

        Route::group(['prefix' => 'genre/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'genre'])->name('admin.genre');
            Route::post('/', [App\Http\Controllers\AdminController::class, 'storegenre'])->name('admin.storegenre');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editgenre'])->name('admin.editgenre');
            Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updategenre'])->name('admin.updategenre');
            Route::delete('/{id}/destroygenre', [App\Http\Controllers\AdminController::class, 'destroygenre'])->name('admin.deletegenre');
        });

        Route::group(['prefix' => 'promotions/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'promotion'])->name('admin.promotion');
            Route::get('/creer', [App\Http\Controllers\AdminController::class, 'createpromotion'])->name('admin.createpromotion');
            Route::post('/creer', [App\Http\Controllers\AdminController::class, 'storepromotion'])->name('admin.storepromotion');
            Route::delete('/{id}/destroypromotion', [App\Http\Controllers\AdminController::class, 'destroypromotion'])->name('admin.deletepromotion');
        });

        Route::group(['prefix' => 'artistes/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'artists'])->name('admin.artists');
            Route::get('/creer', [App\Http\Controllers\AdminController::class, 'createartists'])->name('admin.createartists');
            Route::post('/creer', [App\Http\Controllers\AdminController::class, 'storeartists'])->name('admin.storeartists');
            Route::get('/nouveaux', [App\Http\Controllers\AdminController::class, 'newartists'])->name('admin.newartists');
            Route::get('/restreints', [App\Http\Controllers\AdminController::class, 'restrictedartists'])->name('admin.restrictedartists');
            Route::get('/{id}/vue-globale', [App\Http\Controllers\AdminController::class, 'vueartist'])->name('admin.vueartist');
            Route::get('/{id}/valider', [App\Http\Controllers\AdminController::class, 'validateartist'])->name('admin.validateartist');
            Route::get('/{id}/susprendre', [App\Http\Controllers\AdminController::class, 'unvalidateartist'])->name('admin.unvalidateartist');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editartist'])->name('admin.editartist');
            Route::get('/{id}/restreindre', [App\Http\Controllers\AdminController::class, 'restrictartist'])->name('admin.restrictartist');
            Route::get('/{id}/enlever-restriction', [App\Http\Controllers\AdminController::class, 'unrestrictartist'])->name('admin.unrestrictartist');
            Route::delete('/{id}/destroyartist', [App\Http\Controllers\AdminController::class, 'destroyartist'])->name('admin.deleteartist');
        });

        Route::group(['prefix' => 'singles/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'singles'])->name('admin.singles');
            Route::get('/nouveaux', [App\Http\Controllers\AdminController::class, 'newsingles'])->name('admin.newsingles');
            Route::get('/restreints', [App\Http\Controllers\AdminController::class, 'restrictedsingles'])->name('admin.restrictedsingles');
            Route::get('/visibles', [App\Http\Controllers\AdminController::class, 'visiblessingles'])->name('admin.visiblessingles');
            Route::get('/masques', [App\Http\Controllers\AdminController::class, 'maskedsingles'])->name('admin.maskedsingles');

            Route::get('/{id}/valider', [App\Http\Controllers\AdminController::class, 'validatesingle'])->name('admin.validatesingle');
            Route::get('/{id}/invalider', [App\Http\Controllers\AdminController::class, 'unvalidatesingle'])->name('admin.unvalidatesingle');
            Route::get('/{id}/restreindre', [App\Http\Controllers\AdminController::class, 'restrictsingle'])->name('admin.restrictsingle');
            Route::get('/{id}/masquer', [App\Http\Controllers\AdminController::class, 'masksingle'])->name('admin.masksingle');
            Route::get('/{id}/demasquer', [App\Http\Controllers\AdminController::class, 'unmasksingle'])->name('admin.unmasksingle');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editsingle'])->name('admin.editsingle');
            Route::delete('/{id}/destroysingle', [App\Http\Controllers\AdminController::class, 'destroysingle'])->name('admin.deletesingle');
        });

        Route::group(['prefix' => 'albums/'], function () {

            Route::get('/', [App\Http\Controllers\AdminController::class, 'albums'])->name('admin.albums');
            Route::get('/nouveaux', [App\Http\Controllers\AdminController::class, 'newalbums'])->name('admin.newalbums');
            Route::get('/restreints', [App\Http\Controllers\AdminController::class, 'restrictedalbums'])->name('admin.restrictedalbums');
            Route::get('/visibles', [App\Http\Controllers\AdminController::class, 'visiblesalbums'])->name('admin.visiblesalbums');
            Route::get('/masques', [App\Http\Controllers\AdminController::class, 'maskedalbums'])->name('admin.maskedalbums');

            Route::get('/{id}/details', [App\Http\Controllers\AdminController::class, 'detailsalbum'])->name('admin.detailsalbum');
            Route::get('/{id}/valider', [App\Http\Controllers\AdminController::class, 'validatealbum'])->name('admin.validatealbum');
            Route::get('/{id}/invalider', [App\Http\Controllers\AdminController::class, 'unvalidatealbum'])->name('admin.unvalidatealbum');
            Route::get('/{id}/restreindre', [App\Http\Controllers\AdminController::class, 'restrictalbum'])->name('admin.restrictalbum');
            Route::get('/{id}/masquer', [App\Http\Controllers\AdminController::class, 'maskalbum'])->name('admin.maskalbum');
            Route::get('/{id}/demasquer', [App\Http\Controllers\AdminController::class, 'unmaskalbum'])->name('admin.unmaskalbum');
            Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editalbum'])->name('admin.editalbum');
            Route::delete('/{id}/destroyalbum', [App\Http\Controllers\AdminController::class, 'destroyalbum'])->name('admin.deletealbum');
        });

        Route::group(['prefix' => 'publications/'], function () {

            Route::group(['prefix' => 'evenements/'], function () {

                Route::get('/', [App\Http\Controllers\AdminController::class, 'listevents'])->name('admin.listevents');
                Route::get('/nouveau', [App\Http\Controllers\AdminController::class, 'newevents'])->name('admin.newevents');
                Route::post('/nouveau', [App\Http\Controllers\AdminController::class, 'storeevents'])->name('admin.storeevents');

                Route::get('/{id}/publier', [App\Http\Controllers\AdminController::class, 'publierevents'])->name('admin.publierevents');
                Route::get('/{id}/depublier', [App\Http\Controllers\AdminController::class, 'depublierevents'])->name('admin.depublierevents');

                Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editevents'])->name('admin.editevents');
                Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updateevents'])->name('admin.updateevents');
                Route::delete('/{id}/destroyevents', [App\Http\Controllers\AdminController::class, 'destroyevents'])->name('admin.deleteevents');


                Route::group(['prefix' => '{id}/billeterie'], function () {

                    Route::get('/', [App\Http\Controllers\AdminController::class, 'billeterieevents'])->name('admin.billeterieevents');
                    Route::post('/', [App\Http\Controllers\AdminController::class, 'storebilleterieevents'])->name('admin.storebilleterieevents');

                });
            });

            Route::group(['prefix' => 'actualites/'], function () {

                Route::get('/', [App\Http\Controllers\AdminController::class, 'listactus'])->name('admin.listactus');
                Route::get('/nouveau', [App\Http\Controllers\AdminController::class, 'newactus'])->name('admin.newactus');
                Route::post('/nouveau', [App\Http\Controllers\AdminController::class, 'storeactus'])->name('admin.storeactus');

                Route::get('/{id}/publier', [App\Http\Controllers\AdminController::class, 'publieractus'])->name('admin.publieractus');
                Route::get('/{id}/depublier', [App\Http\Controllers\AdminController::class, 'depublieractus'])->name('admin.depublieractus');

                Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editactus'])->name('admin.editactus');
                Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updateactus'])->name('admin.updateactus');
                Route::delete('/{id}/destroyactus', [App\Http\Controllers\AdminController::class, 'destroyactus'])->name('admin.deleteactus');
            });

            Route::group(['prefix' => 'lives/'], function () {

                Route::get('/', [App\Http\Controllers\AdminController::class, 'listlives'])->name('admin.listlives');
                Route::get('/nouveau', [App\Http\Controllers\AdminController::class, 'newlives'])->name('admin.newlives');
                Route::post('/nouveau', [App\Http\Controllers\AdminController::class, 'storelives'])->name('admin.storelives');

                Route::get('/{id}/publier', [App\Http\Controllers\AdminController::class, 'publierlives'])->name('admin.publierlives');
                Route::get('/{id}/depublier', [App\Http\Controllers\AdminController::class, 'depublierlives'])->name('admin.depublierlives');

                Route::get('/{id}/editer', [App\Http\Controllers\AdminController::class, 'editlives'])->name('admin.editlives');
                Route::post('/{id}/editer', [App\Http\Controllers\AdminController::class, 'updatelives'])->name('admin.updatelives');
                Route::delete('/{id}/destroylives', [App\Http\Controllers\AdminController::class, 'destroylives'])->name('admin.deletelives');

            });

        });

    });

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashbord', 'HomeController@index')->name('home');
