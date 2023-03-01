<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestandardmenuRequest;
use App\Http\Requests\UpdatestandardmenuRequest;
use App\Repositories\standardmenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class standardmenuController extends AppBaseController
{
    /** @var standardmenuRepository $standardmenuRepository*/
    private $standardmenuRepository;

    public function __construct(standardmenuRepository $standardmenuRepo)
    {
        $this->standardmenuRepository = $standardmenuRepo;
    }

    /**
     * Display a listing of the standardmenu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $standardmenus = $this->standardmenuRepository->all();

        return view('standardmenus.index')
            ->with('standardmenus', $standardmenus);
    }

    /**
     * Show the form for creating a new standardmenu.
     *
     * @return Response
     */
    public function create()
    {
        return view('standardmenus.create');
    }

    /**
     * Store a newly created standardmenu in storage.
     *
     * @param CreatestandardmenuRequest $request
     *
     * @return Response
     */
    public function store(CreatestandardmenuRequest $request)
    {
        $input = $request->all();

        $standardmenu = $this->standardmenuRepository->create($input);

        Flash::success('Standardmenu saved successfully.');

        return redirect(route('standardmenus.index'));
    }

    /**
     * Display the specified standardmenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $standardmenu = $this->standardmenuRepository->find($id);

        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        return view('standardmenus.show')->with('standardmenu', $standardmenu);
    }

    /**
     * Show the form for editing the specified standardmenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $standardmenu = $this->standardmenuRepository->find($id);

        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        return view('standardmenus.edit')->with('standardmenu', $standardmenu);
    }

    /**
     * Update the specified standardmenu in storage.
     *
     * @param int $id
     * @param UpdatestandardmenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestandardmenuRequest $request)
    {
        $standardmenu = $this->standardmenuRepository->find($id);

        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        $standardmenu = $this->standardmenuRepository->update($request->all(), $id);

        Flash::success('Standardmenu updated successfully.');

        return redirect(route('standardmenus.index'));
    }

    /**
     * Remove the specified standardmenu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $standardmenu = $this->standardmenuRepository->find($id);

        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        $this->standardmenuRepository->delete($id);

        Flash::success('Standardmenu deleted successfully.');

        return redirect(route('standardmenus.index'));
    }
}
