<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Transaksicost;
use Illuminate\Http\Request;

class TransaksiCostController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Expenses',
            'transaksi' => Transaksicost::with('costTo')->get(),
            'typecost' => Cost::all(),
        ];
        return view('admin.transaksicost', compact('data'));
    }

    function create(Request $request)
    {
        $transaksi = new Transaksicost();
        $transaksi->id_cost = $request->id_cost;
        $transaksi->cost = $request->cost;
        $transaksi->lokasi = $request->lokasi;
        $transaksi->tanggal = date('Y-m-d');
        $transaksi->save();
        return redirect()->route('transaksicost')->with('success', 'Data transaksi cost berhasil ditambah');
    }

    function update(Request $request, $id)
    {
        $transaksi = Transaksicost::find($id);
        $transaksi->id_cost = $request->id_cost;
        $transaksi->cost = $request->cost;
        $transaksi->lokasi = $request->lokasi;
        $transaksi->tanggal = $request->tanggal;
        $transaksi->update();
        return redirect()->route('transaksicost')->with('success', 'Data transaksi cost berhasil diubah');
    }

    function delete($id)
    {
        $transaksi = Transaksicost::find($id);
        $transaksi->delete();
    }
}
