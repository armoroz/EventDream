<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatebookingRequest;
use App\Http\Requests\UpdatebookingRequest;
use App\Repositories\bookingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Product as product;
use App\Models\Venue as Venue;
use Flash;
use Response;

class bookingController extends AppBaseController
{
    /** @var bookingRepository $bookingRepository*/
    private $bookingRepository;

    public function __construct(bookingRepository $bookingRepo)
    {
        $this->bookingRepository = $bookingRepo;
    }

    /**
     * Display a listing of the booking.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bookings = $this->bookingRepository->all();

        return view('bookings.index')
            ->with('bookings', $bookings);
    }

    /**
     * Show the form for creating a new booking.
     *
     * @return Response
     */
    public function create()
    {
        
     //Find all products from the DB and return as an array of Product.php objects
     $products = Product::all();
     //Find all venues from the DB and return as an array of Venue.php objects
     $venues = venue::all();
     //return the bookings.create view with $products and $venues as view variables
      return view('bookings.create')->with('products', $products)->with('venues', $venues);
	 
    }

    /**
     * Store a newly created booking in storage.
     *
     * @param CreatebookingRequest $request
     *
     * @return Response
     */
    public function store(CreatebookingRequest $request)
    {
        $input = $request->all();

        $booking = $this->bookingRepository->create($input);

        Flash::success('Booking saved successfully.');

        return redirect(route('bookings.'));
    }

    /**
     * Display the specified booking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.show')->with('booking', $booking);
    }

    /**
     * Show the form for editing the specified booking.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        return view('bookings.edit')->with('booking', $booking);
    }

    /**
     * Update the specified booking in storage.
     *
     * @param int $id
     * @param UpdatebookingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebookingRequest $request)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $booking = $this->bookingRepository->update($request->all(), $id);

        Flash::success('Booking updated successfully.');

        return redirect(route('bookings.index'));
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $booking = $this->bookingRepository->find($id);

        if (empty($booking)) {
            Flash::error('Booking not found');

            return redirect(route('bookings.index'));
        }

        $this->bookingRepository->delete($id);

        Flash::success('Booking deleted successfully.');

        return redirect(route('bookings.index'));
    }
}
