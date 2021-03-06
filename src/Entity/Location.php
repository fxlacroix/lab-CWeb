<?php

namespace App\Entity;

use App\Repository\ForecastRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $region;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'string', length: 255)]
    private $lat;

    #[ORM\Column(type: 'string', length: 255)]
    private $lon;

    #[ORM\Column(type: 'string', length: 255)]
    private $tz_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $localtime_epoch;

    #[ORM\Column(type: 'string', length: 255)]
    private $localtime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): self
    {
        $this->region = $region;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getLat(): ?string
    {
        return $this->lat;
    }

    public function setLat(string $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLon(): ?string
    {
        return $this->lon;
    }

    public function setLon(string $lon): self
    {
        $this->lon = $lon;

        return $this;
    }

    public function getTzId(): ?string
    {
        return $this->tz_id;
    }

    public function setTzId(string $tz_id): self
    {
        $this->tz_id = $tz_id;

        return $this;
    }

    public function getLocaltimeEpoch(): ?string
    {
        return $this->localtime_epoch;
    }

    public function setLocaltimeEpoch(string $localtime_epoch): self
    {
        $this->localtime_epoch = $localtime_epoch;

        return $this;
    }

    public function getLocaltime(): ?string
    {
        return $this->localtime;
    }

    public function setLocaltime(string $localtime): self
    {
        $this->localtime = $localtime;

        return $this;
    }


}
