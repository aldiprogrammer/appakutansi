<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //

    function index()
    {
        $grouped = Wilayah::all()->groupBy('wilayah');
        $data = [
            'title' => 'Lokasi',
            'wilayah' => $grouped
        ];
        return view('admin.wilayah', compact('data'));
    }

    function create(Request $request)
    {

        $wl = new Wilayah();
        $wl->wilayah = $request->wilayah;
        $wl->nama_investor = $request->nama_investor;
        $wl->investasi = $request->investasi;
        $wl->save();
        return redirect()->route('wilayah')->with('success', 'Data lokasi berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $wl = Wilayah::find($id);
        $wl->wilayah = $request->wilayah;
        
        $wl->investasi = $request->investasi;
        $wl->update();
        return redirect()->route('wilayah')->with('success', 'Data  berhasil diubah');
    }

    function delete($id)
    {

        $wl = Wilayah::find($id);
        $wl->delete();
    }
}
