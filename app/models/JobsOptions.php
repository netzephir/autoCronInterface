<?php

class JobsOptions extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    public $benchmark;

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
        $this->belongsTo('uidJob', '\Jobs', 'uid', ['alias' => 'Jobs']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobsOptions[]|JobsOptions
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobsOptions
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
        return 'jobsOptions';
    }

}
