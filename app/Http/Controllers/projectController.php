<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateprojectRequest;
use App\Http\Requests\UpdateprojectRequest;
use App\Repositories\projectRepository;
use zgldh\QiniuStorage\QiniuStorage;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class projectController extends AppBaseController
{
    /** @var  projectRepository */
    private $projectRepository;

    public function __construct(projectRepository $projectRepo)
    {
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the project.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->projectRepository->pushCriteria(new RequestCriteria($request));
        $projects = $this->projectRepository->all();

        return view('projects.index')
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new project.
     *
     * @return Response
     */
    public function create()
    {
        $projects = $this->projectRepository->all();
        return view('projects.create')
            ->with('projects', $projects);
    }

    /**
     * Store a newly created project in storage.
     *
     * @param CreateprojectRequest $request
     *
     * @return Response
     */
    public function store(CreateprojectRequest $request)
    {
//        $input = $request->all();
        $input =  $request->except('image');

        $project = $this->projectRepository->create($input);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $disk = QiniuStorage::disk('qiniu');
            $fileName = md5($image->getClientOriginalName().time().rand()).'.'.$image->getClientOriginalExtension();
            $bool = $disk->put('umich-project/image_'.$fileName,file_get_contents($image->getRealPath()));
            if ($bool) {
                $path = $disk->downloadUrl('umich-project/image_'.$fileName);;
                Flash::success('Project and Image saved successfully.');
            }else{
                Flash::success('Project saved successfully.Image failed to uploaded.');
            }
        }else{
            Flash::success('Project saved successfully.');
        }

        return redirect(route('projects.index'));
    }

    /**
     * Display the specified project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }
        $projects = $this->projectRepository->all();

        return view('projects.show')
            ->with('projects', $projects)
            ->with('project', $project);
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }
        $projects = $this->projectRepository->all();

        return view('projects.edit')
            ->with('projects', $projects)
            ->with('project', $project);
    }

    /**
     * Update the specified project in storage.
     *
     * @param  int              $id
     * @param UpdateprojectRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprojectRequest $request)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $project = $this->projectRepository->update($request->all(), $id);

        Flash::success('Project updated successfully.');

        return redirect(route('projects.index'));
    }

    /**
     * Remove the specified project from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $project = $this->projectRepository->findWithoutFail($id);

        if (empty($project)) {
            Flash::error('Project not found');

            return redirect(route('projects.index'));
        }

        $this->projectRepository->delete($id);

        Flash::success('Project deleted successfully.');

        return redirect(route('projects.index'));
    }
}
