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

    function it_fetches_organization_repositories_data_by_organization_name($organization)
    {
        $organization->shouldBeString();
        $this->getReposDataByOrganizationName($organization)->shouldBeString();
        
    }
}
