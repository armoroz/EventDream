<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class stripeController extends Controller
{

	public function checkout()
	{
		\Stripe\Stripe::setApiKey(config(key:'stripe.sk'));
		
		$session = \Stripe\Checkout\Session::create([
			'line_items' => [
				[
					'price_data' => [
						'currency'	=> 'eur',
						'product_data' => [
							'name' => 'Your Total:',
						],
						'unit_amount' =>100,
					],
					'quantity' => 1,
				],
			],
			'mode' => 'payment',
			'success_url' => route(name:'events.orderplaced'),
			'cancel_url' => route(name:'events.checkout'),
		]);
		
		return redirect()->away($session->url);
	}

}