<?php

namespace spec\AppBundle\Renderer;

use AppBundle\Renderer\CsvRenderer;
use AppBundle\EntityList\EntityListInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CsvRendererSpec extends ObjectBehavior
{
    function let(EntityListInterface $entity)
    {
        $this->beConstructedWith($entity);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CsvRenderer::class);
    }

    function it_returns_an_string_when_render()
    {
        $this->render()->shouldBeString();
    }
}
