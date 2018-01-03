<?php

namespace spec\AppBundle\Fetcher;

use AppBundle\Fetcher\ApiFetcher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiFetcherSpec extends ObjectBehavior
{
    const ORG_NAME = "symfony";

    function it_is_initializable()
    {
        $this->shouldHaveType(ApiFetcher::class);
    }
}
