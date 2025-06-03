<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPelanggan extends Model
{
    protected $fillable = ['marketplace', 'store', 'wa', 'customer', 'rekening', 'produk', 'transaksi', 'rate', 'admin', 'biaya', 'transfer', 'lokasi'];


    public function storemr()
    {
        return $this->belongsTo(Store::class, 'marketplace', 'id');
    }

    function customertr()
    {
        return $this->belongsTo(Customer::class, 'wa', 'id');
    }

    function rekeningtr()
    {
        return $this->belongsTo(RekeningCustomer::class, 'rekening', 'id');
    }

    function produktr()
    {
        return $this->belongsTo(Produk::class, 'produk', 'id');
    }

    function lokasitr()
    {
        return $this->belongsTo(Wilayah::class, 'lokasi', 'id');
    }
}
