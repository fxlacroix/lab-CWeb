<?php

namespace App\Entity;

use App\Repository\AstroRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AstroRepository::class)]
class Astro
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $sunrise;

    #[ORM\Column(type: 'string', length: 255)]
    private $sunset;

    #[ORM\Column(type: 'string', length: 255)]
    private $moonrise;

    #[ORM\Column(type: 'string', length: 255)]
    private $moonset;

    #[ORM\Column(type: 'string', length: 255)]
    private $moon_phase;

    #[ORM\Column(type: 'string', length: 255)]
    private $moon_illumination;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSunrise(): ?string
    {
        return $this->sunrise;
    }

    public function setSunrise(string $sunrise): self
    {
        $this->sunrise = $sunrise;

        return $this;
    }

    public function getSunset(): ?string
    {
        return $this->sunset;
    }

    public function setSunset(string $sunset): self
    {
        $this->sunset = $sunset;

        return $this;
    }

    public function getMoonrise(): ?string
    {
        return $this->moonrise;
    }

    public function setMoonrise(string $moonrise): self
    {
        $this->moonrise = $moonrise;

        return $this;
    }

    public function getMoonset(): ?string
    {
        return $this->moonset;
    }

    public function setMoonset(string $moonset): self
    {
        $this->moonset = $moonset;

        return $this;
    }

    public function getMoonPhase(): ?string
    {
        return $this->moon_phase;
    }

    public function setMoonPhase(string $moon_phase): self
    {
        $this->moon_phase = $moon_phase;

        return $this;
    }

    public function getMoonIllumination(): ?string
    {
        return $this->moon_illumination;
    }

    public function setMoonIllumination(string $moon_illumination): self
    {
        $this->moon_illumination = $moon_illumination;

        return $this;
    }
}
