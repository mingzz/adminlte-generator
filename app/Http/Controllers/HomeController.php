<?php

namespace App\Http\Controllers;

use App\Repositories\publicationRepository;
use App\Repositories\projectRepository;

class HomeController extends Controller
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
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = $this->publicationRepository->all();
        $projects = $this->projectRepository->all();

        return view('admin/admin')
            ->with('publications', $publications)
            ->with('projects', $projects);
    }

    public function home()
    {
        $publications = $this->publicationRepository->all();
        $projects = $this->projectRepository->all();

        return view('home')
            ->with('publications', $publications)
            ->with('projects', $projects);
    }
}
