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
        $data = [
            'title' => 'Wilayah',
            'wilayah' => Wilayah::all(),
        ];
        return view('admin.wilayah', compact('data'));
    }

    function create(Request $request)
    {

        $wl = new Wilayah();
        $wl->wilayah = $request->wilayah;
        $wl->save();
        return redirect()->route('wilayah')->with('success', 'Data wilayah berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $wl = Wilayah::find($id);
        $wl->wilayah = $request->wilayah;
        $wl->update();
        return redirect()->route('wilayah')->with('success', 'Data wilayah berhasil diubah');
    }

    function delete($id)
    {

        $wl = Wilayah::find($id);
        $wl->delete();
    }
}
