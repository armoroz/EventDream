<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemenuitemRequest;
use App\Http\Requests\UpdatemenuitemRequest;
use App\Repositories\menuitemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class menuitemController extends AppBaseController
{
    /** @var menuitemRepository $menuitemRepository*/
    private $menuitemRepository;

    public function __construct(menuitemRepository $menuitemRepo)
    {
        $this->menuitemRepository = $menuitemRepo;
    }

    /**
     * Display a listing of the menuitem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $menuitems = $this->menuitemRepository->all();

        return view('menuitems.index')
            ->with('menuitems', $menuitems);
    }

    /**
     * Show the form for creating a new menuitem.
     *
     * @return Response
     */
    public function create()
    {
        return view('menuitems.create');
    }

    /**
     * Store a newly created menuitem in storage.
     *
     * @param CreatemenuitemRequest $request
     *
     * @return Response
     */
    public function store(CreatemenuitemRequest $request)
    {
        $input = $request->all();

        $menuitem = $this->menuitemRepository->create($input);

        Flash::success('Menuitem saved successfully.');

        return redirect(route('menuitems.index'));
    }

    /**
     * Display the specified menuitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menuitem = $this->menuitemRepository->find($id);

        if (empty($menuitem)) {
            Flash::error('Menuitem not found');

            return redirect(route('menuitems.index'));
        }

        return view('menuitems.show')->with('menuitem', $menuitem);
    }

    /**
     * Show the form for editing the specified menuitem.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menuitem = $this->menuitemRepository->find($id);

        if (empty($menuitem)) {
            Flash::error('Menuitem not found');

            return redirect(route('menuitems.index'));
        }

        return view('menuitems.edit')->with('menuitem', $menuitem);
    }

    /**
     * Update the specified menuitem in storage.
     *
     * @param int $id
     * @param UpdatemenuitemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatemenuitemRequest $request)
    {
        $menuitem = $this->menuitemRepository->find($id);

        if (empty($menuitem)) {
            Flash::error('Menuitem not found');

            return redirect(route('menuitems.index'));
        }

        $menuitem = $this->menuitemRepository->update($request->all(), $id);

        Flash::success('Menuitem updated successfully.');

        return redirect(route('menuitems.index'));
    }

    /**
     * Remove the specified menuitem from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menuitem = $this->menuitemRepository->find($id);

        if (empty($menuitem)) {
            Flash::error('Menuitem not found');

            return redirect(route('menuitems.index'));
        }

        $this->menuitemRepository->delete($id);

        Flash::success('Menuitem deleted successfully.');

        return redirect(route('menuitems.index'));
    }
}
