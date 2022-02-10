<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Offre;

class OffreController extends Controller
{
    public function index(){

        dd(App\Models\Offre::get());
      return 0;
    }
}

