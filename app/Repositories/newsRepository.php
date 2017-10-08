<?php

namespace App\Repositories;

use App\Models\news;
use InfyOm\Generator\Common\BaseRepository;

class newsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content',
        'project_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return news::class;
    }
}
