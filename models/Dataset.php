<?php namespace Stu177\Chart\Models;

use Model;

class Dataset extends Model
{
    public $table = "stu177_chart_dataset";

    /*
     * Validation
     */
    public $rules = [
        'id' => 'unique:chart_dataset',
        'chart_id' => 'exists:chart',
        'label' => 'required|string|max:255'
    ];

    protected $fillable = [
        'label',
        'colour',
        'data'
    ];

    protected $jsonable = [
        'data'
    ];

    /*
     * Relationships
     */
    public $belongsTo = [
        'chart' => ['Stu177\Chart\Models\Chart']
    ];

}
