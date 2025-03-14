<?php
namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Album;
use App\Models\Categorie;
use App\Models\Communaute;
use App\Models\Evenement;
use App\Models\Forumcommunaute;
use App\Models\Forumparoisse;
use App\Models\Forumpays;
use App\Models\Genre;
use App\Models\Live;
use App\Models\Paroisse;
use App\Models\Pays;
use App\Models\Promotion;
use App\Models\Single;
use App\Models\Ticketevenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Tableau de Bord
    public function index()
    {
        // Récupérer le total des singles et albums
        $totalSingles           = Single::count();
        $totalSinglesRestricted = Single::where('statut', 'Restreint')->count();
        $totalSinglesOnline     = Single::where('statut', 'En Ligne')->count();

        // Albums en ligne ou restreints
        $totalAlbumsOnline     = Album::where('statut', 'En Ligne')->count();
        $totalAlbumsRestricted = Album::where('statut', 'Restreint')->count();
        $totalAlbums           = Album::whereIn('statut', ['En Ligne', 'Restreint'])->count();

        // Récupérer tous les albums avec leurs statistiques (total écoutes et clics)
        $albums = Album::with(['singles' => function ($query) {
            $query->whereIn('statut', ['En Ligne', 'Restreint', 'En Attente']);
        }])->get();


        // Récupérer le nombre d'artistes et d'artistes actifs
        $totalArtistes       = User::count();
        $totalArtistesActifs = User::where('valide', 'Actif')->count();

        return view('adm.dashboard', compact(
            'totalSingles', 'totalSinglesOnline', 'totalAlbums', 'totalAlbumsOnline',
            'totalArtistesActifs', 'totalArtistes', 'albums', 'totalSinglesRestricted', 'totalAlbumsRestricted'
        ));
    }

    // GESTION PAYS
    public function pays()
    {
        $pays         = Pays::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.pays.index', compact('pays', 'artistes', 'utilisateurs'));
    }

    public function storepays(Request $req)
    {
        $this->validate($req, [
            'libelle'   => ['required', 'unique:pays'],
            'indicatif' => ['required', 'integer', 'unique:pays'],
        ]);

        Pays::create([
            'libelle'   => $req->libelle,
            'indicatif' => $req->indicatif,
        ]);
        return redirect()->back()->with('success', 'Pays Enrgistré!');
    }

    public function editpays($id)
    {
        $find         = Pays::find($id);
        $pays         = Pays::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.pays.edit', compact('find', 'pays', 'artistes', 'utilisateurs'));
    }

    public function updatepays(Request $req, $id)
    {
        $find = Pays::find($id);
        $this->validate($req, [
            'libelle'   => 'required|string|unique:pays,libelle,' . $find->id,
            'indicatif' => 'required|integer|unique:pays,indicatif,' . $find->id,
        ]);

        Pays::where('id', $id)->update([
            'libelle'   => $req->libelle,
            'indicatif' => $req->indicatif,
        ]);
        return redirect()->route('admin.pays')->with('success', 'Pays Modifié!');
    }

    public function forumspays($id)
    {
        $find   = Pays::find($id);
        $forums = Forumpays::where('pays_id', $id)->get();
        return view('adm.bases.pays.forums', compact('find', 'forums'));
    }
    public function storeforumspays(Request $req, $id)
    {
        $find = Pays::find($id);
        Forumpays::create([
            'lien'    => $req->lien,
            'pays_id' => $id,
        ]);
        return redirect()->back()->with('success', 'Lien de forum enregistré!');
    }
    public function activateforumspays($id)
    {
        $find = Forumpays::find($id);
        Forumpays::where('pays_id', $find->pays_id)->update(['actif' => 0]);
        Forumpays::where('id', $id)->update(['actif' => 1]);
        return redirect()->back()->with('success', 'Lien de forum activé avec succès!');
    }

    public function editforumspays($id, $idforum)
    {
        $findforum = Forumpays::find($idforum);
        $find      = Pays::find($findforum->pays_id);
        $forums    = Forumpays::where('pays_id', $id)->get();
        return view('adm.bases.pays.editforumspays', compact('find', 'findforum', 'forums'));
    }
    public function updateforumspays(request $req, $id, $idforum)
    {

        Forumpays::where('id', $idforum)->update([
            'lien' => $req->lien,
        ]);
        return redirect()->route('admin.forumspays', ['id' => $id])->with('success', 'Lien de forum modifié avec succès!');
    }

    public function destroy($id)
    {
        $forum = Forumpays::findOrFail($id);
        $forum->delete();

        return redirect()->back()->with('success', 'Forum supprimé avec succès.');
    }

    public function destroypays($id)
    {
        $pays = Pays::find($id);

        if (! $pays) {
            return redirect()->back()->with('error', 'Pays introuvable.');
        }

        // Supprimer le pays
        $pays->delete();

        return redirect()->back()->with('success', 'Pays supprimé avec succès.');
    }

    // GESTION COMMUNAUTE
    public function communaute()
    {
        $communautes  = Communaute::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.communaute.index', compact('communautes', 'artistes', 'utilisateurs'));
    }

    public function storecommunaute(Request $req)
    {
        $this->validate($req, [
            'libelle' => ['required', 'unique:communautes'],
        ]);

        Communaute::create([
            'libelle' => $req->libelle,
        ]);
        return redirect()->back()->with('success', 'Communauté Enrgistrée!');
    }

    public function editcommunaute($id)
    {
        $find         = Communaute::find($id);
        $communautes  = Communaute::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.communaute.edit', compact('find', 'communautes', 'artistes', 'utilisateurs'));
    }

    public function updatecommunaute(Request $req, $id)
    {
        $find = Communaute::find($id);
        $this->validate($req, [
            'libelle' => 'required|string|unique:communautes,libelle,' . $find->id,
        ]);

        Communaute::where('id', $id)->update([
            'libelle' => $req->libelle,
        ]);
        return redirect()->route('admin.communaute')->with('success', 'Communauté Modifiée!');
    }

    public function forumscommunaute($id)
    {
        $find   = Communaute::find($id);
        $forums = Forumcommunaute::where('communaute_id', $id)->get();
        return view('adm.bases.communaute.forums', compact('find', 'forums'));
    }
    public function storeforumscommunaute(Request $req, $id)
    {
        $find = Communaute::find($id);
        Forumcommunaute::create([
            'lien'          => $req->lien,
            'communaute_id' => $id,
        ]);
        return redirect()->back()->with('success', 'Lien de forum enregistré!');
    }
    public function activateforumscommunaute($id)
    {
        $find = Forumcommunaute::find($id);
        Forumcommunaute::where('communaute_id', $find->communaute_id)->update(['actif' => 0]);
        Forumcommunaute::where('id', $id)->update(['actif' => 1]);
        return redirect()->back()->with('success', 'Lien de forum activé avec succès!');
    }
    public function editforumscommunaute($id, $idforum)
    {
        $findforum = Forumcommunaute::find($idforum);
        $find      = Communaute::find($findforum->communaute_id);
        $forums    = Forumcommunaute::where('communaute_id', $id)->get();
        return view('adm.bases.communaute.editforumscommunaute', compact('find', 'findforum', 'forums'));
    }
    public function updateforumscommunaute(request $req, $id, $idforum)
    {
        Forumcommunaute::where('id', $idforum)->update([
            'lien' => $req->lien,
        ]);
        return redirect()->route('admin.forumscommunaute', ['id' => $id])->with('success', 'Lien de forum modifié avec succès!');
    }

    public function destroycommunaute($id)
    {
        $communaute = Communaute::with('forumcommunaute')->find($id); // Charger les forums liés
        $communaute->delete();

        return redirect()->back()->with('success', 'Communauté supprimée avec succès.');
    }

    // GESTION PAROISSE
    public function paroisse()
    {
        $paroisses    = Paroisse::orderBy('libelle', 'Asc')->get();
        $communautes  = Communaute::orderBy('libelle', 'Asc')->get();
        $pays         = Pays::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.paroisse.index', compact('paroisses', 'artistes', 'utilisateurs', 'communautes', 'pays'));
    }

    public function storeparoisse(Request $req)
    {
        $this->validate($req, [
            'libelle'    => ['required', 'unique:paroisses'],
            'pays'       => ['required'],
            'communaute' => ['required'],
        ]);

        Paroisse::create([
            'libelle'       => $req->libelle,
            'pays_id'       => $req->pays,
            'communaute_id' => $req->communaute,
        ]);
        return redirect()->back()->with('success', 'Paroisse Enrgistrée!');
    }

    public function editparoisse($id)
    {
        $find         = Paroisse::find($id);
        $paroisses    = Paroisse::orderBy('libelle', 'Asc')->get();
        $communautes  = Communaute::orderBy('libelle', 'Asc')->get();
        $pays         = Pays::orderBy('libelle', 'Asc')->get();
        $artistes     = User::where('role', 'Artiste')->get();
        $utilisateurs = User::where('role', 'Auditeur')->get();
        return view('adm.bases.paroisse.edit', compact('find', 'paroisses', 'pays', 'communautes', 'artistes', 'utilisateurs'));
    }

    public function updateparoisse(Request $req, $id)
    {
        $find = Paroisse::find($id);
        $this->validate($req, [
            'libelle'    => 'required|string|unique:paroisses,libelle,' . $find->id,
            'pays'       => ['required'],
            'communaute' => ['required'],
        ]);

        Paroisse::where('id', $id)->update([
            'libelle'       => $req->libelle,
            'pays_id'       => $req->pays,
            'communaute_id' => $req->communaute,
        ]);
        return redirect()->route('admin.paroisse')->with('success', 'Paroisse Modifiée!');
    }

    public function forumsparoisse($id)
    {
        $find   = Paroisse::find($id);
        $forums = Forumparoisse::where('paroisse_id', $id)->get();
        return view('adm.bases.paroisse.forums', compact('find', 'forums'));
    }
    public function storeforumsparoisse(Request $req, $id)
    {
        $find = Paroisse::find($id);
        Forumparoisse::create([
            'lien'        => $req->lien,
            'paroisse_id' => $id,
        ]);
        return redirect()->back()->with('success', 'Lien de forum enregistré!');
    }
    public function activateforumsparoisse($id)
    {
        $find = Forumparoisse::find($id);
        Forumparoisse::where('paroisse_id', $find->paroisse_id)->update(['actif' => 0]);
        Forumparoisse::where('id', $id)->update(['actif' => 1]);
        return redirect()->back()->with('success', 'Lien de forum activé avec succès!');
    }
    public function editforumsparoisse($id, $idforum)
    {
        $findforum = Forumparoisse::find($idforum);
        $find      = Paroisse::find($findforum->paroisse_id);
        $forums    = Forumparoisse::where('paroisse_id', $id)->get();
        return view('adm.bases.paroisse.editforumsparoisse', compact('find', 'findforum', 'forums'));
    }
    public function updateforumsparoisse(request $req, $id, $idforum)
    {

        Forumparoisse::where('id', $idforum)->update([
            'lien' => $req->lien,
        ]);
        return redirect()->route('admin.forumsparoisse', ['id' => $id])->with('success', 'Lien de forum modifié avec succès!');
    }

    public function destroyparoisse($id)
    {
        $paroisse = Paroisse::find($id);

        if (! $paroisse) {
            return redirect()->back()->with('error', 'Paroisse introuvable.');
        }

        // Supprimer les forums associés
        Forumparoisse::where('paroisse_id', $paroisse->id)->delete();

        // Supprimer la paroisse
        $paroisse->delete();

        return redirect()->back()->with('success', 'Paroisse supprimée avec succès.');
    }

    public function destroyforums($id)
    {
        $forum = Forumparoisse::find($id);

        if (! $forum) {
            return redirect()->back()->with('error', 'Forum introuvable.');
        }

        // Supprimer le forum
        $forum->delete();

        return redirect()->back()->with('success', 'Forum supprimé avec succès.');
    }

    // GESTION GENRE
    public function genre()
    {
        $genres  = Genre::orderBy('libelle', 'Asc')->get();
        $singles = Single::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get();
        return view('adm.bases.genre.index', compact('genres', 'singles'));
    }

    public function storegenre(Request $req)
    {
        $this->validate($req, [
            'libelle' => ['required', 'unique:genres'],
            'slug'    => ['required', 'unique:genres'],
        ]);

        Genre::create([
            'libelle' => $req->libelle,
            'slug'    => $req->slug,
        ]);
        return redirect()->back()->with('success', 'Genre Enrgistré!');
    }

    public function editgenre($id)
    {
        $find    = Genre::find($id);
        $genres  = Genre::orderBy('libelle', 'Asc')->get();
        $singles = Single::orderBy('id', 'Desc')->where('masque', 0)->where('statut', 'En Ligne')->get();
        return view('adm.bases.genre.edit', compact('find', 'genres', 'singles'));
    }

    public function updategenre(Request $req, $id)
    {
        $find = Genre::find($id);
        $this->validate($req, [
            'libelle' => 'required|string|unique:genres,libelle,' . $find->id,
            'slug'    => 'required|string|unique:genres,slug,' . $find->id,
        ]);

        Genre::where('id', $id)->update([
            'libelle' => $req->libelle,
            'slug'    => $req->slug,
        ]);
        return redirect()->route('admin.genre')->with('success', 'Genre Modifiée!');
    }

    public function destroygenre($id)
    {
        $genre = Genre::find($id);

        if (! $genre) {
            return redirect()->back()->with('error', 'Genre introuvable.');
        }

        // Suppression du genre
        $genre->delete();

        return redirect()->back()->with('success', 'Genre supprimé avec succès.');
    }

    // GESTION PROMOTIONS
    public function promotion()
    {
        $promotions = Promotion::get();
        return view('adm.promotion.index', compact('promotions'));
    }
    public function createpromotion()
    {
        $actualites = Actualite::where('publie', 1)->get();
        $evenements = Evenement::where('statut', 'Publié')->get();
        return view('adm.promotion.create', compact('actualites', 'evenements'));
    }

    public function storepromotion(Request $req)
    {
        // dd($req->all());
        $this->validate($req, [
            'destination' => ['required'],
            'position'    => ['required'],
            'lien'        => ['required_if:destination,Externe'],
            'actualite'   => ['required_if:destination,==,Actualité'],
            'evenement'   => ['required_if:destination,==,Évènement'],
            'banniere'    => ['required'],
        ]);

        if ($req->destination == "Externe") {
            $lien      = $req->lien;
            $actualite = "";
            $evenement = "";
        }
        if ($req->destination == "Actualité") {
            $lien      = "";
            $actualite = $req->actualite;
            $evenement = null;
        }
        if ($req->destination == "Évènement") {
            $lien      = "";
            $actualite = null;
            $evenement = $req->evenement;
        }

        $time    = time();
        $photo   = $req->banniere;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img     = Image::make($photo)->save(public_path('usx_files/promotions/' . $imgname));
        Promotion::create([
            'position'     => $req->position,
            'banniere'     => $imgname,
            'lien'         => $lien,
            'actualite_id' => $actualite,
            'evenement_id' => $evenement,
        ]);
        return redirect()->back()->with('success', 'Promotion publiée avec succès!');
    }

    public function destroypromotion($id)
    {
        $promotion = Promotion::find($id);

        if (! $promotion) {
            return redirect()->back()->with('error', 'Promotion introuvable.');
        }

        // Supprimer l'image associée si nécessaire
        $imagePath = public_path('usx_files/promotions/' . $promotion->banniere);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $promotion->delete();

        return redirect()->back()->with('success', 'Promotion supprimée avec succès.');
    }

    // GESTION CATEGORIE
    public function categorie()
    {
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.bases.categorie.index', compact('categories'));
    }

    public function storecategorie(Request $req)
    {
        $this->validate($req, [
            'libelle' => ['required', 'unique:categories'],
            'slug'    => ['required', 'unique:categories'],
        ]);

        Categorie::create([
            'libelle' => $req->libelle,
            'slug'    => $req->slug,
        ]);
        return redirect()->back()->with('success', 'Categorie Enregistrée!');
    }

    public function editcategorie($id)
    {
        $find       = Categorie::find($id);
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.bases.categorie.edit', compact('find', 'categories'));
    }

    public function updatecategorie(Request $req, $id)
    {
        $find = Genre::find($id);
        $this->validate($req, [
            'libelle' => 'required|string|unique:categories,libelle,' . $find->id,
            'slug'    => 'required|string|unique:categories,slug,' . $find->id,
        ]);

        Categorie::where('id', $id)->update([
            'libelle' => $req->libelle,
            'slug'    => $req->slug,
        ]);
        return redirect()->route('admin.categorie')->with('success', 'Categorie Modifiée!');
    }

    public function destroycategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'Catégorie supprimée avec succès.');
    }

    // GESTION DES ARTISTES

    public function createartists()
    {
        $pays = Pays::get();
        return view('adm.artistes.create', compact('pays'));
    }
    public function storeartists(request $req)
    {

        $this->validate($req, [
            'nom'           => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'pays'          => 'required',
            'nom_d_artiste' => 'required|string',
            'mot_de_passe'  => 'required|string|min:6|confirmed',
        ]);

        $getheavenid = User::orderBy('id', 'Desc')->first();
        if (empty($getheavenid)) {
            $heavenid = 1168;
        } else {
            $heavenid = $getheavenid->heavenid + 1;
        }
        User::create([
            'heavenid'   => $heavenid,
            'nom'        => $req->nom,
            'nomartiste' => $req->nom_d_artiste,
            'email'      => $req->email,
            'role'       => "Artiste",
            'pays_id'    => $req->pays,
            'password'   => Hash::make($req->mot_de_passe),
        ]);
        return redirect()->back()->with('success', 'L\'artiste <strong>"' . $req->nom . '"</strong> a été inscrit avec succès!<br> Veuillez valider le compte pour poursuivre.');
    }
    public function artists()
    {
        $artistes = User::where('role', 'Artiste')->where('valide', 'oui')->get();
        return view('adm.artistes.index', compact('artistes'));
    }

    public function newartists()
    {
        $artistes = User::where('role', 'Artiste')->where('valide', 'non')->get();
        return view('adm.artistes.nouveaux', compact('artistes'));
    }

    public function restrictedartists()
    {
        $artistes = User::where('role', 'Artiste')->where('restreint', 1)->get();
        return view('adm.artistes.restreints', compact('artistes'));
    }

    public function vueartist($id)
    {
        $find    = User::find($id);
        $singles = Single::where('album_id', null)->where('user_id', $id)->get();
        $albums  = Album::where('user_id', $id)->get();
        return view('adm.artistes.vueglobale', compact('find', 'singles', 'albums'));
    }

    public function validateartist($id)
    {
        $find = User::find($id);
        User::where('id', $id)->update([
            'valide' => 'oui',
        ]);

        return redirect()->back()->with('success', 'L\'artiste <strong>"' . $find->nomartiste . '"</strong> a été validé avec succès. <br>Ses oeuvres seront désormais visibles sur Heavenly Praise!');
    }

    public function unvalidateartist($id)
    {
        $find = User::find($id);
        User::where('id', $id)->update([
            'valide' => 'non',
        ]);

        return redirect()->back()->with('success', 'L\'artiste <strong>"' . $find->nomartiste . '"</strong> a été validé avec succès. <br>Ses oeuvres ne seront plus visibles sur Heavenly Praise jusqu\'à nouvelle vérification de son profil!');
    }

    public function restrictartist($id)
    {
        $find = User::find($id);
        User::where('id', $id)->update([
            'restreint' => 1,
        ]);

        return redirect()->back()->with('success', 'L\'artiste <strong>"' . $find->nomartiste . '"</strong> a été restreint avec succès. <br>Il ne pourra plus publier ses oeuvres sur Heavenly Praise jusqu\'à la levée de la restriction!');
    }

    public function unrestrictartist($id)
    {
        $find = User::find($id);
        User::where('id', $id)->update([
            'restreint' => 0,
        ]);

        return redirect()->back()->with('success', 'La restriction de l\'artiste <strong>"' . $find->nomartiste . '"</strong> a été levée avec succès. <br>Il pourra publier à nouveau ses oeuvres sur Heavenly Praise!');
    }

    public function destroyartist($id)
    {
        $artiste = User::find($id);

        if (! $artiste) {
            return redirect()->back()->with('error', 'Artiste introuvable.');
        }

        // Supprimer l'image associée si nécessaire
        $imagePath = public_path('usx_files/artistes/' . $artiste->photo);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $artiste->delete();

        return redirect()->back()->with('success', 'Artiste supprimé avec succès.');
    }

    // GESTION DES SINGLES
    public function singles()
    {
        $singles = Single::where('statut', 'En Ligne')->get();
        return view('adm.singles.list', compact('singles'));
    }
    public function newsingles()
    {
        $singles = Single::where('statut', 'En Attente')->get();
        return view('adm.singles.newsingles', compact('singles'));
    }
    public function restrictedsingles()
    {
        $singles = Single::where('statut', 'Restreint')->get();
        return view('adm.singles.restreints', compact('singles'));
    }
    public function visiblessingles()
    {
        $singles = Single::where('masque', 0)->get();
        return view('adm.singles.visibles', compact('singles'));
    }
    public function maskedsingles()
    {
        $singles = Single::where('masque', 1)->get();
        return view('adm.singles.masques', compact('singles'));
    }
    public function validatesingle($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'statut' => 'En Ligne',
        ]);

        return redirect()->back()->with('success', 'Single <strong>"' . $find->titre . '"</strong> validé et mis en ligne!');
    }
    public function unvalidatesingle($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'statut' => 'En Attente',
        ]);

        return redirect()->back()->with('success', 'Single <strong>"' . $find->titre . '"</strong> mis en attente!');
    }
    public function restrictsingle($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'statut' => 'Restreint',
        ]);

        return redirect()->back()->with('success', 'Single <strong>"' . $find->titre . '"</strong> restreint avec succès!');
    }
    public function masksingle($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'masque' => 1,
        ]);

        return redirect()->back()->with('success', 'Single <strong>"' . $find->titre . '"</strong> masqué avec succès!');
    }
    public function unmasksingle($id)
    {
        $find = Single::find($id);
        Single::where('id', $id)->update([
            'masque' => 0,
        ]);

        return redirect()->back()->with('success', 'Single <strong>"' . $find->titre . '"</strong> rendu visible avec succès!');
    }

    public function destroysingle($id)
    {
        $single = Single::find($id);

        if (! $single) {
            return redirect()->back()->with('error', 'Single introuvable.');
        }

        $single->delete();

        return redirect()->back()->with('success', 'single supprimé avec succès.');
    }

    // GESTION DES ALBUMS
    public function albums()
    {
        $albums    = Album::where('statut', 'En Ligne')->get();
        $titre     = "Albums";
        $desctable = "Liste des Albums en ligne";
        return view('adm.albums.list', compact('titre', 'albums', 'desctable'));
    }
    public function newalbums()
    {
        $albums    = Album::where('statut', 'En Attente')->get();
        $titre     = "Nouveaux Albums";
        $desctable = "Liste des Albums publiés récemment";
        return view('adm.albums.list', compact('titre', 'albums', 'desctable'));
    }
    public function restrictedalbums()
    {
        $albums    = Album::where('statut', 'Restreint')->get();
        $titre     = "Albums Restreints";
        $desctable = "Liste des Albums restreints sur Heavenly Praise";
        return view('adm.albums.list', compact('titre', 'albums', 'desctable'));
    }
    public function visiblesalbums()
    {
        $albums    = Album::where('masque', 0)->get();
        $titre     = "Albums Non Masqués";
        $desctable = "Liste des Albums visibles par les auditeurs";
        return view('adm.albums.list', compact('titre', 'albums', 'desctable'));
    }
    public function maskedalbums()
    {
        $albums    = Album::where('masque', 1)->get();
        $titre     = "Albums Masqués";
        $desctable = "Liste des Albums non visibles par les auditeurs";
        return view('adm.albums.list', compact('titre', 'albums', 'desctable'));
    }
    public function detailsalbum($id)
    {
        $find    = Album::find($id);
        $album   = Album::find($id);
        $singles = Single::where('album_id', $id)->get();
        return view('adm.albums.details', compact('find', 'singles', 'album'));
    }
    public function validatealbum($id)
    {
        $find = Album::find($id);
        Album::where('id', $id)->update([
            'statut' => 'En Ligne',
        ]);

        return redirect()->back()->with('success', 'Album <strong>"' . $find->titre . '"</strong> validé et mis en ligne!');
    }
    public function unvalidatealbum($id)
    {
        $find = Album::find($id);
        Album::where('id', $id)->update([
            'statut' => 'En Attente',
        ]);

        return redirect()->back()->with('success', 'Album <strong>"' . $find->titre . '"</strong> mis en attente!');
    }
    public function restrictalbum($id)
    {
        $find = Album::find($id);
        Album::where('id', $id)->update([
            'statut' => 'Restreint',
        ]);

        return redirect()->back()->with('success', 'Album <strong>"' . $find->titre . '"</strong> restreint avec succès!');
    }
    public function maskalbum($id)
    {
        $find = Album::find($id);
        Album::where('id', $id)->update([
            'masque' => 1,
        ]);

        return redirect()->back()->with('success', 'Album <strong>"' . $find->titre . '"</strong> masqué avec succès!');
    }
    public function unmaskalbum($id)
    {
        $find = Album::find($id);
        Album::where('id', $id)->update([
            'masque' => 0,
        ]);

        return redirect()->back()->with('success', 'Album <strong>"' . $find->titre . '"</strong> rendu visible avec succès!');
    }

    public function destroyalbum($id)
    {
        $album = Album::find($id);

        if (! $album) {
            return redirect()->back()->with('error', 'Album introuvable.');
        }

        // Suppression des fichiers liés si nécessaire
        $imagePath = public_path('usx_files/albums/' . $album->cover);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $album->delete();

        return redirect()->back()->with('success', 'Album supprimé avec succès.');
    }

    //GESTION DES EVENEMENTS
    public function listevents()
    {
        $events     = Evenement::get();
        $pays       = Pays::orderBy('libelle', 'Asc')->get();
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.evenements.list', compact('events', 'pays', 'categories'));
    }
    public function newevents()
    {
        $pays       = Pays::orderBy('libelle', 'Asc')->get();
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.evenements.create', compact('pays', 'categories'));
    }
    public function storeevents(Request $req)
    {
        $this->validate($req, [
            'titre'       => 'required|unique:evenements',
            'slug'        => 'required|unique:evenements',
            'description' => 'required',
            'banniere'    => 'required|file|mimes:jpg,png,svg,jpeg|dimensions:width=1920,height=1280',
            'statut'      => 'required',
            'gratuit'     => 'required',
            'billeterie'  => 'nullable',
            'lieu'        => 'required',
            'pays'        => 'required',
            'categorie'   => 'required',
            'date'        => 'required|date|after:today',
        ]);
        if (empty($req->billeterie)) {
            $billeterie = 0;
        } else {
            $billeterie = 1;
        }
        if (empty($req->flash)) {
            $flash = 0;
        } else {
            $flash = 1;
        }
        $time    = time();
        $photo   = $req->banniere;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img     = Image::make($photo)->save(public_path('usx_files/events/' . $imgname));
        Evenement::create([
            'titre'        => $req->titre,
            'slug'         => $req->slug,
            'description'  => $req->description,
            'statut'       => $req->statut,
            'gratuit'      => $req->gratuit,
            'flash'        => $flash,
            'billeterie'   => $billeterie,
            'lieu'         => $req->lieu,
            'date'         => $req->date,
            'banniere'     => $imgname,
            'user_id'      => Auth::user()->id,
            'pays_id'      => $req->pays,
            'categorie_id' => $req->categorie,
        ]);
        return redirect()->back()->with('success', 'L\'évènement <strong>"' . $req->titre . '"</strong> a été publié avec succès!');
    }
    public function publierevents($id)
    {
        Evenement::where('id', $id)->update([
            'statut' => "Publié",
        ]);
        return redirect()->back()->with('success', 'Évènement publié avec succès!');
    }
    public function Depublierevents($id)
    {
        Evenement::where('id', $id)->update([
            'statut' => "Non Publié",
        ]);
        return redirect()->back()->with('success', 'Évènement MASQUÉ avec succès!');
    }
    public function editevents($id)
    {
        $find       = Evenement::find($id);
        $pays       = Pays::orderBy('libelle', 'Asc')->get();
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        // dd($find);
        return view('adm.evenements.edit', compact('find', 'pays', 'categories'));
    }
    public function updateevents(Request $req, $id)
    {
        $find = Evenement::find($id);
        $this->validate($req, [
            'titre'       => 'required|string|unique:evenements,titre,' . $find->id,
            'slug'        => 'required|string|unique:evenements,slug,' . $find->id,
            'description' => 'required',
            'banniere'    => 'nullable|file|mimes:jpg,png,svg,jpeg|dimensions:width=1920,height=1280',
            'statut'      => 'required',
            'gratuit'     => 'required',
            'billeterie'  => 'nullable',
            'lieu'        => 'required',
            'pays'        => 'required',
            'categorie'   => 'required',
            // 'date' =>  'required|date|after:today',
        ]);
        if (empty($req->billeterie)) {
            $billeterie = 0;
        } else {
            $billeterie = 1;
        }
        if (empty($req->flash)) {
            $flash = 0;
        } else {
            $flash = 1;
        }
        if (! empty($req->banniere)) {
            $time    = time();
            $photo   = $req->banniere;
            $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
            $img     = Image::make($photo)->save(public_path('usx_files/events/' . $imgname));
        } else {
            $imgname = $find->banniere;
        }
        Evenement::where('id', $id)->update([
            'titre'        => $req->titre,
            'slug'         => $req->slug,
            'description'  => $req->description,
            'statut'       => $req->statut,
            'gratuit'      => $req->gratuit,
            'flash'        => $flash,
            'billeterie'   => $billeterie,
            'lieu'         => $req->lieu,
            'date'         => $req->date,
            'banniere'     => $imgname,
            'pays_id'      => $req->pays,
            'categorie_id' => $req->categorie,
        ]);
        return redirect()->route('admin.listevents')->with('success', 'L\'évènement <strong>"' . $req->titre . '"</strong> a été modifié avec succès!');
    }

    public function billeterieevents($id)
    {
        $event   = Evenement::find($id);
        $tickets = Ticketevenement::where('evenement_id', $id)->get();
        return view('adm.evenements.billeterieevents', compact('event', 'tickets'));
    }
    public function storebilleterieevents(Request $req, $id)
    {
        $this->validate($req, [
            'libelle' => 'required',
            'prix'    => 'required',
            'nombre'  => 'required',
        ]);
        Ticketevenement::create([
            'libelle'      => $req->libelle,
            'prix'         => $req->prix,
            'nombre'       => $req->nombre,
            'evenement_id' => $id,
        ]);
        return redirect()->back()->with('success', 'Le tiket <strong>"' . $req->libelle . '"</strong> a été publié avec succès!');
    }

    public function destroyevents($id)
    {
        $event = Evenement::find($id);

        if (! $event) {
            return redirect()->back()->with('error', 'Événement introuvable.');
        }

        $event->delete();

        return redirect()->back()->with('success', 'Événement supprimé avec succès.');
    }

    //GESTION DES ACTUALITES
    public function listactus()
    {
        $actus = Actualite::get();
        return view('adm.actualites.list', compact('actus'));
    }
    public function newactus()
    {
        $pays       = Pays::orderBy('libelle', 'Asc')->get();
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.actualites.create', compact('pays', 'categories'));
    }
    public function storeactus(Request $req)
    {
        $this->validate($req, [
            'titre'     => 'required|unique:actualites',
            'slug'      => 'required|unique:actualites',
            'details'   => 'required',
            'banniere'  => 'required|file|mimes:jpg,png,svg,jpeg|dimensions:width=1280,height=700',
            'statut'    => 'required',
            'pays'      => 'required',
            'categorie' => 'required',
        ]);
        $time    = time();
        $photo   = $req->banniere;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img     = Image::make($photo)->save(public_path('usx_files/actus/' . $imgname));
        if ($req->statut == 0) {
            $publie = 0;
        } else {
            $publie = 1;

        }
        if (empty($req->flash)) {
            $flash = 0;
        } else {
            $flash = 1;
        }
        Actualite::create([
            'titre'        => $req->titre,
            'slug'         => $req->slug,
            'details'      => $req->details,
            'publie'       => $publie,
            'banniere'     => $imgname,
            'flash'        => $flash,
            'user_id'      => Auth::user()->id,
            'pays_id'      => $req->pays,
            'categorie_id' => $req->categorie,
        ]);
        return redirect()->back()->with('success', 'L\'actualité <strong>"' . $req->titre . '"</strong> a été publié avec succès!');
    }
    public function publieractus($id)
    {
        Actualite::where('id', $id)->update([
            'publie' => 1,
        ]);
        return redirect()->back()->with('success', 'Actualité publié avec succès!');
    }
    public function Depublieractus($id)
    {
        Actualite::where('id', $id)->update([
            'publie' => 0,
        ]);
        return redirect()->back()->with('success', 'Actualité MASQUÉ avec succès!');
    }
    public function editactus($id)
    {
        $find       = Actualite::find($id);
        $pays       = Pays::orderBy('libelle', 'Asc')->get();
        $categories = Categorie::orderBy('libelle', 'Asc')->get();
        return view('adm.actualites.edit', compact('find', 'pays', 'categories'));
    }
    public function updateactus(Request $req, $id)
    {
        $find = Actualite::find($id);
        $this->validate($req, [
            'titre'     => 'required|string|unique:actualites,titre,' . $find->id,
            'slug'      => 'required|string|unique:actualites,slug,' . $find->id,
            'details'   => 'required',
            'banniere'  => 'nullable|file|mimes:jpg,png,svg,jpeg|dimensions:width=1280,height=700',
            'statut'    => 'required',
            'pays'      => 'required',
            'categorie' => 'required',
        ]);
        if ($req->statut == 0) {
            $publie = 0;
        } else {
            $publie = 1;

        }

        if (empty($req->flash)) {
            $flash = 0;
        } else {
            $flash = 1;
        }
        if (! empty($req->banniere)) {
            $time    = time();
            $photo   = $req->banniere;
            $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
            $img     = Image::make($photo)->save(public_path('usx_files/actus/' . $imgname));
        } else {
            $imgname = $find->banniere;
        }

        Actualite::where('id', $id)->update([
            'titre'        => $req->titre,
            'slug'         => $req->slug,
            'details'      => $req->details,
            'publie'       => $publie,
            'banniere'     => $imgname,
            'flash'        => $flash,
            'pays_id'      => $req->pays,
            'categorie_id' => $req->categorie,
        ]);
        return redirect()->route('admin.listactus')->with('success', 'L\'actualite <strong>"' . $req->titre . '"</strong> a été modifié avec succès!');
    }

    public function destroyactus($id)
    {
        $actu = Actualite::findOrFail($id);
        $actu->delete();

        return redirect()->back()->with('success', 'Actualité supprimée avec succès.');
    }

    //GESTION DES LIVES
    public function listlives()
    {
        $lives    = Live::get();
        $artistes = User::where('role', 'Artiste')->where('valide', 'oui')->get();
        return view('adm.lives.list', compact('lives', 'artistes'));
    }
    public function newlives()
    {
        $artistes = User::where('role', 'Artiste')->where('valide', 'oui')->get();
        return view('adm.lives.create', compact('artistes'));
    }
    public function storelives(Request $req)
    {

        $this->validate($req, [
            'titre'    => 'required',
            'lien'     => 'required',
            'artiste'  => 'nullable',
            'en_cours' => 'required',
            'publie'   => 'required',
            'banniere' => 'required|file|mimes:jpg,png,svg,jpeg|dimensions:width=500,height=340',
        ]);
        $time    = time();
        $photo   = $req->banniere;
        $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
        $img     = Image::make($photo)->save(public_path('PlayerTemplate/img/live/' . $imgname));
        Live::create([
            'titre'    => $req->titre,
            'lien'     => $req->lien,
            'publie'   => $req->publie,
            'encours'  => $req->en_cours,
            'banniere' => $imgname,
            'user_id'  => $req->artiste,
        ]);
        return redirect()->back()->with('success', 'La vidéo <strong>"' . $req->titre . '"</strong> a été publié avec succès!');
    }
    public function publierlives($id)
    {
        Live::where('id', $id)->update([
            'publie' => 1,
        ]);
        return redirect()->back()->with('success', 'La vidéo a été publié avec succès!');
    }
    public function Depublierlives($id)
    {
        Live::where('id', $id)->update([
            'publie' => 0,
        ]);
        return redirect()->back()->with('success', 'La vidéo a été MASQUÉ avec succès!');
    }
    public function editlives($id)
    {
        $find     = Live::find($id);
        $artistes = User::where('role', 'Artiste')->where('valide', 'oui')->get();
        return view('adm.lives.edit', compact('find', 'artistes'));
    }
    public function updatelives(Request $req, $id)
    {
        $find = Live::find($id);
        $this->validate($req, [
            'titre'    => 'required|string|unique:lives,titre,' . $find->id,
            'lien'     => 'required|string|unique:lives,lien,' . $find->id,
            'banniere' => 'nullable|file|mimes:jpg,png,svg,jpeg|dimensions:width=1280,height=700',
            'artiste'  => 'nullable',
            'en_cours' => 'required',
            'publie'   => 'required',
        ]);
        if (! empty($req->banniere)) {
            $time    = time();
            $photo   = $req->banniere;
            $imgname = $time . "1" . '.' . $photo->getClientOriginalExtension();
            $img     = Image::make($photo)->save(public_path('PlayerTemplate/img/live/' . $imgname));
        } else {
            $imgname = $find->banniere;
        }
        Live::where('id', $id)->update([
            'titre'    => $req->titre,
            'lien'     => $req->lien,
            'publie'   => $req->publie,
            'encours'  => $req->en_cours,
            'banniere' => $imgname,
            'user_id'  => $req->artiste,
        ]);
        return redirect()->route('admin.listlives')->with('success', 'La vidéo <strong>"' . $req->titre . '"</strong> a été modifié avec succès!');
    }

    public function destroylives($id)
    {
        $live = Live::find($id);

        if (! $live) {
            return redirect()->back()->with('error', 'Live introuvable.');
        }

        $live->delete();

        return redirect()->back()->with('success', 'Live supprimé avec succès.');
    }

}
