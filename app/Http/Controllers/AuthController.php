<?php

namespace App\Http\Controllers;

use App\Models\Level;
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

            $level = Level::find($user->id_level);
            session([
                'login' => true,
                'username' => $user->username,
                'level' => $level->level,
                'wilayah' => $user->wilayah
            ]);
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->route('login')->with('error', 'Username atau password anda salah');
        }
    }

    function logout(Request $request)
    {

        Auth::guard('pengguna')->logout();

        // Hapus session
        $request->session()->forget(['login', 'username', 'level', 'wilayah']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
