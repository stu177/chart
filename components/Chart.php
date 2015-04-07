<?php namespace Stu177\Chart\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Stu177\Chart\Models\Chart as ChartModel;

class Chart extends ComponentBase
{
    public $chart;

    public function componentDetails()
    {
        return [
            'name' => 'Chart',
            'description' => 'Displays a chart'
        ];
    }

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

    public function getChartOptions()
    {
        $options = ChartModel::all(['name', 'id'])->toArray();

        foreach($options as $option) {
            $chartArray[$option['id']] = $option['name'];
        }

        return $chartArray;
    }

    public function onRun()
    {
        $this->addJs('/plugins/stu177/chart/assets/js/chart.js');
    }

    protected function getChart()
    {
        $id = (int) $this->property('chart');
        $chart = ChartModel::get()->where('id', $id)->first();

        foreach($chart->dataset as $dataset) {
            $datasetArray[] = $dataset['data'];
        }

        return $chart;
    }

    protected function chartLabels()
    {
        $labels = [];

        foreach ($this->getChart()->labels as $label) {
            $labels[] = '"'.$label['label'].'"';
        }

        return implode(',', $labels);
    }

    protected function chartDatasets()
    {
        $datasets = [];

        foreach($this->getChart()->dataset as $key => $dataset) {
            $datasets[$key] = '{'. PHP_EOL;
            $datasets[$key] .= 'label: "'. $dataset['label'] .'",'. PHP_EOL;

            $dataArray = [];

            foreach($dataset->data as $dataKey =>$data) {
                $dataArray[$dataKey] = $data['label'];
            }

            $dataStringArray = implode(',', $dataArray);

            $datasets[$key] .= 'data: ['. $dataStringArray .']'. PHP_EOL;
            $datasets[$key] .= '}';
        }

        return implode(',', $datasets);
    }
}
