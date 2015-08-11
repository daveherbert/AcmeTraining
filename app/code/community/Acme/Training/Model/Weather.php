<?php

class Acme_Training_Model_Weather
{
    private $temperature;
    private $humidity;

    public function __construct($main)
    {
        $this->temperature = $main['temp'];
        $this->humidity = $main['humidity'];
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function getHumidity()
    {
        return $this->humidity;
    }
}