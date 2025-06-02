<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Produk',
            'produk' => Produk::orderBy('name')->orderByRaw("CAST(SUBSTRING_INDEX(level, ' ', -1) AS UNSIGNED)")->get()->groupBy('name'),
        ];
        return view('admin.produk', compact('data'));
    }

    function create(Request $request)
    {

        $pr = new Produk();
        $pr->name = $request->name;
        $pr->level = $request->level;
        $pr->jual = $request->jual;
        $pr->admin1 = $request->admin1;
        $pr->modal = $request->modal;
        $pr->admin2 = $request->admin2;
        $pr->save();
        return redirect()->route('produk')->with('success', 'Data produk berhasil ditambah');
    }
    function update(Request $request, $id)
    {

        $pr = Produk::find($id);
        $pr->name = $request->name;
        $pr->level = $request->level;
        $pr->jual = $request->jual;
        $pr->admin1 = $request->admin1;
        $pr->modal = $request->modal;
        $pr->admin2 = $request->admin2;
        $pr->update();
        return redirect()->route('produk')->with('success', 'Data produk berhasil diubah');
    }

    function delete($id)
    {
        $pr = Produk::find($id);
        $pr->delete();
    }
}
