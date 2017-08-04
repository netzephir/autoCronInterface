<?php
class JobsController extends ControllerBase
{

    public function mainAction()
    {
        $jobs = Jobs::query()->execute()->toArray();

        foreach($jobs as $key=>$job)
        {
            $lastExecution = JobExecutions::findFirst([
                "order" => "id DESC",
                "limit" => 1,
                "conditions" => "uidJob = :uidJob:",
                "bind"       => [
                    'uidJob' => $job['uid'],
                ]
            ]);
            $jobs[$key]['lastExecution'] = null;
            if($lastExecution)
            {
                $jobs[$key]['lastExecution'] = $lastExecution->toArray();
            }
        }

        $this->view->jobs = $jobs;
        $this->view->customTitle = "Job list";
        $this->assets->addJs("js/jobs/main.js");
    }

    public function createAction()
    {
        $now = new DateTime();
        $this->view->customTitle = "Create Job";
        $job = new Jobs();
        $this->populateModel($job,$_POST);
        $job->uid = $this->generateUid();
        $job->enabled = 1;
        $job->createDate = $now->format('Y-m-d H:i:s');
        $this->view->success = $job->save();
    }

    public function editAction($id)
    {
        // we get the job
        $job = Jobs::findFirst($id)->toArray();
        // we get execution informations
        $lastExecution = JobExecutions::findFirst([
            "order" => "id DESC",
            "limit" => 1,
            "conditions" => "uidJob = :uidJob:",
            "bind"       => [
                'uidJob' => $job['uid'],
            ]
        ]);
        if($lastExecution)
        {
            $lastExecution = $lastExecution->toArray();
            $job = array_merge($job, $lastExecution);
        }
        // we get Stepstest autocron
        $steps = JobSteps::find([
            "order" => "position",
            "conditions" => "uidJob = :uidJob:",
            "bind"       => ["uidJob"=>$job['uid'] ]
        ]);
        if($steps)
        {
            $steps = $steps->toArray();
            foreach($steps AS $sKey=>$step)
            {
                $stepParametersLinks = JobStepParameterLinks::find([
                    "conditions" => "uidStep = :uidStep:",
                    "bind"       => [
                        'uidStep' => $step['uid']
                    ]
                ]);
                $steps[$sKey]['parameters'] = [];
                $listParamUid = [];
                if($stepParametersLinks)
                {
                    $stepParametersLinks = $stepParametersLinks->toArray();
                    foreach($stepParametersLinks AS $stepParametersLink)
                    {
                        $listParamUid[] = $stepParametersLink['uidParameter'];
                    }
                }
                if(!empty($listParamUid))
                {
                    $steps[$sKey]['parameters'] = JobStepParameters::find([
                        "uid IN ({uid:array})",
                        "bind"       => [
                            'uid' => $listParamUid
                        ]
                    ])->toArray();
                }
                $stepLastExecution = JobStepExecutions::find([
                    "conditions" => "uidStep = :uidStep:",
                    "bind"       => [
                        'uidStep' => $step['uid']
                    ],
                    "order" => "id DESC",
                    "limit" => 1,
                ]);
                $steps[$sKey]['lastExecution'] = null;
                if($stepLastExecution)
                {
                    $steps[$sKey]['lastExecution'] = $stepLastExecution->toArray()[0];
                }
            }
            $job['steps'] = $steps;
        }
        // and for each step we get params

        $this->view->job = $job;
        $this->view->customTitle = "Edit Job";
        $this->assets->addCss("css/lib/pureToogle.css");
        $this->assets->addJs("js/jobs/common.js");
        $this->assets->addJs("js/jobs/editJob.js");
        $this->assets->addJs("js/jobs/editSteps.js");
        $this->assets->addJs("js/jobs/editParameters.js");
    }

    public function updateAction($id)
    {
        if(!isset($_POST['data']))
        {
            http_response_code(400);
            return;
        }
        $job = Jobs::findFirst($id);
        if(!$job)
        {
            http_response_code(404);
            return;
        }
        $this->populateModel($job,$_POST['data']);
        $resultSave = $job->save();
        $this->sendJson(['result'=>$resultSave]);
    }

    public function deleteAction($uid)
    {
        $jobStepParameters = Jobs::findFirst($uid);
        $this->view->success = false;
        if(!$jobStepParameters)
        {
            $this->view->error = 'job not found';
        }
        else
        {
            $resultDelete = $jobStepParameters->delete();
            $this->view->success = $resultDelete;
            if(!$resultDelete)
            {
                $this->view->error = 'Error during delete';
            }
        }
    }
}

