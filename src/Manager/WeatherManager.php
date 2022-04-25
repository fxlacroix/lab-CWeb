<?php

namespace App\Manager;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherManager
{
    /**
     * @param ParameterBagInterface $params
     * @param HttpClientInterface $client
     */
    public function __construct(
        ParameterBagInterface $params,
        HttpClientInterface $client
    ) {
        $this->params  = $params;
        $this->client  = $client;
        $this->baseUrl = "http://api.weatherapi.com/v1/";
    }

    public function getForecastWeather(array $query = [])
    {
        $namespace = 'forecast.xml';

        $query = http_build_query([
            'key'       => $this->params->get('app.api.weather.key'),
            'days'      => 20,
            'aqi'       => 'no',
            'alerts'    => 'no',
            'lang'      => 'fr',
            ...$query
        ]);

        $url = sprintf("%s%s?%s", $this->baseUrl, $namespace, $query);

        $response = $this->client->request("GET", $url);

        if ($response->getStatusCode() == 400) {
            throw new \InvalidArgumentException('Error code 1003: Parameter \'q\' not provided.Error code 1005: API request url is invalid.Error ');
        }

        if ($response->getStatusCode() == 401) {
            throw new \InvalidArgumentException('Error code 1002: API key not provided.Error code 2006: API key provided is invalid');
        }

        if ($response->getStatusCode() == 403) {
            throw new \InvalidArgumentException('Error code 2007: API key has exceeded calls per month quota.');
        }

        return $response->getContent();

    }
}