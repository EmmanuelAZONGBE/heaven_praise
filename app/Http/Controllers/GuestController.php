<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Genre;
use App\Models\Single;
use App\Models\Playlist;
use App\Models\Singlesplaylist;
use App\Models\Album;
use App\Models\Evenement;
use Illuminate\Support\Facades\Log;
use App\Models\Actualite;
use App\Models\Live;
use App\Models\Ecoute;
use App\Models\Pays;
use App\Models\Categorie;
use App\Models\Commande;
use App\Models\Evenementcommentaire;
use App\Models\Actualitecommentaire;
use App\Models\Ticketevenement;
use App\Models\Livraison;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\Inscriptionclient;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    //


    public function index()
    {
        // $cookie = cookie('user_name', 'John Doe', 60); // Name, Value, Minutes
        // $userName = request()->cookie('user_name');
        // return "User Name: $userName";

        $cartItems = ['item1', 'item2'];
        $serializedCart = serialize($cartItems);
        $cookie = cookie('cart_items', $serializedCart, 60);
        // Retrieving the data
        $unserializedCart = unserialize(request()->cookie('cart_items'));
        // dd(request()->cookie('serializedCart'));

        $date = date('Y-m-d');
        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get();
        $actus = Actualite::orderBy('id', 'Desc')
            ->where('publie', '1')
            ->get()->take(6);
        $newsingles = Single::orderBy('id', 'Desc')
            ->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')
            ->get()
            ->take(5);
        $recommandes = Album::InRandomOrder()->where('masque', 0)->where('statut', 'En Ligne')->where('recommanded', 1)->get()->take(12);
        $albums = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get()->take(5);
        $artistes = User::InRandomOrder()->where('role', 'Artiste')->where('valide', 'oui')->where('nomartiste', '!=', NULL)->where('description', '!=', NULL)->get()->take('10');
        $singles = Single::orderBy('id', 'Desc')->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $lives = Live::InRandomOrder()->where('publie', 1)->get();
        $evenements = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get()->take(6);

        $pays = Pays::InRandomOrder()->whereHas('actualite', function ($q) {
            $q->where('publie', 1);
        })->first();
        $actuspays = Actualite::where('pays_id', $pays->id)->where('publie', 1)->get()->take('3');
        $flashactus = Actualite::where('flash', 1)->orderBy('id', 'Desc')->get()->take(3);
        $flashevents = Evenement::where('flash', 1)->orderBy('id', 'Desc')->get()->take(3);
        $topcats = Categorie::InRandomOrder()
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
        $lastevent = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->first();
        $listlastevents = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get()->take('2');
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
            'slidescats'
        ));
    }
    public function addtoplaylist(Request $req)
    {
        if (!Auth::guest()) {
            if (empty($req->userplaylists) || ($req->userplaylists == "Nouveau")) {
                // Remplace les espaces par des tirets
                $slug = str_replace(' ', '-', $req->playlistname);
                // Tout mettre en minuscule
                $slug = strtolower($slug);
                // Enlever les accents
                $search = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
                //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
                $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

                $slug = str_replace($search, $replace, $slug);
                // Supprimer les caracteres spéciaux
                $slug = preg_replace("/[^A-Za-z0-9]/", "-", $slug);

                $slug = $slug . '' . Auth::user()->heavenid;
                Playlist::create([
                    'slug' => $slug,
                    'libelle' => $req->playlistname,
                    'user_id' => Auth::user()->id,
                ]);
                $find = Playlist::where('slug', $slug)->first();
                Singlesplaylist::create([
                    'single_id' => $req->singleid,
                    'playlist_id' => $find->id,
                ]);
            } else {
                $findplaylist = Playlist::where('slug', $req->userplaylists)->first();
                $test = Singlesplaylist::where('single_id', $req->singleid)->where('playlist_id', $findplaylist->id)->first();
                if (empty($test)) {
                    Singlesplaylist::create([
                        'single_id' => $req->singleid,
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
        $artistes = Live::where('user_id', '!=', NULL)->where('publie', 1)->get()->groupBy('user_id');
        // dd($artistes);
        $videos = Live::where('publie', 1)->get();
        return view('videos', compact('videos', 'artistes'));
    }

    public function premium()
    {
        return view('premium');
    }

    public function artistes()
    {

        $date = date('Y-m-d');
        $artistes = User::where('role', 'Artiste')
            ->where('valide', 'oui')
            ->where('nomartiste', '!=', NULL)
            ->where('description', '!=', NULL)
            ->with('singles')
            ->paginate('24');
        $genre = User::where('role', 'Artiste')->where('valide', 'oui')->where('nomartiste', '!=', NULL)->where('description', '!=', NULL)->get();
        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get();
        $albums = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get()->take(5);
        $singles = Single::orderBy('id', 'Desc')->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')->get();

        return view('artistes', compact('artistes', 'comingevents', 'albums', 'singles'));
    }

    public function detailsartistes($heavenid)
    {
        $artistes = User::where('heavenid', $heavenid)->first();
        $videos = Live::where('publie', 1)->where('user_id', $artistes->id)->get();
        $singles = Single::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $albums = Album::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('masque', 0)->where('statut', 'En Ligne')->get();
        $derniersalbums = Album::orderBy('id', 'Desc')->where('user_id', $artistes->id)->where('masque', 0)->where('statut', 'En Ligne')->get()->take(6);
        // Calculer la somme des écoutes de tous les singles de cet artiste
        $totalEcoutes = Ecoute::whereIn('single_id', $singles->pluck('id'))->sum('nombre_ecoutes');


        return view('detailsartistes', compact('artistes', 'singles', 'albums', 'derniersalbums', 'videos', 'totalEcoutes'));
    }


    public function ecouterChanson(Request $request)
    {
        if (!auth()->check()) {
            return response()->json(['message' => 'Vous devez être connecté pour écouter cette chanson.'], 401);
        }

        $validated = $request->validate([
            'single_id' => 'required|integer|exists:singles,id',
        ]);

        // Log pour vérifier l'ID reçu
        Log::info('ID de la chanson reçu:', ['single_id' => $validated['single_id']]);

        // Incrémentation directe sans récupérer l'enregistrement
        Ecoute::updateOrCreate(
            ['single_id' => $validated['single_id']],
            ['nombre_ecoutes' => DB::raw('nombre_ecoutes + 1')]
        );

        // Récupérer le nombre d'écoutes mis à jour
        $nombreEcoutes = Ecoute::where('single_id', $validated['single_id'])->value('nombre_ecoutes');

        // Log pour vérifier la valeur récupérée
        Log::info('Nombre d\'écoutes récupéré:', ['nombre_ecoutes' => $nombreEcoutes]);

        if ($nombreEcoutes === null) {
            // Log ou gestion d'erreur si la valeur est null
            Log::error('Erreur: Nombre d\'écoutes est null pour single_id:', ['single_id' => $validated['single_id']]);
            return response()->json(['success' => false, 'message' => 'Erreur lors de la récupération du nombre d\'écoutes.'], 500);
        }

        // Retourne une réponse JSON pour indiquer le succès
        return response()->json(['success' => true, 'nombre_ecoutes' => $nombreEcoutes]);
    }



    public function evenements()
    {
        $evenements = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get();
        return view('evenements', compact('evenements'));
    }

    public function detailsevenements($slug)
    {
        $find = Evenement::where('slug', $slug)->first();
        $connexes = Evenement::where('categorie_id', $find->categorie_id)->where('id', "!=", $find->id)
            ->where('statut', 'Publié')
            ->orderBy('id', 'desc')->get()->take(3);
        $lastactus = Actualite::orderBy('id', 'Desc')->where('publie', '1')->get();
        $tickets = Ticketevenement::where('evenement_id', $find->id)->where('disponible', 1)->get();
        $comments = Evenementcommentaire::where('evenement_id', $find->id)->orderBy('id', 'Desc')->get();

        return view('detailsevenements', compact('find', 'lastactus', 'connexes', 'comments', 'tickets'));
    }

    public function storecommentevent(Request $req, $slug)
    {
        $find = Evenement::where('slug', $slug)->first();
        Evenementcommentaire::create([
            "nom" => $req->nom,
            "email" => $req->email,
            "commentaire" => $req->commentaire,
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
        $photo = $req->avatar;
        $imgname = "invite" . '.' . $photo->getClientOriginalExtension();
        $img = Image::make($photo)->resize(1500, 1500)->save(public_path($imgname));
        // On charge d'abord les images
        $source = imagecreatefrompng(public_path('../bg.png')); // Le logo est la source
        $destination = imagecreatefromjpeg(public_path($imgname)); // La photo est la destination

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

        $find = Actualite::where('slug', $slug)->first();
        $connexes = Actualite::where('categorie_id', $find->categorie_id)->where('id', "!=", $find->id)
            ->where('publie', '1')
            ->orderBy('id', 'desc')->get()->take(3);
        $lastevents = Evenement::orderBy('id', 'Desc')->where('statut', 'Publié')->get();
        $comments = Actualitecommentaire::where('actualite_id', $find->id)->orderBy('id', 'Desc')->get();
        return view('detailsactualites', compact('find', 'connexes', 'lastevents', 'comments'));
    }

    public function singles()
    {
        $singles = Single::orderBy('id', 'Desc')
            ->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')
            ->get();
        $genres = Genre::get();
        return view('singles', compact('singles', 'genres'));
    }

    public function albums()
    {
        $date = date('Y-m-d');
        $albums = Album::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->paginate('12');

        $comingevents = Evenement::orderBy('id', 'Desc')
            ->where('statut', 'Publié')
            ->Where('date', '>=', $date)
            ->get()
            ->take(2);
        $newsingles = Single::orderBy('id', 'Desc')
            ->where('album_id', NULL)->where('masque', 0)->where('statut', 'En Ligne')
            ->get()
            ->take(5);
        return view('albums', compact('albums', 'comingevents', 'newsingles'));
    }

    public function detailsalbums($slug)
    {
        $album = Album::where('slug', $slug)->first();
        $autresalbums = Album::orderBy('id', 'Desc')->where('id', '!=', $album->id)->where('masque', 0)->where('statut', 'En Ligne')->get()->take('4');
        $singles = Single::where('album_id', $album->id)->where('masque', 0)->where('statut', 'En Ligne')->get();
        // Récupérer l'artiste associé à l'album
        $artistes = $album->User; // Assuming the relationship is 'User'
        return view('detailsalbums', compact('album', 'singles', 'autresalbums', 'artistes'));
    }

    public function checkoutlogin(Request $request)
    {
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $login = $request->email;
        $user = User::where('email', $login)->first();

        if (!$user) {
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
        $event = Evenement::where('slug', $slug)->first();
        $commandes = Commande::where('session_id', Session::get('session_id'))->get();
        if (sizeof($commandes) == 0) {
            return redirect()->route('detailsevenements', ['slug' => $slug]);
        }
        return view('checkout', compact('event', 'commandes'));
    }

    public function storecheckout(Request $req, $slug)
    {
        $this->validate($req, [
            'nom' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'notes' => 'nullable',
            'adresse' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
        ]);

        // Si le client n'est pas connecté
        if (Auth::guest()) {
            // Tester si le mail est deja enregistré
            $testuser = User::where('email', $req->email)->first();
            if (empty($testuser)) {
                // Creer l'ulitisateur avec un mot de passe aléatoire
                // Generer le mot de passe
                $characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
                $password = '';
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
                    'heavenid' => $heavenid,
                    'nom' => $req->nom,
                    'sessionid' => Session::get('session_id'),
                    'email' => $req->email,
                    'role' => "Auditeur",
                    'telephone' => $req->telephone,
                    'password' => bcrypt($password),
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
                    'adresse' => $req->adresse,
                    'ville' => $req->ville,
                    'quartier' => $req->quartier,
                    'user_id' => $user->id,
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
                    'adresse' => $req->adresse,
                    'ville' => $req->ville,
                    'quartier' => $req->quartier,
                    'user_id' => Auth::user()->id,
                ]);
                $adresse = Livraison::where('user_id', Auth::user()->id)->first();
            } else {
                $adresse->update([
                    'adresse' => $req->adresse,
                    'ville' => $req->ville,
                    'quartier' => $req->quartier
                ]);
            }
            $user = Auth::user();
        }
        // Mettre à jour les infos des commandes
        $commandes = Commande::where('session_id', Session::get('session_id'))->update([
            'commentaire' => $req->notes,
            'user_id' => $user->id,
            'livraison_id' => $adresse->id,
        ]);

        return redirect()->route('paywithfedapay', ['slug' => $slug]);

    }

    public function checkoutoverview($slug)
    {
        $event = Evenement::where('slug', $slug)->first();
        $commandes = Commande::where('session_id', Session::get('session_id'))->get();
        if (empty($commandes)) {
            return redirect()->route('detailsevenements', ['slug' => $slug]);
        }

        return view('checkoutoverview', compact('event', 'commandes'));
    }

    public function ordercompleted($slug, $sessionid)
    {
        $event = Evenement::where('slug', $slug)->first();
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
        $i = 0;
        $total = 0;
        foreach ($req->ticket as $ticket) {
            $total = $total + $req->qte[$i];
            $i = $i + 1;
        }

        // Retourner une erruer si vide
        if ($total == 0) {

            return redirect()->route('detailsevenements', ['slug' => $slug])->with('error', '<strong>Aucun Ticket séléctionné!</strong><br> Veuilez définir les quantités et réessayer svp. ');
        }

        // Si Commande existante, Génerer une ID SESSION
        $hash = Str::random(6);
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
                $montant = $req->ticket[$i] * $req->qte[$i];
                Commande::create([
                    'reference' => $ref,
                    'session_id' => Session::get('session_id'),
                    'modedepaiement' => "",
                    'prix' => $findticket->prix,
                    'qte' => $req->qte[$i],
                    'montant' => $findticket->prix * $req->qte[$i],
                    'ticketevenement_id' => $req->ticket[$i],
                    'evenement_id' => $event->id,
                ]);
            }
            $i = $i + 1;
        }
        return redirect()->route('checkout', ['slug' => $slug]);
    }
}
