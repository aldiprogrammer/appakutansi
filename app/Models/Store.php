<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = ['marketplace', 'store_name', 'no_rekening', 'nama_rekening', 'bank'];
}