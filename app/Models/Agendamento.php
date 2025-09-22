<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Agendamento extends Model
{
    use Searchable;
    public function empreendedor()
    {
        return $this->belongsTo(Empreendedor::class);
    }
}
