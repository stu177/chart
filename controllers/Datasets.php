<?php namespace Stu177\Chart\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Stu177\Chart\Models\Dataset;

/**
 * Chart Controller
 */
class Datasets extends Controller
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

        BackendMenu::setContext('Stu177.Chart', 'chart', 'datasets');
        $this->dataset = new Dataset();
    }

    public function index()
    {
        $this->asExtension('ListController')->index();
    }

    public function index_onDelete()
    {
        $this->delete($this->dataset);
        return $this->listRefresh();
    }
}
