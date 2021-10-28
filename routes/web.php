<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//La page d'accueil :
Route::get('/',[HomeController::class,'index'])->name('homeView');

//Routes qui s'occupent de lister toutes les formations (Get)
Route::get('/formations', [FormationController::class, 'index'])->name('formationList');
// Ajouter une nouvelle formation
Route::get('/formations/ajouter', [FormationController::class, 'add'])->name('formationAdd');
Route::post('/formations/ajouter}', [FormationController::class, 'store'])->name('formationStore');

//Route qui va afficher le détail d'une formation (Get)
Route::get('/formations/{id}', [FormationController::class, 'details'])->name('formationDetails');

Route::get('/formations/{nom}', [FormationController::class, 'detailsNom'])->name('formationDetailsNOM');
Route::put('/formations/{id}/modifer', [FormationController::class, 'update'])->name('formationUpdate');
Route::put('/formations/{id}/modifier/image',[FormationController::class, 'updateImage'])->name('formationUpdateImage');
Route::delete('/formations/{id}', [FormationController::class, 'delete'])->name('formationDelete');


//Routes qui s'occupent de la gestion d'envoie des mails pour la générations des comptes formateurs (get/post)
Route::get('/contact',[UserController::class,'create'])->name('contact');
Route::post('/contact', [UserController::class, 'store'])->name('sendMail');

Route::get('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmView'])->name('confirmUser');
Route::post('/user/confirm/{id}/{confirmation_token}',[UserController::class, 'confirmAction'])->name('sendConfirmUser');

Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
