<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

class EntrepriseController extends Controller
{
    public function index()
    {
        return view('entreprise.espaceEntreprise');
    }


    public function inscription()
    {

        $regions = Region::all();
        if (Cache::get('message')) {
            $message = Cache::get('message');
            Cache::delete('message');
        }

        return view('entreprise.inscriptionEntreprise', [
            'regions' => $regions,
            'message' => $message ?? ''
        ]);
    }

    public function create(Request $request)
    {

        if ($request->validationMdp !== $request->mdpEntreprise) {
            Cache::set('message', "Veuillez saisir le meme mot de passe !");
            return redirect()->route('entreprise.inscription');
        }


        $pathEntreprise = "images\logo\\";

        $cv = $request->file('logoEntreprise');

        $cv->move($pathEntreprise, $cv->getClientOriginalName());

        $logo = $pathEntreprise . $cv->getClientOriginalName();

        try {
            $entreprise = Entreprise::create([
                'numeroSiret' => $request->numeroSiret,
                'raisonSociale' => $request->raisonSociale,
                'descEntreprise' => $request->descEntreprise,
                'adresseEntreprise' => $request->adresseEntreprise,
                'cpEntreprise' => $request->cpEntreprise,
                'villeEntreprise' => $request->villeEntreprise,
                'telEntreprise' => $request->telEntreprise,
                'emailEntreprise' => $request->emailEntreprise,
                'loginEntreprise' => $request->loginEntreprise ?? $request->emailEntreprise,
                'urlEntreprise' => $request->url,
                'mdpEntreprise' => $request->mdpEntreprise,
                'codePostalRegion' => $request->codePostalRegion,
                'logoEntreprise' => $logo
            ]);
        } catch (\Exception $e) {
            return back()->withInput();
        }


        if (isset($entreprise)) {
            Cache::set('entreprise', $entreprise->numeroSiret);
            return redirect()->route('offre.show', [
                'entreprise' => $entreprise->numeroSiret
            ]);
        }

        return redirect()->route('offre.show');
    }

    public function login(Request $request)
    {

        $entreprise = Entreprise::where('loginEntreprise', '=', $request->loginEntreprise)
            ->where('mdpEntreprise', '=', $request->mdpEntreprise)
            ->get()->first();


        if (isset($entreprise)) {
            Cache::set('entreprise', $entreprise->numeroSiret);
            return redirect()->route('offre.show');
        }
        return back()->withInput();
    }

    public function deconnexion()
    {
        Cache::delete('entreprise');
        return redirect()->route('entreprise.index');
    }

    public function edit()
    {
        $entreprise = Entreprise::find(Cache::get('entreprise'));
        $regions = Region::all();


        return view('entreprise.profileEntreprise', [
            'entreprise' => $entreprise,
            'regions' => $regions,
            'message' => ''
        ]);
    }

    public function update(Request $request)
    {
        $entreprise = Entreprise::find(Cache::get('entreprise'));
        $region = Region::where('nomRegion', '=', $request->codePostalRegion)->get()->first();

        if ($request->logoEntreprise) {
            $pathEntreprise = "images\logo\\";

            $cv = $request->file('logoEntreprise');

            $cv->move($pathEntreprise, $cv->getClientOriginalName());

            $logo = $pathEntreprise . $cv->getClientOriginalName();
        }


        try {
            $entreprise->update([
                'raisonSociale' => $request->raisonSociale ?? $entreprise->raisonSociale,
                'descEntreprise' => $request->descEntreprise ?? $entreprise->descEntreprise,
                'villeEntreprise' => $request->villeEntreprise ?? $entreprise->villeEntreprise,
                'adresseEntreprise' => $request->adresseEntreprise ?? $entreprise->adresseEntreprise,
                'cpEntreprise' => $request->cpEntreprise ?? $entreprise->cpEntreprise,
                'telEntreprise' => $request->telEntreprise ?? $entreprise->telEntreprise,
                'emailEntreprise' => $request->emailEntreprise ?? $entreprise->emailEntreprise,
                /* 'loginEntreprise' => $request->loginEntreprise ?? $entreprise->loginEntreprise,
                 'mdpEntreprise' => $request->mdpEntreprise ?? $entreprise->mdpEntreprise,*/
                'logoEntreprise' => $logo ?? $entreprise->logoEntreprise,
                'urlEntreprise' => $request->urlEntreprise ?? $entreprise->urlEntreprise,
                'codePostalRegion' => $region->codePostalRegion ?? $entreprise->codePostalRegion,

            ]);

        } catch (Exception $e) {
            return back()->withInput();
        }

        if (!$request->mdpEntreprise){
            return redirect()->route('offre.show');
        }

        if (($request->oldMdp == $entreprise->mdpEntreprise) && ($request->mdpEntreprise == $request->validationMdp))
        {
            try {
                $entreprise->update([
                    'loginEntreprise' => $request->loginEntreprise ?? $entreprise->loginEntreprise,
                    'mdpEntreprise' => $request->mdpEntreprise ?? $entreprise->mdpEntreprise
                ]);

                Cache::delete('entreprise');
                return redirect()->route('entreprise.index');
            }catch (Exception $e)
            {
                return back()->withInput();
            }
        }

        return back()->withInput();


    }
}
