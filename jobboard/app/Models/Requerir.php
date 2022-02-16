<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Competence;

class Requerir extends Model
{
    protected $primaryKey = 'IDOffre';
    protected $table = 'requerir';
    protected $keyType = 'integer';
    protected $guarded = [];


    public function competences()
    {
        return $this->hasOne(Competence::class, 'IDCompetence', 'IDCompetence');
    }
}
