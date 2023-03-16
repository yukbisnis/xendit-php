<?php

namespace Yubi\Xendit;

use GuzzleHttp\Client;
use Yubi\Xendit\Exceptions\ApiException;
use InvalidArgumentException;

class Xendit
{
    protected $apiKey;
    protected $baseUri = 'https://api.xendit.co';

    public function __construct()
    {
        $this->apiKey = config('xendit.api_key');
    }

    protected function validateParams($params = [], $requiredParams = [])
    {
        if ($params && !is_array($params)) {
            $message = "You must pass an array as params.";
            throw new InvalidArgumentException($message);
        } else {
            $currParams = array_diff_key(array_flip($requiredParams), $params);
            if (count($currParams) > 0) {
                $message = "You must pass required parameters on your params. "
                    . "Check https://xendit.github.io/apireference/ for more information.";
                throw new InvalidArgumentException($message);
            }
        }
    }

    protected function request($method, $url, $params)
    {
        $requestParams = [
            'base_uri' => $this->baseUri,
            'auth' => [$this->apiKey, ''],
            'headers' => [],
            'json' => $params
        ];

        $client = new Client($requestParams);

        try {
            $requestClient = $client->request($method, $url);

            $rbody = $requestClient->getBody();
            $rcode = (int) $requestClient->getStatusCode();
            $rheader = $requestClient->getHeaders();

            return json_decode($rbody->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {

            $response = $e->getResponse();
            $rbody = json_decode($response->getBody()->getContents(), true);
            $rcode = $response->getStatusCode();

            throw new ApiException(
                $rbody['message'],
                strval($rcode),
                $rbody['error_code']
            );
        }
    }
}
