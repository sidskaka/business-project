<div class="row p-4 pt-5">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-user-plus fa-2x"></i> Form de création d'un nouveau utilisateur</h3>
            </div>
            <form role="form" wire:submit.prevent='addUser()'>
                <div class="card-body">
                    {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nom</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Prénom</label>
                                <input type="text" class="form-control" required>
                            </div>
                        </div>
                    </div> --}}
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Nom</label>
                            <input type="text" wire:model='newUser.nom' class="form-control @error('newUser.nom') is-invalid @enderror">
                            @error('newUser.nom') 
                                <span class="error">{{ $message }}</span> 
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Prénom</label>
                            <input type="text" wire:model='newUser.prenom' class="form-control @error('newUser.prenom') is-invalid @enderror">
                            @error('newUser.prenom')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <select name="" id="" class="form-control @error('newUser.sexe') is-invalid @enderror" wire:model='newUser.sexe'>
                            <option value=""></option>
                            <option value="0">H</option>
                            <option value="1">F</option>
                        </select>
                        @error('newUser.sexe')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Adresse e-mail</label>
                        <input type="text" class="form-control @error('newUser.email') is-invalid @enderror" wire:model='newUser.email'>
                        @error('newUser.email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label>Téléphone 1</label>
                            <input type="text" class="form-control @error('newUser.telephone1') is-invalid @enderror" wire:model='newUser.telephone1'>
                            @error('newUser.telephone1') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label>Téléphone 2</label>
                            <input type="text" class="form-control" wire:model='newUser.telephone2'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pièce d'identité</label>
                        <select name="" id="" class="form-control @error('newUser.pieceIdentite') is-invalid @enderror" wire:model='newUser.pieceIdentite'>
                            <option value=""></option>
                            <option value="CNI">CNI</option>
                            <option value="PASSPORT">Passeport</option>
                            <option value="PERMIS DE CONDUIRE">Permis de conduire</option>
                        </select>
                        @error('newUser.pieceIdentite') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label>No pièce d'identidité</label>
                        <input type="text" class="form-control @error('newUser.noPieceIdentite') is-invalid @enderror" wire:model='newUser.noPieceIdentite'>
                        @error('newUser.noPieceIdentite') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                    <button type="submit" wire:click.prevent='goToListUsers()' class="btn btn-primary">Retour</button>
                </div>
            </form>
        </div>
    </div>
</div>