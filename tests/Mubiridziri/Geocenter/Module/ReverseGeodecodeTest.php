<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Model\Address;
use Mubiridziri\Geocenter\Model\LatLng;
use Mubiridziri\Geocenter\Model\ReverseDecoderContext;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Option\GeodecodeType;
use Mubiridziri\Geocenter\Service\Transport;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ReverseGeodecodeTest extends TestCase
{

    public function testReverse()
    {
        $responseBody = [
            'address' => [
                '0' => [
                    'name' => "Address",
                    'x' => 0.0,
                    'y' => 0.0,
                    'type' => 'road'
                ]
            ]
        ];

        $serializer = new Serializer([new ObjectNormalizer(), new ArrayDenormalizer()], ['json' => new JsonEncoder()]);
        $mockResponse =  new MockResponse(
            json_encode($responseBody),
            ['headers' => ['Content-Type' => 'application/json']]
        );
        $mockHttpClient = new MockHttpClient($mockResponse);
        $transport = new Transport($mockHttpClient);

        $geodecoder = new ReverseGeodecode('', $transport, $serializer);
        $result = $geodecoder->reverse(new LatLng(0.0, 0.0),
            (new ReverseDecoderContext())
                ->setFormat(GeodecodeFormat::SIMPLE_FORMAT)
                ->setType(GeodecodeType::ROAD)
        );
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $element = array_shift($result);
        $this->assertInstanceOf(Address::class, $element);
    }
}
