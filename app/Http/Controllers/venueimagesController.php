<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatevenueimagesRequest;
use App\Http\Requests\UpdatevenueimagesRequest;
use App\Repositories\venueimagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class venueimagesController extends AppBaseController
{
    /** @var venueimagesRepository $venueimagesRepository*/
    private $venueimagesRepository;

    public function __construct(venueimagesRepository $venueimagesRepo)
    {
        $this->venueimagesRepository = $venueimagesRepo;
    }

    /**
     * Display a listing of the venueimages.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $venueimages = $this->venueimagesRepository->all();

        return view('venueimages.index')
            ->with('venueimages', $venueimages);
    }

    /**
     * Show the form for creating a new venueimages.
     *
     * @return Response
     */
	public function create($venueid)
	{
		return view('venueimages.create')->with('mid',$venueid);
	}

    /**
     * Store a newly created venueimages in storage.
     *
     * @param CreatevenueimagesRequest $request
     *
     * @return Response
     */
    public function store(CreatevenueimagesRequest $request)
    {
        if ($request->hasFile('imagefile')) {
            $files = $request->file('imagefile');
            $i=0;
            foreach ($files as $file) {
                $venueimage = new \App\Models\Venueimages();
                $venueimage->venueid = $request->venueid;
                $venueimage->imagefile = base64_encode(file_get_contents($file));
                if (!$venueimage->save()) {
                    Flash::error('Error - File not saved to the DB');
                }
                $i++;
            }
        }

        Flash::success('Venueimages saved successfully.');

        return redirect(route('venueimages.index'));
    }

    /**
     * Display the specified venueimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $venueimages = $this->venueimagesRepository->find($id);

        if (empty($venueimages)) {
            Flash::error('Venueimages not found');

            return redirect(route('venueimages.index'));
        }

        return view('venueimages.show')->with('venueimages', $venueimages);
    }

    /**
     * Show the form for editing the specified venueimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $venueimages = $this->venueimagesRepository->find($id);

        if (empty($venueimages)) {
            Flash::error('Venueimages not found');

            return redirect(route('venueimages.index'));
        }

        return view('venueimages.edit')->with('venueimages', $venueimages);
    }

    /**
     * Update the specified venueimages in storage.
     *
     * @param int $id
     * @param UpdatevenueimagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevenueimagesRequest $request)
    {
        $venueimages = $this->venueimagesRepository->find($id);

        if (empty($venueimages)) {
            Flash::error('Venueimages not found');

            return redirect(route('venueimages.index'));
        }

        $venueimages = $this->venueimagesRepository->update($request->all(), $id);

        Flash::success('Venueimages updated successfully.');

        return redirect(route('venueimages.index'));
    }

    /**
     * Remove the specified venueimages from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $venueimages = $this->venueimagesRepository->find($id);

        if (empty($venueimages)) {
            Flash::error('Venueimages not found');

            return redirect(route('venueimages.index'));
        }

        $this->venueimagesRepository->delete($id);

        Flash::success('Venueimages deleted successfully.');

        return redirect(route('venueimages.index'));
    }
}
