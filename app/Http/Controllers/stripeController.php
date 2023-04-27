<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class stripeController extends Controller
{

	public function checkout(Request $request)
	{
		\Stripe\Stripe::setApiKey(config('stripe.sk'));
		$encodedLineItems = $request->input('lineitems');
		$lineItems = unserialize(urldecode($encodedLineItems));

		$stripeLineItems = [];
		foreach ($lineItems as $item) {
			
			if (isset($item['venue'])) {
				$venue = $item['venue'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $venue->venuename,
						],
						'unit_amount' => $venue->costtorent * 100,
					],
					'quantity' => $quantity,
				];
			}		
			
			elseif (isset($item['product'])) {
				$product = $item['product'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $product->productname,
						],
						'unit_amount' => $product->productcost * 100,
					],
					'quantity' => $quantity,
				];
			}

			elseif (isset($item['standardmenu'])) {
				$standardmenu = $item['standardmenu'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $standardmenu->standardmenuname,
						],
						'unit_amount' => 2000 * $event->numOfGuests,
					],
					'quantity' => $quantity,
				];
			}
			
			elseif (isset($item['custommenu'])) {
				$custommenu = $item['custommenu'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $custommenu->custommenuname,
						],
						'unit_amount' => 2000,
					],
					'quantity' => $quantity,
				];
			}

		}

		$session = \Stripe\Checkout\Session::create([
			'line_items' => $stripeLineItems,
			'mode' => 'payment',
			'success_url' => route('events.orderplaced'),
			'cancel_url' => route('events.checkout'),
		]);

		return redirect()->away($session->url);
	}
	
	public function eventcheckout($eventid,Request $request)
	{
		\Stripe\Stripe::setApiKey(config('stripe.sk'));
		$encodedLineItems = $request->input('lineitems');
		$lineItems = unserialize(urldecode($encodedLineItems));
		$event=\App\Models\event::find($eventid);

		$stripeLineItems = [];
		foreach ($lineItems as $item) {
			
			if (isset($item['venue'])) {
				$venue = $item['venue'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $venue->venuename,
						],
						'unit_amount' => $venue->costtorent * 100,
					],
					'quantity' => $quantity,
				];
			}		
			
			elseif (isset($item['product'])) {
				$product = $item['product'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $product->productname,
						],
						'unit_amount' => $product->productcost * 100,
					],
					'quantity' => $quantity,
				];
			}

			elseif (isset($item['standardmenu'])) {
				$standardmenu = $item['standardmenu'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $standardmenu->standardmenuname,
						],
						'unit_amount' => 2000 * $event->numOfGuests,
					],
					'quantity' => $quantity,
				];
			}
			
			elseif (isset($item['custommenu'])) {
				$custommenu = $item['custommenu'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $custommenu->custommenuname,
						],
						'unit_amount' => 2000 * $event->numOfGuests,
					],
					'quantity' => $quantity,
				];
			}

		}

		$session = \Stripe\Checkout\Session::create([
			'line_items' => $stripeLineItems,
			'mode' => 'payment',
			'success_url' => route('events.orderplaced'),
			'cancel_url' => route('events.checkout'),
		]);

		return redirect()->away($session->url);
	}	
	

}