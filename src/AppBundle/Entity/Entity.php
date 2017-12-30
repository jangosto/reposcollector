<?php

namespace AppBundle\Entity;

use AppBundle\Entity\EntityInterface;

abstract class Entity implements EntityInterface
{
    protected $id;

    /**
     * Get id.
     *
     * @return id.
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set id.
     *
     * @param id the value to set.
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this->id;
    }
}
