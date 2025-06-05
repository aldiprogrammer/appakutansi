<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hakakses extends Model
{


    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level', 'id');
    }
}
