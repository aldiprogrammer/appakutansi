<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    protected $fillable = ['marketplace', 'store', 'wa', 'customer', 'rekening', 'produk', 'transaksi', 'rate', 'admin', 'biaya', 'transfer', 'lokasi'];
}
