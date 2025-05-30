<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Store',
            'store' => Store::all(),
        ];
        return view('admin.store', compact('data'));
    }

    function create(Request $request)
    {

        $st = new Store();
        $st->marketplace = $request->marketplace;
        $st->store_name = $request->store_name;
        $st->bank = $request->bank;
        $st->no_rekening = $request->no_rekening;
        $st->nama_rekening = $request->nama_rekening;
        $st->save();
        return redirect()->route('store')->with('success', 'Data store berhasil ditambah');
    }

    function update(Request $request, $id)
    {
        $st = Store::find($id);
        $st->marketplace = $request->marketplace;
        $st->store_name = $request->store_name;
        $st->bank = $request->bank;
        $st->no_rekening = $request->no_rekening;
        $st->nama_rekening = $request->nama_rekening;
        $st->update();
        return redirect()->route('store')->with('success', 'Data store berhasil diubah');
    }

    function delete($id)
    {
        $st = Store::find($id);
        $st->delete();
    }
}