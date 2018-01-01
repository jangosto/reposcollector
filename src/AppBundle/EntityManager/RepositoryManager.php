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
        $dataArray = json_decode($data);
        $this->userManager = new UserManager($dataArray['owner']);
        $this->entity = new Repository();
        $this->entity->setName($dataArray('name'));
        $this->entity->setStarsCount($dataArray('stargazers_count'));
        $this->entity->setIsFork($dataArray['fork']);
        $this->entity->setOpenedIssuesCount($dataArray['open_issues_count']);
        $this->entity->setUser($this->userManager->getEntity());
    }
}
