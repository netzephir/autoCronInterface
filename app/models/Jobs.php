<?php

class Jobs extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=10, nullable=false)
     */
    public $uid;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $jobName;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $createDate;

    /**
     *
     * @var integer
     * @Column(type="integer", length=6, nullable=false)
     */
    public $maxParallelExecution;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $benchmark;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $enabled;

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
        $this->hasMany('uid', 'JobExecutions', 'uidJob', ['alias' => 'JobExecutions']);
        $this->hasMany('uid', 'JobsOptions', 'uidJob', ['alias' => 'JobsOptions']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jobs[]|Jobs
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Jobs
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
        return 'jobs';
    }

}
