<?php

namespace spec\AppBundle\Renderer;

use AppBundle\Renderer\CsvRenderer;
use AppBundle\EntityManager\RepositoryManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CsvRendererSpec extends ObjectBehavior
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

    function let(\Twig\Environment $templatingService)
    {
        $this->beConstructedWith($templatingService);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CsvRenderer::class);
    }
}
