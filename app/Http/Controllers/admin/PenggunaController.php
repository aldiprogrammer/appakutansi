<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Pengguna;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    function index()
    {

        $data = [
            'title' => 'User',
            'user' => Pengguna::with('wilayah', 'level')->get(),
            'wilayah' => Wilayah::all(),
            'level' => Level::all(),
        ];
        return view('admin.user', compact('data'));
    }
    function create(Request $request)
    {

        $user = new Pengguna();
        $user->username = $request->username;
        $user->id_level = $request->id_level;
        $user->id_wilayah = $request->wilayah;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user')->with('success', 'Data user berhasil ditambah');
    }

    function update(Request $request, $id)
    {

        $user = Pengguna::find($id);
        $user->username = $request->username;
        $user->id_level = $request->level;
        $user->id_wilayah = $request->wilayah;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect()->route('user')->with('success', "Data user berhasil diubah");
    }

    function delete($id)
    {

        $user = Pengguna::find($id);
        $user->delete();
    }
}
