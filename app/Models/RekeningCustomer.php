<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekeningCustomer extends Model
{
    //
    protected $fillable = ['kode_customer', 'rekening', 'no_rekening', 'nama_rekening'];



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'kode_customer', 'kode');
    }
}