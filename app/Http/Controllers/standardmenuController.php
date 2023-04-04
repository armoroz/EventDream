<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestandardmenuRequest;
use App\Http\Requests\UpdatestandardmenuRequest;
use App\Repositories\standardmenuRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;
use App\Models\Standardmenu as Standardmenu;
use App\Models\Menuitem as Menuitem;
use App\Models\customer;

class standardmenuController extends AppBaseController
{
    /** @var standardmenuRepository $standardmenuRepositoryy*/
    private $standardmenuRepository;

    public function __construct(standardmenuRepository $standardmenuRepo)
    {
        $this->standardmenuRepository = $standardmenuRepo;
    }
	
	public function searchquery(Request $request)
	{
		$searchquery=$request->searchquery;
		$standardmenus=\App\Models\standardmenu::where('standardmenuname','LIKE','%'.$searchquery.'%')->get(); 
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $standardmenu => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}
		
		return view('standardmenus.displaygrid')->with('standardmenus',$standardmenus)->with('totalItems',$totalItems);
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
		$standardmenuimages = \App\Models\standardmenuimages::all();
		$standardmenurating = \App\Models\standardmenurating::all();
		

        return view('standardmenus.index')
            ->with('standardmenus', $standardmenus)->with('standardmenuimages', $standardmenuimages)->with('standardmenurating', $standardmenurating);
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
		
		/*$standardmenu->standardmenuimg = base64_encode(file_get_contents($request->standardmenuimg));
        $standardmenu->save();*/
		
        $standardmenu->save();

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
        $standardmenuimages = $standardmenu->standardmenuimages;
		
        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        return view('standardmenus.show')->with('standardmenu', $standardmenu)->with('standardmenuimages',$standardmenuimages);
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
    
	public function displayGrid(Request $request)
	{
		$standardmenus=\App\Models\Standardmenu::all();
		$standardmenuimages = \App\Models\standardmenuimages::all();
		$standardmenurating = \App\Models\standardmenurating::all();
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $standardmenu => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
		return view('standardmenus.displaygrid')->with('standardmenus',$standardmenus)->with('totalItems',$totalItems)->with('standardmenuimages', $standardmenuimages)->with('standardmenurating', $standardmenurating);
		
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
    /*public function destroy($id)
    {
        $standardmenu = $this->standardmenuRepository->find($id);

        if (empty($standardmenu)) {
            Flash::error('Standardmenu not found');

            return redirect(route('standardmenus.index'));
        }

        $this->standardmenuRepository->delete($id);

        Flash::success('Standardmenu deleted successfully.');

        return redirect(route('standardmenus.index'));
    }*/
	
	public function destroy($id)
	{
		$standardmenu = $this->standardmenuRepository->find($id);

		if (empty($standardmenu)) {
			Flash::error('Standardmenu not found');
			return redirect(route('standardmenus.index'));
		}

		// Delete all standard menu logs for the standard menu
		$standardmenu->standardMenuLogs()->delete();

		// Delete the standard menu itself
		$this->standardmenuRepository->delete($id);

		Flash::success('Standard Menu and relevant logs deleted successfully.');

		return redirect(route('standardmenus.index'));
	}
	
public function additem($standardmenuid)
{
    if (Session::has('cart')) {
        $cart = Session::get('cart');
        $itemId = 'standardmenu-' . $standardmenuid;
        if (isset($cart[$itemId])) {
            $cart[$itemId] = $cart[$itemId] + 1;
        } else {
            $cart[$itemId] = 1;
        }
    } else {
        $itemId = 'standardmenu-' . $standardmenuid;
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
	
    public function custshow($id, Request $request)
    {
        $standardmenu = $this->standardmenuRepository->find($id);
		$standardmenuimages = \App\Models\standardmenuimages::all();
		$standardmenuratings = \App\Models\standardmenurating::all();
		$menuitems = \App\Models\menuitem::all();
		$standardmenulogs = $standardmenu->standardmenulogs;

        if (empty($standardmenu)) {
            Flash::error('Standard Menu not found');

            return redirect(route('standardmenus.index'));
        }

		$standardmenus = \App\Models\Standardmenu::all();
		$totalItems = 0;

		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			foreach ($cart as $standardmenuId => $qty) {
				$totalItems += $qty;
			}
		}

		return view('standardmenus.custshow', ['standardmenu' => $standardmenu, 'totalItems' => $totalItems, 'standardmenuimages' => $standardmenuimages, 'standardmenuratings' => $standardmenuratings, 'standardmenulogs' => $standardmenulogs, 'menuitems' => $menuitems]);
	}
	
	public function assignMenuItems($id)
	{
		$standardmenu = Standardmenu::find($id);
		$menuitems = Menuitem::all();
			
		return view('standardmenus.assignmenuitems')->with('standardmenu',$standardmenu)->with('menuitems',$menuitems);
	}

	public function updateMenuItems(Request $request, $id)
	{
		$standardmenu = Standardmenu::find($id);
		$menuitems = $request->input('menuitem');

		$standardmenu->menuitems()->sync($menuitems);
		
		Flash::success('Standard Menu updated successfully.');

		return redirect()->route('standardmenus.index')->with('success', 'Menu Items updated successfully');
	}
}
