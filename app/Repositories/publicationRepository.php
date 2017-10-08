<?php

namespace App\Repositories;

use App\Models\publication;
use InfyOm\Generator\Common\BaseRepository;

class publicationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'author',
        'publication',
        'source_code',
        'article_url',
        'project_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return publication::class;
    }
}
