<?php

namespace Mubiridziri\Geocenter\Service;

use Mubiridziri\Geocenter\Exception\TransportException;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Transport
{
    const POST = 'post';
    const GET = 'get';

    private string $license;

    private HttpClientInterface $client;

    /**
     * @throws TransportException
     */
    public function __construct(string $license, HttpClientInterface $client)
    {
        $this->license = $license;
        $this->client = $client;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function request(string $url, string $method = self::GET, array $headers = [], array $body = []): ResponseInterface
    {
        return $this->client->request($method, $url, [
            'headers' => $headers,
            'body' => $body
        ]);
    }

    public function getContent(ResponseInterface $response)
    {
        return $response->toArray();
    }
}
