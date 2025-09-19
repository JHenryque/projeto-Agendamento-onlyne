<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empreendedor extends Model
{
    protected $fillable = [
        'logomarca',
        'documento',
        'phone',
        'address',
        'number',
        'bairro',
        'cidade',
        'cep',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function atendimento()
    {
        return $this->hasMany(Atendimento::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horarios::class);
    }
}
