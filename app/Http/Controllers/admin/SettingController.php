<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Customer;
use App\Models\Level;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Store;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Setting',
            'user' => Pengguna::count(),
            'store' => Store::count(),
            'customer' => Customer::count(),
            'lokasi' => Wilayah::count(),
            'cost' => Cost::count(),
            'produk' => Produk::count(),
            'level' => Level::count(),
        ];
        return view('admin.setting', compact('data'));
    }
}
