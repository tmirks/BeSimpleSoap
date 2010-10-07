<?php

namespace Bundle\WebServiceBundle\ServiceDefinition;

class ServiceHeader
{
    private $name;
    private $type;

    public function __construct($name = null, ServiceType $type = null)
    {
        $this->setName($name);
        $this->setType($type);
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }
}