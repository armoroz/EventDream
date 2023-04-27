<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Repositories\productRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Session;


class productController extends AppBaseController

{
    /** @var productRepository $productRepository*/
    private $productRepository;

    public function __construct(productRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }
	
	public function searchquery(Request $request)
	{
		$searchquery=$request->searchquery;
		$products=\App\Models\product::where('productname','LIKE','%'.$searchquery.'%')->get(); 
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $product => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}
		
		return view('products.displaygrid')->with('products',$products)->with('totalItems',$totalItems);
	}	
	
	
	public function filterProducts(Request $request)
	{
		//$priceRange = explode('-', $request->price_range);
		$minprice = $request->minPrice;
		$maxprice = $request->maxPrice;
  
		$products = \App\Models\Product::whereBetween('productcost', [$minprice, $maxprice])->get();
		
		if ($request->session()->has('cart')) {
        $cart = $request->session()->get('cart');
        $totalQty=0;
        foreach ($cart as $product => $qty) {
            $totalQty = $totalQty + $qty;
        }
        $totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}

		return view('products.displaygrid')->with('products',$products)->with('totalItems',$totalItems);

	}


    /**
     * Display a listing of the product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all();

        return view('products.index')
            ->with('products', $products);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param CreateproductRequest $request
     *
     * @return Response
     */
    public function store(CreateproductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);
		
		$file = $request->file('productimg');
        $product->productimg = "data:image/jpeg;base64," . base64_encode(file_get_contents($file));
        $product->save();

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
		
    }

    /**
     * Display the specified product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified product in storage.
     *
     * @param int $id
     * @param UpdateproductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateproductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product = $this->productRepository->update($request->all(), $id);
		
		$file = $request->file('productimg');
        $product->productimg = "data:image/jpeg;base64," . base64_encode(file_get_contents($file));
        $product->save();

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
    }

	public function displayGrid(Request $request)
	{
		$products=\App\Models\product::all();
		
		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			$totalQty=0;
			foreach ($cart as $product => $qty) {
				$totalQty = $totalQty + $qty;
			}
			$totalItems=$totalQty;
		}
		else {
			$totalItems=0;
		}
		
		return view('products.displaygrid')->with('products',$products)->with('totalItems',$totalItems);
		
	}
	
	public function eventdisplayGrid($eventid,Request $request)
	{
		$products=\App\Models\product::all();
		$event=\App\Models\event::find($eventid);
		
		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			$totalQty=0;
			foreach ($cart as $product => $qty) {
				$totalQty = $totalQty + $qty;
			}
			$totalItems=$totalQty;
		}
		else {
			$totalItems=0;

		}
	
		if (!Session::has('eventid')) {
			
			Session::put('eventid', $eventid);
		}

		return view('products.eventdisplaygrid')->with('products',$products)->with('totalItems',$totalItems)->with('event',$event);
		
	}


    /**
     * Remove the specified product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
	
	public function additem($productid)
	{
		if (Session::has('cart')) {
			$cart = Session::get('cart');
			$itemId = 'product-' . $productid;
			if (isset($cart[$itemId])) {
				$cart[$itemId] = $cart[$itemId] + 1;
			} else {
				$cart[$itemId] = 1;
			}
		} else {
			$itemId = 'product-' . $productid;
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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

		$products = \App\Models\Product::all();
		$totalItems = 0;

		if ($request->session()->has('cart')) {
			$cart = $request->session()->get('cart');
			foreach ($cart as $productId => $qty) {
				$totalItems += $qty;
			}
		}

		return view('products.custshow', ['product' => $product, 'totalItems' => $totalItems]); 
	}
	
}

