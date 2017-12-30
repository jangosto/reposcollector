<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\User;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldImplement(EntityInterface);
        $this->shouldImplement(UserInterface);
    }
}
