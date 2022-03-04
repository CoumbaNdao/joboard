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
use Mockery\Exception;

class CandidatControlleur extends Controller
{
    public function index()
    {
        return view('candidat.connexionCandidat');
    }

    public function login(Request $request)
    {

        $candidat = Candidat::where('loginCandidat', '=', $request->loginCandidat)
            ->where('mdpCandidat', '=', $request->mdpCandidat)
            ->get()->first();


        if (isset($candidat)) {
            Cache::set('candidat', $candidat->IDCandidat);
            return redirect()->route('offre.index');
        }
        return back()->withInput();
    }

    public function deconnexion()
    {
        Cache::delete('candidat');
        return redirect()->route('candidat.index');
    }


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
                'mdpCandidat' => $request->mdpCandidat,
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
            return back()->withInput();
        }


        if (isset($candidat)) {
            Cache::set('candidat', $candidat->IDCandidat);
            return redirect()->route('offre.index');
        }

        return redirect()->route('offre.index');
    }

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

        $pathEntreprise = "C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\doc\\entreprise\\" . $entreprise->raisonSociale;
        $pathEntrepriseCandidat = $pathEntreprise . "\\" . $candidat->prenomCandidat . $candidat->nomCandidat;
        $pathEntrepriseOffre = $pathEntrepriseCandidat . "\\" . $offre->titreOffre;

        if (!is_dir($pathCandidat)) {
            mkdir($pathCandidat);
        }
        if (!is_dir($pathCandidatOffre)) {
            mkdir($pathCandidatOffre);
        }

        if (!is_dir($pathEntreprise)) {
            mkdir($pathEntreprise);
        }

        if (!is_dir($pathEntrepriseCandidat)) {
            mkdir($pathEntrepriseCandidat);
        }

        if (!is_dir($pathEntrepriseOffre)) {
            mkdir($pathEntrepriseOffre);
        }


        $cv = $request->file('CVCandidat');


        $cv->move($pathCandidatOffre, $cv->getClientOriginalName());

        //  $cv->move($pathEntrepriseOffre, $cv->getClientOriginalName());

        copy($pathCandidatOffre . "\\" . $cv->getClientOriginalName(), $pathEntrepriseOffre . "\\_" . $cv->getClientOriginalName());
        Postuler::create([
            'IDCandidat' => $candidat->IDCandidat,
            'IDOffre' => $offre->IDOffre,
            'statutPostuler' => 2
        ]);

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

        if (($request->oldPassword == $candidat->mdpCandidat ) && ($request->mdpCandidat == $request->validationMdp))
        {
           try {
               $candidat->update([
                   'loginCandidat' => $request->loginCandidat ?? $candidat->loginCandidat,
                   'mdpCandidat' => $request->mdpCandidat
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


    public function recoverPassword(Request $request)
    {


        if ($request->loginCandidat) {

            if (!$request->loginCandidat) {
                return redirect()->route('offre.show');
            }
            $candidat = Candidat::where('loginCandidat', '=', $request->loginCandidat)->get()->first();
            // dd($entreprise, $request->all());

            if ($request->mdpCandidat == $request->validationMdp) {
                try {
                    $candidat->update([
                        'mdpCandidat' => $request->mdpCandidat ?? $candidat->mdpCandidat
                    ]);

                    Cache::delete('candidat');
                    return redirect()->route('candidat.index');
                } catch (Exception $e) {
                    return back()->withInput();
                }
            }

            return back()->withInput();
        }

        return view('candidat.reinitialisermdpC');


    }
}



