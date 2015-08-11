<?php

use GuzzleHttp\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class Acme_Training_Block_MyBlock extends Mage_Core_Block_Template
{
    public function getWeatherFor($city)
    {
        $client = new Client([
            'base_uri' => 'http://api.openweathermap.org/data/2.5/weather',
            'timeout' => 2.0
        ]);

        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);

        $response = $client->get('?q='.$city);
        $contents = $response->getBody()->getContents();

        return $serializer->deserialize($contents, 'Acme_Training_Model_Weather', 'json');
    }
}
