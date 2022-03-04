<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'IDContact';
    protected $table = 'contact';
    protected $keyType = 'integer';
    protected $guarded = [];
}
