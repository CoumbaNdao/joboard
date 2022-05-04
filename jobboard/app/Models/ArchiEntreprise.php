<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\Self_;
use phpDocumentor\Reflection\Types\This;

class ArchiEntreprise extends Model
{
    protected $primaryKey = 'numeroSiret';
    protected $table = 'archientreprise';
    protected $keyType = 'integer';
    protected $guarded = [];



    public function region():hasOne
    {
        return $this->hasOne(Region::class, 'codePostalRegion', 'codePostalRegion');
    }

}
