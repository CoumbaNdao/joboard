<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Avis;
use App\Models\Contact;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class AccueilControlleur extends Controller
{
    public function index()
    {
        $avis_s = Avis::
        orderBy('created_at', 'asc')
            ->get();

        $avis_s1 = Avis::
        orderBy('created_at', 'desc')
            ->get();

        $partenaires = Partenaire::all();



        return view('index', [
            'avis_s' => $avis_s,
            'avis_s1' => $avis_s1,
            'partenaires' => $partenaires
        ]);
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
        } catch (Exception $e) {
            $image = '';
        }

        try {
            Avis::create([
                'nomUser' => $request->nomUser ?? '',
                'prenomUser' => $request->prenomUser ?? '',
                'descAvis' => $request->descAvis ?? '',
                'rate' => $request->rate ?? '',
                'imageAvis' => $image
            ]);
        } catch (Exception $e) {
            return back();
        }

        return redirect()->route('index');
    }

    public function contact(Request $request)
    {
        try {
            Contact::create([
                'nomContact' => $request->nomContact ?? '',
                'prenomContact' => $request->prenomContact ?? '',
                'emailContact' => $request->emailContact ?? '',
                'objetContact' => $request->objetContact ?? '',
                'messageContact' => $request->messageContact ?? ''

            ]);
        } catch (Exception $e) {
            return back() ->withInput();
        }
return 'Votre message a bien été envoyé !';
    }
}
