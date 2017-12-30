<?php

namespace AppBundle\EntityManager;

interface EntityManagerInterface
{
    protected $entity;

    public function createEntity($data);
    public function getEntity();
    public function setEntity();
    public function getEntityType();
}
