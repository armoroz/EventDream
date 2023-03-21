<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flash;
use Response;
use Session;

class homepageController extends Controller
{
    public function homepage(Request $request)
    {
        $products=\App\Models\Product::all();
        $standardmenus=\App\Models\Standardmenu::all();
        $venues=\App\Models\Venue::all();
		
		if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $totalQty=0;
            foreach ($cart as $product => $qty) {
                $totalQty = $totalQty + $qty;
            }
            foreach ($cart as $standardmenu => $qty) {
                $totalQty = $totalQty + $qty;
            }
            foreach ($cart as $venue => $qty) {
                $totalQty = $totalQty + $qty;
            }
            $totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
		
        return view('homepage')
            ->with('products', $products)
            ->with('standardmenus', $standardmenus)
			->with('venues', $venues)
            ->with('totalItems',$totalItems);
    }	
	
}