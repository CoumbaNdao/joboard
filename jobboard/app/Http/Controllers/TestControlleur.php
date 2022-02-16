<?php

namespace App\Http\Controllers;

use App\Models\Disposer;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class TestControlleur extends Controller
{
    public function index()
    {
        dd(Entreprise::first()->nb_candidat());
    }
}
