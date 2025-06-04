<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Store;
use App\Models\TransaksiPelanggan;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class ProsesController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Proses',
            'transaksi' => TransaksiPelanggan::with('storemr', 'customertr', 'rekeningtr', 'produktr', 'lokasitr')->where('status', '1')->get(),
            'marketplace' => Store::all(),
            'customer' => Customer::all(),
            'produk' => Produk::all(),
            'lokasi' => Wilayah::all(),
        ];
        return view('admin.proses', compact('data'));
    }

    function updatestatus($id)
    {
        $tr = TransaksiPelanggan::find($id);
        $tr->status = 0;
        $tr->update();
    }
}
