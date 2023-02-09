<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevenueratingRequest;
use App\Http\Requests\UpdatevenueratingRequest;
use App\Repositories\venueratingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class venueratingController extends AppBaseController
{
    /** @var venueratingRepository $venueratingRepository*/
    private $venueratingRepository;

    public function __construct(venueratingRepository $venueratingRepo)
    {
        $this->venueratingRepository = $venueratingRepo;
    }

    /**
     * Display a listing of the venuerating.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $venueratings = $this->venueratingRepository->all();

        return view('venueratings.index')
            ->with('venueratings', $venueratings);
    }

    /**
     * Show the form for creating a new venuerating.
     *
     * @return Response
     */
    public function create()
    {
        return view('venueratings.create');
    }

    /**
     * Store a newly created venuerating in storage.
     *
     * @param CreatevenueratingRequest $request
     *
     * @return Response
     */
    public function store(CreatevenueratingRequest $request)
    {
        $input = $request->all();

        $venuerating = $this->venueratingRepository->create($input);

        Flash::success('Venuerating saved successfully.');

        return redirect(route('venueratings.index'));
    }

    /**
     * Display the specified venuerating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $venuerating = $this->venueratingRepository->find($id);

        if (empty($venuerating)) {
            Flash::error('Venuerating not found');

            return redirect(route('venueratings.index'));
        }

        return view('venueratings.show')->with('venuerating', $venuerating);
    }

    /**
     * Show the form for editing the specified venuerating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $venuerating = $this->venueratingRepository->find($id);

        if (empty($venuerating)) {
            Flash::error('Venuerating not found');

            return redirect(route('venueratings.index'));
        }

        return view('venueratings.edit')->with('venuerating', $venuerating);
    }

    /**
     * Update the specified venuerating in storage.
     *
     * @param int $id
     * @param UpdatevenueratingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevenueratingRequest $request)
    {
        $venuerating = $this->venueratingRepository->find($id);

        if (empty($venuerating)) {
            Flash::error('Venuerating not found');

            return redirect(route('venueratings.index'));
        }

        $venuerating = $this->venueratingRepository->update($request->all(), $id);

        Flash::success('Venuerating updated successfully.');

        return redirect(route('venueratings.index'));
    }

    /**
     * Remove the specified venuerating from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $venuerating = $this->venueratingRepository->find($id);

        if (empty($venuerating)) {
            Flash::error('Venuerating not found');

            return redirect(route('venueratings.index'));
        }

        $this->venueratingRepository->delete($id);

        Flash::success('Venuerating deleted successfully.');

        return redirect(route('venueratings.index'));
    }
}
