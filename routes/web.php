<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;

//La page d'accueil :
Route::get('/',[HomeController::class,'index'])->name('homeView');

//Routes qui s'occupent des formations (Get/Post/Put)
Route::get('/formations', [FormationController::class, 'index'])->name('formationList');



//Routes qui s'occupent de la gestion d'envoie des mails pour la générations des comptes formateurs (get/post)
Route::get('/contact',[ContactController::class,'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('sendMail');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
