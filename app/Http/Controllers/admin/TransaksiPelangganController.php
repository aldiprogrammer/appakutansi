<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Produk;
use App\Models\Store;
use App\Models\TransaksiPelanggan;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class TransaksiPelangganController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Transaksi Customer',
            'transaksi' => TransaksiPelanggan::with('storemr', 'customertr', 'rekeningtr', 'produktr', 'lokasitr')->get(),
            'marketplace' => Store::all(),
            'customer' => Customer::all(),
            'produk' => Produk::all(),
            'lokasi' => Wilayah::all(),
        ];

        return view('admin.transaksi_p', compact('data'));
    }

    function create(Request $request)
    {

        $tr =  new TransaksiPelanggan();
        $tr->marketplace = $request->marketplace;
        $tr->store = $request->store;
        $tr->wa = $request->wa;
        $tr->customer = $request->customer;
        $tr->rekening = $request->rekening;
        $tr->produk = $request->produk;
        $tr->transaksi = $request->transaksi;
        $tr->rate = $request->rate;
        $tr->admin = $request->admin;
        $tr->biaya = $request->biaya;
        $tr->transfer = $request->transfer;
        $tr->lokasi = $request->lokasi;
        $tr->save();
        return redirect()->route('transaksi')->with('success', 'Data transaksi customer berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $tr = TransaksiPelanggan::find($id);
        $tr->marketplace = $request->marketplace;
        $tr->store = $request->store;
        $tr->wa = $request->wa;
        $tr->customer = $request->customer;
        $tr->rekening = $request->rekening;
        $tr->produk = $request->produk;
        $tr->transaksi = $request->transaksi;
        $tr->rate = $request->rate;
        $tr->admin = $request->admin;
        $tr->biaya = $request->biaya;
        $tr->transfer = $request->transfer;
        $tr->lokasi = $request->lokasi;
        $tr->update();
        return redirect()->route('transaksi')->with('success', 'Data transaksi customer berhasil diubah');
    }

    function delete($id)
    {

        $tr = TransaksiPelanggan::find($id);
        $tr->delete();
    }
}
