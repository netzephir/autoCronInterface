<?php

/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 14/06/17
 * Time: 10:37
 */
class MonitoringController extends ControllerBase
{
    public function mainAction()
    {
        $this->view->customTitle = "Job monitoring";
    }
}