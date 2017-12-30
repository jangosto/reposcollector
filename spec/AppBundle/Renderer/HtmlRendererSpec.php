<?php

namespace spec\AppBundle\Renderer;

use AppBundle\Renderer\HtmlRenderer;
use AppBundle\EntityList\EntityListInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HtmlRendererSpec extends ObjectBehavior
{
    function let(EntityListInterface $entity)
    {
        $this->beConstructedWith($entity);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HtmlRenderer::class);
    }

    function it_returns_an_string_when_render()
    {
        $this->render()->shoulBeString();
    }
}
