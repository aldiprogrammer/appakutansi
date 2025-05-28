<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksicost extends Model
{

    protected $fillable = ['id_cost', 'cost', 'id_lokasi'];


    public function costTo()
    {
        return $this->belongsTo(Cost::class, 'id_cost');
    }
}
