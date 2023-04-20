<?php

namespace Mubiridziri\Geocenter\Service;

use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Transport
{
    const POST = 'POST';
    const GET = 'GET';

    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function request(string $url, string $method = self::GET, array $headers = [], string $body = ''): ResponseInterface
    {
        return $this->client->request($method, $url, [
            'headers' => $headers,
            'body' => $body
        ]);
    }

    public function getContent(ResponseInterface $response): array
    {
        return $response->toArray();
    }
}
