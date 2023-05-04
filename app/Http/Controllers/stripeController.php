<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use \App\Models\customer as customer;
use Illuminate\Support\Facades\Auth;
use Flash;
use Response;

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
							'name' => $product->productname . ' ' . $product->producttype,
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
							'name' => $standardmenu->standardmenuname . ' €20 per person',
						],
						'unit_amount' => 2000,
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
							'name' => $custommenu->custommenuname . ' €20 per person',
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

			if (isset($item['product'])) {
				$product = $item['product'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $product->productname . ' ' . $product->producttype,
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
							'name' => $standardmenu->standardmenuname . ' €20 per person',
						],
						'unit_amount' => 2000 * $event->numOfGuests,
					],
					'quantity' => 1,
				];
			}
			
			elseif (isset($item['custommenu'])) {
				$custommenu = $item['custommenu'];
				$quantity = $item['qty'];
				$stripeLineItems[] = [
					'price_data' => [
						'currency' => 'eur',
						'product_data' => [
							'name' => $custommenu->custommenuname . ' €20 per person',
						],
						'unit_amount' => 2000 * $event->numOfGuests,
					],
					'quantity' => 1,
				];
			}

		}
		
		$stripeLineItems[] = [
			'price_data' => [
				'currency' => 'eur',
				'product_data' => [
					'name' => $event->venue->venuename,
				],
				'unit_amount' => $event->venue->costtorent * 100,
			],
			'quantity' => 1,
		];

		$session = \Stripe\Checkout\Session::create([
			'line_items' => $stripeLineItems,
			'mode' => 'payment',
			'success_url' => route('homepage'),
			'cancel_url' => route('events.checkout'),
		]);
		
		$this->eventplaceorder($eventid, $request);

		return redirect()->away($session->url);
	}	
	
	
	public function eventplaceorder($eventid,Request $request)
	{
		$thisEvent = \App\Models\event::find($eventid);
		
		if ($thisEvent) {
			$lineitems = unserialize(urldecode($request->input('lineitems')));
			$thisEvent->orderplacedon = (new \DateTime())->format("Y-m-d H:i:s");
			$thisEvent->customerid = Auth::user()->customer->id;
			$thisEvent->eventstatus = 'Event';
			$thisEvent->save();

			$eventID = $thisEvent->id;

			$ttlCost = 0;
			
			foreach ($lineitems as $lineitem) {
				if (isset($lineitem['product'])) {
					$thisEventProductLog = new \App\Models\eventproductlog();
					$thisEventProductLog->eventid = $eventID;
					$thisEventProductLog->productid = $lineitem['product']->id;
					$thisEventProductLog->eventproductquantity = $lineitem['qty'];
					$thisEventProductLog->save();
					
					$ttlCost += ($lineitem['product']->productcost) * $lineitem['qty'];
				}
					elseif (isset($lineitem['custommenu'])) {
						$thisEvent->custommenuid = $lineitem['custommenu']->id;
						$ttlCost += 20 * $thisEvent->numOfGuests;
					}
					elseif (isset($lineitem['standardmenu'])) {
						$thisEvent->standardmenuid = $lineitem['standardmenu']->id;
						$ttlCost += 20 * $thisEvent->numOfGuests;
					}
				}
			$thisEvent->eventordertotal = $ttlCost + $thisEvent->venue->costtorent;

			$thisEvent->save();
		}

		Flash::success("Your Event Order has been placed - Tap on your profile to view");

		return redirect(route('homepage'));
	}


	

}