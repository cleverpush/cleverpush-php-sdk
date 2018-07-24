<?php

class CleverPush {
    protected $privateKey;
    protected $apiBase;

    function __construct($privateKey, $apiBase = 'https://api.cleverpush.com')
    {
        $this->privateKey = $privateKey;
        $this->apiBase = $apiBase;
    }

    function request($method, $path, $data = false)
    {
        $curl = curl_init();

        $url = $this->apiBase . $path;

        switch ($method)
        {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
                }
                break;

            case 'PUT':
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;

            default:
                if ($data)
                {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: ' . $this->privateKey;

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return json_decode($result);
    }
}
