<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksicost extends Model
{

    protected $fillable = ['id_cost', 'cost', 'lokasi', 'tanggal'];


    public function costTo()
    {
        return $this->belongsTo(Cost::class, 'id_cost');
    }
}
