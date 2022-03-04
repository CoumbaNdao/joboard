<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $primaryKey = 'codePostalRegion';
    protected $table = 'region';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function entreprises():hasMany
    {
        return $this->hasMany(Entreprise::class, 'codePostalRegion', 'codePostalRegion');

    }
    public function candidats():hasMany
    {
        return $this->hasMany(Candidat::class, 'codePostalRegion', 'codePostalRegion');

    }

}
