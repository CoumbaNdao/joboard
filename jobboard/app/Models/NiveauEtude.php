<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NiveauEtude extends Model
{
    protected $primaryKey = 'IDNiveauEtude';
    protected $table = 'niveauetude';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function offres():hasMany
    {
        return $this->hasMany(Offre::class, 'IDNiveauEtude', 'IDNiveauEtude');
    }

    public function candidats():hasMany
    {
        return $this->hasMany(Candidat::class, 'IDNiveauEtude', 'IDNiveauEtude');
    }
}
