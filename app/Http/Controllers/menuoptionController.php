<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\customer as customers;

class menuoptionController extends Controller
{
    public function index()
    {
        return view('menuoptions.index');
    }
}