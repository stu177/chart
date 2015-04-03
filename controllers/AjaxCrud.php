<?php namespace Stu177\Chart\Controllers;

use Flash;
use Redirect;
use BackendMenu;


/**
 * Abstract Controller
 */
trait AjaxCrud
{
    public function delete($model)
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $targetId) {
                if ((!$target = $model::find($targetId)))
                    continue;

                $target->delete();
            }

            Flash::success('Successfully deleted record(s).');
        }
    }
}
