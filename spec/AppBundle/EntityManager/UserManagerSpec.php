<?php

namespace spec\AppBundle\EntityManager;

use AppBundle\EntityManager\UserManager;
use AppBundle\EntityManager\EntityManagerInterface;
use AppBundle\EntityManager\UserManagerInterface;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserManagerSpec extends ObjectBehavior
{
    function let(string $data)
    {
        $this->beContructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldImplements(EntityManagerInterface);
        $this->shouldImplements(UserManagerInterface);
    }

    function it_returns_a_user_entity_when_creates()
    {
        $this->create()->shouldReturnAnInstanceOf(EntityInterface);
        $this->create()->shouldReturnAnInstanceOf(UserInterface);
    }
}
