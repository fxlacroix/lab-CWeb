<?php

namespace App\Service;

use App\Entity\Forecast;
use App\Entity\Root;
use App\Manager\WeatherManager;
use App\PropertyTypeExtractor\WeatherPropertyTypeExtractor;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\UnwrappingDenormalizer;
use Symfony\Component\Serializer\Serializer;

class WeatherService
{
    public function __construct(
        WeatherManager $manager
    ) {
        $this->manager    = $manager;
    }

    public function getForecastWeather(array $queryParams = [])
    {
        $authorizedKey = ["q", "days"];
        $query = array_filter($queryParams, function($k) use($authorizedKey) {
            return in_array($k, $authorizedKey);
        }, ARRAY_FILTER_USE_KEY);

        $xml = $this->manager->getForecastWeather($query);
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [
            new ObjectNormalizer(null, null, null, new ReflectionExtractor()),
            new ArrayDenormalizer(),
        ];
        $serializer = new Serializer($normalizers, $encoders);
        $root = $serializer->deserialize(
            $xml,
            Root::class,
            'xml',
            [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]
        );

        return $root;
    }

}