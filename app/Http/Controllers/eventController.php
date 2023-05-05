<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateeventRequest;
use App\Http\Requests\UpdateeventRequest;
use App\Repositories\eventRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use \App\Models\customer as customer;
use Flash;
use Response;
use Session;
use Illuminate\Support\Facades\Auth;

class eventController extends AppBaseController
{
    /** @var eventRepository $eventRepository*/
    private $eventRepository;

    public function __construct(eventRepository $eventRepo)
    {
        $this->eventRepository = $eventRepo;
    }

    /**
     * Display a listing of the event.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $events = $this->eventRepository->all();
		$customers=\App\Models\customer::all();

        return view('events.index')->with('events', $events)->with('customers',$customers);
    }
	
    public function orderplaced(Request $request)
    {

        return view('events.orderplaced');
    }
	
	public function custindex(Request $request)
	{
		$customerId = Auth::user()->customer->id;
		$events = $this->eventRepository->findByCustomerId($customerId)->where('eventstatus', 'Event');
		
		return view('events.custindex', compact('events'));
	}
	
	public function projectindex(Request $request)
	{
		$customerId = Auth::user()->customer->id;
		$events = $this->eventRepository->findByCustomerId($customerId)->where('eventstatus', 'Project');
		
		return view('events.projectindex', compact('events'));
	}

    /**
     * Show the form for creating a new event.
     *
     * @return Response
     */
    public function create()
    {
        return view('events.create');
    }
	
