<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateeventproductlogRequest;
use App\Http\Requests\UpdateeventproductlogRequest;
use App\Repositories\eventproductlogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class eventproductlogController extends AppBaseController
{
    /** @var eventproductlogRepository $eventproductlogRepository*/
    private $eventproductlogRepository;

    public function __construct(eventproductlogRepository $eventproductlogRepo)
    {
        $this->eventproductlogRepository = $eventproductlogRepo;
    }

    /**
     * Display a listing of the eventproductlog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $eventproductlogs = $this->eventproductlogRepository->all();

        return view('eventproductlogs.index')
            ->with('eventproductlogs', $eventproductlogs);
    }

    /**
     * Show the form for creating a new eventproductlog.
     *
     * @return Response
     */
    public function create()
    {
        return view('eventproductlogs.create');
    }

    /**
     * Store a newly created eventproductlog in storage.
     *
     * @param CreateeventproductlogRequest $request
     *
     * @return Response
     */
    public function store(CreateeventproductlogRequest $request)
    {
        $input = $request->all();

        $eventproductlog = $this->eventproductlogRepository->create($input);

        Flash::success('Eventproductlog saved successfully.');

        return redirect(route('eventproductlogs.index'));
    }

    /**
     * Display the specified eventproductlog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $eventproductlog = $this->eventproductlogRepository->find($id);

        if (empty($eventproductlog)) {
            Flash::error('Eventproductlog not found');

            return redirect(route('eventproductlogs.index'));
        }

        return view('eventproductlogs.show')->with('eventproductlog', $eventproductlog);
    }

    /**
     * Show the form for editing the specified eventproductlog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $eventproductlog = $this->eventproductlogRepository->find($id);

        if (empty($eventproductlog)) {
            Flash::error('Eventproductlog not found');

            return redirect(route('eventproductlogs.index'));
        }

        return view('eventproductlogs.edit')->with('eventproductlog', $eventproductlog);
    }

    /**
     * Update the specified eventproductlog in storage.
     *
     * @param int $id
     * @param UpdateeventproductlogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateeventproductlogRequest $request)
    {
        $eventproductlog = $this->eventproductlogRepository->find($id);

        if (empty($eventproductlog)) {
            Flash::error('Eventproductlog not found');

            return redirect(route('eventproductlogs.index'));
        }

        $eventproductlog = $this->eventproductlogRepository->update($request->all(), $id);

        Flash::success('Eventproductlog updated successfully.');

        return redirect(route('eventproductlogs.index'));
    }

    /**
     * Remove the specified eventproductlog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $eventproductlog = $this->eventproductlogRepository->find($id);

        if (empty($eventproductlog)) {
            Flash::error('Eventproductlog not found');

            return redirect(route('eventproductlogs.index'));
        }

        $this->eventproductlogRepository->delete($id);

        Flash::success('Eventproductlog deleted successfully.');

        return redirect(route('eventproductlogs.index'));
    }
}
