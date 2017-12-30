<?php

namespace AppBundle\EntityManager;

use AppBundle\EntityManager\UserManager;

interface RepositoryManagerInterface
{
    private UserManager $userManager;

    public function getUser();
}
