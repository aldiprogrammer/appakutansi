<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function index()
    {
        return view('login');
    }

    function act_login(Request $request)
    {

        $user = Pengguna::where('username', $request->username)->first();;
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'login' => true,
                'username' => $user->username,
                'level' => $user->id_level,
                'id_wilayah' => $user->id_wilayah
            ]);
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'username' => 'Username atau password salah',
        ]);
    }
}