<?php namespace Stu177\Chart\Models;

use App;
use Str;
use Lang;
use Model;

class Data extends Model
{
    public $table = "chart_data";

    /*
     * Validation
     */
    public $rules = [
        'id' => 'unique:chart_data',
        'dataset_id' => 'required|exists:chart_dataset',
        'value' => 'required|numeric'
    ];

    /*
     * Relationships
     */
    public $belongsTo = [
        'dataset' => ['Stu177\Chart\Models\Dataset']
    ];

}
