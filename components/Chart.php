<?php namespace Stu177\Chart\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Stu177\Chart\Models\Chart as ChartModel;

class Chart extends ComponentBase
{
    public $chart;

    /**
     * Details of component
     *
     * @return array
     */
    public function componentDetails()
    {
        return [
            'name' => 'Chart',
            'description' => 'Displays a chart'
        ];
    }

    /**
     * Properties of component
     *
     * @return array
     */
    public function defineProperties()
    {
        return [
            'chart' => [
                'title' => 'Select Chart',
                'type' => 'dropdown',
                'default' => 'chart/chart'
            ]
        ];
    }

    /**
     * Get chart options, not sure what I wrote this for :S
     *
     * @return mixed
     */
    public function getChartOptions()
    {
        $options = ChartModel::all(['name', 'id'])->toArray();

        foreach($options as $option) {
            $chartArray[$option['id']] = $option['name'];
        }

        return $chartArray;
    }

    /**
     * On run function
     */
    public function onRun()
    {
        // Add chart JS to page
        $this->addJs('/plugins/stu177/chart/assets/js/chart.js');
    }

    /**
     * Gets chart based of current chart object
     *
     * @return mixed
     */
    protected function getChart()
    {
        // Get ID of current chart
        $id = (int) $this->property('chart');

        // Get chart by id
        $chart = ChartModel::get()->where('id', $id)->first();

        return $chart;
    }

    /**
     * Function to create JS label code
     *
     * @return string
     */
    protected function chartLabels()
    {
        // Initialise array variable
        $labels = [];

        // Add array item for each label, later to implode
        foreach ($this->getChart()->labels as $label) {
            $labels[] = '"'.$label['label'].'"';
        }

        // Implode array to string for use in JS
        return implode(',', $labels);
    }

    /**
     * Function to create JS dataset code
     *
     * @return string
     */
    protected function chartDatasets()
    {
        // Initialise array variable
        $datasets = [];

        // Create array element for each dataset
        foreach($this->getChart()->dataset as $key => $dataset) {

            // Start JS array
            $datasets[$key] = '{'. PHP_EOL;

            // Add label value to array element
            $datasets[$key] .= 'label: "'. $dataset['label'] .'",'. PHP_EOL;

            // Set chart colours
            $datasets[$key] .= 'pointColor: "'. $dataset['colour'] .'",'. PHP_EOL;
            $datasets[$key] .= 'strokeColor: "'. $dataset['colour'] .'",'. PHP_EOL;
            $datasets[$key] .= 'fillColor: "transparent",'. PHP_EOL;

            // Initialise array variable
            $dataArray = [];

            // Add data value to array for each data value in dataset
            foreach($dataset->data as $dataKey =>$data) {
                $dataArray[$dataKey] = $data['label'];
            }

            // Implode array to comma separated string for use in JS
            $dataStringArray = implode(',', $dataArray);

            // Add data string to array element
            $datasets[$key] .= 'data: ['. $dataStringArray .']'. PHP_EOL;

            // Close JS array
            $datasets[$key] .= '}';
        }

        // Implode array to string for use in JS
        return implode(',', $datasets);
    }
}
