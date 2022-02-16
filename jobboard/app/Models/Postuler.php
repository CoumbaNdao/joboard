<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Postuler extends Model
{
    protected $primaryKey = 'IDOffre';
    protected $table = 'postuler';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function candidat():hasMany
    {
        return $this->hasMany(Candidat::class, 'IDCandidat', 'IDCandidat');
    }

    public function offre():hasMany
    {
        return $this->hasMany(Candidat::class, 'IDOffre', 'IDOffre');
    }
}

