<?php

namespace AppBundle\EntityManager;

use AppBundle\EntityManager\UserManager;
use AppBundle\EntityManager\RepositoryManagerInterface;
use AppBundle\Entity\Repository;

class RepositoryManager extends EntityManager implements RepositoryManagerInterface
{
    const ENTITY_TYPE = "repository";

    private $userManager;

    public function __construct($data)
    {
        $this->createEntity($data);
    }

    public function getUser()
    {
        return $this->userManager->getEntity();
    }

    public function createEntity($data)
    {
        $this->userManager = new UserManager($data->owner);
        $this->entity = new Repository();
        $this->entity->setName($data->name);
        $this->entity->setStarsCount($data->stargazers_count);
        $this->entity->setIsFork($data->fork);
        $this->entity->setOpenedIssuesCount($data->open_issues_count);
        $this->entity->setUser($this->userManager->getEntity());
    }
}
