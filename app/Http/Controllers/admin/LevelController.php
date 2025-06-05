<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Hakakses;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Level',
            'level' => Level::with('akses')->get(),
        ];
        return view('admin.level', compact('data'));
    }

    function addlevel()
    {
        $data = [
            'title' => 'Tambah level',
        ];
        return view('admin.addlevel', compact('data'));
    }

    function create(Request $request)
    {

        $lv = new Level();
        $lv->level = $request->level;
        $lv->save();
        $akses = $request->akses;
        $count = count($akses);

        for ($i = 0; $i < $count; $i++) {
            $ak = new Hakakses();
            $ak->id_level = $lv->id;
            $ak->akses = $akses[$i];
            $ak->save();

            echo $akses[$i] . "<br />";
        }
        return redirect()->route('level')->with('success', "Data level berhasil ditambah");
    }

    function editlevel($id)
    {
        $data = [
            'title' => 'Edit level',
            'level' => Level::with('akses')->find($id),
        ];
        return view('admin.editlevel', compact('data'));
    }

    function update(Request $request, $id)
    {

        $lv = Level::find($id);
        $lv->level = $request->level;
        $lv->update();

        Hakakses::where('id_level', $id)->delete();
        $akses = $request->akses;
        $count = count($akses);

        for ($i = 0; $i < $count; $i++) {
            $ak = new Hakakses();
            $ak->id_level = $lv->id;
            $ak->akses = $akses[$i];
            $ak->save();
        }

        return redirect()->route('level')->with('success', "Data level berhasil diubah");
    }

    function delete($id)
    {

        $wl = Level::find($id);
        $wl->delete();
    }
}
