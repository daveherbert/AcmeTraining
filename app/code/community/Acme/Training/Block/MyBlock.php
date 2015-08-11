<?php

use GuzzleHttp\Client;

class Acme_Training_Block_MyBlock extends Mage_Core_Block_Template
{
    public function getWeatherFor($city)
    {
        $client = new Client([
            'base_uri' => 'http://api.openweathermap.org/data/2.5/',
            'timeout' => 2.0
        ]);

        $response = $client->get('weather?q='.$city);
        $contents = $response->getBody()->getContents();

        return json_decode($contents);
    }
}

