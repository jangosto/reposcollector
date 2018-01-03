<?php

namespace AppBundle\Fetcher;

class ApiFetcher
{
    public function getReposDataByOrganizationName($organizationName)
    {
        $dataUrl = "https://api.github.com/orgs/".$organizationName."/repos?per_page=100";

        $response = false;
        if (($maxPageNumber = $this->getMaxPageNumber($dataUrl)) !== false) {
            if (($totalData = $this->getApiData($dataUrl, $maxPageNumber)) !== false) {
                $response = json_encode($totalData);
            }
        }
        return $response;
    }

    public function getApiData($dataUrl ,$maxPageNumber)
    {
        $response = array();

        $ch = curl_init();

        for ($i=1; $i<=$maxPageNumber; $i++) {
            curl_setopt($ch,CURLOPT_URL,$dataUrl."&page=".$i);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,1);
            curl_setopt($ch, CURLOPT_HEADER, true);
            $t_vers = curl_version();
            curl_setopt($ch, CURLOPT_USERAGENT, 'curl/' . $t_vers['version']);
            $dataWithHeader = curl_exec($ch);

            if (strpos($this->getHeadersFromCurlResponse($dataWithHeader)['http_code'], "403") === false) {
                $data = $this->getContentFromCurlResponse($dataWithHeader);
                $response = array_merge($response, json_decode($data, true));
            } else {
                $response = false;
                break;
            }
        }
        curl_close($ch);

        return $response;
    }

    public function getMaxPageNumber($url)
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

        $response = false;
        if (isset($headers['Link'])) {
            preg_match('/.*\?.*&page=([0-9]+)>; rel="last"/', $headers['Link'], $number);
            $response = $number[1];
        }

        return $response;
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

    public function getContentFromCurlResponse($response)
    {
        return explode("\r\n\r\n", $response)[1];
    }
}
