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
        $dataArray = json_decode($data);
        $this->entity = new User();
        $this->entity->setId($dataArray['id']);
        $this->entity->setLogin($dataArray['login']);
        $this->entity->setAvatar($dataArray['avatar']);
    }
}
