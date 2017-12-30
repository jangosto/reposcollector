<?php

namespace spec\AppBundle\EntityManager;

use AppBundle\EntityManager\RepositoryManager;
use AppBundle\EntityManager\EntityManagerInterface;
use AppBundle\EntityManager\RepositoryManagerInterface;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryManagerSpec extends ObjectBehavior
{
    function let(string $data)
    {
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldImplements(EntityManagerInterface);
        $this->shouldImplements(RepositoryManagerInterface);
    }

    function it_returns_a_repository_entity_when_creates()
    {
        $this->create()->shouldReturnAnInstanceOf(EntityInterface);
        $this->create()->shouldReturnAnInstanceOf(RepositoryInterface);
    }

    function it_returns_an_user_entity_when_get_user()
    {
        $this->create()->shouldReturnAnInstanceOf(EntityInterface);
        $this->getUser()->shouldReturnAnInstanceOf(UserInterface);
    }
}
