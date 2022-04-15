<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Offre extends Model
{
    protected $primaryKey = 'IDOffre';
    protected $table = 'offre';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function delete_postuler()
    {
        Postuler::where('IDOffre', '=', $this->IDOffre)
        ->delete();
    }

    public function delete_requerir()
    {
        Requerir::where('IDOffre', '=', $this->IDOffre)
            ->delete();
    }


    public function requerirs()
    {
        return $this->hasMany(Requerir::class, 'IDOffre', 'IDOffre');
    }


    public function entreprise():hasOne
    {
        return $this->hasOne(entreprise::class, 'numeroSiret', 'numeroSiret');
    }


    public function postuler()
    {
        return $this->hasMany(Postuler::class, 'IDOffre', 'IDOffre');
    }

    public function type_offre(){
        return $this->hasOne(TypeOffre::class, 'IDTypeOffre', 'IDTypeOffre');
    }


}
