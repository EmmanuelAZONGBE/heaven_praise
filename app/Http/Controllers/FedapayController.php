<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vente;
use App\Models\Paiementventemster;
use App\Models\Commande;
use App\Models\User;
use App\Models\Evenement;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Support\Facades\Mail;
use App\Mail\Commandeclient;

class FedapayController extends Controller
{
    public function pay($slug)
    {
        \FedaPay\FedaPay::setApiKey("sk_sandbox_aLE9DLSQKTzCYkAlgdcFnaTU");
        \FedaPay\FedaPay::setEnvironment('sandbox');
        
        $sessionid=Session::get('session_id');
        $commandes=Commande::where('session_id',Session::get('session_id'))->get();
        $user=User::find($commandes->first()->user_id);
        $evenement=Evenement::find($commandes->first()->evenement_id);
        $total=0;
        foreach ($commandes as $commande){
            $total=$total+$commande->montant;
        }
        $explode=explode(" ",$user->nom);
        $lastname=$explode[0];
        $firstname=$explode[1];
        $email=$user->email;
        $telephone=$user->telephone;
        $description="Achat de tickets pour l\'évènement \"".$evenement->titre."\" par ".$user->nom." - Id de la vente : ".$sessionid; 
        $transaction = 	\FedaPay\Transaction::create(array(
            "description" => $description,
            "amount" => $total,
            "currency" => ["iso" => "XOF"],
            "callback_url" => route('fedapaypaiementstatus',['slug'=>$slug]),
            "customer" => [
              "firstname" => $firstname,
              "lastname" => $lastname,
              "email" => $email,
              "phone_number" => [
                  "number" => $user->telephone,
                  "country" => "bj"
              ]
            ]
        ));
        $token = $transaction->generateToken();
        return redirect($token->url);
    }
    public function checkstatus($slug)
    {
        $id=$_GET['id'];
        $sessionid=Session::get('session_id');
        \FedaPay\FedaPay::setApiKey("sk_sandbox_aLE9DLSQKTzCYkAlgdcFnaTU");
        \FedaPay\FedaPay::setEnvironment('sandbox');
        $transaction = \FedaPay\Transaction::retrieve($id);
        // dd($transaction);
        if ($transaction->status == "approved") {
            //64000001
            $commandes=Commande::where('session_id',$sessionid)->get();
            $evenement=Evenement::where('id',$commandes->first()->evenement->id)->first();
            foreach($commandes as $commande){
                Commande::where('id',$commande->id)->update([
                    'paye'=>1,
                    'modedepaiement'=>$transaction->mode,
                ]);
            }
            
            if(Auth::guest()){
                // récuperer l'utilisateur
                $user=User::where('sessionid',Session::get('session_id'))->first();
            }else{
                $user=User::find(Auth::user()->id);
            }

            $title = "Votre commande de Ticket(s) sur Heavenly Praise";
            $sujet = "Votre commande de Ticket(s) sur Heavenly Praise";
            Mail::to($user->email)
            ->send(new Commandeclient($commandes));
            $slug=$evenement->slug;
            Session::forget('session_id');
            return redirect()->route('ordercompleted',['slug'=>$slug,'sessionid'=>$sessionid]);
        }else{
            \Session::put('error','Paiement Non effectué! Verifiez votre solde sur le moyen de paiement sélectionné puis rééssayez!');
            return redirect()->route('checkout',['slug'=>$slug])->with('error','<strong>Oups! Paiement non éffectué.</strong><br> Vérifiez votre moyen de paiement sélectionné puis rééssayez SVP.<br>Merci');
        }
    }
}
