<?php namespace Stu177\Chart\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Stu177\Chart\Models\Chart;

/**
 * Chart Controller
 */
class Charts extends Controller
{
    use AjaxCrud;

    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.RelationController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Stu177.Chart', 'chart', 'charts');
        $this->chart = new Chart();
    }

    public function index()
    {
        $this->asExtension('ListController')->index();
    }

    public function index_onDelete()
    {
        $this->delete($this->chart);
        return $this->listRefresh();
    }
}
