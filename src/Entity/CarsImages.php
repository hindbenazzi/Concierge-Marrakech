<?php

namespace App\Entity;

use App\Repository\CarsImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarsImagesRepository::class)
 */
class CarsImages
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
    private $ImageUrl;

    /**
     * @ORM\ManyToOne(targetEntity=LuxuryCars::class, inversedBy="carsImages")
     */
    private $CarsId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->ImageUrl;
    }

    public function setImageUrl(string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    public function getCarsId(): ?LuxuryCars
    {
        return $this->CarsId;
    }

    public function setCarsId(?LuxuryCars $CarsId): self
    {
        $this->CarsId = $CarsId;

        return $this;
    }
}
