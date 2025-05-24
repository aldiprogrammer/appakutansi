<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{

    protected $fillable = ['username', 'password', 'password2', 'id_level', 'id_wilayah'];


    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class, 'id_wilayah');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }
}
