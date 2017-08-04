<?php

class JobExecutionsBenchMark extends \Phalcon\Mvc\Model
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
    public $idJobExecution;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    public $maxCpu;

    /**
     *
     * @var integer
     * @Column(type="integer", length=5, nullable=false)
     */
    public $MinCpu;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    public $avgCpu;

    /**
     *
     * @var double
     * @Column(type="double", nullable=false)
     */
    public $medianCpu;

    /**
     *
     * @var integer
     * @Column(type="integer", length=8, nullable=false)
     */
    public $maxRam;

    /**
     *
     * @var integer
     * @Column(type="integer", length=8, nullable=false)
     */
    public $minRam;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $avgRam;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    public $medianRam;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $time;

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
        $this->belongsTo('idJobExecution', '\JobExecutions', 'id', ['alias' => 'JobExecutions']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobExecutionsBenchMark[]|JobExecutionsBenchMark
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobExecutionsBenchMark
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
        return 'jobExecutionsBenchMark';
    }

}
