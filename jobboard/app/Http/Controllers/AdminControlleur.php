<?php

namespace App\Http\Controllers;

use App\Models\ArchiCandidat;
use App\Models\ArchiEntreprise;
use App\Models\Archioffre;
use App\Models\Candidat;
use App\Models\Competence;
use App\Models\Concerner;
use App\Models\Disposer;
use App\Models\Entreprise;
use App\Models\NiveauEtude;
use App\Models\Offre;
use App\Models\Partenaire;
use App\Models\Region;
use App\Models\Requerir;
use App\Models\TypeCompetence;
use App\Models\TypeOffre;
use Illuminate\Http\Request;
use Mockery\Exception;

class AdminControlleur extends Controller
{
    public function index()
    {
        $candidats = Candidat::all();
        $entreprises = Entreprise::all();
        $offres = Offre::all();
        $regions = Region::all();
        $competences = Competence::all();
        $niveauEtudes = NiveauEtude::all()->unique('libelleNiveauEtude');
        $offresExpire = Archioffre::all();
        $entreprisesArcho = ArchiEntreprise::all();
        $candidatsArchi = ArchiCandidat::all();
        return view('admin.homeAdmin', [
            'candidats' => $candidats,
            'entreprises' => $entreprises,
            'offres' => $offres,
            'regions' => $regions,
            'competences' => $competences,
            'niveauEtudes' => $niveauEtudes,
            'offresExpire' => $offresExpire,
            'entreprisesArcho' => $entreprisesArcho,
            'candidatsArchi' => $candidatsArchi
        ]);
    }

    public function candidat(Candidat $candidat)
    {

        Disposer::where('IDCandidat', '=', $candidat->IDCandidat)
            ->delete();
        $candidat->delete();

        return redirect()->route('admin.index');
    }

    public function offre(Offre $offre)
    {
       // Requerir::where('IDOffre', '=', $offre->IDOffre)->delete();
      // Postuler::where('IDOffre', '=', $offre->IDOffre)->delete();
       // Offre::where('IDOffre', '=', $offre->IDOffre)->delete();
        $offre->delete_postuler();
        $offre->delete_requerir();
        $offre->delete();

        return redirect()->route('admin.index');
    }

    public function entreprise(Entreprise $entreprise)

    {

        Requerir::whereIn('IDOffre', $entreprise->offres->pluck('IDOffre'))->delete();

        $entreprise->offres()->delete();

        $entreprise->delete();

        return redirect()->route('admin.index');
    }

    public function show()
    {
        $typeOffres = TypeOffre::all();
        $typeCompetences = TypeCompetence::all();
        $regions = Region::all();
        $competences = Competence::all();
        $partenaires = Partenaire::all();
        $niveauEtudes = NiveauEtude::all()->unique('libelleNiveauEtude');

        return view('admin.show', [

            'typeOffres' => $typeOffres,
            'typeCompetences' => $typeCompetences,
            'regions' => $regions,
            'competences' => $competences,
            'partenaires' => $partenaires,
            'niveauEtudes' => $niveauEtudes
        ]);
    }

    public function typeOffre(Request $request, TypeOffre $typeOffre=null)
    {


        if ($request->Valider) {

            $typeOffre->update([
                'libelleTypeOffre' => $request->libelleTypeOffre
            ]);
        }

        if ($request->Supprimer) {

            $offre = Offre::where('IDTypeOffre', '=', $typeOffre->IDTypeOffre)
                ->get();


            Requerir::whereIn('IDOffre', $offre->pluck('IDOffre'))
                ->delete();

            Offre::where('IDTypeOffre', '=', $typeOffre->IDTypeOffre)
                ->delete();

            $typeOffre->delete();
        }


        if ($request->Creer) {
            TypeOffre::create([
                'libelleTypeOffre' => $request->libelleTypeOffre
            ]);
        }

        return redirect()->route('admin.show');
    }

