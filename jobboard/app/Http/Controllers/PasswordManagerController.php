<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordManagerController extends Controller
{
    public function ressetPassWordE(Request $request){

        $entreprise = Entreprise::where('loginEntreprise', '=', $request->loginEntreprise)->get()->first();
        if (!isset($entreprise))
        {
            return redirect()->back();
        }
        $to_email = $entreprise->loginEntreprise;
        $data = ['loginEntreprise' => $request->loginEntreprise ];
        Mail::send('entreprise.resetMailE', $data, function ($message) use ( $to_email) {
            $message->to($to_email)
                ->subject('Demande de réinitialisation de mot de passe');
        });

        return 'Un lien vient d\'être envoyé à l\'adresse associée à votre compte pour réinitialiser votre mot de passe';
    }

    public function ressetPassWordC(Request $request){

        $candidat = Candidat::where('loginCandidat', '=', $request->loginCandidat)->get()->first();
        if (!isset($candidat))
        {
            return redirect()->back();
        }
        $to_email = $candidat->loginCandidat;
        $data = ['loginCandidat' => $request->loginCandidat ];
        Mail::send('candidat.resetMailC', $data, function ($message) use ( $to_email) {
            $message->to($to_email)
                ->subject('Demande de réinitialisation de mot de passe');
        });

        return 'Un lien vient d\'être envoyé à l\'adresse associée à votre compte pour réinitialiser votre mot de passe';
    }
}
