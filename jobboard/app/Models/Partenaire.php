<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $primaryKey = 'SiretPartenaire';
    protected $table = 'partenaire';
    protected $keyType = 'integer';
    protected $guarded = [];
}
