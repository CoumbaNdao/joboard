<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'datelog';
    protected $table = 'userlog';
    protected $keyType = 'string';
    protected $guarded = [];

    public function scopenbConnexionCandidat($query)
    {
        return $query->join('candidat', 'IDCandidat', '=', 'id')
            ->where('statut', '=',  3)
            ->get();
    }

    public function scopenbConnexionEntreprise($query)
    {
        return $query->join('entreprise', 'numeroSiret', '=', 'id')
            ->where('statut', '=', 4)
            ->get();
    }

}
