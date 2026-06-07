<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeReaderController extends Controller
{
    public function index()
    {
        return view('barcode.index');
    }
}