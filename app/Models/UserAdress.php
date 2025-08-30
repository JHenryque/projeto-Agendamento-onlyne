<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class UserAdress extends Model
{
    //

    use HasFactory, Notifiable;
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
