<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    //
    public function empreendedor()
    {
        return $this->belongsTo(Empreendedor::class);
    }
}
