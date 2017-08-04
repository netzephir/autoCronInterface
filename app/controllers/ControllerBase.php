<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function sendJson($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    protected function populateModel(&$model, $data)
    {
        foreach($data AS $key=>$elem)
        {
            if(property_exists($model,$key))
            {
                $model->$key = $elem;
            }
        }
    }

    protected function protectedData()
    {

    }

    /**
     * Generate an md5 from an uniqId
     *
     * @return int
     */
    public function generateUid()
    {
        return crc32(uniqid());
    }
}
