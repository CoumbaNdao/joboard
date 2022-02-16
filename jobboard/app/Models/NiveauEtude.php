<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NiveauEtude extends Model
{
    protected $primaryKey = 'IDNiveauEtude';
    protected $table = 'niveauetude';
    protected $keyType = 'integer';
    protected $guarded = [];
}
