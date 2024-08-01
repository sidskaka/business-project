<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Request;

class Utilisateurs extends Component
{
    use WithPagination;

    // utiliser bootstrap au niveau de la pagination du tableau qui affiche les utilisateurs
    protected $paginationTheme = 'bootstrap';

    public $isBtnAaaClicked = false;

    public $newUser = [];

    protected $rules = [
        'newUser.nom' => 'required|min:4',
        'newUser.prenom' => 'required',
        'newUser.sexe' => 'required',
        'newUser.telephone1' => 'required|numeric',
        'newUser.pieceIdentite' => 'required',
        'newUser.email' => 'required|email',
        'newUser.noPieceIdentite' => 'required'
    ];

    public $message1 = [
        'newUser.email.required' => 'Oups! L\'adresse email n\'est pas conforme.'
    ];
    
    public function render()
    {
        // dd(Request::route());
        return view('livewire.utilisateurs.index', [
            "users" => User::paginate(5)
        ])
        ->extends('layouts.dashboard')
        ->section('contenu');
    }

    public function goToAddUser() {
        $this->isBtnAaaClicked = true;
    }
    
    public function goToListUsers() {
        $this->isBtnAaaClicked = false;
    }

    public function addUser() {
        // dump(auth()->user());
        $this->validate();

        dump($this->newUser);
    }
}
