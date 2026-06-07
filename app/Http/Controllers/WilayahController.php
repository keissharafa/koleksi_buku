<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        return view('wilayah.index');
    }

    public function axios()
    {
        return view('wilayah.axios');
    }

    public function getProvinsi()
    {
        $data = [
            ["id" => 1, "nama" => "Jawa Timur"],
            ["id" => 2, "nama" => "Jawa Barat"],
            ["id" => 3, "nama" => "DKI Jakarta"]
        ];

        return response()->json($data);
}
}