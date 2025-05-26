<?php

namespace App\Http\Controllers\pdf;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfCustomer extends Controller
{

    function index()
    {
        $data = [
            'title' => 'Customer',
            'customer' => Customer::all(),
        ];

        $pdf = Pdf::loadView('pdf.customer', compact('data'));
        return $pdf->download('Customer.pdf');
    }
}
