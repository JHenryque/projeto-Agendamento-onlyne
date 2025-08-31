<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class UserAdress extends Model
{
    protected $fillable = [
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
}
