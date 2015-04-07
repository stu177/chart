<?php namespace Stu177\Chart;

use App;
use Backend;
use Controller;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'Charts',
            'description' => 'Makes charts.',
            'author' => 'stu177',
            'icon' => 'icon-bar-chart'
        ];
    }

    public function registerNavigation()
    {
        return [
            'chart' => [
                'label' => 'Charts',
                'url' => Backend::url('stu177/chart/charts'),
                'icon' => 'icon-bar-chart',
                'permissions' => ['user.*'],
                'order' => 500,
                'sideMenu' => [
                    'charts' => [
                        'label'       => 'Charts',
                        'icon'        => 'icon-bar-chart',
                        'url'         => Backend::url('stu177/chart/charts'),
                        'permissions' => [''],
                    ]
                ]
            ],
        ];
    }

    public function registerComponents()
    {
        return [
            'Stu177\Chart\Components\Chart' => 'chart'
        ];
    }
}
