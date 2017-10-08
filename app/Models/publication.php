<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class publication
 * @package App\Models
 * @version October 8, 2017, 4:02 am UTC
 */
class publication extends Model
{
    use SoftDeletes;

    public $table = 'publications';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'author',
        'publication',
        'source_code',
        'article_url',
        'project_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'author' => 'string',
        'publication' => 'string',
        'source_code' => 'string',
        'article_url' => 'string',
        'project_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'author' => 'required',
        'publication' => 'required',
        'source_code' => 'nullable|url',
        'article_url' => 'url',
        'project_id' => 'required'
    ];

    
}
