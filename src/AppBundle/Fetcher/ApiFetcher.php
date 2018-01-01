<?php

namespace AppBundle\Fetcher;

class ApiFetcher
{
    public function getReposDataByOrganizationName($organizationName)
    {
        $dataUrl = "https://api.github.com/orgs/".$organizationName."/repos";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$dataUrl);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        $t_vers = curl_version();
        curl_setopt($ch, CURLOPT_USERAGENT, 'curl/' . $t_vers['version']);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
