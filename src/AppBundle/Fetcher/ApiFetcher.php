<?php

namespace AppBundle\Fetcher;

class ApiFetcher
{
    public function getReposDataByOrganizationName($organizationName)
    {
        $data = file_get_contents("https://api.github.com/orgs/".$organizationName."/repos");

        return $data;
    }
}
