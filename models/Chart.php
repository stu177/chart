<?php namespace Stu177\Chart\Models;

use Model;

class Chart extends Model
{
    public $table = "chart";

    /*
     * Validation
     */
    public $rules = [
        'id' => 'unique:chart',
        'name' => 'required|string|max:255',
        'description' => '',
        'type' => 'required|string|max:255'
    ];

    protected $jsonable = [
        'labels'
    ];

    /*
     * Relationships
     */
    public $hasMany = [
        'dataset' => ['Stu177\Chart\Models\Dataset']
    ];
}
