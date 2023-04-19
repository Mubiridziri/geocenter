<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Model\Address;
use Mubiridziri\Geocenter\Model\DecoderContext;
use Mubiridziri\Geocenter\Option\GeodecodeData;
use Mubiridziri\Geocenter\Option\GeodecodeFormat;
use Mubiridziri\Geocenter\Service\Transport;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class GeodecoderTest extends TestCase
{
    public function testDecode()
    {
        $responseBody = [
            'address' => [
                '0' => [
                    'name' => "Address",
                    'x' => 0.0,
                    'y' => 0.0
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

        $geodecoder = new Geodecoder('', $transport, $serializer);
        $result = $geodecoder->decode('',
            (new DecoderContext())
                ->setFormat(GeodecodeFormat::SIMPLE_FORMAT)
                ->setData(GeodecodeData::DATA_ADDRESS)
        );
        $this->assertIsArray($result);
        $this->assertCount(1, $result);
        $element = array_shift($result);
        $this->assertInstanceOf(Address::class, $element);

    }
}
