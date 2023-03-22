<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecustommenuRequest;
use App\Http\Requests\UpdatecustommenuRequest;
use App\Repositories\custommenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class custommenuController extends AppBaseController
{
    /** @var custommenuRepository $custommenuRepository*/
    private $custommenuRepository;

    public function __construct(custommenuRepository $custommenuRepo)
    {
        $this->custommenuRepository = $custommenuRepo;
    }

    /**
     * Display a listing of the custommenu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $custommenus = $this->custommenuRepository->all();

        return view('custommenus.index')
            ->with('custommenus', $custommenus);
    }

    /**
     * Show the form for creating a new custommenu.
     *
     * @return Response
     */
    public function create()
    {
        return view('custommenus.create');
    }

    /**
     * Store a newly created custommenu in storage.
     *
     * @param CreatecustommenuRequest $request
     *
     * @return Response
     */
    public function store(CreatecustommenuRequest $request)
    {
        $input = $request->all();

        $custommenu = $this->custommenuRepository->create($input);

        Flash::success('Custommenu saved successfully.');

        return redirect(route('custommenus.index'));
    }

    /**
     * Display the specified custommenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

        return view('custommenus.show')->with('custommenu', $custommenu);
    }

    /**
     * Show the form for editing the specified custommenu.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

        return view('custommenus.edit')->with('custommenu', $custommenu);
    }

    /**
     * Update the specified custommenu in storage.
     *
     * @param int $id
     * @param UpdatecustommenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecustommenuRequest $request)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

        $custommenu = $this->custommenuRepository->update($request->all(), $id);

        Flash::success('Custommenu updated successfully.');

        return redirect(route('custommenus.index'));
    }

    /**
     * Remove the specified custommenu from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

        $this->custommenuRepository->delete($id);

        Flash::success('Custommenu deleted successfully.');

        return redirect(route('custommenus.index'));
    }
	
	public function displayGrid(Request $request)
	{
		$custommenus=\App\Models\Custommenu::all();
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $custommenu => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
		return view('custommenus.displaygrid')->with('custommenus',$custommenus)->with('totalItems',$totalItems);
		
	}
}
