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

    /*
     * Relationships
     */
    public $hasMany = [
        'dataset' => ['Stu177\Chart\Models\Dataset']
    ];

    public $hasManyThrough = [
        'data' => [
            'Stu177\Chart\Models\Data',
            'through' => 'Stu177\Chart\Models\Dataset'
        ],
    ];
}
