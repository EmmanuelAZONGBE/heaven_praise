<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Evenement;
use Illuminate\Http\Request;

class Fetchevents extends Component
{
    public $query;
    public $filter="all";
    public $evenements;

    public function mount()
    {
      $this->getevents();
    }
    // public function filterchange()
    // {
    //   $date=date('Y-m-d');
    //   if(is_null($this->query)){
    //     switch ($this->filter) {
    //         case "all":
    //             $this->evenements=Evenement::orderBy('id','Desc')
    //             ->where('statut','Publié')
    //             ->get();

    //         case "upcoming":
    //             $this->evenements=Evenement::orderBy('id','Desc')
    //             ->where('statut','Publié')
    //             ->Where('date', '>=',$date )
    //             ->get();

    //         case "past":
    //             $this->evenements=Evenement::orderBy('id','Desc')
    //             ->where('statut','Publié')
    //             ->Where('date', '<',$date )
    //             ->get();
              
    //     }
    //     $this->render();
    //     $this->render();
    //   }
    // }

    public function getevents()
    {
      if(is_null($this->query) || empty($this->query)){
        $date=date('Y-m-d');
        if($this->filter == "all"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->get();
        }
        if($this->filter == "upcoming"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('date', '>=',$date )
            ->get();
        }
        if($this->filter == "past"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('date', '<',$date )
            ->get();
        }
        if($this->filter == "free"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('gratuit', '1')
            ->get();
        }
        if($this->filter == "payed"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('gratuit', '0')
            ->get();
        }
      }else{
        $date=date('Y-m-d');
        if($this->filter == "all"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('titre', 'like', '%' . $this->query . '%')
            ->Where('lieu', 'like', '%' . $this->query . '%')
            ->get();
        }
        if($this->filter == "upcoming"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('date', '>=',$date )
            ->orWhere('titre', 'like', '%' . $this->query . '%')
            ->orWhere('lieu', 'like', '%' . $this->query . '%')
            ->get();
        }
        if($this->filter == "past"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('titre', 'like', '%' . $this->query . '%')
            ->orWhere('lieu', 'like', '%' . $this->query . '%')
            ->Where('date', '<',$date )
            ->get();
        }
        if($this->filter == "free"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('titre', 'like', '%' . $this->query . '%')
            ->orWhere('lieu', 'like', '%' . $this->query . '%')
            ->Where('gratuit', '1')
            ->get();
        }
        if($this->filter == "payed"){
            $this->evenements=Evenement::orderBy('id','Desc')
            ->where('statut','Publié')
            ->Where('titre', 'like', '%' . $this->query . '%')
            ->orWhere('lieu', 'like', '%' . $this->query . '%')
            ->Where('gratuit', '0')
            ->get();
        }
      }
      
    }
    public function render()
    {
        // dump($this->query);
        return view('livewire.fetchevents',["evenements"=>$this->getevents()]);
    }
}
