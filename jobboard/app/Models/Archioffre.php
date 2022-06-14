<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Archioffre extends Model
{
    protected $primaryKey = 'IDOffre';
    protected $table = 'archioffre';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function entreprise():hasOne{
        return  $this->hasOne(Entreprise::class, 'numeroSiret', 'numeroSiret');
    }
    public function archientreprise():hasOne{
        return $this->hasOne(ArchiEntreprise::class, 'numeroSiret', 'numeroSiret' );
    }

}
