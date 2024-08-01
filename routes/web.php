<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Utilisateurs;
use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/articles', function() {
    return Article::with('type')->get();
});
Route::get('/type_art', function() {
    return TypeArticle::with('articles')->get();
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// groupes des admins
Route::group([
    'middelware' => ['auth','admin'],
    'as' => 'admin.'
    
], function() {
    Route::group([
        'prefix' => 'habilitations',
        'as' => 'habilitations.'
    ], function() {
        Route::get('/utilisateurs', Utilisateurs::class)->name('users.index');
    });
});

// admin.habilitaions.users.index

// Route::get('/habititations/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])->name('utilisateurs')->middleware(AdminMiddleware::class);
