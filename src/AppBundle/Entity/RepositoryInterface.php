<?php

namespace AppBundle\Entity;

use AppBundle\Entity\User;

interface RepositoryInterface
{
    private $name;
    private $starsCount;
    private $isFork;
    private $openedIssuesCount;
    private User $user;

    public function getName();
    public function setName();
    public function getStarsCount();
    public function setStarsCount();
    public function getIsFork();
    public function setIsFork();
    public function getOpenedIssuesCount();
    public function setOpenedIssuesCount();
    public function getUser();
    public function setUser();
}
