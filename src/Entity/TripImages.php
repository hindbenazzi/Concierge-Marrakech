<?php

namespace App\Entity;

use App\Repository\TripImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TripImagesRepository::class)
 */
class TripImages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=VIPTrips::class, inversedBy="tripImages")
     */
    private $TripId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ImageURL;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTripId(): ?VIPTrips
    {
        return $this->TripId;
    }

    public function setTripId(?VIPTrips $TripId): self
    {
        $this->TripId = $TripId;

        return $this;
    }

    public function getImageURL(): ?string
    {
        return $this->ImageURL;
    }

    public function setImageURL(?string $ImageURL): self
    {
        $this->ImageURL = $ImageURL;

        return $this;
    }
}
