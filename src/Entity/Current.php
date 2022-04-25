<?php

namespace App\Entity;

use App\Repository\CurrentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrentRepository::class)]
class Current
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $last_updated_epoch;

    #[ORM\Column(type: 'string', length: 255)]
    private $last_updated;

    #[ORM\Column(type: 'string', length: 255)]
    private $temp_c;

    #[ORM\Column(type: 'string', length: 255)]
    private $temp_f;

    #[ORM\Column(type: 'boolean')]
    private $is_day;

    #[ORM\OneToOne(targetEntity: Condition::class, cascade: ['persist', 'remove'])]
    private $condition;

    #[ORM\Column(type: 'string', length: 255)]
    private $wind_mph;

    #[ORM\Column(type: 'string', length: 255)]
    private $wind_kph;

    #[ORM\Column(type: 'string', length: 255)]
    private $wind_degree;

    #[ORM\Column(type: 'string', length: 255)]
    private $wind_dir;

    #[ORM\Column(type: 'string', length: 255)]
    private $pressure_mb;

    #[ORM\Column(type: 'string', length: 255)]
    private $pressure_in;

    #[ORM\Column(type: 'string', length: 255)]
    private $precip_mm;

    #[ORM\Column(type: 'string', length: 255)]
    private $precip_in;

    #[ORM\Column(type: 'string', length: 255)]
    private $humidity;

    #[ORM\Column(type: 'string', length: 255)]
    private $cloud;

    #[ORM\Column(type: 'string', length: 255)]
    private $feelslike_c;

    #[ORM\Column(type: 'string', length: 255)]
    private $feelslike_f;

    #[ORM\Column(type: 'string', length: 255)]
    private $vis_km;

    #[ORM\Column(type: 'string', length: 255)]
    private $vis_miles;

    #[ORM\Column(type: 'string', length: 255)]
    private $uv;

    #[ORM\Column(type: 'string', length: 255)]
    private $gust_mph;

    #[ORM\Column(type: 'string', length: 255)]
    private $gust_kph;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastUpdatedEpoch(): ?string
    {
        return $this->last_updated_epoch;
    }

    public function setLastUpdatedEpoch(string $last_updated_epoch): self
    {
        $this->last_updated_epoch = $last_updated_epoch;

        return $this;
    }

    public function getLastUpdated(): ?string
    {
        return $this->last_updated;
    }

    public function setLastUpdated(string $last_updated): self
    {
        $this->last_updated = $last_updated;

        return $this;
    }

    public function getTempC(): ?string
    {
        return $this->temp_c;
    }

    public function setTempC(string $temp_c): self
    {
        $this->temp_c = $temp_c;

        return $this;
    }

    public function getTempF(): ?string
    {
        return $this->temp_f;
    }

    public function setTempF(string $temp_f): self
    {
        $this->temp_f = $temp_f;

        return $this;
    }

    public function getIsDay(): ?bool
    {
        return $this->is_day;
    }

    public function setIsDay(bool $is_day): self
    {
        $this->is_day = $is_day;

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

    public function getWindMph(): ?string
    {
        return $this->wind_mph;
    }

    public function setWindMph(string $wind_mph): self
    {
        $this->wind_mph = $wind_mph;

        return $this;
    }

    public function getWindKph(): ?string
    {
        return $this->wind_kph;
    }

    public function setWindKph(string $wind_kph): self
    {
        $this->wind_kph = $wind_kph;

        return $this;
    }

    public function getWindDegree(): ?string
    {
        return $this->wind_degree;
    }

    public function setWindDegree(string $wind_degree): self
    {
        $this->wind_degree = $wind_degree;

        return $this;
    }

    public function getWindDir(): ?string
    {
        return $this->wind_dir;
    }

    public function setWindDir(string $wind_dir): self
    {
        $this->wind_dir = $wind_dir;

        return $this;
    }

    public function getPressureMb(): ?string
    {
        return $this->pressure_mb;
    }

    public function setPressureMb(string $pressure_mb): self
    {
        $this->pressure_mb = $pressure_mb;

        return $this;
    }

    public function getPressureIn(): ?string
    {
        return $this->pressure_in;
    }

    public function setPressureIn(string $pressure_in): self
    {
        $this->pressure_in = $pressure_in;

        return $this;
    }

    public function getPrecipMm(): ?string
    {
        return $this->precip_mm;
    }

    public function setPrecipMm(string $precip_mm): self
    {
        $this->precip_mm = $precip_mm;

        return $this;
    }

    public function getPrecipIn(): ?string
    {
        return $this->precip_in;
    }

    public function setPrecipIn(string $precip_in): self
    {
        $this->precip_in = $precip_in;

        return $this;
    }

    public function getHumidity(): ?string
    {
        return $this->humidity;
    }

    public function setHumidity(string $humidity): self
    {
        $this->humidity = $humidity;

        return $this;
    }

    public function getCloud(): ?string
    {
        return $this->cloud;
    }

    public function setCloud(string $cloud): self
    {
        $this->cloud = $cloud;

        return $this;
    }

    public function getFeelslikeC(): ?string
    {
        return $this->feelslike_c;
    }

    public function setFeelslikeC(string $feelslike_c): self
    {
        $this->feelslike_c = $feelslike_c;

        return $this;
    }

    public function getFeelslikeF(): ?string
    {
        return $this->feelslike_f;
    }

    public function setFeelslikeF(string $feelslike_f): self
    {
        $this->feelslike_f = $feelslike_f;

        return $this;
    }

    public function getVisKm(): ?string
    {
        return $this->vis_km;
    }

    public function setVisKm(string $vis_km): self
    {
        $this->vis_km = $vis_km;

        return $this;
    }

    public function getVisMiles(): ?string
    {
        return $this->vis_miles;
    }

    public function setVisMiles(string $vis_miles): self
    {
        $this->vis_miles = $vis_miles;

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

    public function getGustMph(): ?string
    {
        return $this->gust_mph;
    }

    public function setGustMph(string $gust_mph): self
    {
        $this->gust_mph = $gust_mph;

        return $this;
    }

    public function getGustKph(): ?string
    {
        return $this->gust_kph;
    }

    public function setGustKph(string $gust_kph): self
    {
        $this->gust_kph = $gust_kph;

        return $this;
    }
}
