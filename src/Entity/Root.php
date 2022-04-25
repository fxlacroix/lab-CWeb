<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity()]
class Root
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToOne(targetEntity: Location::class, cascade: ['persist', 'remove'])]
    private $location;

    #[ORM\OneToOne(targetEntity: Current::class, cascade: ['persist', 'remove'])]
    private $current;

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param mixed $root
     */
    public function setRoot($root): void
    {
        $this->root = $root;
    }

    public function getLocation(): ?Location
    {
        return $this->location;
    }

    public function setLocation(?Location $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getCurrent(): ?Current
    {
        return $this->current;
    }

    public function setCurrent(?Current $current): self
    {
        $this->current = $current;

        return $this;
    }

    public function getForecast(): ?Forecast
    {
        return $this->forecast;
    }

    public function setForecast(?Forecast $forecast): self
    {
        $this->forecast = $forecast;

        return $this;
    }

    /**
     * @return Collection<int, ForecastDay>
     */
    public function getForecastDay(): Collection
    {
        return $this->forecastDay;
    }

    public function addForecastDay(ForecastDay $forecastDay): self
    {
        if (!$this->forecastDay->contains($forecastDay)) {
            $this->forecastDay[] = $forecastDay;
            $forecastDay->setForecast($this);
        }

        return $this;
    }

    public function removeForecastDay(ForecastDay $forecastDay): self
    {
        if ($this->forecastDay->removeElement($forecastDay)) {
            // set the owning side to null (unless already changed)
            if ($forecastDay->getForecast() === $this) {
                $forecastDay->setForecast(null);
            }
        }

        return $this;
    }

}
