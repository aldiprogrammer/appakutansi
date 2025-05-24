<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    //
    protected $fillable = ['wilayah'];

    public function user()
    {
        return $this->hasMany(Pengguna::class, 'id_wilayah');
    }
}
