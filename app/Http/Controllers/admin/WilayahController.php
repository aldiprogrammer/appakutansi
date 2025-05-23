<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    //

    function index()
    {
        $data = [
            'title' => 'Wilayah',
        ];
        return view('admin.wilayah', compact('data'));
    }
}
