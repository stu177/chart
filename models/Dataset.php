<?php namespace Stu177\Chart\Models;

use Model;

class Dataset extends Model
{
    public $table = "chart_dataset";

    /*
     * Validation
     */
    public $rules = [
        'id' => 'unique:chart_data',
        'chart_id' => 'exists:chart',
        'label' => 'required|string|max:255'
    ];

    protected $fillable = [
        'label'
    ];

    /*
     * Relationships
     */
    public $hasMany = [
        'data' => ['Stu177\Chart\Models\Data']
    ];

    public $belongsTo = [
        'chart' => ['Stu177\Chart\Models\Chart']
    ];

}
