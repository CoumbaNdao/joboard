<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    protected $primaryKey = 'IDCompetence';
    protected $table = 'competence';
    protected $keyType = 'integer';
    protected $guarded = [];

}
