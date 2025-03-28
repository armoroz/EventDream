<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatemenuitemRequest;
use App\Http\Requests\UpdatemenuitemRequest;
use App\Repositories\menuitemRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;

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
	
	public function newstandardmenu(Request $request)
	{
		$menuitems = $request->menuitems;
		$thisCustomMenu = new \App\Models\custommenu();
		$thisCustomMenu->save();
		$custommenuID = $thisCustomMenu->id;

		// Build a string containing the selected menu item names
		$selectedMenuItems = "";
		foreach ($menuitems as $menuitem) {
			$menuitemname = \App\Models\menuitem::find($menuitem)->menuitemname;
			$selectedMenuItems .= $menuitemname . ", ";
		}
		$selectedMenuItems = rtrim($selectedMenuItems, ", "); // remove the last comma and space

		// Update the custom menu's description field with the selected menu item names
		$thisCustomMenu->description = $selectedMenuItems;
		$thisCustomMenu->save();

		foreach ($menuitems as $menuitem) {
			$thisCustomMenuDetail = new \App\Models\custommenulog();
			$thisCustomMenuDetail->custommenuid = $custommenuID;
			$thisCustomMenuDetail->menuitemid = $menuitem;

			$thisCustomMenuDetail->save();
		}

		Session::forget('cart');
		Flash::success("Your Menu Items Have Been Added");
		return redirect()->route('custommenus.edit', ['custommenu' => $custommenuID]);
		
		/*// Generate the URL for the create custom menu page and redirect the user
        $url = route('custommenus.create', ['custommenuid' => $custommenuID]);
        return redirect($url)->with('success', 'Your Custom Menu has been placed');*/
    }
	
	public function placeorder(Request $request)
	{
		$thisOrder = new \App\Models\event();
		$thisOrder->eventdate = (new \DateTime())->format("Y-m-d H:i:s");
		$thisOrder->save();
		$eventID = $thisOrder->id;
		$productids = $request->productid;
		/*$venueids = $request->venueid;*/
		$quantities = $request->quantity;
		for($i=0;$i<sizeof($productids);$i++) {
			$thisOrderDetail = new \App\Models\eventproductlog();
			$thisOrderDetail->eventid = $eventID;
			$thisOrderDetail->productid = $productids[$i];
			/*$thisOrderDetail->venueid = $venueids[$i];*/
			$thisOrderDetail->eventproductquantity = $quantities[$i];
			$thisOrderDetail->save();
		}
		Session::forget('cart');
		Flash::success("Your Event Order has been placed");
		return redirect(route('products.displaygrid'));
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
		
		$file = $request->file('menuitemimglink');
        $menuitem->menuitemimglink = "data:image/jpeg;base64," . base64_encode(file_get_contents($file));
        $menuitem->save();

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
		
		$file = $request->file('menuitemimglink');
        $menuitem->menuitemimglink = "data:image/jpeg;base64," . base64_encode(file_get_contents($file));
        $menuitem->save();

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
	
	public function displayGrid(Request $request)
	{
		$menuitems=\App\Models\menuitem::all();
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $menuitem => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
		return view('menuitems.displaygrid')->with('menuitems',$menuitems)->with('totalItems',$totalItems);
		
	}
	
	public function custshow($id, Request $request)
    {
        $menuitem = $this->menuitemRepository->find($id);

        if (empty($menuitem)) {
            Flash::error('Menu Item not found');

            return redirect(route('menuitems.index'));
        }

		$menuitems = \App\Models\menuitem::all();
		

		return view('menuitems.custshow', ['menuitem' => $menuitem]);
	}
}
