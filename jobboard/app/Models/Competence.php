<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $primaryKey = 'IDCompetence';
    protected $table = 'competence';
    protected $keyType = 'integer';
    protected $guarded = [];


    public function nbOffres():int
    {
       return count(
           Competence::join('requerir', 'competence.IDCompetence', '=', 'requerir.IDCompetence')
           ->join('offre', 'requerir.IDOffre', '=', 'offre.IDOffre')
           ->where('competence.IDCompetence', '=', $this->IDCompetence)
           ->get()
       ) ;
    }

    public function nbCandidats():int
    {
        return count(
            Competence::join('disposer', 'competence.IDCompetence', '=', 'disposer.IDCompetence')
                ->join('candidat', 'disposer.IDCandidat', '=', 'candidat.IDCandidat')
                ->where('competence.IDCompetence', '=', $this->IDCompetence)
                ->get()
        ) ;
    }

}
