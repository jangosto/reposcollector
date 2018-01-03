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
        $this->shouldHaveType(User::class);
    }

    function it_is_an_entity()
    {
        $this->shouldImplement("AppBundle\Entity\EntityInterface");
    }

    function it_is_a_user()
    {
        $this->shouldImplement("AppBundle\Entity\UserInterface");
    }

    function it_returns_id()
    {
        $this->setId(458058);
        $this->getId()->shouldReturn(458058);
    }

    function it_returns_login()
    {
        $this->setLogin("symfony");
        $this->getLogin()->shouldReturn("symfony");
    }

    function it_returns_avatar()
    {
        $this->setAvatar("https://www.some.es/user/avatar.jpg");
        $this->getAvatar()->shouldReturn("https://www.some.es/user/avatar.jpg");
    }
}
