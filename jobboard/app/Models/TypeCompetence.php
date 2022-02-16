<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeCompetence extends Model
{
    protected $primaryKey = 'IDTypeCompetence';
    protected $table = 'typecompetence';
    protected $keyType = 'integer';
    protected $guarded = [];
}
