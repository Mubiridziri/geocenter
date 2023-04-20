<?php

namespace Mubiridziri\Geocenter\Module;

use Mubiridziri\Geocenter\Model\Direction;
use Mubiridziri\Geocenter\Model\VehicleOptions;
use Mubiridziri\Geocenter\Option\RoutingOptimazeType;
use Mubiridziri\Geocenter\Option\RoutingSpeedType;
use Mubiridziri\Geocenter\Option\VehicleType;
use Mubiridziri\Geocenter\Service\Transport;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RoutingTest extends TestCase
{

    public function getMockGeoJsons()
    {
        yield ['{"features":[{"geometry":{"coordinates":[0.0,0.0],"type":"Point"},"properties":{"endZlev":0,"indoor":false,"startZlev":0,"type":240},"type":"Feature"},{"geometry":{"coordinates":[[0.0,0.0]],"type":"LineString"},"properties":{"distance":3076,"edgeId":14910267,"endZlev":0,"from":"","indoor":false,"length":3065,"localTime":185,"message":"Двигайтесь прямо","road":"Челябинский тракт","route":"","startZlev":0,"time":183,"to":"","type":27,"vehicle":128,"vehicleName":"car","waiting":0},"type":"Feature"},{"geometry":{"coordinates":[0.0,0.0],"type":"Point"},"properties":{"endZlev":0,"indoor":false,"startZlev":0,"type":241},"type":"Feature"}],"properties":{"attempts":1,"info":"Итераций: 1808, помещалось в очередь 2190, отклонено до помещения 1174, отклонено после помещения до обработки 0 найдено финишное ребро: 1, помечалось на добавление методом calcCost 1130, отклонено до обработки в связи с превышением стоимости 0. Дополнительных итераций: 23 Отклонено пешеходных ребер буфером ОТ: 0","length":5253,"time":327},"result":true,"type":"FeatureCollection"}',

        ];
    }

    /**
     * @return void
     * @dataProvider getMockGeoJsons
     */
    public function testGetRoute($responseMockData)
    {
        $serializer = new Serializer([new ObjectNormalizer(), new ArrayDenormalizer()], ['json' => new JsonEncoder()]);
        $mockResponse = new MockResponse(
            $responseMockData,
            ['headers' => ['Content-Type' => 'application/json']]
        );
        $mockHttpClient = new MockHttpClient($mockResponse);
        $transport = new Transport($mockHttpClient);

        $routing = new Routing('', $transport, $serializer);
        $result = $routing->getRoute((new Direction())
            ->setPoints([['x' => 0.0, 'y' => 0.0], ['x' => 0.0, 'y' => 0.0]])
            ->setVehicles([
                VehicleType::CAR => new VehicleOptions()
            ])
        );
        $this->assertEquals($result, json_decode($responseMockData, true));

    }
}
