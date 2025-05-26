<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //

    function index()
    {
        $data = [
            'title' => 'Customer',
            'customer' => Customer::all(),
        ];
        return view('admin.customer', compact('data'));
    }

    function create(Request $request)
    {

        $cs = new Customer();
        $cs->nama = $request->nama;
        $cs->nik = $request->nik;
        $cs->alamat = $request->alamat;
        $cs->no_telp = $request->no_telp;
        $cs->save();

        return redirect()->route('customer')->with('success', 'Data customer berhasil ditambah');
    }

    function update(Request $request, $id)
    {
        $cs = Customer::find($id);
        $cs->nama = $request->nama;
        $cs->alamat = $request->alamat;
        $cs->nik = $request->nik;
        $cs->no_telp = $request->no_telp;
        $cs->update();
        return redirect()->route('customer')->with('success', 'Data customer berhasil diubah');
    }

    function delete($id)
    {

        $cs = Customer::find($id);
        $cs->delete();
    }
}