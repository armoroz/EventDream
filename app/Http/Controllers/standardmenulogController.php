<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestandardmenulogRequest;
use App\Http\Requests\UpdatestandardmenulogRequest;
use App\Repositories\standardmenulogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class standardmenulogController extends AppBaseController
{
    /** @var standardmenulogRepository $standardmenulogRepository*/
    private $standardmenulogRepository;

    public function __construct(standardmenulogRepository $standardmenulogRepo)
    {
        $this->standardmenulogRepository = $standardmenulogRepo;
    }

    /**
     * Display a listing of the standardmenulog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $standardmenulogs = $this->standardmenulogRepository->all();

        return view('standardmenulogs.index')
            ->with('standardmenulogs', $standardmenulogs);
    }

    /**
     * Show the form for creating a new standardmenulog.
     *
     * @return Response
     */
    public function create()
    {
        return view('standardmenulogs.create');
    }

    /**
     * Store a newly created standardmenulog in storage.
     *
     * @param CreatestandardmenulogRequest $request
     *
     * @return Response
     */
    public function store(CreatestandardmenulogRequest $request)
    {
        $input = $request->all();

        $standardmenulog = $this->standardmenulogRepository->create($input);

        Flash::success('Standardmenulog saved successfully.');

        return redirect(route('standardmenulogs.index'));
    }

    /**
     * Display the specified standardmenulog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $standardmenulog = $this->standardmenulogRepository->find($id);

        if (empty($standardmenulog)) {
            Flash::error('Standardmenulog not found');

            return redirect(route('standardmenulogs.index'));
        }

        return view('standardmenulogs.show')->with('standardmenulog', $standardmenulog);
    }

    /**
     * Show the form for editing the specified standardmenulog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $standardmenulog = $this->standardmenulogRepository->find($id);

        if (empty($standardmenulog)) {
            Flash::error('Standardmenulog not found');

            return redirect(route('standardmenulogs.index'));
        }

        return view('standardmenulogs.edit')->with('standardmenulog', $standardmenulog);
    }

    /**
     * Update the specified standardmenulog in storage.
     *
     * @param int $id
     * @param UpdatestandardmenulogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestandardmenulogRequest $request)
    {
        $standardmenulog = $this->standardmenulogRepository->find($id);

        if (empty($standardmenulog)) {
            Flash::error('Standardmenulog not found');

            return redirect(route('standardmenulogs.index'));
        }

        $standardmenulog = $this->standardmenulogRepository->update($request->all(), $id);

        Flash::success('Standardmenulog updated successfully.');

        return redirect(route('standardmenulogs.index'));
    }

    /**
     * Remove the specified standardmenulog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $standardmenulog = $this->standardmenulogRepository->find($id);

        if (empty($standardmenulog)) {
            Flash::error('Standardmenulog not found');

            return redirect(route('standardmenulogs.index'));
        }

        $this->standardmenulogRepository->delete($id);

        Flash::success('Standardmenulog deleted successfully.');

        return redirect(route('standardmenulogs.index'));
    }	
}
