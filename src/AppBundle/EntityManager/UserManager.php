<?php

namespace AppBundle\EntityManager;

use AppBundle\EntityManager\EntityManagerInterface;
use AppBundle\Entity\User;

class UserManager extends EntityManager
{
    const ENTITY_TYPE = "user";

    public function __construct($data)
    {
        $this->createEntity($data);
    }

    public function createEntity($data)
    {
        $this->entity = new User();
        $this->entity->setId($data->id);
        $this->entity->setLogin($data->login);
        $this->entity->setAvatar($data->avatar_url);
    }
}
