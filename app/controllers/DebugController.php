<?php

/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 05/07/17
 * Time: 09:42
 * empty controller just for debug purposes
 */
class DebugController extends ControllerBase
{
    public function mainAction()
    {
        $model = new JobStepParameters();
        dd(property_exists($model,'uid'));
        dd($model);
    }
}