<?php

namespace spec\AppBundle\EntityManager;

use AppBundle\EntityManager\UserManager;
use AppBundle\EntityManager\EntityManagerInterface;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserManagerSpec extends ObjectBehavior
{
    const DATA = [
        "login" => "symfony",
        "id" => 143937, 
        "avatar_url" => "https://avatars3.githubusercontent.com/u/143937?v=4"
    ];

    function let()
    {
        $this->beConstructedWith(self::DATA);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserManager::class);
    }

    function it_is_an_entity_manager()
    {
        $this->shouldImplement("AppBundle\EntityManager\EntityManagerInterface");
    }

    function it_is_a_user_manager()
    {
        $this->shouldImplement("AppBundle\EntityManager\UserManager");
    }

    function it_returns_a_user_entity_when_creates()
    {
        $this->createEntity(self::DATA)->shouldReturnAnInstanceOf("AppBundle\Entity\EntityInterface");
        $this->createEntity(self::DATA)->shouldReturnAnInstanceOf("AppBundle\Entity\UserInterface");
    }
}
