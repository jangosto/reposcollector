<?php

namespace AppBundle\Entity;

interface EntityInterface
{
    protected $id;

    public function getId();
    public function setId();
}
