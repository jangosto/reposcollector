<?php

namespace spec\AppBundle\Fetcher;

use AppBundle\Fetcher\ApiFetcher;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ApiFetcherSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ApiFetcher::class);
    }

    function it_returns_a_json_when_fetching_an_organization_repositories_data($organization)
    {
        $organization->shouldBeString();
        $this->getReposDataByOrganizationName($organization)->shouldBeString();
    }
}
