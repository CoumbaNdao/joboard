<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ArchiCandidat extends Model
{
    protected $primaryKey = 'IDCandidat';
    protected $table = 'archicandidat';
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

    public function competences()
    {
        return Competence::join('disposer', 'competence.IDCompetence', '=', 'disposer.IDCompetence')
            ->where('IDCandidat', '=', $this->IDCandidat)
            ->get()
            ->implode('libelleCompetence', ', ');
    }

}
