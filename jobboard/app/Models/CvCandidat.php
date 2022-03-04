<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CvCandidat extends Model
{
    protected $primaryKey = 'IDCv';
    protected $table = 'cvcandidat';
    protected $keyType = 'integer';
    protected $guarded = [];
}
