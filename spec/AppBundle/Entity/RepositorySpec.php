<?php

namespace spec\AppBundle\Entity;

use AppBundle\Entity\Repository;
use AppBundle\Entity\User;
use AppBundle\Entity\EntityInterface;
use AppBundle\Entity\RepositoryInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositorySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Repository::class);
    }

    function it_is_an_entity()
    {
        $this->shouldImplement("AppBundle\Entity\EntityInterface");
    }

    function it_is_a_repository()
    {
        $this->shouldImplement("AppBundle\Entity\RepositoryInterface");
    }

    function it_returns_id()
    {
        $this->setId(458058);
        $this->getId()->shouldReturn(458058);
    }

    function it_returns_stars_count()
    {
        $this->setStarsCount(23);
        $this->getStarsCount()->shouldReturn(23);
    }

    function it_returns_is_fork()
    {
        $this->setIsFork(false);
        $this->getIsFork()->shouldReturn(false);
    }

    function it_returns_opened_issues_count()
    {
        $this->setOpenedIssuesCount(32);
        $this->getOpenedIssuesCount()->shouldReturn(32);
    }

    function it_returns_user(User $user)
    {
        $this->setUser($user);
        $this->getUser()->shouldReturn($user);
    }
}
