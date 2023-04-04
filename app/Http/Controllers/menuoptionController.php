<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuoptionController extends Controller
{
    public function index()
    {
		$customers=\App\Models\customer::all();
        return view('menuoptions.index')->with('customers', $customers);
    }
}