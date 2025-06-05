<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = ['level'];

    public function pengguna()
    {
        return $this->hasMany(Pengguna::class, 'id_level');
    }


    public function akses()
    {
        return $this->hasMany(Hakakses::class, 'id_level', 'id');
    }
}
