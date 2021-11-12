<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index'])->name('homeView');

// Visiteur
Route::get('/formations/visiteurs', [FormationController::class, 'indexVisiteurs'])->name('formationListVisiteurs');
Route::get('/formations/{id}/visiteurs',[FormationController::class,'detailsFormationVisiteurs'])->name('formationDetailVisiteurs');
Route::get('/formations/{id_formation}/visiteurs/chapitre/{id_chapitre}', [ChapitreController::class,'detailsChapitreVisiteur'])->name('formationChapitreVisiteurs');
//Routes qui s'occupent de la gestion d'envoie des mails pour la générations des comptes formateurs (get/post)
Route::get('/contact',[UserController::class,'create'])->name('contact');
Route::post('/contact', [UserController::class, 'store'])->name('sendMail');
//Recherche
Route::get('formations/recherche',[FormationController::class, 'recherche'])->name('recherche');
Route::get('formations/recherche/nom',[FormationController::class, 'rechercheNom'])->name('rechercheNom');
Route::get('formations/recherche/type',[FormationController::class, 'rechercheType'])->name('rechercheType');
Route::get('formations/recherche/categorie',[FormationController::class, 'rechercheCategorie'])->name('rechercheCategorie');


// Formateur + Admin (pour ne pas écrire le code 2 fois)
function formateurEtAdmin(): void
{
    // Pour la partie Formations -> ajouter/modifier/supprimer
    Route::get('/formations', [FormationController::class, 'index'])->name('formationList');
    Route::get('/formations/ajouter', [FormationController::class, 'add'])->name('formationAdd');
    Route::post('/formations/ajouter', [FormationController::class, 'store'])->name('formationStore');
    Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formationUpdate');
    Route::delete('/formations/{id}', [FormationController::class, 'delete'])->name('formationDelete');
    Route::get('/formations/{id}', [FormationController::class, 'details'])->name('formationDetails');


    Route::put('/formations/{id}/image', [FormationController::class, 'updateImage'])->name('formationUpdateImage');
    Route::get('/profil/{id}',[UserController::class, 'profil'])->name('profilRoute');
    Route::put('/profil/{id}/password',[UserController::class, 'updatePassword'])->name('editPassword');
    Route::put('/profil/{id}/profil',[UserController::class, 'updateProfil'])->name('editProfil');
}

// Les routes que pour l'admin
Route::group(['middleware' => ['admin']], function(){
    //Route pour que l'admin confirme la demande d'un visiteur pour qu'il devient formateur
    Route::get('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmView'])->name('confirmUser');
    Route::post('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmAction'])->name('sendConfirmUser');

    formateurEtAdmin();

    // Pour la partie Catégories -> ajouter/modifier/supprimer
    Route::get('/categories', [CategorieController::class, 'index'])->name('categoriesList');
    Route::get('/categories/ajouter', [CategorieController::class, 'add'])->name('categorieAdd');
    Route::post('/categories/ajouter', [CategorieController::class, 'store'])->name('categorieStore');
    Route::put('/categories/{id}', [CategorieController::class, 'update'])->name('categorieUpdate');
    Route::delete('/categories/{id}', [CategorieController::class, 'delete'])->name('categorieDelete');

    // Pour la partie Chapitres -> ajouter/modifier/supprimer
    Route::get('/chapitres',[ChapitreController::class, 'index'])->name('chapitresList');
    Route::get('/chapitres/ajouter',[ChapitreController::class, 'add'])->name('chapitresAdd');
    Route::post('/chapitres/ajouter',[ChapitreController::class, 'store'])->name('chapitresStore');

    Route::get('/chapitres/{id}',[ChapitreController::class, 'details'])->name('chapitreDetail');
    Route::put('/chapitres/{id}',[ChapitreController::class, 'update'])->name('chapitreUpdate');
    Route::delete('/chapitres/{id}',[ChapitreController::class, 'delete'])->name('chapitreDelete');
});

// Les routes dédiés au formateurs
Route::group(['middleware' => ['auth']], function(){
    formateurEtAdmin();
});


Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
