<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuoptionController extends Controller
{
    public function index()
    {
        return view('menuoptions.index');
    }
}