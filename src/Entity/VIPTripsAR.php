<?php

namespace App\Entity;

use App\Repository\VIPTripsARRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VIPTripsARRepository::class)
 */
class VIPTripsAR
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $TripName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $PackPlanning;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TripDescription;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTripName(): ?string
    {
        return $this->TripName;
    }

    public function setTripName(string $TripName): self
    {
        $this->TripName = $TripName;

        return $this;
    }

    public function getPackPlanning(): ?string
    {
        return $this->PackPlanning;
    }

    public function setPackPlanning(?string $PackPlanning): self
    {
        $this->PackPlanning = $PackPlanning;

        return $this;
    }

    public function getTripDescription(): ?string
    {
        return $this->TripDescription;
    }

    public function setTripDescription(?string $TripDescription): self
    {
        $this->TripDescription = $TripDescription;

        return $this;
    }
}
