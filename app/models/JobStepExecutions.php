<?php

class JobStepExecutions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $uidStep;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=true)
     */
    public $idJobExecution;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $status;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $startDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $endDate;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $message;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $updateAt;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("autoCron");
        $this->belongsTo('uidStep', '\JobStepsController', 'uid', ['alias' => 'JobStepsController']);
        $this->belongsTo('idJobExecution', '\JobExecutions', 'id', ['alias' => 'JobExecutions']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobStepExecutions[]|JobStepExecutions
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobStepExecutions
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'jobStepExecutions';
    }

}
