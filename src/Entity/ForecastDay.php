<?php

namespace App\Entity;

use App\Repository\ForecastDayRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ForecastDayRepository::class)]
class ForecastDay
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $date;

    #[ORM\Column(type: 'string', length: 255)]
    private $date_epoch;

    #[ORM\OneToOne(targetEntity: Day::class, cascade: ['persist', 'remove'])]
    private $day;

    #[ORM\OneToOne(targetEntity: Astro::class, cascade: ['persist', 'remove'])]
    private $astro;

    #[ORM\OneToMany(mappedBy: 'forecastDay', targetEntity: Hour::class)]
    private $hour;

    #[ORM\ManyToOne(targetEntity: Forecast::class, inversedBy: 'forecastDay')]
    private $forecast;

    public function __construct()
    {
        $this->hour = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDateEpoch(): ?string
    {
        return $this->date_epoch;
    }

    public function setDateEpoch(string $date_epoch): self
    {
        $this->date_epoch = $date_epoch;

        return $this;
    }

    public function getDay(): ?Day
    {
        return $this->day;
    }

    public function setDay(?Day $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getAstro(): ?Astro
    {
        return $this->astro;
    }

    public function setAstro(?Astro $astro): self
    {
        $this->astro = $astro;

        return $this;
    }

    /**
     * @return Collection<int, Hour>
     */
    public function getHour(): Collection
    {
        return $this->hour;
    }

    public function addHour(Hour $hour): self
    {
        if (!$this->hour->contains($hour)) {
            $this->hour[] = $hour;
            $hour->setForecastDay($this);
        }

        return $this;
    }

    public function removeHour(Hour $hour): self
    {
        if ($this->hour->removeElement($hour)) {
            // set the owning side to null (unless already changed)
            if ($hour->getForecastDay() === $this) {
                $hour->setForecastDay(null);
            }
        }

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
}
