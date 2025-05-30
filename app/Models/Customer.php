<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = ['nama', 'nik', 'no_telp', 'alamat'];



    public function rekening()
    {
        return $this->hasMany(RekeningCustomer::class, 'kode_customer', 'kode');
    }
}