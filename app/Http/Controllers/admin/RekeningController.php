<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RekeningCustomer;
use Illuminate\Http\Request;

class RekeningController extends Controller
{

    function index($kode)
    {
        $data = [
            'title' => 'Rekening',
            'kode' => $kode,
            'rekening' => RekeningCustomer::where('kode_customer', $kode)->get(),
        ];
        return view('admin.rekening', compact('data'));
    }

    function create(Request $request)
    {
        $rc = new RekeningCustomer();
        $rc->kode_customer = $request->kode;
        $rc->rekening = $request->rekening;
        $rc->no_rekening = $request->no_rekening;
        $rc->nama_rekening = $request->nama_rekening;
        $rc->status = '';
        $rc->save();
        return redirect()->route("rekening", $request->kode)->with('success', 'Data rekening berhasil ditambah');
    }

    function delete($id)
    {
        $rk = RekeningCustomer::find($id);
        $rk->delete();
    }

    function update(Request $request, $id)
    {
        $rc = RekeningCustomer::find($id);
        $rc->rekening = $request->rekening;
        $rc->no_rekening = $request->no_rekening;
        $rc->nama_rekening = $request->nama_rekening;
        $rc->update();
        return redirect()->route("rekening", $request->kode)->with('success', 'Data rekening berhasil ditambah');
    }
}
