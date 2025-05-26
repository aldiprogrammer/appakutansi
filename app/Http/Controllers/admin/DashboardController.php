<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Level;
use App\Models\Pengguna;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $data = [
            'title' => 'Dashboard',
            'store' => Wilayah::count(),
            'level' => Level::count(),
            'user' => Pengguna::count(),
            'customer' => Customer::count(),
            'listcs' => Customer::orderBy('id', 'desc')->limit(5)->get(),
        ];
        return view('admin/index', compact('data'));
    }
}