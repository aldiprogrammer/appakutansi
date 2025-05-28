<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    //
    protected $fillable = ['type_of_cost', 'detail_of_cost'];

    public function transaksicost()
    {
        return $this->hasMany(Transaksicost::class, 'id_cost');
    }
}
