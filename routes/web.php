<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//La page d'accueil :
Route::get('/',[HomeController::class,'index'])->name('homeView');

// Pour la partie VISITEURS
Route::get('/formations/visiteurs', [FormationController::class, 'indexVisiteurs'])->name('formationListVisiteurs');
Route::get('/formations/{id}/visiteurs',[FormationController::class,'detailsFormationVisiteurs'])->name('formationDetailVisiteurs');

Route::get('/formations/visiteurs/chapitre/{id}', [ChapitreController::class,'details'])->name('chapitreFormation');
// Pour la partie FORMATEUR (Utilisateur, ajouter/modifier/supprimer)
Route::get('/formations', [FormationController::class, 'index'])->name('formationList')->middleware(['auth']);
Route::get('/formations/ajouter', [FormationController::class, 'add'])->name('formationAdd')->middleware(['auth']);
Route::post('/formations/ajouter}', [FormationController::class, 'store'])->name('formationStore')->middleware(['auth']);
Route::put('/formations/{id}', [FormationController::class, 'update'])->name('formationUpdate')->middleware(['auth']);
Route::get('/formations/{id}', [FormationController::class, 'details'])->name('formationDetails')->middleware(['auth']);

Route::put('/formations/{id}/image',[FormationController::class, 'updateImage'])->name('formationUpdateImage')->middleware(['auth']);
Route::delete('/formations/{id}', [FormationController::class, 'delete'])->name('formationDelete')->middleware(['auth']);


Route::get('/categories',[CategorieController::class, 'index'])->name('categoriesList')->middleware(['auth']);
Route::get('/categories/ajouter',[CategorieController::class, 'add'])->name('categorieAdd')->middleware(['auth']);
Route::post('/categories/ajouter',[CategorieController::class, 'store'])->name('categorieStore')->middleware(['auth']);
Route::put('/categories/{id}',[CategorieController::class, 'update'])->name('categorieUpdate')->middleware(['auth']);
Route::delete('/categories/{id}',[CategorieController::class, 'delete'])->name('categorieDelete')->middleware(['auth']);


//Routes qui s'occupent de la gestion d'envoie des mails pour la générations des comptes formateurs (get/post)
Route::get('/contact',[UserController::class,'create'])->name('contact');
Route::post('/contact', [UserController::class, 'store'])->name('sendMail');

Route::get('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmView'])->name('confirmUser');
Route::post('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmAction'])->name('sendConfirmUser');

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
