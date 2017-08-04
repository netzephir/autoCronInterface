<?php

class JobExecutions extends \Phalcon\Mvc\Model
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
    public $uidJob;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
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
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $status;

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
        $this->hasMany('id', 'JobExecutionsBenchMark', 'idJobExecution', ['alias' => 'JobExecutionsBenchMark']);
        $this->hasMany('id', 'JobStepExecutions', 'idJobExecution', ['alias' => 'JobStepExecutions']);
        $this->belongsTo('uidJob', '\Jobs', 'uid', ['alias' => 'Jobs']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobExecutions[]|JobExecutions
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobExecutions
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
        return 'jobExecutions';
    }

}
