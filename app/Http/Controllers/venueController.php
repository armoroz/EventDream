<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevenueRequest;
use App\Http\Requests\UpdatevenueRequest;
use App\Repositories\venueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class venueController extends AppBaseController
{
    /** @var venueRepository $venueRepository*/
    private $venueRepository;

    public function __construct(venueRepository $venueRepo)
    {
        $this->venueRepository = $venueRepo;
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

        Flash::success('Venue saved successfully.');

        return redirect(route('venues.index'));
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

        if (empty($venue)) {
            Flash::error('Venue not found');

            return redirect(route('venues.index'));
        }

        return view('venues.show')->with('venue', $venue);
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
	
	public function json()
	{
		$venues = \App\Models\Venue::all();
		return response()->json($venues);
	} 
}
