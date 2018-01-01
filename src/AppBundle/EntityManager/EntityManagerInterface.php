<?php

namespace AppBundle\EntityManager;

use AppBundle\Entity\EntityInterface;

interface EntityManagerInterface
{
    public function createEntity($data);
    public function getEntity();
    public function setEntity(EntityInterface $entity);
    public function getEntityType();
}