    public function Competence(Request $request, Competence $competence=null)
    {

        if ($request->Valider) {

            $competence->update([
                'libelleCompetence' => $request->libelleCompetence
            ]);
        }

        if ($request->Supprimer) {

            $competence->delete();
            $competence->delete_disposer();
        }

        if ($request->Creer) {
            Competence::create([
                'libelleCompetence' => $request->libelleCompetence
            ]);
        }

        return redirect()->route('admin.show');
    }

    public function region(Request $request, Region $region=null)
    {

        if ($request->Valider) {

            $region->update([
                'nomRegion' => $request->nomRegion
            ]);
        }

        if ($request->Supprimer) {
            try {
                $region->delete();
            } catch (\Exception $e) {
                return back()->withInput();
            }

        }

        if ($request->Creer) {
            Region::create([
                'nomRegion' => $request->nomRegion
            ]);
        }

        return redirect()->route('admin.show');
    }

    public function lien(Request $request)
    {

        try {
            Concerner::create([
                'IDTypeCompetence' => $request->IDTypeCompetence,
                'IDCompetence' => $request->IDCompetence
            ]);
        } catch (Exception $e) {
            return back()->withInput();
        }


        return redirect()->route('admin.show');
    }

    public function creerPartenaire(Request $request)
    {


        $cv = $request->file('logoPartenaire');


        $cv->move('C:\Users\MameCoumbaNDAO\Desktop\jobsearch\jobboard\public\images\logo\\', $cv->getClientOriginalName());


        $logo = 'images\logo\\' . $cv->getClientOriginalName();
        try {
            Partenaire::create([
                'SiretPartenaire' => $request->SiretPartenaire,
                'RaisonSocialePartenaire' => $request->RaisonSocialePartenaire,
                'siegePartenaire' => $request->siegePartenaire,
                'cpPartenaire' => $request->cpPartenaire,
                'villePartenaire' => $request->villePartenaire,
                'contactPartenaire' => $request->contactPartenaire,
                'dateDebutPartenariat' => $request->dateDebutPartenariat,
                'logoPartenaire' => $logo
            ]);
        } catch (Exception $e) {
            return back()->withInput();
        }
        return redirect()->route('admin.show');
    }

    public function partenaire(Request $request, Partenaire $partenaire)
    {
        if ($request->Valider) {
            try {
                $partenaire->update([
                    'SiretPartenaire' => $request->SiretPartenaire,
                    'RaisonSocialePartenaire' => $request->RaisonSocialePartenaire,
                    'siegePartenaire' => $request->siegePartenaire,
                    'cpPartenaire' => $request->cpPartenaire,
                    'villePartenaire' => $request->villePartenaire,
                    'contactPartenaire' => $request->contactPartenaire,
                    'dateDebutPartenariat' => $request->dateDebutPartenariat,

                ]);
            } catch (Exception $e) {
                return back()->withInput();
            }
        }elseif($request->Supprimer)
        {
            $partenaire->delete();
        }

        return redirect()->route('admin.show');
    }

    public function archioffre(Archioffre $archioffre)
    {

        $archioffre->delete();

        return redirect()->route('admin.index');
    }

    public function archiCandidat(ArchiCandidat $archiCandidat)
    {

        $archiCandidat->delete();

        return redirect()->route('admin.index');
    }

    public function archiEntreprise(ArchiEntreprise $archiEntreprise)
    {

        $archiEntreprise->delete();

        return redirect()->route('admin.index');
    }

    public function creerNiveauEtude(Request $request)
    {
        try {
            NiveauEtude::create([
                'libelleNiveauEtude' => $request->libelleNiveauEtude,
                'diplomeObtenu' => $request->diplomeObtenu,
            ]);
        } catch (Exception $e) {
            return back()->withInput();
        }
        return redirect()->route('admin.show');

    }

    public function niveauEtude(Request $request, NiveauEtude $niveauEtude)
    {
        if ($request->Valider) {
            try {
                $niveauEtude->update([
                    'libelleNiveauEtude' => $request->libelleNiveauEtude,
                    'diplomeObtenu' => $request->diplomeObtenu,
                ]);
            } catch (Exception $e) {
                return back()->withInput();
            }
        }elseif($request->Supprimer)
        {
            $niveauEtude->delete();
        }

        return redirect()->route('admin.show');
    }

}
