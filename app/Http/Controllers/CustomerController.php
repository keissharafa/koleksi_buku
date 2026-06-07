<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // DATA CUSTOMER
    public function index()
    {
        $customer = Customer::all();

        return view('customer.index', compact('customer'));
    }

    // FORM TAMBAH CUSTOMER 1
    public function create1()
    {
        return view('customer.create1');
    }

    // FORM TAMBAH CUSTOMER 2
    public function create2()
    {
        return view('customer.create2');
    }
}