<?php

namespace AppBundle\Fetcher;

class ApiFetcher
{
    public function getReposDataByOrganizationName($organizationName)
    {
        $dataUrl = "https://api.github.com/orgs/".$organizationName."/repos";

        $maxPageNumber = $this->getMaxPageNumber($dataUrl);
        $totalData = array();

        $ch = curl_init();
        for ($i=1; $i<=$maxPageNumber; $i++) {
            curl_setopt($ch,CURLOPT_URL,$dataUrl."?page=".$i);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
            $t_vers = curl_version();
            curl_setopt($ch, CURLOPT_USERAGENT, 'curl/' . $t_vers['version']);
            $data = curl_exec($ch);

            $totalData = array_merge($totalData, json_decode($data, true));
        }
        curl_close($ch);

        return json_encode($totalData);
    }

    private function getMaxPageNumber($url)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $t_vers = curl_version();
        curl_setopt($ch, CURLOPT_USERAGENT, 'curl/' . $t_vers['version']);
        $data = curl_exec($ch);
        curl_close($ch);

        $headers = $this->getHeadersFromCurlResponse($data);
        $number = 0;
        preg_match('/.*?page=([0-9]+)>; rel="last"/', $headers['Link'], $number);

        return $number[1];
    }

    private function getHeadersFromCurlResponse($response)
    {
        $headers = array();

        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else
            {
                list ($key, $value) = explode(': ', $line);

                $headers[$key] = $value;
            }

        return $headers;
    }
}
