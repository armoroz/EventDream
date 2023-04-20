<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestandardmenuratingRequest;
use App\Http\Requests\UpdatestandardmenuratingRequest;
use App\Repositories\standardmenuratingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use \App\Models\Standardmenu;

class standardmenuratingController extends AppBaseController
{
    /** @var standardmenuratingRepository $standardmenuratingRepository*/
    private $standardmenuratingRepository;

    public function __construct(standardmenuratingRepository $standardmenuratingRepo)
    {
        $this->standardmenuratingRepository = $standardmenuratingRepo;
    }

	public function ratestandardmenu($standardmenuid)
	{
		$standardmenu = \App\Models\standardmenu::find($standardmenuid);
		$customerid = auth()->user()->customer->id;
		return view('standardmenuratings.ratestandardmenu')->with('standardmenuid',$standardmenuid)->with('standardmenu',$standardmenu)->with('customerid', $customerid);

	}

    /**
     * Display a listing of the standardmenurating.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $standardmenuratings = $this->standardmenuratingRepository->all();

        return view('standardmenuratings.index')
            ->with('standardmenuratings', $standardmenuratings);
    }

    /**
     * Show the form for creating a new standardmenurating.
     *
     * @return Response
     */
    public function create()
    {
        return view('standardmenuratings.create');
    }

    /**
     * Store a newly created standardmenurating in storage.
     *
     * @param CreatestandardmenuratingRequest $request
     *
     * @return Response
     */
	public function store(CreatestandardmenuratingRequest $request)
	{
		$input = $request->all();

		$standardmenurating = $this->standardmenuratingRepository->create($input);

		Flash::success('Standard menu rating saved successfully.');

		$standardmenuid = $request->standardmenuid;

		return redirect()->route('standardmenus.custshow', ['standardmenu' => $standardmenuid]);
	}

    /**
     * Display the specified standardmenurating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $standardmenurating = $this->standardmenuratingRepository->find($id);

        if (empty($standardmenurating)) {
            Flash::error('Standardmenurating not found');

            return redirect(route('standardmenuratings.index'));
        }

        return view('standardmenuratings.show')->with('standardmenurating', $standardmenurating);
    }

    /**
     * Show the form for editing the specified standardmenurating.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $standardmenurating = $this->standardmenuratingRepository->find($id);

        if (empty($standardmenurating)) {
            Flash::error('Standardmenurating not found');

            return redirect(route('standardmenuratings.index'));
        }

        return view('standardmenuratings.edit')->with('standardmenurating', $standardmenurating);
    }

    /**
     * Update the specified standardmenurating in storage.
     *
     * @param int $id
     * @param UpdatestandardmenuratingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestandardmenuratingRequest $request)
    {
        $standardmenurating = $this->standardmenuratingRepository->find($id);

        if (empty($standardmenurating)) {
            Flash::error('Standardmenurating not found');

            return redirect(route('standardmenuratings.index'));
        }

        $standardmenurating = $this->standardmenuratingRepository->update($request->all(), $id);

        Flash::success('Standardmenurating updated successfully.');

        return redirect(route('standardmenuratings.index'));
    }

    /**
     * Remove the specified standardmenurating from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $standardmenurating = $this->standardmenuratingRepository->find($id);

        if (empty($standardmenurating)) {
            Flash::error('Standardmenurating not found');

            return redirect(route('standardmenuratings.index'));
        }

        $this->standardmenuratingRepository->delete($id);

        Flash::success('Standardmenurating deleted successfully.');

        return redirect(route('standardmenuratings.index'));
    }

	public function showstandardmenuratings($standardmenuid)
    {
        $standardmenuratings = $this->standardmenuratingRepository->all()->where('standardmenuid',$standardmenuid);
        return view('standardmenuratings.index')
            ->with('standardmenuratings', $standardmenuratings);
    }
}
