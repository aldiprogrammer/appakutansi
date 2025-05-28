<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    function index()
    {

        $cost = Cost::all();
        $data = [
            'title' => 'Cost',
            'cost' => $cost,
        ];
        return view('admin.cost', compact('data'));
    }

    function detailcost($id)
    {
        $cost = Cost::find($id);

        return response()->json(
            ['detail' => $cost->detail_of_cost]
        );
    }

    function create(Request $request)
    {

        $cost = new Cost();
        $cost->type_of_cost = $request->type;
        $cost->detail_of_cost = $request->detail;
        $cost->save();

        return redirect()->route('cost')->with('success', 'Data cost berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $cost = Cost::find($id);
        $cost->type_of_cost = $request->type;
        $cost->detail_of_cost = $request->detail;
        $cost->update();
        return redirect()->route('cost')->with('success', 'Data cost berhasil diubah');
    }

    function delete($id)
    {
        $cost = Cost::find($id);
        $cost->delete();
    }
}
