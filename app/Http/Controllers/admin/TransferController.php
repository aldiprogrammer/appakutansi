<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Store;
use App\Models\TransaksiPelanggan;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransferController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Transfer',
            'transaksiall' => TransaksiPelanggan::with('storemr', 'customertr', 'rekeningtr', 'produktr', 'lokasitr')->where('status', 1)->get(),
            'transaksi' => TransaksiPelanggan::select('customer', DB::raw('SUM(transfer) as total_transfer'))->groupBy('customer')->where('status', 1)->get(),
            'marketplace' => Store::all(),
            'customer' => Customer::all(),
            'produk' => Produk::all(),
            'lokasi' => Wilayah::all(),
        ];
        return view('admin.transfer', compact('data'));
    }
}
