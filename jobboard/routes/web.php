<?php

use App\Http\Controllers\AdminControlleur;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\PasswordManagerController;
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
    Route::get('/delete/{entreprise}', [EntrepriseController::class, 'delete'])->name('delete');
    Route::post('/login', [EntrepriseController::class, 'login'])->name('login');
    Route::get('/deconnexion', [EntrepriseController::class, 'deconnexion'])->name('deconnexion');
    Route::get('/inscription', [EntrepriseController::class, 'inscription'])->name('inscription');
    Route::get('/edit', [EntrepriseController::class, 'edit'])->name('edit');
    Route::post('/update', [EntrepriseController::class, 'update'])->name('update');
    Route::post('/create', [EntrepriseController::class, 'create'])->name('create');
    Route::match(['get', 'post'],'/ressetPassWordE/{loginEntreprise?}', [EntrepriseController::class, 'recoverPassword'])->name('recoverPassword');
});

Route::prefix('/')->name('')->group(static function() {
    Route::get('', [AccueilControlleur::class, 'index'])->name('index');
    Route::get('show', [AccueilControlleur::class, 'show'])->name('show');
    Route::post('create', [AccueilControlleur::class, 'create'])->name('create');
    Route::post('contact', [AccueilControlleur::class, 'contact'])->name('contact');

});

Route::prefix('/candidat')->name('candidat.')->group(static function() {
    Route::get('/', [CandidatController::class, 'index'])->name('index');
    Route::post('/login', [CandidatController::class, 'login'])->name('login');
    Route::get('/delete/{candidat}', [CandidatController::class, 'delete'])->name('delete');
    Route::get('/deconnexion', [CandidatController::class, 'deconnexion'])->name('deconnexion');
    Route::get('/inscription', [CandidatController::class, 'inscription'])->name('inscription');
    Route::post('/create', [CandidatController::class, 'create'])->name('create');
    Route::get('/postuler/{offre}', [CandidatController::class, 'postuler'])->name('postuler');
    Route::post('/send/{offre}', [CandidatController::class, 'send'])->name('send');
    Route::get('/cancel/{offre}', [CandidatController::class, 'cancel'])->name('cancel');
    Route::get('/edit', [CandidatController::class, 'edit'])->name('edit');
    Route::post('update', [CandidatController::class, 'update'])->name('update');
    Route::match(['get', 'post'],'/ressetPassWordC/{loginCandidat?}', [CandidatController::class, 'recoverPassword'])->name('recoverPassword');
});

Route::prefix('/dbadmin')->name('admin.')->group(static function() {
    Route::get('/', [AdminControlleur::class, 'index'])->name('index');
    Route::get('/offre/{offre}', [AdminControlleur::class, 'offre'])->name('offre');
    Route::get('/archioffre/{archioffre}', [AdminControlleur::class, 'archioffre'])->name('archioffre');
    Route::get('/archicandidat/{archiCandidat}', [AdminControlleur::class, 'archiCandidat'])->name('archiCandidat');
    Route::get('/archicentreprise/{archiEntreprise}', [AdminControlleur::class, 'archiEntreprise'])->name('archiEntreprise');
    Route::get('/entreprise/{entreprise}', [AdminControlleur::class, 'entreprise'])->name('entreprise');
    Route::get('/candidat/{candidat}', [AdminControlleur::class, 'candidat'])->name('candidat');
    Route::post('/typeoffre/{typeOffre?}', [AdminControlleur::class, 'typeOffre'])->name('typeOffre');
    Route::post('/typecompetence/{typeCompetence?}', [AdminControlleur::class, 'typeCompetence'])->name('typeCompetence');
    Route::post('/competence/{competence?}', [AdminControlleur::class, 'competence'])->name('competence');
    Route::post('/region/{region?}', [AdminControlleur::class, 'region'])->name('region');
    Route::post('/lien', [AdminControlleur::class, 'lien'])->name('lien');
    Route::post('/creerpartenaire', [AdminControlleur::class, 'creerPartenaire'])->name('creerPartenaire');
    Route::post('/creerniveauetude', [AdminControlleur::class, 'creerNiveauEtude'])->name('creerNiveauEtude');
    Route::post('/partenaire/{partenaire}', [AdminControlleur::class, 'partenaire'])->name('partenaire');
    Route::post('/niveauetude/{niveauEtude}', [AdminControlleur::class, 'niveauEtude'])->name('niveauEtude');
    Route::get('/show', [AdminControlleur::class, 'show'])->name('show');

});

Route::get('/test', [TestControlleur::class, 'test'])->name('test');

Route::match(['get', 'post'], '/reset-pass-word-e', [PasswordManagerController::class, 'ressetPassWordE'])->name('ressetPassWordE');
Route::match(['get', 'post'], '/reset-pass-word-c', [PasswordManagerController::class, 'ressetPassWordC'])->name('ressetPassWordC');

require __DIR__.'/auth.php';



