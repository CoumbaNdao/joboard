<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activite extends Model
{
    protected $primaryKey = 'codeape';
    protected $table = 'activite';
    protected $keyType = 'integer';
    protected $guarded = [];

    public function entreprises():hasMany
    {
        return $this->hasMany(Entreprise::class, 'codeape', 'codeape');

    }

}