    public function projectcreated(Request $request)
    {

        return view('events.projectcreated');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param CreateeventRequest $request
     *
     * @return Response
     */
    public function venstore(CreateeventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');
		
		$venueid = $request->venueid;
		
		return redirect()->route('calendar.vendisplay', ['venueid' => $venueid]);
    }
	
    public function store(CreateeventRequest $request)
    {
        $input = $request->all();

        $event = $this->eventRepository->create($input);

        Flash::success('Event saved successfully.');
		
		$venueid = $request->venueid;
		
		return redirect()->route('calendar.display', ['venueid' => $venueid]);
    }

    /**
     * Display the specified event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.show')->with('event', $event);
    }
	
    public function custshow($id)
    {
        $event = $this->eventRepository->find($id);
		$eventProductLogs = \App\Models\eventproductlog::where('eventid', $id)->get();

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.custshow', compact('event', 'eventProductLogs'));
    }
	
    /**
     * Show the form for editing the specified event.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.edit')->with('event', $event);
    }

    /**
     * Update the specified event in storage.
     *
     * @param int $id
     * @param UpdateeventRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateeventRequest $request)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $event = $this->eventRepository->update($request->all(), $id);

        Flash::success('Event updated successfully.');

        return redirect(route('events.index'));
    }

    /**
     * Remove the specified event from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $event = $this->eventRepository->find($id);

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        $this->eventRepository->delete($id);

        Flash::success('Event deleted successfully.');

        return redirect(route('events.index'));
    }
	
/*public function checkout()
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$lineitems = array();
			foreach ($cart as $productid => $qty) {
				$lineitem['product'] = \App\Models\Product::find($productid);
				$lineitem['qty'] = $qty;
				$lineitems[] = $lineitem;
			}
			return view('events.checkout')->with('lineitems', $lineitems);
		}
		else {
			Flash::error("There are no items in your cart");
			return redirect(route('products.displaygrid'));
		}
	}*/
	

	
	public function checkout()
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$lineitems = array();
			foreach ($cart as $id => $qty) {

				list($type, $itemId) = explode('-', $id);

				$lineitem = [];

				if ($type === 'product' && $product = \App\Models\product::find($itemId)) {
					$lineitem['product'] = $product;
				} elseif ($type === 'venue' && $venue = \App\Models\venue::find($itemId)) {
					$lineitem['venue'] = $venue;
				} elseif ($type === 'standardmenu' && $standardmenu = \App\Models\standardmenu::find($itemId)) {
					$lineitem['standardmenu'] = $standardmenu;
				} elseif ($type === 'custommenu' && $custommenu = \App\Models\custommenu::find($itemId)) {
					$lineitem['custommenu'] = $custommenu;
				} else {
					continue;
				}
				$lineitem['qty'] = $qty;
				$lineitems[] = $lineitem;
			}
			
			$encodedLineItems = urlencode(serialize($lineitems));
			$form = '<form method="POST" action="'.route('events.placeorder').'">';
			$form .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
			$form .= '<input type="hidden" name="lineitems" value="'.$encodedLineItems.'">';
			$form .= '<button type="submit" class="btn btn-primary">Place Order</button>';
			$form .= '</form>';

			return view('events.checkout')->with('lineitems', $lineitems)->with('form', $form);
		} else {
			Flash::error("There are no items in your cart");
			return redirect(route('products.displaygrid'));
		}
	}


	
	public function placeorder(Request $request)
	{
		$lineitems = unserialize(urldecode($request->input('lineitems')));
		$thisOrder = new \App\Models\event();
		$thisOrder->eventdate = (new \DateTime())->format("Y-m-d H:i:s");
		$thisOrder->customerid = Auth::user()->customer->id;
		$thisOrder->save();

		$eventID = $thisOrder->id;

		
		foreach ($lineitems as $lineitem) {
			if (isset($lineitem['product'])) {
				$thisOrderDetail = new \App\Models\eventproductlog();
				$thisOrderDetail->eventid = $eventID;
				$thisOrderDetail->productid = $lineitem['product']->id;
				$thisOrderDetail->eventproductquantity = $lineitem['qty'];
				$thisOrderDetail->save();
			}
		}

		Session::forget('cart');

		Flash::success("Your Event Order has been placed");

		return redirect(route('events.orderplaced'));
	}
	
	public function createprojectother(Request $request)
	{
		$lineitems = unserialize(urldecode($request->input('lineitems')));
		$thisProject = new \App\Models\event();
		$thisProject->eventdate = (new \DateTime())->format("Y-m-d H:i:s");
		$thisProject->customerid = Auth::user()->customer->id;
		$thisProject->eventstatus = 'Project';
		$thisProject->save();
		$eventID = $thisProject->id;
		
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
					$thisProject->custommenuid = $lineitem['custommenu']->id;
					$ttlCost = $ttlCost + 20 ;
				}
				elseif (isset($lineitem['standardmenu'])) {
					$thisProject->standardmenuid = $lineitem['standardmenu']->id;
					$ttlCost = $ttlCost + 20;
				}
			}
			
		$thisProject->eventordertotal = $ttlCost;
		$thisProject->save();
		
		Session::forget('cart');

		Flash::success("Your Project has been created");
		return redirect(route('events.projectcreated'));
	}

	
	
	
	
	
	public function createproject($eventid,Request $request)
	{
		$thisEvent = \App\Models\event::find($eventid);
		
		if ($thisEvent) {
			$lineitems = unserialize(urldecode($request->input('lineitems')));
			$thisEvent->orderplacedon = (new \DateTime())->format("Y-m-d H:i:s");
			$thisEvent->customerid = Auth::user()->customer->id;
			$thisEvent->eventstatus = 'Project';
			$thisEvent->save();

			$eventID = $thisEvent->id;

			
			foreach ($lineitems as $lineitem) {
				if (isset($lineitem['product'])) {
					$thisEventProductLog = new \App\Models\eventproductlog();
					$thisEventProductLog->eventid = $eventID;
					$thisEventProductLog->productid = $lineitem['product']->id;
					$thisEventProductLog->eventproductquantity = $lineitem['qty'];
					$thisEventProductLog->save();
				}
			}
		}
		Session::forget('cart');

		Flash::success("Your Event Order has been placed");

		return redirect(route('events.projectcreated'));
	}	
	
	public function eventcheckout($eventid)
	{
		$event=\App\Models\event::find($eventid);
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$lineitems = array();
			foreach ($cart as $id => $qty) {

				list($type, $itemId) = explode('-', $id);

				$lineitem = [];

				if ($type === 'product' && $product = \App\Models\product::find($itemId)) {
					$lineitem['product'] = $product;
				} elseif ($type === 'venue' && $venue = \App\Models\venue::find($itemId)) {
					$lineitem['venue'] = $venue;
				} elseif ($type === 'standardmenu' && $standardmenu = \App\Models\standardmenu::find($itemId)) {
					$lineitem['standardmenu'] = $standardmenu;
				} elseif ($type === 'custommenu' && $custommenu = \App\Models\custommenu::find($itemId)) {
					$lineitem['custommenu'] = $custommenu;
				} else {
					continue;
				}
				$lineitem['qty'] = $qty;
				$lineitems[] = $lineitem;
			}

			return view('events.eventcheckout')->with('lineitems', $lineitems)->with('event',$event);
		} else {
			Flash::error("There are no items in your cart");
			return redirect(route('products.eventdisplaygrid'));
		}
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
					
					$ttlCost += ($lineitem['product']->productcost + $lineitem['product']->costtorent) * $lineitem['qty'];
				}
					elseif (isset($lineitem['custommenu'])) {
						$thisEvent->custommenuid = $lineitem['custommenu']->id;
					}
					elseif (isset($lineitem['standardmenu'])) {
						$thisEvent->standardmenuid = $lineitem['standardmenu']->id;
					}
				}
			$thisEvent->eventordertotal = $ttlCost;

			$thisEvent->save();
		}
		Session::forget('cart');

		Flash::success("Your Event Order has been placed");

		return redirect(route('events.orderplaced'));
	}	


}