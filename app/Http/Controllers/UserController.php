<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use App\Models\User;
use App\Models\Ecoute;
use App\Models\Genre;
use App\Models\Single;
use App\Models\Album;
use App\Models\Communaute;
use App\Models\Paroisse;
use App\Models\Playlist;
use App\Models\Pays;
use App\Models\Commande;
use App\Models\Ticketevenement;
use App\Models\Evenement;
use App\Models\Livraison;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user(); // Récupérer l'utilisateur connecté

        // Récupérer les IDs des singles de l'utilisateur
        $singles = Single::where('user_id', $user->id)->pluck('id');

        // Calculer la somme des écoutes de tous ses singles
        $totalEcoutes = Ecoute::whereIn('single_id', $singles)->sum('nombre_ecoutes');
        $totalClicks = Ecoute::whereIn('single_id', $singles)->sum('nombre_clicks');
        return view('user.dashboard', compact( 'totalEcoutes','totalClicks'));
    }

    public function tracks()
    {
        return view('user.tracks');
    }

    public function playlists()
    {
        $playlists = Playlist::orderBy('id', 'Desc')->where('user_id', Auth::user()->id)->get();
        return view('user.playlists', compact('playlists'));
    }

    public function likes()
    {
        $user = auth()->user()->load('singles.aimes');
        return view('user.likes', compact('user'));
    }

    public function souscriptions()
    {
        return view('user.souscriptions');
    }

    public function telechargements()
    {
        return view('user.telechargements');
    }

    public function parametres()
    {
        $paroisses = Paroisse::get();
        $communautes = Communaute::get();
        $pays = Pays::get();
        return view('user.parametres', compact('paroisses', 'communautes'));
    }

    public function updateprofil(Request $req)
    {
        $id = Auth::user()->id;
        $find = User::find($id);

        $this->validate($req, [
            'nom' => 'required|string|max:255',
            'pays' => 'required',
            'email' => 'required|string|unique:users,email,' . $find->id,
            'telephone' => 'required|string|unique:users,telephone,' . $find->id,
            'avatar' => 'nullable|mimes:svg,png,jpg,jpeg|dimensions:width=500,height=500',
        ]);
        if (!empty($req->avatar)) {
            $photo = $req->avatar;
            $imgname = time() . "1" . '.' . $photo->getClientOriginalExtension();
            $img = Image::make($photo)->save(public_path('usx_files/avatars/' . $imgname));
            User::where('id', $id)->update([
                'avatar' => $imgname,
            ]);
        }
        User::where('id', $id)->update([
            'nom' => $req->nom,
            'email' => $req->email,
            'telephone' => $req->telephone,
            'pays_id' => $req->pays,
        ]);
        return redirect()->back()->with('success', 'Vos informations ont été modifiées avec succès!');
    }

    public function updatepassword(Request $req)
    {
        $this->validate($req, [
            'ancien_mot_de_passe' => ['required'],
            'nouveau_mot_de_passe' => ['required', 'string', 'min:8', 'confirmed']
        ]);
        $user = User::find(Auth::user()->id);
        $hashedPassword = $user->password;

        if (Hash::check($req->ancien_mot_de_passe, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($req->nouveau_mot_de_passe)
            ])->save();

            return redirect()->back()->with('success', 'Mot de passe modifié avec succès!');
        }

        return redirect()->back()->with('error', 'L\'ancien mot de passe ne correspond pas!');
    }
    public function updateartist(Request $req)
    {
        $this->validate($req, [
            'nom_d_artiste' => ['required'],
            'communaute' => ['required', 'string'],
            'paroisse' => ['required', 'string'],
            'presentation' => ['required'],
        ]);
        User::where('id', Auth::user()->id)->update([
            'nomartiste' => $req->nom_d_artiste,
            'communaute_id' => $req->communaute,
            'paroisse_id' => $req->paroisse,
            'description' => $req->presentation,
        ]);
        return redirect()->back()->with('success', 'Vos informations ont été modifiées avec succès!');
    }

    public function singles()
    {
        $genres = Genre::orderBy('libelle', 'Asc')->get();
        $singles = Single::orderBy('id', 'Desc')->where('user_id', Auth::user()->id)->where('album_id', NULL)->get();
        return view('user.singles', compact('genres', 'singles'));
    }

    public function masksingles($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'masque' => 1,
        ]);
        return redirect()->back()->with('success', 'Votre single <strong>' . $find->titre . ' </strong> a été masqué sur Heavenly Praise!');
    }

    public function unmasksingles($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'masque' => 0,
        ]);
        return redirect()->back()->with('success', 'Votre single <strong>' . $find->titre . ' </strong> est désormais disponible sur Heavenly Praise!');
    }

    public function storesingles(Request $req)
    {
        // dd($req->all());
        $this->validate($req, [
            'cover' => 'required|mimes:svg,png,jpg,jpeg|dimensions:width=500,height=500',
            'genre' => 'required|string|max:255',
            //'fichier_audio' =>  'required|mimes:mp3|max:10240',
            'titre' => 'required|string|unique:singles',
        ]);

        $time = time();
        $photo = $req->cover;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img = Image::make($photo)->save(public_path('usx_files/covers/' . $imgname));

        $song = $req->fichier_audio;
        $songname = $req->titre . "-" . $time . '.' . $song->getClientOriginalExtension();
        $song->move(public_path('usx_files/songs/'), $songname);


        Single::create([
            'titre' => $req->titre,
            'cover' => $imgname,
            'audio' => $songname,
            'genre_id' => $req->genre,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', '<strong>Votre single a été envoyé avec succès!</strong><br>Vous serez notifié une fois qu\'il sera publié par les administrateurs.');


    }

    public function tickets()
    {
        $tickets = Commande::orderBy('id', 'Desc')->where('user_id', Auth::user()->id)->where('paye', 1)->get()->groupBy('reference');
        $commandes = Commande::where('user_id', Auth::user()->id)->where('paye', 1)->get();
        return view('user.tickets', compact('tickets', 'commandes'));
    }

    public function detailstickets($sessionid)
    {
        $commandes = Commande::where('session_id', $sessionid)->get();
        $event = Evenement::find($commandes->first()->evenement_id);
        return view('user.detailstickets', compact('commandes', 'event'));
    }

    public function plans()
    {
        return view('user.plans');
    }

    

    public function adresselivraison()
    {
        $adresse = Livraison::where('user_id', Auth::user()->id)->first();
        return view('user.adresselivraison', compact('adresse'));
    }

    public function updateadresselivraison(Request $req)
    {
        $this->validate($req, [
            'adresse' => 'required',
            'ville' => 'required',
            'quartier' => 'required',
        ]);
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
        return redirect()->back()->with('success', '<strong>Félicitations!</strong><br> Votre adresse de livraison a été modifiée avec succès. ');
    }

    public function albums()
    {
        $albums = Album::orderBy('id', 'Desc')->where('user_id', Auth::user()->id)->get();
        return view('user.albums', compact('albums'));
    }

    public function storealbums(Request $req)
    {
        $this->validate($req, [
            'cover' => 'required|mimes:svg,png,jpg,jpeg|dimensions:width=500,height=500',
            'titre' => 'required|string|unique:albums',
            'description' => 'required|string',
        ]);


        $time = time();
        $photo = $req->cover;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img = Image::make($photo)->save(public_path('usx_files/covers/' . $imgname));


        // Remplace les espaces par des tirets
        $slug = str_replace(' ', '-', $req->titre);
        // Tout mettre en minuscule
        $slug = strtolower($slug);
        // Enlever les accents
        $search = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ');
        //Préférez str_replace à strtr car strtr travaille directement sur les octets, ce qui pose problème en UTF-8
        $replace = array('A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y');

        $slug = str_replace($search, $replace, $slug);
        // Supprimer les caracteres spéciaux
        $slug = preg_replace("/[^A-Za-z0-9]/", "-", $slug);
        Album::create([
            'titre' => $req->titre,
            'slug' => $slug,
            'description' => $req->description,
            'cover' => $imgname,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->back()->with('success', '<strong>Votre Album a été envoyé avec succès!</strong><br>Vous pouvez maintenant y ajouter les différents titres.');


    }

    public function maskalbums($slug)
    {
        $find = Album::where('slug', $slug)->first();
        Album::where('slug', $slug)->update([
            'masque' => 1,
        ]);
        return redirect()->back()->with('success', 'Votre album <strong>' . $find->titre . ' </strong> a été masqué sur Heavenly Praise!');
    }

    public function unmaskalbums($slug)
    {
        $find = Album::where('slug', $slug)->first();
        Album::where('slug', $slug)->update([
            'masque' => 0,
        ]);
        return redirect()->back()->with('success', 'Votre album <strong>' . $find->titre . ' </strong> est désormais disponible sur Heavenly Praise!');
    }

    public function titrealbums($slug)
    {
        $find = Album::where('slug', $slug)->first();
        $singles = Single::where('album_id', $find->id)->get();
        // dd($singles);
        $genres = Genre::orderBy('libelle', 'Asc')->get();

        return view('user.titrealbums', compact('find', 'singles', 'genres'));
    }

    public function storetitrealbums(Request $req, $slug)
    {

        $find = Album::where('slug', $slug)->first();
        // dd($find);
        $this->validate($req, [
            'genre' => 'required|string|max:255',
            'fichier_audio' => 'required|mimes:mp3|max:10240',
            'titre' => 'required|string|unique:singles',
        ]);

        $time = time();
        $song = $req->fichier_audio;
        $songname = $req->titre . "-" . $time . '.' . $song->getClientOriginalExtension();
        $song->move(public_path('usx_files/songs/'), $songname);


        Single::create([
            'titre' => $req->titre,
            'cover' => $find->cover,
            'audio' => $songname,
            'genre_id' => $req->genre,
            'user_id' => Auth::user()->id,
            'album_id' => $find->id,
        ]);

        return redirect()->back()->with('success', '<strong>Votre titre a été envoyé avec succès à l\'album ' . $find->titre . '!</strong><br>Vous serez notifié une fois qu\'il sera publié par les administrateurs.');
    }

    public function destroysingle($id)
    {
        // Trouver l'élément par son ID et le supprimer
        $single = Single::findOrFail($id);
        $titre = $single->titre;  // Récupérer le titre de l'élément à supprimer

        // Supprimer l'élément
        $single->delete();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', '<strong>Votre titre "' . $titre . '" a été supprimé avec succès!</strong>');
    }

    public function destroyalbum($slug)
    {
        // Trouver l'album par son slug et le supprimer
        $album = Album::where('slug', $slug)->firstOrFail();
        $album->delete();

        // Rediriger l'utilisateur avec un message de succès
        return redirect()->back()->with('success', 'L\'album "' . $album->titre . '" a été supprimé avec succès!');
    }



}
