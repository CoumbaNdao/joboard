<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mockery\Exception;

class AccueilControlleur extends Controller
{
    public function index()
    {
        $avis_s = Avis::all();
        return view('index', ['avis_s' => $avis_s]);
    }

    public function show()
    {

        return view('candidat.avis');
    }

    public function create(Request $request)
    {

        try {
            $pathEntreprise = "images\avis\\";

            $cv = $request->file('imageAvis');

            $cv->move($pathEntreprise, $cv->getClientOriginalName());

            $image = $pathEntreprise . $cv->getClientOriginalName();
        }catch(Exception $e){
            $image = '';
        }

        try {
            Avis::create([
                'nomUser' => $request->nomUser ?? '',
                'prenomUser' => $request->prenomUser ?? '',
                'descAvis' => $request->descAvis ?? '',
                'imageAvis' => $image
            ]);
        }catch(Exception $e){
            return back();
        }

        return redirect()->route('index');
    }
}
