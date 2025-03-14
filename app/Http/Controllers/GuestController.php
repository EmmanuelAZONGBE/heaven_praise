<?php
namespace App\Http\Controllers;

use App\Mail\Inscriptionclient;
use App\Models\Actualite;
use App\Models\Actualitecommentaire;
use App\Models\Aime;
use App\Models\Album;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Ecoute;
use App\Models\Evenement;
use App\Models\Evenementcommentaire;
use App\Models\Genre;
use App\Models\Live;
use App\Models\Livraison;
use App\Models\Pays;
use App\Models\Playlist;
use App\Models\Single;
use App\Models\Singlesplaylist;
use App\Models\Ticketevenement;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class GuestController extends Controller
{
    //

    public function index()
    {
        // $cookie = cookie('user_name', 'John Doe', 60); // Name, Value, Minutes
        // $userName = request()->cookie('user_name');
        // return "User Name: $userName";

        $cartItems      = ['item1', 'item2'];
        $serializedCart = serialize($cartItems);
        $cookie         = cookie('cart_items', $serializedCart, 60);
        // Retrieving the data
        $unserializedCart = unserialize(request()->cookie('cart_items'));
        // dd(request()->cookie('serializedCart'));

        $date         = date('Y-m-d');
        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get();
        $actus = Actualite::orderBy('id', 'Desc')
            ->where('publie', '1')
            ->get()->take(6);
        $newsingles = Single::orderBy('id', 'Desc')
            ->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')
            ->get()
            ->take(5);
        $recommandes = Album::InRandomOrder()->where('masque', 0)->where('statut', 'En Ligne')->where('recommanded', 1)->get()->take(12);
        $albums      = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get()->take(5);
        $artistes    = User::InRandomOrder()->where('role', 'Artiste')->where('valide', 'oui')->where('nomartiste', '!=', null)->where('description', '!=', null)->get()->take('10');
        $singles     = Single::orderBy('id', 'Desc')->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $lives       = Live::InRandomOrder()->where('publie', 1)->get();
        $evenements  = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get()->take(6);

        $pays = Pays::InRandomOrder()->whereHas('actualite', function ($q) {
            $q->where('publie', 1);
        })->first();
        $actuspays   = Actualite::where('pays_id', $pays->id)->where('publie', 1)->get()->take('3');
        $flashactus  = Actualite::where('flash', 1)->orderBy('id', 'Desc')->get()->take(3);
        $flashevents = Evenement::where('flash', 1)->orderBy('id', 'Desc')->get()->take(3);
        $topcats     = Categorie::InRandomOrder()
            ->whereHas(
                'actualite',
                function ($q) {
                    $q->where('publie', 1);
                }
            )
            ->has('evenement')
            ->get()
            ->take(3);
        $slidescats = Categorie::InRandomOrder()
            ->whereHas(
                'actualite',
                function ($q) {
                    $q->where('publie', 1);
                }
            )

            ->get()
            ->take(4);
        $lastevent      = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->first();
        $listlastevents = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get()->take('2');

        // Top chansons de la semaine
        $topSongsThisWeek = Single::select('singles.*', 'users.nomartiste')
            ->selectSub(function ($query) {
                $query->from('ecoutes')
                    ->whereColumn('ecoutes.single_id', 'singles.id')
                    ->where('ecoutes.created_at', '>=', Carbon::now()->startOfWeek())
                    ->groupBy('ecoutes.single_id')              // Pour éviter les doublons et bien compter les écoutes
                    ->selectRaw('SUM(ecoutes.nombre_ecoutes)'); // Somme des écoutes pour chaque chanson
            }, 'ecoutes_count')
            ->leftJoin('users', 'users.heavenid', '=', 'singles.user_id') // Jointure avec la table users
            ->orderBy('ecoutes_count', 'desc')
            ->take(8) // Sélectionner 8 meilleurs
            ->get();

        $recommendedSongs = DB::select("
        SELECT * FROM `singles`
        WHERE `is_recommended` = 1
          AND `masque` = 0
          AND `statut` = 'En Ligne'
          AND NOT EXISTS (
              SELECT * FROM `ecoutes`
              WHERE `singles`.`id` = `ecoutes`.`single_id`
          )
        ORDER BY `id` DESC
        LIMIT 8
        ");

        // Convertir les résultats en collection et charger les informations de l'artiste
        $recommendedSongs = collect($recommendedSongs)->map(function ($single) {
            $single->User = User::find($single->user_id); // Charger l'artiste via l'ID de l'utilisateur
            return $single;
        });

        return view('welcome', compact(
            'comingevents',
            'artistes',
            'actus',
            'albums',
            'singles',
            'newsingles',
            'recommandes',
            'lives',
            'evenements',
            'pays',
            'actuspays',
            'flashactus',
            'flashevents',
            'topcats',
            'lastevent',
            'listlastevents',
            'slidescats',
            'topSongsThisWeek', // Ajouter les chansons top de la semaine
            'recommendedSongs'  // Ajouter les chansons recommandées
        ));
    }

    public function addtoplaylist(Request $req)
    {
        if (! Auth::guest()) {
            if (empty($req->userplaylists) || ($req->userplaylists == "Nouveau")) {
                // Remplace les espaces par des tirets
                $slug = str_replace(' ', '-', $req->playlistname);
                // Tout mettre en minuscule
                $slug = strtolower($slug);
                // Enlever les accents
                $search = ['À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ'];
                //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
                $replace = ['A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y'];

                $slug = str_replace($search, $replace, $slug);
                // Supprimer les caracteres spéciaux
                $slug = preg_replace("/[^A-Za-z0-9]/", "-", $slug);

                $slug = $slug . '' . Auth::user()->heavenid;
                Playlist::create([
                    'slug'    => $slug,
                    'libelle' => $req->playlistname,
                    'user_id' => Auth::user()->id,
                ]);
                $find = Playlist::where('slug', $slug)->first();
                Singlesplaylist::create([
                    'single_id'   => $req->singleid,
                    'playlist_id' => $find->id,
                ]);
            } else {
                $findplaylist = Playlist::where('slug', $req->userplaylists)->first();
                $test         = Singlesplaylist::where('single_id', $req->singleid)->where('playlist_id', $findplaylist->id)->first();
                if (empty($test)) {
                    Singlesplaylist::create([
                        'single_id'   => $req->singleid,
                        'playlist_id' => $findplaylist->id,
                    ]);
                }
                $find = Single::find($req->singleid);
                return redirect()->back()->with('success', 'Le titre <strong>"' . $find->titre . '"</strong> a été ajouté à votre playlist!');
            }
            $find = Single::find($req->singleid);
            return redirect()->back()->with('success', 'Le titre <strong>"' . $find->titre . '"</strong> a été ajouté à votre playlist!');
        }
        return redirect()->route('login');
    }

    public function about()
    {
        return view('about');
    }

    public function videos()
    {
        $artistes = Live::where('user_id', '!=', null)->where('publie', 1)->get()->groupBy('user_id');
        // dd($artistes);
        $videos = Live::where('publie', 1)->get();
        return view('videos', compact('videos', 'artistes'));
    }

    public function plan()
    {
        return view('plan');
    }

    public function artistes()
    {

        $date     = date('Y-m-d');
        $artistes = User::where('role', 'Artiste')
            ->where('valide', 'oui')
            ->where('nomartiste', '!=', null)
            ->where('description', '!=', null)
            ->with('singles')
            ->paginate('24');
        $genre        = User::where('role', 'Artiste')->where('valide', 'oui')->where('nomartiste', '!=', null)->where('description', '!=', null)->get();
        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get();
        $albums  = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get()->take(5);
        $singles = Single::orderBy('id', 'Desc')->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')->get();

        return view('artistes', compact('artistes', 'comingevents', 'albums', 'singles'));
    }

    public function detailsartistes($heavenid)
    {
        // Récupérer l'utilisateur connecté
        $user           = Auth::user();
        $artistes       = User::where('heavenid', $heavenid)->first();
        $videos         = Live::where('publie', 1)->where('user_id', $artistes->id)->get();
        $singles        = Single::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $albums         = Album::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $derniersalbums = Album::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('masque', 0)->where('statut', 'En Ligne')->get()->take(6);
        // Calculer la somme des écoutes de tous les singles de cet artiste
        $totalEcoutes = Ecoute::whereIn('single_id', $singles->pluck('id'))->sum('nombre_ecoutes');
        // Récupérer le total des clics pour cet utilisateur
        $totalClicks = Ecoute::whereIn('single_id', $singles->pluck('id'))->sum('nombre_clicks');
        return view('detailsartistes', compact('artistes', 'singles', 'albums', 'derniersalbums', 'videos', 'totalEcoutes', 'totalClicks'));
    }

    public function toggleLike(Request $request)
    {
        if (! auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Vous devez être connecté pour aimer une chanson.',
            ], 403);
        }

        $singleId = $request->input('single_id');
        $userId   = auth()->id(); // Récupère l'ID de l'utilisateur connecté

        // Vérifier si l'utilisateur a déjà aimé cette chanson
        $existingLike = Aime::where('user_id', $userId)
            ->where('single_id', $singleId)
            ->first();

        if ($existingLike) {
            // Supprimer le like existant
            $existingLike->delete();
            $message = "Vous n'aimez plus cette chanson.";
        } else {
            // Ajouter un nouveau like
            Aime::create([
                'user_id'   => $userId,
                'single_id' => $singleId,
            ]);
            $message = "Vous avez aimé cette chanson !";
        }

        // Recalculer le nombre total de likes
        $nombreAimes = Aime::where('single_id', $singleId)->count();

        return response()->json([
            'success'      => true,
            'message'      => $message,
            'nombre_aimes' => $nombreAimes,
        ]);
    }

    public function ecouterChanson(Request $request)
    {
        if (! auth()->check()) {
            return response()->json(['message' => 'Vous devez être connecté pour écouter cette chanson.'], 401);
        }

        $validated = $request->validate([
            'single_id' => 'required|integer|exists:singles,id',
            'action'    => 'required|string|in:click,ecoute', // Identifier si c'est un clic ou une écoute complète
        ]);

        Log::info('Action reçue :', [
            'single_id' => $validated['single_id'],
            'action'    => $validated['action'],
        ]);

        // Mise à jour selon l'action (clic ou écoute)
        if ($validated['action'] === 'click') {
            // Incrémentation des clics uniquement
            Ecoute::updateOrCreate(
                ['single_id' => $validated['single_id']],
                ['nombre_clicks' => DB::raw('COALESCE(nombre_clicks, 0) + 1')]
            );
        } elseif ($validated['action'] === 'ecoute') {
            // Incrémentation des écoutes uniquement
            Ecoute::updateOrCreate(
                ['single_id' => $validated['single_id']],
                ['nombre_ecoutes' => DB::raw('COALESCE(nombre_ecoutes, 0) + 1')]
            );
        }

        // Récupérer les valeurs mises à jour
        $nombreEcoutes = Ecoute::where('single_id', $validated['single_id'])->value('nombre_ecoutes');
        $nombreClicks  = Ecoute::where('single_id', $validated['single_id'])->value('nombre_clicks');

        Log::info('Mise à jour réussie :', [
            'single_id'      => $validated['single_id'],
            'nombre_ecoutes' => $nombreEcoutes,
            'nombre_clicks'  => $nombreClicks,
        ]);

        return response()->json([
            'success'        => true,
            'nombre_ecoutes' => $nombreEcoutes,
            'nombre_clicks'  => $nombreClicks,
        ]);
    }

    public function plans()
    {
        return view('plans');
    }

    public function details_basique()
    {
        return view('details_basique');
    }

    public function details_standard()
    {
        return view('details_standard');
    }

    public function details_premiun()
    {
        return view('details_premiun');
    }

    public function evenements()
    {
        $evenements = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get();
        return view('evenements', compact('evenements'));
    }

    public function detailsevenements($slug)
    {
        $find     = Evenement::where('slug', $slug)->first();
        $connexes = Evenement::where('categorie_id', $find->categorie_id)->where('id', "!=", $find->id)
            ->where('statut', 'Publié')
            ->orderBy('id', 'desc')->get()->take(3);
        $lastactus = Actualite::orderBy('id', 'Desc')->where('publie', '1')->get();
        $tickets   = Ticketevenement::where('evenement_id', $find->id)->where('disponible', 1)->get();
        $comments  = Evenementcommentaire::where('evenement_id', $find->id)->orderBy('id', 'Desc')->get();

        return view('detailsevenements', compact('find', 'lastactus', 'connexes', 'comments', 'tickets'));
    }

    public function storecommentevent(Request $req, $slug)
    {
        $find = Evenement::where('slug', $slug)->first();
        Evenementcommentaire::create([
            "nom"          => $req->nom,
            "email"        => $req->email,
            "commentaire"  => $req->commentaire,
            "evenement_id" => $find->id,
        ]);
        return redirect()->back();
    }

    public function badgeevenements($slug)
    {
        $find = Evenement::where('slug', $slug)->first();
        return view('badgeevenements', compact('find'));
    }

    public function generatebadgeevenements(Request $req)
    {
        $photo   = $req->avatar;
        $imgname = "invite" . '.' . $photo->getClientOriginalExtension();
        $img     = Image::make($photo)->resize(1500, 1500)->save(public_path($imgname));
                                                                     // On charge d'abord les images
        $source      = imagecreatefrompng(public_path('../bg.png')); // Le logo est la source
        $destination = imagecreatefromjpeg(public_path($imgname));   // La photo est la destination

        $img_canvas = Image::canvas(2362, 2362);
        $img_canvas->insert(public_path($imgname), 'bottom-left', 500, 420);
        $img_canvas->insert(public_path('../bg.png')); // add offset
        $img_canvas->save('Badge.png', 100);

        return response()->download(public_path('../Badge.png'));
        return redirect()->back()->with('success', 'Votre Badge a été généré et téléchargé avec succès!');
    }

    public function actualites()
    {
        $actualites = Actualite::orderBy('id', 'Desc')->where('publie', 1)->get();
        return view('actualites', compact('actualites'));
    }

    public function detailsactualites($slug)
    {

        $find     = Actualite::where('slug', $slug)->first();
        $connexes = Actualite::where('categorie_id', $find->categorie_id)->where('id', "!=", $find->id)
            ->where('publie', '1')
            ->orderBy('id', 'desc')->get()->take(3);
        $lastevents = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get();
        $comments   = Actualitecommentaire::where('actualite_id', $find->id)->orderBy('id', 'Desc')->get();
        return view('detailsactualites', compact('find', 'connexes', 'lastevents', 'comments'));
    }

    public function singles()
    {
        $singles = Single::orderBy('id', 'Desc')
            ->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')
            ->get();
        $genres = Genre::get();
        return view('singles', compact('singles', 'genres'));
    }

    public function albums()
    {
        $date   = date('Y-m-d');
        $albums = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->paginate('12');

        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get()
            ->take(2);
        $newsingles = Single::orderBy('id', 'Desc')
            ->where('album_id', null)->where('masque', 0)->where('statut', 'En Ligne')
            ->get()
            ->take(5);
        return view('albums', compact('albums', 'comingevents', 'newsingles'));
    }

    public function detailsalbums($slug)
    {
        $album        = Album::where('slug', $slug)->first();
        $autresalbums = Album::orderBy('id', 'Desc')->where('id', '!=', $album->id)->where('masque', 0)->where('statut', 'En Ligne')->get()->take('4');
        $singles      = Single::where('album_id', $album->id)->where('masque', 0)->where('statut', 'En Ligne')->get();
                                  // Récupérer l'artiste associé à l'album
        $artistes = $album->User; // Assuming the relationship is 'User'
        return view('detailsalbums', compact('album', 'singles', 'autresalbums', 'artistes'));
    }



    public function checkoutlogin(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $login = $request->email;
        $user  = User::where('email', $login)->first();

        if (! $user) {
            return redirect()->back()->with('error', '<strong>Oups!</strong><br> Identifiants de connexion invalides. ');
        }

        $request->validate([
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            Auth::loginUsingId($user->id);
            return redirect()->back()->with('success', '<strong>Bravo!</strong><br> Vous êtes maintenant connecté en temps que <strong> ' . $user->nom . ' </strong>.');
        } else {
            return redirect()->back()->with('error', '<strong>Oups!</strong><br> Identifiants de connexion invalides. ');
        }
        return redirect()->back();
    }

    public function checkout($slug)
    {
        $event     = Evenement::where('slug', $slug)->first();
        $commandes = Commande::where('session_id', Session::get('session_id'))->get();
        if (sizeof($commandes) == 0) {
            return redirect()->route('detailsevenements', ['slug' => $slug]);
        }
        return view('checkout', compact('event', 'commandes'));
    }

    public function storecheckout(Request $req, $slug)
    {
        $this->validate($req, [
            'nom'       => 'required',
            'email'     => 'required',
            'telephone' => 'required',
            'notes'     => 'nullable',
            'adresse'   => 'required',
            'ville'     => 'required',
            'quartier'  => 'required',
        ]);

        // Si le client n'est pas connecté
        if (Auth::guest()) {
            // Tester si le mail est deja enregistré
            $testuser = User::where('email', $req->email)->first();
            if (empty($testuser)) {
                // Creer l'ulitisateur avec un mot de passe aléatoire
                // Generer le mot de passe
                $characters = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
                $password   = '';
                for ($i = 0; $i < 16; $i++) {
                    $password .= ($i % 2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
                }
                $getheavenid = User::orderBy('id', 'Desc')->first();
                if (empty($getheavenid)) {
                    $heavenid = 1;
                } else {
                    $heavenid = $getheavenid->heavenid + 1;
                }

                User::create([
                    'heavenid'  => $heavenid,
                    'nom'       => $req->nom,
                    'sessionid' => Session::get('session_id'),
                    'email'     => $req->email,
                    'role'      => "Auditeur",
                    'telephone' => $req->telephone,
                    'password'  => bcrypt($password),
                ]);

                $title = "Création de votre compte Heavenly Praise";
                $sujet = "Création de votre compte Heavenly Praise";

                $role = "Auditeur";
                Mail::to($req->email)
                    ->send(new Inscriptionclient($req->all(), $role, $password));

                // récuperer l'utilisateur
                $user = User::where('sessionid', Session::get('session_id'))->first();

                // Enregistrer l'adresse de livraison
                Livraison::create([
                    'adresse'  => $req->adresse,
                    'ville'    => $req->ville,
                    'quartier' => $req->quartier,
                    'user_id'  => $user->id,
                ]);
            } else {
                return redirect()->back()->with('error', '<strong>Oups!</strong><br> Votre adresse email est déjà enregistré chez nous comme utilisateur. ');
            }
            $adresse = Livraison::where('user_id', $user->id)->first();
        } else {

            // tester l'adresse de livraison
            $adresse = Livraison::where('user_id', Auth::user()->id)->first();
            if (empty($adresse)) {
                Livraison::create([
                    'adresse'  => $req->adresse,
                    'ville'    => $req->ville,
                    'quartier' => $req->quartier,
                    'user_id'  => Auth::user()->id,
                ]);
                $adresse = Livraison::where('user_id', Auth::user()->id)->first();
            } else {
                $adresse->update([
                    'adresse'  => $req->adresse,
                    'ville'    => $req->ville,
                    'quartier' => $req->quartier,
                ]);
            }
            $user = Auth::user();
        }
        // Mettre à jour les infos des commandes
        $commandes = Commande::where('session_id', Session::get('session_id'))->update([
            'commentaire'  => $req->notes,
            'user_id'      => $user->id,
            'livraison_id' => $adresse->id,
        ]);

        return redirect()->route('paywithfedapay', ['slug' => $slug]);

    }

    public function checkoutoverview($slug)
    {
        $event     = Evenement::where('slug', $slug)->first();
        $commandes = Commande::where('session_id', Session::get('session_id'))->get();
        if (empty($commandes)) {
            return redirect()->route('detailsevenements', ['slug' => $slug]);
        }

        return view('checkoutoverview', compact('event', 'commandes'));
    }

    public function ordercompleted($slug, $sessionid)
    {
        $event    = Evenement::where('slug', $slug)->first();
        $commande = Commande::where('evenement_id', $event->id)->where('session_id', $sessionid)->first();
        if ($commande->paye != 1) {
            return redirect()->route('detailsevenements', ['slug' => $slug])->with('error', '<strong>Oups!</strong><br> Une erreur est survenue lors du paiement de vos tickets ');
        }
        return view('ordercompleted', compact('slug', 'sessionid', 'commande', 'event'));
    }

    public function storecommande(Request $req, $slug)
    {

        $event = Evenement::where('slug', $slug)->first();
        // Verifier si la commande est vide
        $i     = 0;
        $total = 0;
        foreach ($req->ticket as $ticket) {
            $total = $total + $req->qte[$i];
            $i     = $i + 1;
        }

        // Retourner une erruer si vide
        if ($total == 0) {

            return redirect()->route('detailsevenements', ['slug' => $slug])->with('error', '<strong>Aucun Ticket séléctionné!</strong><br> Veuilez définir les quantités et réessayer svp. ');
        }

        // Si Commande existante, Génerer une ID SESSION
        $hash       = Str::random(6);
        $Session_id = time() . $hash;
        Session::forget('session_id');
        Session::put('session_id', $Session_id);

        // Generer une référence commande
        $lastref = Commande::orderBy('id', 'Desc')->first();
        if (is_null($lastref)) {
            $ref = 1;
        } else {
            $ref = $lastref->reference + 1;
        }

        // Enregistrer les commandes
        $i = 0;
        foreach ($req->ticket as $ticket) {
            if ($req->qte[$i] > 0) {

                $findticket = Ticketevenement::find($req->ticket[$i]);
                $montant    = $req->ticket[$i] * $req->qte[$i];
                Commande::create([
                    'reference'          => $ref,
                    'session_id'         => Session::get('session_id'),
                    'modedepaiement'     => "",
                    'prix'               => $findticket->prix,
                    'qte'                => $req->qte[$i],
                    'montant'            => $findticket->prix * $req->qte[$i],
                    'ticketevenement_id' => $req->ticket[$i],
                    'evenement_id'       => $event->id,
                ]);
            }
            $i = $i + 1;
        }
        return redirect()->route('checkout', ['slug' => $slug]);
    }
}
