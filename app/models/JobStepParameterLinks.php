<?php

class JobStepParameterLinks extends \Phalcon\Mvc\Model
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
    public $uidParameter;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("autoCron");
        $this->belongsTo('uidStep', '\JobStepsController', 'uid', ['alias' => 'JobStepsController']);
        $this->belongsTo('uidParameter', '\JobStepsController', 'uid', ['alias' => 'JobStepsController']);
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobStepParameterLinks[]|JobStepParameterLinks
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return JobStepParameterLinks
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
        return 'jobStepParameterLinks';
    }

}
