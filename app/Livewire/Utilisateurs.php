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
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceIdentite' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.noPieceIdentite' => 'required|unique:users,noPieceIdentite'
    ];

    // Personnaliser les messages d'erreur
    // protected $messages = [
    //     'newUser.nom.required' => 'Oups! Le nom est requis.',
    //     'newUser.prenom.required' => 'Oups! Le prenom est requis.',
    //     'newUser.telephone1.required' => 'Oups! Le numéro de téléphone est requis.',
    //     'newUser.telephone1.numeric' => 'Oups! Le numéro de téléphone doit être un nombre.',
    //     'newUser.email.required' => 'Oups! L\'adresse email n\'est pas conforme.'
    // ];
    // protected $validationAttributes = [
    //     'newUser.sexe' => 'sexe',
    //     'newUser.pieceIdentite' => 'identity piece'
    // ];
    
    public function render()
    {
        // dd(Request::route());
        return view('livewire.utilisateurs.index', [
            "users" => User::latest()->paginate(5)
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
        // dump($this->newUser);
        $validationAttributes = $this->validate();

        $sexes = ['H','F'];

        $validationAttributes['newUser']['sexe'] = $sexes[$validationAttributes['newUser']['sexe']];
        $validationAttributes['newUser']['password'] = 'password';
        $validationAttributes['newUser']['photo'] = 'https://via.placeholder.com/640x480.png/001166?text=consectetur';
        
        User::create($validationAttributes['newUser']);
        // dump($validationAttributes['newUser']);

        $this->newUser = [];

        
        $this->dispatch("showSuccessMessage", ["message" => "Utilisateur créé"]);
    }

    public function confirmDelete($name, $id) {
        // dd($id);
        $this->dispatch("showConfirmMessage", ["message" => [
                "text" => "Vous êtes sur le point de supprimer $name de la liste des utilisateurs. Voulez-vous continuer ?",
                "title" => "Etes-vous sûr de vouloir continuer ?",
                "type" => "warning",
                "name" => $name,
                "data" => [
                    "user_id" => $id
                ]
            ]
        ]);
        // dump($this);
    }

    public function deleteUser($user_id) {

        User::destroy($user_id);

        $this->dispatch("showSuccessMessage", ["message" => "Utilisateur supprimé avec succès!"]);
    }
}
