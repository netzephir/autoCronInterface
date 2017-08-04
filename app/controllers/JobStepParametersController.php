<?php

/**
 * Created by PhpStorm.
 * User: jonathan
 * Date: 03/07/17
 * Time: 18:11
 */
class JobStepParametersController extends ControllerBase
{
    public function indexAction()
    {
        http_response_code(404);
    }

    public function createAction($stepUid)
    {
        if(!isset($_POST['data']))
        {
            http_response_code(400);
        }
        $jobStepParameter = new JobStepParameters();
        $this->populateModel($jobStepParameter,$_POST['data']);
        $jobStepParameter->uid = $this->generateUid();
        $resultSave = $jobStepParameter->save();
        $toReturn = [];
        $toReturn['result'] = $resultSave;

        if(!$resultSave)
        {
            $toReturn['errors'] = [];
            foreach ($jobStepParameter->getMessages() as $message) {
                $toReturn['errors'][] = $message;
            }
        }
        else
        {
            $jobStepParameterLink = new JobStepParameterLinks();
            $jobStepParameterLink->uidParameter = $jobStepParameter->uid;
            $jobStepParameterLink->uidStep = $stepUid;
            $resultLink = $jobStepParameterLink->save();
            if(!$resultLink)
            {
                $jobStepParameter->delete();
                $toReturn['errors'] = [];
                foreach ($jobStepParameter->getMessages() as $message) {
                    $toReturn['errors'][] = $message;
                }
            }
            else
            {
                $toReturn['newUid'] = $jobStepParameter->uid;
            }
        }
        $this->sendJson($toReturn);
     }

    public function updateAction($uid)
    {
        if(!isset($_POST['data']))
        {
            http_response_code(400);
        }
        $jobStepParameter = JobStepParameters::findFirst($uid);
        $this->populateModel($jobStepParameter,$_POST['data']);
        $resultSave = $jobStepParameter->save();

        $this->sendJson(['result'=>$resultSave]);
    }

    public function deleteAction($uid)
    {
        $jobStepParameters = JobStepParameters::findFirst($uid);
        $resultDelete = $jobStepParameters->delete();
        $this->sendJson(['result'=>$resultDelete]);
    }
}