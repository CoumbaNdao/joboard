<?php

use App\Http\Controllers\AdminControlleur;
use App\Http\Controllers\CandidatControlleur;
use App\Http\Controllers\TestControlleur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use \App\Http\Controllers\EntrepriseController;
use \App\Http\Controllers\AccueilControlleur;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('/offre')->name('offre.')->group(static function() {
    Route::get('/', [OffreController::class, 'index'])->name('index');
    Route::get('/search', [OffreController::class, 'search'])->name('search');
    Route::get('/show', [OffreController::class, 'show'])->name('show');
    Route::get('/delete/{offre}', [OffreController::class, 'delete'])->name('delete');
    Route::post('/update/{offre}', [OffreController::class, 'update'])->name('update');
    Route::post('/create', [OffreController::class, 'create'])->name('create');
    Route::get('/valider/{candidat}/{offre}/{etat}', [OffreController::class, 'valider'])->name('valider');
});

Route::prefix('/entreprise')->name('entreprise.')->group(static function() {
    Route::get('/', [EntrepriseController::class, 'index'])->name('index');
    Route::post('/login', [EntrepriseController::class, 'login'])->name('login');
    Route::get('/deconnexion', [EntrepriseController::class, 'deconnexion'])->name('deconnexion');
    Route::get('/inscription', [EntrepriseController::class, 'inscription'])->name('inscription');
    Route::get('/edit', [EntrepriseController::class, 'edit'])->name('edit');
    Route::post('/update', [EntrepriseController::class, 'update'])->name('update');
    Route::post('/create', [EntrepriseController::class, 'create'])->name('create');
});

Route::prefix('/')->name('')->group(static function() {
    Route::get('', [AccueilControlleur::class, 'index'])->name('index');
    Route::get('show', [AccueilControlleur::class, 'show'])->name('show');
    Route::post('create', [AccueilControlleur::class, 'create'])->name('create');
    Route::post('contact', [AccueilControlleur::class, 'contact'])->name('contact');

});


Route::prefix('/candidat')->name('candidat.')->group(static function() {
    Route::get('/', [CandidatControlleur::class, 'index'])->name('index');
    Route::post('/login', [CandidatControlleur::class, 'login'])->name('login');
    Route::get('/deconnexion', [CandidatControlleur::class, 'deconnexion'])->name('deconnexion');
    Route::get('/inscription', [CandidatControlleur::class, 'inscription'])->name('inscription');
    Route::post('/create', [CandidatControlleur::class, 'create'])->name('create');
    Route::get('/postuler/{offre}', [CandidatControlleur::class, 'postuler'])->name('postuler');
    Route::post('/send/{offre}', [CandidatControlleur::class, 'send'])->name('send');
    Route::get('/cancel/{offre}', [CandidatControlleur::class, 'cancel'])->name('cancel');
    Route::get('/edit', [CandidatControlleur::class, 'edit'])->name('edit');
    Route::post('update', [CandidatControlleur::class, 'update'])->name('update');




});


Route::prefix('/admin')->name('admin.')->group(static function() {
    Route::get('/', [AdminControlleur::class, 'index'])->name('index');
    Route::get('/offre/{offre}', [AdminControlleur::class, 'offre'])->name('offre');
    Route::get('/entreprise/{entreprise}', [AdminControlleur::class, 'entreprise'])->name('entreprise');
    Route::get('/candidat/{candidat}', [AdminControlleur::class, 'candidat'])->name('candidat');
    Route::post('/typeoffre/{typeOffre}', [AdminControlleur::class, 'typeOffre'])->name('typeOffre');
    Route::post('/typecompetence/{typeCompetence}', [AdminControlleur::class, 'typeCompetence'])->name('typeCompetence');
    Route::post('/competence/{competence}', [AdminControlleur::class, 'competence'])->name('competence');
    Route::post('/region/{region}', [AdminControlleur::class, 'region'])->name('region');
    Route::post('/lien', [AdminControlleur::class, 'lien'])->name('lien');
    Route::post('/creerpartenaire', [AdminControlleur::class, 'creerPartenaire'])->name('creerPartenaire');
    Route::post('/partenaire/{partenaire}', [AdminControlleur::class, 'partenaire'])->name('partenaire');
    Route::get('show', [AdminControlleur::class, 'show'])->name('show');

});

Route::get('/test', [TestControlleur::class, 'test'])->name('test');


require __DIR__.'/auth.php';
