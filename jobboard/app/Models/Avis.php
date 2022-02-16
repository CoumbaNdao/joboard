<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $primaryKey = 'IDAvis';
    protected $table = 'avis';
    protected $keyType = 'integer';
    protected $guarded = [];
}
