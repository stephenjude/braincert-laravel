<?php

namespace Stephenjude\Braincert\Http;

use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Stephenjude\Braincert\Exceptions\BrainCertHttpException;

/**
 * Class BraincertHttpClient
 * @package Stephenjude\Braincert\Http
 */
abstract class BraincertHttpClient
{
    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    public $apiKey;

    /**
     * @var string
     */
    public $baseUrl;

    /**
     * BraincertHttpClient constructor.
     */
    public function __construct()
    {
        $this->baseUrl = "https://api.braincert.com/v2/";
        $this->apiKey = config('braincert-laravel.api_key');
    }

    /**
     * @param $path
     * @param array $param
     * @return ClientResponse
     */
    public function http($path, $param = [])
    {
        $param = array_merge($param, [
            'apikey' => $this->apiKey,
            'format' => config('braincert-laravel.format'),
        ]);

        $path = $this->baseUrl . $path . '?' . http_build_query($param);

        return Http::post($path);
    }

    /**
     * @param ClientResponse $response
     * @throws BrainCertHttpException
     */
    public function thowExeptionIfError(ClientResponse $response)
    {
        $data = $response->json();

        if ($response->failed()) {
            throw new BrainCertHttpException($response->json('message'), $response->status());
        }

        if (Arr::has($data, 'error')) {
            throw new BrainCertHttpException($data['error'], (int)$data['status']);
        }
    }
}
