<?php

namespace App\Formatter;

use App\Entity\Root;

class WeatherFormatter
{
    public function formatRootForLookup(Root $root): array
    {
        [$location, $current, $forecast] = [$root->getLocation(), $root->getCurrent(), $root->getForecast()];

        $formattedData = [
            'location'  => [
                'name'  => $location->getName()
            ],
            'current'   => [
                'tempC'     => $current->getTempC(),
                'condition' => $current->getCondition()->getText()
            ],
        ];

        $currentHour  = (new \DateTime($location->getLocaltime()))->format('H');
        $forecastDays = $forecast->getForecastDays();
        $forecastData = [];
        foreach($forecastDays as $key => $forecastDay) {

            if($key==0) continue;
            $hour = $forecastDay->getHour()[$currentHour];

            $forecastData[] = [
                'date'      => $key==1?"Demain":"J+".$key,
                'tempC'     => $hour->getTempC(),
                'condition' => $hour->getCondition()->getText(),
                'wind'      => $hour->getWindKph(),
                'direction' => $hour->getWindDir()
            ];
        }
        $formattedData['forecast'] = $forecastData;

        return $formattedData;
    }

}