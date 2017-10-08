<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class project
 * @package App\Models
 * @version October 8, 2017, 3:52 am UTC
 */
class project extends Model
{
    use SoftDeletes;

    public $table = 'projects';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'description',
        'website',
        'detail',
        'people'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'website' => 'string',
        'detail' => 'string',
        'people' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'description' => 'required',
        'website' => 'nullable|url',
        'detail' => 'required',
        'people' => 'required'
    ];

    
}
