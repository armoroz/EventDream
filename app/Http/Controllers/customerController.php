<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecustomerRequest;
use App\Http\Requests\UpdatecustomerRequest;
use App\Repositories\customerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\Auth;

class customerController extends AppBaseController
{
    /** @var customerRepository $customerRepository*/
    private $customerRepository;

    public function __construct(customerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the customer.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customers = $this->customerRepository->all();

        return view('customers.index')
            ->with('customers', $customers);
    }

    /**
     * Show the form for creating a new customer.
     *
     * @return Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customer in storage.
     *
     * @param CreatecustomerRequest $request
     *
     * @return Response
     */
    public function store(CreatecustomerRequest $request)
    {
        $input = $request->all();

        $customer = $this->customerRepository->create($input);

        Flash::success('Customer saved successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified customer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        return view('customers.show')->with('customer', $customer);
    }
	
    public function custshow($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        return view('customers.custshow')->with('customer', $customer);
    }
	

    /**
     * Show the form for editing the specified customer.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        return view('customers.edit')->with('customer', $customer);
    }
	
	public function custedit($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('homepage'));
        }

        return view('customers.custedit')->with('customer', $customer);
    }

    /**
     * Update the specified customer in storage.
     *
     * @param int $id
     * @param UpdatecustomerRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecustomerRequest $request)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        $customer = $this->customerRepository->update($request->all(), $id);

        Flash::success('Customer updated successfully.');

        return redirect()->route('customers.index');
    }
	
    public function custupdate($id, UpdatecustomerRequest $request)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        $customer = $this->customerRepository->update($request->all(), $id);

        Flash::success('Customer updated successfully.');

        return redirect()->route('customers.custshow', ['id' => $customer->id]);
    }

    /**
     * Remove the specified customer from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customer = $this->customerRepository->find($id);

        if (empty($customer)) {
            Flash::error('Customer not found');

            return redirect(route('customers.index'));
        }

        $this->customerRepository->delete($id);

        Flash::success('Customer deleted successfully.');

        return redirect(route('customers.index'));
    }
	
	public function getLoggedInCustomerDetails()
	{

		if (!Auth::guest()){
			$user = Auth::user();
			echo "UserID is " . $user->id;    
			echo ", customer ID is " . $user->customer->id;
			echo ". The customer's name is " . $user->customer->firstname . " ";
			echo $user->customer->surname;
			echo ". The customer is a " . $user->customer->customertype;
		}
		else {
			echo "not logged in ";
		}
	}
}
