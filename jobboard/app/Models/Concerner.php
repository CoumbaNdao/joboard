<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concerner extends Model
{
    protected $primaryKey = 'IDTypeCompetence';
    protected $table = 'concerner';
    protected $keyType = 'integer';
    protected $guarded = [];
}
