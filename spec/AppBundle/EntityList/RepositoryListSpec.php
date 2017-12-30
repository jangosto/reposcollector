<?php

namespace spec\AppBundle\EntityList;

use AppBundle\EntityList\RepositoryList;
use AppBundle\EntityList\EntityListInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RepositoryListSpec extends ObjectBehavior
{
    function let(string $data)
    {
        $this->beConstructedWith($data);
    }

    function it_is_initializable()
    {
        $this->shouldImplement(EntityListInterface);
    }

    function it_returns_an_entity_when_creates_an_entity(string $data)
    {
        $this->create()->shouldBeString();
    }
}
