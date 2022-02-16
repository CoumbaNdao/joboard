<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Candidat extends Model
{
    protected $primaryKey = 'IDCandidat';
    protected $table = 'candidat';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function region(): hasOne
    {
       return $this->hasOne(Region::class, 'codePostalRegion', 'codePostalRegion');
    }
    public function niveauetude(): hasOne
    {
        return $this->hasOne(NiveauEtude::class, 'IDNiveauEtude', 'IDNiveauEtude');
    }

}