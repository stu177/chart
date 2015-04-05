<?php namespace Stu177\Chart\Components;

use Cms\Classes\ComponentBase;
//use Stu177\Chart\Models\Chart;

class Chart extends ComponentBase
{
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
                'name'       => '',
                'description' => '',
                'type'        => 'string'
            ]
        ];
    }

    public function onRun()
    {
        $this->addJs('/plugins/stu177/chart/assets/js/chart.js');
//        $this->chart = $this->getChart();
    }

    protected function getChart()
    {
        $id = $this->property('id');
        $chart = Chart::getChart()->where('id', $id)->first();

        return $chart;
    }
}
