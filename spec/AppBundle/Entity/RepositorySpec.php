<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Repository;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\RepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositorySpec extends ObjectBehavior
{
    

    function it_is_initializable()
    {
        $this->shouldImplement(EntityInterface);
        $this->shouldImplement(RepositoryInterface);
    }
}
