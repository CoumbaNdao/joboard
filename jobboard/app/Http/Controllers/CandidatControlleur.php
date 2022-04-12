<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Competence;
use App\Models\Disposer;
use App\Models\Entreprise;
use App\Models\NiveauEtude;
use App\Models\Offre;
use App\Models\Postuler;
use App\Models\Region;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class CandidatControlleur extends Controller
{
    public function index()
    {
        return view('candidat.connexionCandidat');
    }
// CONNEXION
    public function login(Request $request)
    {

        $candidat = Candidat::where('loginCandidat', '=', $request->loginCandidat)
            ->get()->first();

        if (isset($candidat) && !Hash::check($request->mdpCandidat, $candidat->mdpCandidat)) {
            $candidat = null;
        }
        if (isset($candidat)) {
            Cache::set('candidat', $candidat->IDCandidat);
            return redirect()->route('offre.index');
        }
        return back()->withInput();
    }
// DECONNEXION
    public function deconnexion()
    {
        Cache::delete('candidat');
        return redirect()->route('candidat.index');
    }
 //INSCRIPTION
    public function inscription()
    {

        $regions = Region::all();
        $niveauetudes = NiveauEtude::all();
        $competences = Competence::all();

        if (Cache::get('message')) {
            $message = Cache::get('message');
            Cache::delete('message');
        }

        return view('candidat.inscriptionCandidat', [
            'regions' => $regions,
            'message' => $message ?? '',
            'niveauEtudes' => $niveauetudes,
            'competences' => $competences
        ]);
    }

    public function create(Request $request)
    {

        $request->validate([
            'mdpCandidat' => 'required|min:8'
        ]);


        if ($request->validationMdp !== $request->mdpCandidat) {
            Cache::set('message', "Veuillez saisir le meme mot de passe !");
            return redirect()->route('candidat.inscription');
        }


        try {

            $niveau = NiveauEtude::where('diplomeObtenu', '=', $request->IDNiveauEtude)->first()->IDNiveauEtude;
            // $region = Region::where('nomRegion', '=', $request->codePostalRegion,)->first()->codePostalRegion;
            $candidat = Candidat::create([
                'nomCandidat' => $request->nomCandidat,
                'prenomCandidat' => $request->prenomCandidat,
                'emailCandidat' => $request->emailCandidat,
                'adresseCandidat' => $request->adresseCandidat,
                'cpCandidat' => $request->cpCandidat,
                'villeCandidat' => $request->villeCandidat,
                'loginCandidat' => $request->loginCandidat ?? $request->emailCandidat,
                'mdpCandidat' => Hash::make($request->mdpCandidat),
                'IDNiveauEtude' => $niveau,
                'telephoneCandidat' => $request->telephoneCandidat,
                'codePostalRegion' => $request->codePostalRegion,
            ]);

            $IDCompetence = Competence::where('libelleCompetence', '=', $request->IDCompetence)->first()->IDCompetence;

            Disposer::create([
                'IDCandidat' => $candidat->IDCandidat,
                'IDCompetence' => $IDCompetence
            ]);

        } catch (\Exception $e) {

            abort(500, "Un erreur est survenue lors de la creation de votre !!!! " . $e);
            return back()->withInput();
        }


        if (isset($candidat)) {
            Cache::set('candidat', $candidat->IDCandidat);
            return redirect()->route('offre.index');
        }

        return redirect()->route('offre.index');
    }
//CANDIDATURE
    public function postuler(Offre $offre)
    {

        if (!Candidat::find(Cache::get('candidat'))) {
            return redirect()->route('candidat.index');
        }

        $candidat = Candidat::find(Cache::get('candidat'));

        return view('candidat.postuler', [
            'candidat' => $candidat,
            'offre' => $offre
        ]);
    }

    public function send(Request $request, Offre $offre)
    {

        $entreprise = Entreprise::find($offre->numeroSiret);
        $candidat = Candidat::find(Cache::get('candidat'));

        $pathCandidat = "C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\doc\candidat\\" . $candidat->prenomCandidat . $candidat->nomCandidat;
        $pathCandidatOffre = $pathCandidat . "\\" . $offre->titreOffre;

       /* $pathEntreprise = "C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\doc\\entreprise\\" . $entreprise->raisonSociale;
        $pathEntrepriseCandidat = $pathEntreprise . "\\" . $candidat->prenomCandidat . $candidat->nomCandidat;
        $pathEntrepriseOffre = $pathEntrepriseCandidat . "\\" . $offre->titreOffre;*/

        if (!is_dir($pathCandidat)) {
            mkdir($pathCandidat);
        }
        if (!is_dir($pathCandidatOffre)) {
            mkdir($pathCandidatOffre);
        }


        $cv = $request->file('CVCandidat');


        $cv->move($pathCandidatOffre, $cv->getClientOriginalName());



        // copy($pathCandidatOffre . "\\" . $cv->getClientOriginalName(), $pathEntrepriseOffre . "\\_" . $cv->getClientOriginalName());


        return redirect()->route('offre.index');

    }

    public function cancel(Offre $offre)
    {

        try {
           Postuler::where('IDCandidat', '=', Cache::get('candidat'))
                ->where('IDOffre', '=', $offre->IDOffre)->first()
               ->delete();
        }
        catch (Exception $e){
            return back()->withInput();
        }

        return redirect()->route('offre.index');
    }
//GESTION DU PROFIL
    public function edit()
    {
        $regions = Region::all();
        $niveauetudes = NiveauEtude::all();
        $competences = Competence::all();


        $candidat = Candidat::find(Cache::get('candidat'));
        return view('candidat.profileCandidat', [
            'regions' => $regions,
            'message' =>  '',
            'niveauEtudes' => $niveauetudes,
            'competences' => $competences,
            'candidat' => $candidat
        ]);
    }

    public function update(Request $request)
    {
        $candidat = Candidat::find(Cache::get('candidat'));

        try {
            $regions = Region::where('nomRegion', '=' ,  $request->codePostalRegion )->get()->first() ;
            $niveauEtude = NiveauEtude::where('diplomeObtenu', '=', $request->IDNiveauEtude )->get()->first();
            $candidat->update([
                'emailCandidat' => $request->emailCandidat ?? $candidat->emailCandidat,
                'adresseCandidat' => $request->adresseCandidat ?? $candidat->adresseeCandidat,
                'cpCandidat' => $request->cpCandidat ?? $candidat->cpCandidat,
                'villeCandidat' => $request->villeCandidat ?? $candidat->villeCandidat,
                'telephoneCandidat' => $request->telephoneCandidat ?? $candidat->telephoneCandidat,
                'codePostalRegion' => $regions->codePostalRegion ?? $candidat->codePostalRegion,
                'IDNiveauEtude' => $niveauEtude->IDNiveauEtude ?? $candidat->IDNiveauEtude

            ]);

        }
        catch (Exception $e)
        {
            return back()->withInput();
        }

    if (!$request->mdpCandidat){
        return redirect()->route('offre.index');
    }

        if ((Hash::check($request->oldPassword, $candidat->mdpCandidat)) && ($request->mdpCandidat == $request->validationMdp))
        {
           try {
               $candidat->update([
                   'loginCandidat' => $request->loginCandidat ?? $candidat->loginCandidat,
                   'mdpCandidat' => Hash::make($request->mdpCandidat)
               ]);

               Cache::delete('candidat');
               return redirect()->route('candidat.index');
           }catch (Exception $e)
           {
               return back()->withInput();
           }
        }

        return back()->withInput();

    }


    public function recoverPassword(Request $request, $loginCandidat=null)
    {
        if ($request->loginCandidat &&  !isset($loginCandidat)) {

            if (!$request->loginCandidat) {
                return redirect()->route('offre.show');
            }
            $candidat = Candidat::where('loginCandidat', '=', $request->loginCandidat)->get()->first();
            // dd($entreprise, $request->all());

            if ($request->mdpCandidat == $request->validationMdp) {
                try {
                    $candidat->update([
                        'mdpCandidat' => Hash::make($request->mdpCandidat) ?? $candidat->mdpCandidat
                    ]);

                    Cache::delete('candidat');
                    return redirect()->route('candidat.index');
                } catch (Exception $e) {
                    return back()->withInput();
                }
            }

            return back()->withInput();
        }
        return view('candidat.reinitialisermdpC', ['mail' => $loginCandidat]);
    }
}



