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
	
	public function custindex(Request $request)
	{
		$customerId = Auth::user()->customer->id;
		$events = $this->eventRepository->findByCustomerId($customerId);
		
		return view('events.custindex', compact('events'));
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

        if (empty($event)) {
            Flash::error('Event not found');

            return redirect(route('events.index'));
        }

        return view('events.custshow')->with('event', $event);
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

            $lineitem = []; // Add this line to re-initialize the variable

            if ($type === 'product' && $product = \App\Models\product::find($itemId)) {
                $lineitem['product'] = $product;
            } elseif ($type === 'venue' && $venue = \App\Models\venue::find($itemId)) {
                $lineitem['venue'] = $venue;
            } elseif ($type === 'standardmenu' && $standardmenu = \App\Models\standardmenu::find($itemId)) {
                $lineitem['standardmenu'] = $standardmenu;
            } elseif ($type === 'custommenu' && $custommenu = \App\Models\custommenu::find($itemId)) {
                $lineitem['custommenu'] = $custommenu;
            } else {
                continue; // Skip if no matching model is found
            }
            $lineitem['qty'] = $qty;
            $lineitems[] = $lineitem;
        }

        // Pass venue and line items to the view
        return view('events.checkout')->with('lineitems', $lineitems);
    } else {
        Flash::error("There are no items in your cart");
        return redirect(route('products.displaygrid'));
    }
}
	
	public function placeorder(Request $request)
	{
		$thisOrder = new \App\Models\Event();
		$thisOrder->eventdate = (new \DateTime())->format("Y-m-d H:i:s");
		$thisOrder->customerid = $request->customerid;
		$thisOrder->save();
		$eventID = $thisOrder->id;
		$productids = $request->productid ?? [];
		$customerid = $request->customerid;
		$custommenuid = $request->custommenuid;
		$standardmenuid = $request->standardmenuid;
		/*$venueids = $request->venueid ?? [];*/
		$quantities = $request->quantity ?? [];
		for($i=0;$i<sizeof($productids);$i++) {
			$thisOrderDetail = new \App\Models\Eventproductlog();
			$thisOrderDetail->eventid = $eventID;
			$thisOrderDetail->productid = $productids[$i];
			/*$thisOrderDetail->venueid = $venueids[$i] ?? null;*/
			$thisOrderDetail->eventproductquantity = $quantities[$i] ?? 0;
			$thisOrderDetail->save();
		}
		Session::forget('cart');
		Flash::success("Your Event Order has been placed");
		return redirect(route('orderplaced'));
	}

}
