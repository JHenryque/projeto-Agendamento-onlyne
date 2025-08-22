<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //
    public function user()
    {
        $this->hasMany(User::class, 'department_id', 'id');
    }
}
