<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeOffre extends Model
{
    protected $primaryKey = 'IDTypeOffre';
    protected $table = 'typeoffre';
    protected $keyType = 'integer';
    protected $guarded = [];
}
