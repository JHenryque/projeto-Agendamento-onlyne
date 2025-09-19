<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    //
    public function empreendedor()
    {
        return $this->belongsTo(Empreendedor::class);
    }
}
