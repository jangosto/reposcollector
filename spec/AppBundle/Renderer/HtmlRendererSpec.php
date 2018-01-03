<?php

namespace spec\AppBundle\Renderer;

use AppBundle\Renderer\HtmlRenderer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HtmlRendererSpec extends ObjectBehavior
{
    function let(\Twig\Environment $templatingService)
    {
        $this->beConstructedWith($templatingService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(HtmlRenderer::class);
    }
}
