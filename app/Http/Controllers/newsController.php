<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenewsRequest;
use App\Http\Requests\UpdatenewsRequest;
use App\Repositories\newsRepository;
use App\Repositories\projectRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class newsController extends AppBaseController
{
    /** @var  newsRepository */
    private $newsRepository;

    /** @var  projectRepository */
    private $projectRepository;

    public function __construct(newsRepository $newsRepo, projectRepository $projectRepo)
    {
        $this->newsRepository = $newsRepo;
        $this->projectRepository = $projectRepo;
    }

    /**
     * Display a listing of the news.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->newsRepository->pushCriteria(new RequestCriteria($request));
        $news = $this->newsRepository->all();

        $this->projectRepository->pushCriteria(new RequestCriteria($request));
        $projects = $this->projectRepository->all();

        return view('news.index')
            ->with('news', $news)
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new news.
     *
     * @return Response
     */
    public function create()
    {
        $projects = $this->projectRepository->all();
        return view('news.create')
            ->with('projects', $projects);
    }

    /**
     * Store a newly created news in storage.
     *
     * @param CreatenewsRequest $request
     *
     * @return Response
     */
    public function store(CreatenewsRequest $request)
    {
        $input = $request->all();

        $news = $this->newsRepository->create($input);

        Flash::success('News saved successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Display the specified news.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }
        $projects = $this->projectRepository->all();
        return view('news.show')
            ->with('news', $news)
            ->with('projects', $projects);
    }

    /**
     * Show the form for editing the specified news.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }
        $projects = $this->projectRepository->all();
        return view('news.edit')
            ->with('news', $news)
            ->with('projects', $projects);
    }

    /**
     * Update the specified news in storage.
     *
     * @param  int              $id
     * @param UpdatenewsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenewsRequest $request)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $news = $this->newsRepository->update($request->all(), $id);

        Flash::success('News updated successfully.');

        return redirect(route('news.index'));
    }

    /**
     * Remove the specified news from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $news = $this->newsRepository->findWithoutFail($id);

        if (empty($news)) {
            Flash::error('News not found');

            return redirect(route('news.index'));
        }

        $this->newsRepository->delete($id);

        Flash::success('News deleted successfully.');

        return redirect(route('news.index'));
    }
}
