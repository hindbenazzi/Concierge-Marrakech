<?php

namespace App\Entity;

use App\Repository\LuxuryCarsARRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LuxuryCarsARRepository::class)
 */
class LuxuryCarsAR
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $CarsDesc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarsDesc(): ?string
    {
        return $this->CarsDesc;
    }

    public function setCarsDesc(?string $CarsDesc): self
    {
        $this->CarsDesc = $CarsDesc;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
