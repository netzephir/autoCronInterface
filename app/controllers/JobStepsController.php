<?php

/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 26/06/17
 * Time: 13:27
 */
class JobStepsController extends ControllerBase
{
    public function mainAction()
    {
        http_response_code(404);
    }

    public function createAction()
    {
        if(!isset($_POST['data']))
        {
            http_response_code(400);
        }
        $jobStep = new JobSteps();
        $this->populateModel($jobStep,$_POST['data']);
        $jobStep->uid = $this->generateUid();
        $jobStep->class = 'AutoCron';
        $jobStep->namespace = '\\Core\\AutoCron\\';
        $jobStep->enabled = 1;
        $jobStep->position = 0;
        $resultSave = $jobStep->save();
        $this->sendJson(['result'=>$resultSave,'newStep'=>$jobStep->toArray()]);
    }

    public function deleteAction($uid)
    {
        $jobSteps = JobSteps::findFirst($uid);
        if(!$jobSteps || empty($jobSteps))
        {
            http_response_code(404);
            return;
        }
        $resultDelete = $jobSteps->delete();
        $this->sendJson(['result'=>$resultDelete]);
    }

    public function updateAction($uid)
    {
        if(!isset($_POST['data']))
        {
            http_response_code(400);
            return;
        }
        $jobSteps = JobSteps::findFirst($uid);
        if(!$jobSteps || empty($jobSteps))
        {
            http_response_code(404);
            return;
        }
        $this->populateModel($jobSteps,$_POST['data']);
        $resultSave = $jobSteps->save();
        $this->sendJson(['result'=>$resultSave]);
    }

}