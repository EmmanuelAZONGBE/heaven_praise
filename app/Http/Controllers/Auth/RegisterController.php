<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Models\Pays;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\Inscriptioncontact;
//use Stevebauman\Location\Facades\Location;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pays' => 'required',
            'nom_d_artiste' => 'required|string',
            // 'nom_d_artiste' => 'required_if:statut,==,Artiste|string',
            // 'communaute' => 'required_if:statut,==,Artiste|string',
            // 'paroisse' => 'required_if:statut,==,Artiste|string',
            'mot_de_passe' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ip=request()->ip();
        //$position = Location::get();
        //$position=$position->countryName;
        $getheavenid=User::orderBy('id','Desc')->first();
        if(empty($getheavenid)){
            $heavenid=1168;
        }else{
            $heavenid=$getheavenid->heavenid+1;
        }
        $title = "Création de votre compte Heavenly Praise";
        $sujet = "Création de votre compte Heavenly Praise";

        $role="Artiste";
        // Mail::to($data['email'])
        // ->send(new Inscriptioncontact($data,$role));
        return User::create([
            'heavenid' => $heavenid,
            'nom' => $data['nom'],
            'nomartiste' => $data['nom_d_artiste'],
            'email' => $data['email'],
            'role' => "Artiste",
            'pays_id' => $data['pays'],
            'password' => Hash::make($data['mot_de_passe']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('login')->with('success','Inscription éffectuée avec succès. <br>Vous pouvez vous Connecter à présent à votre compte.  <br>Bonne écoute !');
    }
    // Deconnecte l'utilisateur apres inscription
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);
        Session::flash('message', 'Inscription éffectuée et en attente de validation !');
        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
