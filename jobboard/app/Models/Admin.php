<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $primaryKey = 'idamin';
    protected $table = 'adminbdd';
    protected $keyType = 'integer';
    protected $guarded = [];
}
