<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatepublicationRequest;
use App\Http\Requests\UpdatepublicationRequest;
use App\Repositories\publicationRepository;
use App\Repositories\projectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class publicationController extends AppBaseController
{
    /** @var  publicationRepository */
    private $publicationRepository;

    /** @var  projectRepository */
    private $projectRepository;

    public function __construct(publicationRepository $publicationRepo, projectRepository $projectRepo)
    {
        $this->publicationRepository = $publicationRepo;
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the publication.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->publicationRepository->pushCriteria(new RequestCriteria($request));
        $publications = $this->publicationRepository->all();

        $this->projectRepository->pushCriteria(new RequestCriteria($request));
        $projects = $this->projectRepository->all();

        return view('publications.index')
            ->with('publications', $publications)
            ->with('projects', $projects);

    }

    /**
     * Show the form for creating a new publication.
     *
     * @return Response
     */
    public function create()
    {
        $projects = $this->projectRepository->all();
        return view('publications.create')->with('projects', $projects);
    }

    /**
     * Store a newly created publication in storage.
     *
     * @param CreatepublicationRequest $request
     *
     * @return Response
     */
    public function store(CreatepublicationRequest $request)
    {
        $input = $request->all();

        $publication = $this->publicationRepository->create($input);

        Flash::success('Publication saved successfully.');

        return redirect(route('publications.index'));
    }

    /**
     * Display the specified publication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $publication = $this->publicationRepository->findWithoutFail($id);

        if (empty($publication)) {
            Flash::error('Publication not found');

            return redirect(route('publications.index'));
        }
        $projects = $this->projectRepository->all();

        return view('publications.show')
            ->with('publication', $publication)
            ->with('projects', $projects);
    }

    /**
     * Show the form for editing the specified publication.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $publication = $this->publicationRepository->findWithoutFail($id);

        if (empty($publication)) {
            Flash::error('Publication not found');

            return redirect(route('publications.index'));
        }
        $projects = $this->projectRepository->all();

        return view('publications.edit')
            ->with('publication', $publication)
            ->with('projects', $projects);
    }

    /**
     * Update the specified publication in storage.
     *
     * @param  int              $id
     * @param UpdatepublicationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepublicationRequest $request)
    {
        $publication = $this->publicationRepository->findWithoutFail($id);

        if (empty($publication)) {
            Flash::error('Publication not found');

            return redirect(route('publications.index'));
        }

        $publication = $this->publicationRepository->update($request->all(), $id);

        Flash::success('Publication updated successfully.');

        return redirect(route('publications.index'));
    }

    /**
     * Remove the specified publication from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $publication = $this->publicationRepository->findWithoutFail($id);

        if (empty($publication)) {
            Flash::error('Publication not found');

            return redirect(route('publications.index'));
        }

        $this->publicationRepository->delete($id);

        Flash::success('Publication deleted successfully.');

        return redirect(route('publications.index'));
    }
}
