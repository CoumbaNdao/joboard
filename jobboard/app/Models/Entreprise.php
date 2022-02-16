<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\This;

class Entreprise extends Model
{
    protected $primaryKey = 'numeroSiret';
    protected $table = 'entreprise';
    protected $keyType = 'integer';
    protected $guarded = [];


   public function offres()
   {
       return $this->hasMany(Offre::class, 'numeroSiret', 'numeroSiret');
   }


    public function nb_candidat():int
    {
        $nb = $this->offres()->join('postuler', 'offre.IDOffre', '=','postuler.IDOffre')
        ->get();
        return count($nb);
    }

    public function region():hasOne
    {
        return $this->hasOne(Region::class, 'codePostalRegion', 'codePostalRegion');
    }

}
