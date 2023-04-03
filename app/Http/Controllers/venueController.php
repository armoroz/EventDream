<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevenueRequest;
use App\Http\Requests\UpdatevenueRequest;
use App\Repositories\venueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;
use App\Models\venueimages as venueimages;
use App\Models\venuerating as venueratings;

class venueController extends Controller
{
    /** @var venueRepository $venueRepository*/
    private $venueRepository;

    public function __construct(venueRepository $venueRepo)
    {
        $this->venueRepository = $venueRepo;
    }
	
	public function searchquery(Request $request)
	{
		$searchquery=$request->searchquery;
		$venues=\App\Models\venue::where('venuename','LIKE','%'.$searchquery.'%')->get(); 
	
		
		$venueimages = \App\Models\venueimages::all();
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $venue => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}
		
		return view('venues.displaygrid')->with('venues',$venues)->with('totalItems',$totalItems)->with('venueimages',$venueimages);
	}
	
	
	
    /**
     * Display a listing of the venue.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $venues = $this->venueRepository->all();

        return view('venues.index')
            ->with('venues', $venues);
    }

    /**
     * Show the form for creating a new venue.
     *
     * @return Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created venue in storage.
     *
     * @param CreatevenueRequest $request
     *
     * @return Response
     */
    public function store(CreatevenueRequest $request)
    {
        $input = $request->all();

        $venue = $this->venueRepository->create($input);

        Flash::success('Venue saved successfully!');

        return redirect(route('venues.showmap'));
    }

    /**
     * Display the specified venue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $venue = $this->venueRepository->find($id);
		$venueimages = $venue->venueimages;

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

        return view('venues.show')->with('venue', $venue)->with('venueimages',$venueimages);
    }

    /**
     * Show the form for editing the specified venue.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $venue = $this->venueRepository->find($id);

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

        return view('venues.edit')->with('venue', $venue);
    }

    /**
     * Update the specified venue in storage.
     *
     * @param int $id
     * @param UpdatevenueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevenueRequest $request)
    {
        $venue = $this->venueRepository->find($id);

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

        $venue = $this->venueRepository->update($request->all(), $id);

        Flash::success('Venue updated successfully.');

        return redirect(route('venues.index'));
    }
	
	public function displayGrid(Request $request)
	{
		$venues = \App\Models\venue::all();
		$venueimages = \App\Models\venueimages::all();


		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $venue => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
		return view('venues.displaygrid')->with('venues',$venues)->with('totalItems',$totalItems)->with('venueimages',$venueimages);
		
	}

    /**
     * Remove the specified venue from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $venue = $this->venueRepository->find($id);

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

        $this->venueRepository->delete($id);

        Flash::success('Venue deleted successfully.');

        return redirect(route('venues.index'));
    }
	
	public function additem($venueid)
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$itemId = 'venue-' . $venueid;
			if (isset($cart[$itemId])) {
				$cart[$itemId] = $cart[$itemId] + 1; //add one to venue in cart
			} else {
				$cart[$itemId] = 1; //new venue in cart
			}
		} else {
			$itemId = 'venue-' . $venueid;
			$cart[$itemId] = 1; //new cart
		}
		Session::put('cart', $cart);
		return Response::json(['success' => true, 'total' => array_sum($cart)], 200);
	}
	
     public function emptycart()
    {
        if (Session::has('cart')) {
            Session::forget('cart');
        }
        return Response::json(['success'=>true],200);
    }
	
		public function filterVenues(Request $request)
	{
		//$priceRange = explode('-', $request->price_range);
		$minprice = $request->minPrice;
		$maxprice = $request->maxPrice;
  
		$venues = \App\Models\venue::whereBetween('costtorent', [$minprice, $maxprice])->get();
		$venueimages = \App\Models\venueimages::all();

		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $venue => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}
		
		return view('venues.displaygrid')->with('venues',$venues)->with('totalItems',$totalItems)->with('venueimages',$venueimages);

	}


	
	public function json()
	{
		$venues = \App\Models\venue::all();
		return response()->json($venues);
	} 
	
	public function showMap()
	{
		return view('venues.showmap');
	}
	
    public function custshow($id, Request $request)
    {
		
        $venue = $this->venueRepository->find($id);
		$venueratings = $venue->venueratings;
		$venueimages = $venue->venueimages;

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

		$venues = \App\Models\venue::all();
		$totalItems = 0;

		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			foreach ($cart as $venueId => $qty) {
				$totalItems += $qty;
			}
		}

		return view('venues.custshow', ['venue' => $venue, 'totalItems' => $totalItems, 'venueimages' => $venueimages, 'venueratings' => $venueratings]);
	}

}
