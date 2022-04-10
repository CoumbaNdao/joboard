<?php

namespace App\Http\Controllers;

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
        $offresExpire = Offre::join('postuler', 'offre.IDOffre', '=', 'postuler.IDOffre')
            ->where('statutPostuler', '>', 2)
            ->groupBy('offre.IDOffre', 'offre.titreOffre')
            ->get();
        return view('admin.homeAdmin', [
            'candidats' => $candidats,
            'entreprises' => $entreprises,
            'offres' => $offres,
            'regions' => $regions,
            'competences' => $competences,
            'niveauEtudes' => $niveauEtudes,
            'offresExpire' => $offresExpire
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
        Requerir::where('IDOffre', '=', $offre->IDOffre)
            ->delete();

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

        return view('admin.show', [
            'typeOffres' => $typeOffres,
            'typeCompetences' => $typeCompetences,
            'regions' => $regions,
            'competences' => $competences,
            'partenaires' => $partenaires
        ]);
    }



    public function typeOffre(Request $request, TypeOffre $typeOffre)
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



    public function TypeCompetence(Request $request, TypeCompetence $typeCompetence)
    {
        if ($request->Valider) {

            $typeCompetence->update([
                'libelleTypeCompetence' => $request->libelleTypeCompetence
            ]);
        }

        if ($request->Supprimer) {

            $typeCompetence->delete();
        }


        if ($request->Creer) {
            typeCompetence::create([
                'libelleTypeCompetence' => $request->libelleTypeCompetence
            ]);
        }
        return redirect()->route('admin.show');
    }

    public function Competence(Request $request, Competence $competence)
    {

        if ($request->Valider) {

            $competence->update([
                'libelleCompetence' => $request->libelleCompetence
            ]);
        }

        if ($request->Supprimer) {

            $competence->delete();
        }


        if ($request->Creer) {
            Competence::create([
                'libelleCompetence' => $request->libelleCompetence
            ]);
        }

        return redirect()->route('admin.show');
    }


    public function region(Request $request, Region $region)
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
}
