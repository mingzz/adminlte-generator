<?php

namespace App\Http\Controllers;

use App\Repositories\publicationRepository;
use App\Repositories\projectRepository;
use App\Repositories\newsRepository;

class HomeController extends Controller
{
    /** @var  publicationRepository */
    private $publicationRepository;

    /** @var  projectRepository */
    private $projectRepository;

    /** @var  newsRepository */
    private $newsRepository;

    public function __construct(publicationRepository $publicationRepo, projectRepository $projectRepo, newsRepository $newsRepo)
    {
        $this->publicationRepository = $publicationRepo;
        $this->projectRepository = $projectRepo;
        $this->newsRepository = $newsRepo;
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = $this->publicationRepository->all();
        $projects = $this->projectRepository->all();
        $news = $this->newsRepository->all();

        return view('admin/admin')
            ->with('publications', $publications)
            ->with('projects', $projects)
            ->with('news', $news);
    }

    public function home()
    {
        $publications = $this->publicationRepository->all();
        $projects = $this->projectRepository->all();
        $news = $this->newsRepository->all();

        return view('home')
            ->with('publications', $publications)
            ->with('projects', $projects)
            ->with('news', $news);
    }
}
