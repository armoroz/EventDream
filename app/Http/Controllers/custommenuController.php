<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecustommenuRequest;
use App\Http\Requests\UpdatecustommenuRequest;
use App\Repositories\custommenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;
use App\Models\Custommenu as Custommenu;
use App\Models\Menuitem as Menuitem;

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
	public function create($id)
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
	
    public function custshow($id, Request $request)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

		
		$custommenus = \App\Models\custommenu::all();
		$totalItems = 0;

		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			foreach ($cart as $custommenuId => $qty) {
				$totalItems += $qty;
			}
		}

		return view('custommenus.custshow', ['custommenu' => $custommenu, 'totalItems' => $totalItems]); 
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

            return redirect(route('custommenus.displaygrid'));
        }

        $custommenu = $this->custommenuRepository->update($request->all(), $id);

        Flash::success('You have successfully created a custom menu!');

        return redirect(route('custommenus.displaygrid'));
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
    /*public function destroy($id)
    {
        $custommenu = $this->custommenuRepository->find($id);

        if (empty($custommenu)) {
            Flash::error('Custommenu not found');

            return redirect(route('custommenus.index'));
        }

        $this->custommenuRepository->delete($id);

        Flash::success('Custommenu deleted successfully.');

        return redirect(route('custommenus.index'));
    }*/

	public function destroy($id)
	{
		$custommenu = $this->custommenuRepository->find($id);

		if (empty($custommenu)) {
			Flash::error('Custommenu not found');
			return redirect(route('custommenus.index'));
		}

		// Delete all custom menu logs for the custom menu
		$custommenu->customMenuLogs()->delete();

		// Delete the custom menu itself
		$this->custommenuRepository->delete($id);

		Flash::success('Your custom menu has been deleted');

		return redirect(route('custommenus.displaygrid'));
	}


	public function displayGrid(Request $request)
	{
		
		
		$custommenus=\App\Models\custommenu::all();
		
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

public function additem($custommenuid)
{
    if (Session::has('cart')) {
        $cart = Session::get('cart');
        $itemId = 'custommenu-' . $custommenuid;
        if (isset($cart[$itemId])) {
            $cart[$itemId] = $cart[$itemId] + 1;
        } else {
            $cart[$itemId] = 1;
        }
    } else {
        $itemId = 'custommenu-' . $custommenuid;
        $cart[$itemId] = 1;
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
	
	public function assignMenuItems($id)
	{
		
		
		
		
		$custommenu = custommenu::find($id);
		
		
		
		$menuitems = menuitem::all();
			
		return view('custommenus.assignmenuitems')->with('custommenu',$custommenu)->with('menuitems',$menuitems);
	}

	public function updateMenuItems(Request $request, $id)
	{
		
		
		$custommenu = custommenu::find($id);
		$menuitems = $request->input('menuitem');

		$custommenu->menuitems()->sync($menuitems);
		
		Flash::success('Custom Menu updated successfully.');

		return redirect()->route('custommenus.displaygrid')->with('success', 'Menu Items updated successfully');
	}

}
