<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $primaryKey = 'codePostalRegion';
    protected $table = 'region';
    protected $keyType = 'integer';
    protected $guarded = [];
}
