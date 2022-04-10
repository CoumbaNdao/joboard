<?php

namespace App\Http\Controllers;


use App\Models\Candidat;
use App\Models\Competence;
use App\Models\Entreprise;
use App\Models\NiveauEtude;
use App\Models\Offre;
use App\Models\Postuler;
use App\Models\Region;
use App\Models\Requerir;
use App\Models\TypeCompetence;
use App\Models\TypeOffre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;
use function GuzzleHttp\Promise\all;

class OffreController extends Controller
{
    public function index()
    {

        if (Cache::get('entreprise')) {
            return redirect()->route('offre.show');
        }

        if (Cache::get('candidat')) {
            //return redirect()->route('candidat.index');

            $candidat = Candidat::find(Cache::get('candidat'));
            $candidatures = Offre::join('postuler', 'offre.IDOffre', '=', 'postuler.IDOffre')
                ->where('IDCandidat', '=', $candidat->IDCandidat)
                ->orderBy('offre.created_at')
                ->get();

            $candidaturesId = $candidatures->pluck('IDOffre');
        } else {
            $candidaturesId = null;
        }
        $offres = Offre::when(isset($candidaturesId), static function ($q) use ($candidaturesId) {
            return $q->whereNotIn('IDOffre', $candidaturesId);
        })
            ->where('statutOffre', '=', 'publiee')
            ->orderBy('created_at')
            ->get();

        $regions = Region::all();

        return view('offre.offre', [
            'offres' => $offres ?? [],
            'regions' => $regions,
            'candidat' => $candidat ?? null,
            'candidatures' => $candidatures ?? null
        ]);
    }

    public function search(Request $request)
    {

        if (Cache::get('candidat')) {
            //return redirect()->route('candidat.index');

            $candidat = Candidat::find(Cache::get('candidat'));
            $candidatures = Offre::join('postuler', 'offre.IDOffre', '=', 'postuler.IDOffre')
                ->where('IDCandidat', '=', $candidat->IDCandidat)
                ->orderBy('offre.created_at')
                ->get();

            $candidaturesId = $candidatures->pluck('IDOffre');
        } else {
            $candidaturesId = null;
        }


        $table [] = $request->stage ? 6 : null;
        $table [] = $request->alternance ? 7 : null;
        $table [] = $request->cdi ? 8 : null;
        $table [] = $request->cdd ? 9 : null;
        $table [] = $request->interim ? 10 : null;

        $a = 0;

        foreach ($table as $tab) {
            $a = $a + ($tab > 0);
        }

        if ($a === 0) {
            $table = null;
        }


        $offres = Offre::
        when(isset($candidaturesId), static function ($q) use ($candidaturesId) {
            return $q->whereNotIn('IDOffre', $candidaturesId);
        })
            ->when($request->region, static function ($q) use ($request) {
                return $q->join('entreprise', 'entreprise.numeroSiret', '=', 'offre.numeroSiret')
                    ->where('codePostalRegion', '=', $request->region);
            })
            ->when($request->poste, static function ($q) use ($request) {
                return $q->where('titreOffre', 'like', '%' . $request->poste . '%');
            })
            ->when($table, static function ($q) use ($table) {
                return $q->whereIn('IDTypeOffre', $table);
            })
            ->where('statutOffre', '=', 'publiee')
            ->orderBy('created_at')
            ->get();

        $regions = Region::all();

        return view('offre.offre', [
            'offres' => $offres,
            'regions' => $regions,
            'candidat' => $candidat ?? null,
            'candidatures' => $candidatures ?? null
        ]);

    }


    public function update(Request $request, Offre $offre)
    {
        $offre->update([
            'titreOffre' => $request->titreOffre,
            'descOffre' => $request->descOffre,
            'statutOffre' => $request->statutOffre,
            'remuneration' => $request->remuneration,
            'dureeContrat' => $request->dureeContrat,
            'datePubOffre' => $request->datePubOffre
        ]);

        return redirect()->route('offre.show', [Cache::get('entreprise')]);
    }

    public function delete(Offre $offre)
    {

        $offre->delete_postuler();

        $offre->delete_requerir();

        $offre->delete();

        return redirect()->route('offre.show', [Cache::get('entreprise')]);
    }

    public function show()
    {
        if (!Cache::get('entreprise')) {
            return redirect()->route('entreprise.index');
        }

        $competences = Competence::all();

        $entreprise = Entreprise::find(Cache::get('entreprise'));

        $niveauetudes = NiveauEtude::all();

        $typeOffres = TypeOffre::all();

        $candidatures = Offre::select(['nomCandidat', 'prenomCandidat', 'titreOffre', 'postuler.created_at as date', 'candidat.IDCandidat', 'offre.IDOffre'])
        ->join('postuler', 'offre.IDOffre', '=', 'postuler.IDOffre')
            ->join('candidat', 'candidat.IDCandidat', '=', 'postuler.IDCandidat')
            ->where('numeroSiret', '=', $entreprise->numeroSiret)
            ->groupBy('candidat.IDCandidat', 'offre.IDOffre')
            ->get();


        return view('offre.show', [
            'entreprise' => $entreprise,
            'niveauetudes' => $niveauetudes->unique('libelleNiveauEtude'),
            'typeOffres' => $typeOffres->unique('libelleTypeOffre'),
            'competences' => $competences,
            'candidatures' => $candidatures
        ]);
    }


    public function valider(Candidat $candidat, Offre $offre, $etat)
    {


        if ($etat == 1) {



            $p = DB::table('postuler')
                ->where('IDOffre', '=', $offre->IDOffre)
                ->where('IDCandidat', '=', $candidat->IDCandidat)
                ->update([
                    'statutPostuler' => 1
                ]);

        } else {
            $p = DB::table('postuler')
                ->where('IDOffre', '=', $offre->IDOffre)
                ->where('IDCandidat', '=', $candidat->IDCandidat)
                ->update([
                    'statutPostuler' => 3
                ]);
            $offre->update([
                'statutOffre' => 'expiree'
            ]);
        }


        return redirect()->route('offre.show');
    }

    public function create(Request $request)
    {
        $entreprise = Entreprise::find(Cache::get('entreprise'));

        try {
            $offre = Offre::create([
                'numeroSiret' => $entreprise->numeroSiret,
                'IDTypeOffre' => $request->IDTypeOffre,
                'IDNiveauEtude' => $request->IDNiveauEtude,
                'titreOffre' => $request->titreOffre,
                'descOffre' => $request->descOffre,
                'statutOffre' => $request->statutOffre,
                'remuneration' => $request->remuneration,
                'dureeContrat' => $request->dureeContrat,
                'datePubOffre' => now(),
                'dateDebutContrat' => $request->dateDebutContrat

            ]);

            Requerir::create([
                'IDCompetence' => $request->IDCompetence,
                'IDOffre' => $offre->IDOffre
            ]);

        } catch (Exception) {
            return back()->withInput();
        }

        return redirect()->route('offre.show');
    }

}

