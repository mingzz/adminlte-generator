<?php

namespace App\Repositories;

use App\Models\project;
use InfyOm\Generator\Common\BaseRepository;

class projectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'website',
        'people',
        'status',
        'image_url',
        'detail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return project::class;
    }
}
