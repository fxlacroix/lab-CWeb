<?php

namespace App\Controller\Api;

use App\Service\WeatherService;
use App\Formatter\WeatherFormatter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/weather')]
class WeatherController extends AbstractController
{
    /**
     * @param WeatherService $weatherService
     */
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    #[Route('/find', name: 'app_api_weather_find')]
    public function find(Request $request, WeatherFormatter $weatherFormatter)
    {
        try {
            $query  = $request->query->all();
            $root   = $this->weatherService->getForecastWeather($query);
            $formattedData = $weatherFormatter->formatRootForLookup($root);

            return new JsonResponse([
                'success'   => true,
                'data'      => $formattedData
            ]);

        } catch(\Throwable $e) {

            return new JsonResponse([
                'success'   => false,
                'message'   => $e->getMessage()
            ]);
        }
    }
}
