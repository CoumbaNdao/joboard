<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Disposer extends Model
{
    protected $primaryKey = 'IDCandidat';
    protected $table = 'disposer';
    protected $keyType = 'integer';
    protected $guarded = [];


    public function competences():hasMany
    {
        return $this->hasMany(Competence::class, 'IDCompetence', 'IDCompetence');
    }
}
