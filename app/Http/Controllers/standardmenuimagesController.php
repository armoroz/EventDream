<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatestandardmenuimagesRequest;
use App\Http\Requests\UpdatestandardmenuimagesRequest;
use App\Repositories\standardmenuimagesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class standardmenuimagesController extends AppBaseController
{
    /** @var standardmenuimagesRepository $standardmenuimagesRepository*/
    private $standardmenuimagesRepository;

    public function __construct(standardmenuimagesRepository $standardmenuimagesRepo)
    {
        $this->standardmenuimagesRepository = $standardmenuimagesRepo;
    }

    /**
     * Display a listing of the standardmenuimages.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $standardmenuimages = $this->standardmenuimagesRepository->all();

        return view('standardmenuimages.index')
            ->with('standardmenuimages', $standardmenuimages);
    }

    /**
     * Show the form for creating a new standardmenuimages.
     *
     * @return Response
     */
    public function create($standardmenuid)
	{
		return view('standardmenuimages.create')->with('mid',$standardmenuid);
	}

    /**
     * Store a newly created standardmenuimages in storage.
     *
     * @param CreatestandardmenuimagesRequest $request
     *
     * @return Response
     */
    public function store(CreatestandardmenuimagesRequest $request)
    {
        if ($request->hasFile('imagefile')) {
            $files = $request->file('imagefile');
            $i=0;
            foreach ($files as $file) {
                $standardmenuimage = new \App\Models\standardmenuimages();
                $standardmenuimage->standardmenuid = $request->standardmenuid;
                $standardmenuimage->imagefile = base64_encode(file_get_contents($file));
                if (!$standardmenuimage->save()) {
                    Flash::error('Error - File not saved to the DB');
                }
                $i++;
            }
        }

        Flash::success('Standardmenuimages saved successfully.');

        return redirect(route('standardmenus.index'));
    }

    /**
     * Display the specified standardmenuimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $standardmenuimages = $this->standardmenuimagesRepository->find($id);

        if (empty($standardmenuimages)) {
            Flash::error('Standardmenuimages not found');

            return redirect(route('standardmenuimages.index'));
        }

        return view('standardmenuimages.show')->with('standardmenuimages', $standardmenuimages);
    }

    /**
     * Show the form for editing the specified standardmenuimages.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $standardmenuimages = $this->standardmenuimagesRepository->find($id);

        if (empty($standardmenuimages)) {
            Flash::error('Standardmenuimages not found');

            return redirect(route('standardmenuimages.index'));
        }

        return view('standardmenuimages.edit')->with('standardmenuimages', $standardmenuimages);
    }

    /**
     * Update the specified standardmenuimages in storage.
     *
     * @param int $id
     * @param UpdatestandardmenuimagesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatestandardmenuimagesRequest $request)
    {
        $standardmenuimages = $this->standardmenuimagesRepository->find($id);

        if (empty($standardmenuimages)) {
            Flash::error('Standardmenuimages not found');

            return redirect(route('standardmenuimages.index'));
        }

        $standardmenuimages = $this->standardmenuimagesRepository->update($request->all(), $id);

        Flash::success('Standardmenuimages updated successfully.');

        return redirect(route('standardmenus.index'));
    }

    /**
     * Remove the specified standardmenuimages from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $standardmenuimages = $this->standardmenuimagesRepository->find($id);

        if (empty($standardmenuimages)) {
            Flash::error('Standardmenuimages not found');

            return redirect(route('standardmenuimages.index'));
        }

        $this->standardmenuimagesRepository->delete($id);

        Flash::success('Standardmenuimages deleted successfully.');

        return redirect(route('standardmenuimages.index'));
    }
}
