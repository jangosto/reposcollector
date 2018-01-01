<?php

namespace AppBundle\Entity;

use AppBundle\Entity\User;

interface RepositoryInterface
{
    public function getName();
    public function setName($name);
    public function getStarsCount();
    public function setStarsCount($starsCount);
    public function getIsFork();
    public function setIsFork($isFork);
    public function getOpenedIssuesCount();
    public function setOpenedIssuesCount($openedIssuesCount);
    public function getUser();
    public function setUser(User $user);
}
