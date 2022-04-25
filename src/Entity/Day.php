<?php

namespace App\Entity;

use App\Repository\DayRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DayRepository::class)]
class Day
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $maxtemp_c;

    #[ORM\Column(type: 'string', length: 255)]
    private $maxtemp_f;

    #[ORM\Column(type: 'string', length: 255)]
    private $mintemp_c;

    #[ORM\Column(type: 'string', length: 255)]
    private $mintemp_f;

    #[ORM\Column(type: 'string', length: 255)]
    private $avgtemp_c;

    #[ORM\Column(type: 'string', length: 255)]
    private $avgtemp_f;

    #[ORM\Column(type: 'string', length: 255)]
    private $maxwind_mph;

    #[ORM\Column(type: 'string', length: 255)]
    private $maxwind_kph;

    #[ORM\Column(type: 'string', length: 255)]
    private $totalprecip_mm;

    #[ORM\Column(type: 'string', length: 255)]
    private $totalprecip_in;

    #[ORM\Column(type: 'string', length: 255)]
    private $avgvis_km;

    #[ORM\Column(type: 'string', length: 255)]
    private $avgvis_miles;

    #[ORM\Column(type: 'string', length: 255)]
    private $avghumidity;

    #[ORM\Column(type: 'string', length: 255)]
    private $daily_will_it_rain;

    #[ORM\Column(type: 'string', length: 255)]
    private $daily_chance_of_rain;

    #[ORM\Column(type: 'string', length: 255)]
    private $daily_will_it_snow;

    #[ORM\Column(type: 'string', length: 255)]
    private $daily_chance_of_snow;

    #[ORM\OneToOne(targetEntity: Condition::class, cascade: ['persist', 'remove'])]
    private $condition;

    #[ORM\Column(type: 'string', length: 255)]
    private $uv;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxtempC(): ?string
    {
        return $this->maxtemp_c;
    }

    public function setMaxtempC(string $maxtemp_c): self
    {
        $this->maxtemp_c = $maxtemp_c;

        return $this;
    }

    public function getMaxtempF(): ?string
    {
        return $this->maxtemp_f;
    }

    public function setMaxtempF(string $maxtemp_f): self
    {
        $this->maxtemp_f = $maxtemp_f;

        return $this;
    }

    public function getMintempC(): ?string
    {
        return $this->mintemp_c;
    }

    public function setMintempC(string $mintemp_c): self
    {
        $this->mintemp_c = $mintemp_c;

        return $this;
    }

    public function getMintempF(): ?string
    {
        return $this->mintemp_f;
    }

    public function setMintempF(string $mintemp_f): self
    {
        $this->mintemp_f = $mintemp_f;

        return $this;
    }

    public function getAvgtempC(): ?string
    {
        return $this->avgtemp_c;
    }

    public function setAvgtempC(string $avgtemp_c): self
    {
        $this->avgtemp_c = $avgtemp_c;

        return $this;
    }

    public function getAvgtempF(): ?string
    {
        return $this->avgtemp_f;
    }

    public function setAvgtempF(string $avgtemp_f): self
    {
        $this->avgtemp_f = $avgtemp_f;

        return $this;
    }

    public function getMaxwindMph(): ?string
    {
        return $this->maxwind_mph;
    }

    public function setMaxwindMph(string $maxwind_mph): self
    {
        $this->maxwind_mph = $maxwind_mph;

        return $this;
    }

    public function getMaxwindKph(): ?string
    {
        return $this->maxwind_kph;
    }

    public function setMaxwindKph(string $maxwind_kph): self
    {
        $this->maxwind_kph = $maxwind_kph;

        return $this;
    }

    public function getTotalprecipMm(): ?string
    {
        return $this->totalprecip_mm;
    }

    public function setTotalprecipMm(string $totalprecip_mm): self
    {
        $this->totalprecip_mm = $totalprecip_mm;

        return $this;
    }

    public function getTotalprecipIn(): ?string
    {
        return $this->totalprecip_in;
    }

    public function setTotalprecipIn(string $totalprecip_in): self
    {
        $this->totalprecip_in = $totalprecip_in;

        return $this;
    }

    public function getAvgvisKm(): ?string
    {
        return $this->avgvis_km;
    }

    public function setAvgvisKm(string $avgvis_km): self
    {
        $this->avgvis_km = $avgvis_km;

        return $this;
    }

    public function getAvgvisMiles(): ?string
    {
        return $this->avgvis_miles;
    }

    public function setAvgvisMiles(string $avgvis_miles): self
    {
        $this->avgvis_miles = $avgvis_miles;

        return $this;
    }

    public function getAvghumidity(): ?string
    {
        return $this->avghumidity;
    }

    public function setAvghumidity(string $avghumidity): self
    {
        $this->avghumidity = $avghumidity;

        return $this;
    }

    public function getDailyWillItRain(): ?string
    {
        return $this->daily_will_it_rain;
    }

    public function setDailyWillItRain(string $daily_will_it_rain): self
    {
        $this->daily_will_it_rain = $daily_will_it_rain;

        return $this;
    }

    public function getDailyChanceOfRain(): ?string
    {
        return $this->daily_chance_of_rain;
    }

    public function setDailyChanceOfRain(string $daily_chance_of_rain): self
    {
        $this->daily_chance_of_rain = $daily_chance_of_rain;

        return $this;
    }

    public function getDailyWillItSnow(): ?string
    {
        return $this->daily_will_it_snow;
    }

    public function setDailyWillItSnow(string $daily_will_it_snow): self
    {
        $this->daily_will_it_snow = $daily_will_it_snow;

        return $this;
    }

    public function getDailyChanceOfSnow(): ?string
    {
        return $this->daily_chance_of_snow;
    }

    public function setDailyChanceOfSnow(string $daily_chance_of_snow): self
    {
        $this->daily_chance_of_snow = $daily_chance_of_snow;

        return $this;
    }

    public function getCondition(): ?Condition
    {
        return $this->condition;
    }

    public function setCondition(?Condition $condition): self
    {
        $this->condition = $condition;

        return $this;
    }

    public function getUv(): ?string
    {
        return $this->uv;
    }

    public function setUv(string $uv): self
    {
        $this->uv = $uv;

        return $this;
    }
}
