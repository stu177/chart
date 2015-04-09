<?php namespace Stu177\Chart\Models;

use Model;

class Chart extends Model
{
    public $table = "stu177_chart";

    /*
     * Validation
     */
    public $rules = [
        'id' => 'unique:chart',
        'name' => 'required|string|max:255',
        'description' => '',
        'type' => 'string|max:255'
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
