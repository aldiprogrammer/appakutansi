<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['name', 'level', 'jual', 'admin1', 'modal', 'admin2'];
}
