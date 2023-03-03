<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecustommenulogRequest;
use App\Http\Requests\UpdatecustommenulogRequest;
use App\Repositories\custommenulogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class custommenulogController extends AppBaseController
{
    /** @var custommenulogRepository $custommenulogRepository*/
    private $custommenulogRepository;

    public function __construct(custommenulogRepository $custommenulogRepo)
    {
        $this->custommenulogRepository = $custommenulogRepo;
    }

    /**
     * Display a listing of the custommenulog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $custommenulogs = $this->custommenulogRepository->all();

        return view('custommenulogs.index')
            ->with('custommenulogs', $custommenulogs);
    }

    /**
     * Show the form for creating a new custommenulog.
     *
     * @return Response
     */
    public function create()
    {
        return view('custommenulogs.create');
    }

    /**
     * Store a newly created custommenulog in storage.
     *
     * @param CreatecustommenulogRequest $request
     *
     * @return Response
     */
    public function store(CreatecustommenulogRequest $request)
    {
        $input = $request->all();

        $custommenulog = $this->custommenulogRepository->create($input);

        Flash::success('Custommenulog saved successfully.');

        return redirect(route('custommenulogs.index'));
    }

    /**
     * Display the specified custommenulog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $custommenulog = $this->custommenulogRepository->find($id);

        if (empty($custommenulog)) {
            Flash::error('Custommenulog not found');

            return redirect(route('custommenulogs.index'));
        }

        return view('custommenulogs.show')->with('custommenulog', $custommenulog);
    }

    /**
     * Show the form for editing the specified custommenulog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $custommenulog = $this->custommenulogRepository->find($id);

        if (empty($custommenulog)) {
            Flash::error('Custommenulog not found');

            return redirect(route('custommenulogs.index'));
        }

        return view('custommenulogs.edit')->with('custommenulog', $custommenulog);
    }

    /**
     * Update the specified custommenulog in storage.
     *
     * @param int $id
     * @param UpdatecustommenulogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecustommenulogRequest $request)
    {
        $custommenulog = $this->custommenulogRepository->find($id);

        if (empty($custommenulog)) {
            Flash::error('Custommenulog not found');

            return redirect(route('custommenulogs.index'));
        }

        $custommenulog = $this->custommenulogRepository->update($request->all(), $id);

        Flash::success('Custommenulog updated successfully.');

        return redirect(route('custommenulogs.index'));
    }

    /**
     * Remove the specified custommenulog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $custommenulog = $this->custommenulogRepository->find($id);

        if (empty($custommenulog)) {
            Flash::error('Custommenulog not found');

            return redirect(route('custommenulogs.index'));
        }

        $this->custommenulogRepository->delete($id);

        Flash::success('Custommenulog deleted successfully.');

        return redirect(route('custommenulogs.index'));
    }
}
