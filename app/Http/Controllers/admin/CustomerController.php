<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\RekeningCustomer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    function index()
    {
        $data = [
            'title' => 'Customer',
            'customer' => Customer::with('rekening')->get(),
            'kode' => 'CS-' . rand(0, 100000),
        ];
        return view('admin.customer', compact('data'));
    }

    function create(Request $request)
    {

        $valdiate = $request->validate([
            'wa' => 'unique:customers,wa',
        ], [
            'wa.unique' => 'Nomor whatsapp sudah terdaftar sebelumnya'
        ]);

        $cs = new Customer();
        $cs->kode = $request->kode;
        $cs->owner = $request->owner;
        $cs->wa = $request->wa;
        $cs->level = $request->level;
        $cs->save();

        $rc = new RekeningCustomer();
        $rc->kode_customer = $request->kode;
        $rc->rekening = $request->rekening;
        $rc->no_rekening = $request->no_rekening;
        $rc->nama_rekening = $request->nama_rekening;
        $rc->status = 1;
        $rc->save();

        return redirect()->route('customer')->with('success', 'Data customer berhasil ditambah');
    }

    function update(Request $request, $id)
    {
        $cs = Customer::find($id);
        $cs->owner = $request->owner;
        $cs->wa = $request->wa;
        $cs->level = $request->level;
        $cs->update();

        // dd($request->rekening);
        $data = RekeningCustomer::where(['kode_customer' => $request->kode, 'status' => '1'])->first();
        $up = RekeningCustomer::find($data->id);
        $up->status = 0;
        $up->update();

        $rek = RekeningCustomer::find($request->rekening);
        $rek->status = 1;
        $rek->update();

        return redirect()->route('customer')->with('success', 'Data customer berhasil diubah');
    }

    function delete($id)
    {

        $cs = Customer::find($id);
        $cs->delete();
    }

    function rekening(Request $request)
    {
        $rc = new RekeningCustomer();
        $rc->kode_customer = $request->kode;
        $rc->rekening = $request->rekening;
        $rc->no_rekening = $request->no_rekening;
        $rc->nama_rekening = $request->nama_rekening;
        $rc->save();
        return redirect()->route('customer')->with('success', 'Data rekening berhasil ditambah');
    }
}
