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
    const DATA = [
        "id" => 458058,
        "name" => "symofny",
        "owner" => [
            "login" => "symfony",
            "id" => 143937, 
            "avatar_url" => "https://avatars3.githubusercontent.com/u/143937?v=4"
        ],
        "fork" => false,
        "stargazers_count" => 16143,
        "open_issues_count" => 810
    ];

    function let()
    {
        $this->beConstructedWith(self::DATA);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(RepositoryManager::class);
    }

    function it_is_an_entity_manager()
    {
        $this->shouldImplement("AppBundle\EntityManager\EntityManagerInterface");
    }

    function it_is_a_repository_manager()
    {
        $this->shouldImplement("AppBundle\EntityManager\RepositoryManagerInterface");
    }

    function it_returns_a_repository_entity_when_creates()
    {
        $this->createEntity(self::DATA)->shouldReturnAnInstanceOf("AppBundle\Entity\EntityInterface");
        $this->createEntity(self::DATA)->shouldReturnAnInstanceOf("AppBundle\Entity\RepositoryInterface");
    }

    function it_returns_an_user_entity_when_get_user()
    {
        $this->createEntity(self::DATA);
        $this->getUser()->shouldReturnAnInstanceOf("AppBundle\Entity\UserInterface");
    }
}
