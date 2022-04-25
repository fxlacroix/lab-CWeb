<?php

namespace App\Entity;

use App\Repository\ForecastRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForecastRepository::class)]
class Forecast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\OneToMany(mappedBy: 'forecast', targetEntity: ForecastDay::class)]
    private $forecastDay;

    public function __construct()
    {
        $this->forecastDay = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ForecastDay>
     */
    public function getForecastDays(): Collection
    {
        return $this->forecastDay;
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
