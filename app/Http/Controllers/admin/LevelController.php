<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Level',
            'level' => Level::all(),
        ];
        return view('admin.level', compact('data'));
    }

    function create(Request $request)
    {

        $lv = new Level();
        $lv->level = $request->level;
        $lv->save();
        return redirect()->route('level')->with('success', "Data level berhasil ditambah");
    }

    function update(Request $request, $id)
    {

        $lv = Level::find($id);
        $lv->level = $request->level;
        $lv->update();
        return redirect()->route('level')->with('success', "Data level berhasil diubah");
    }

    function delete($id)
    {

        $wl = Level::find($id);
        $wl->delete();
    }
}
