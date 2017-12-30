<?php

namespace AppBundle\EntityManager;

use AppBundle\EntityManager\UserManager;

class RepositoryManagerInterface
{
    private UserManager $userManager;

    public function getUser();
}
