<?php

namespace AppBundle\EntityManager;

use AppBundle\Entity\EntityInterface;
use AppBundle\EntityManager\EntityManagerInterface;

abstract class EntityManager implements EntityManagerInterface
{
    protected $entity;

    abstract public function createEntity($data);
    
    public function getEntityType()
    {
        return self::ENTITY_TYPE;
    }
    
    /**
     * Get entity.
     *
     * @return entity.
     */
    public function getEntity()
    {
        return $this->entity;
    }
    
    /**
     * Set entity.
     *
     * @param entity the value to set.
     */
    public function setEntity(EntityInterface $entity)
    {
        $this->entity = $entity;
        return $this->entity;
    }
}
