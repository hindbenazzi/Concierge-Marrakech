<?php

namespace App\Entity;

use App\Repository\LuxuryCarsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LuxuryCarsRepository::class)
 */
class LuxuryCars
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $CarsImg;

    /**
     * @ORM\Column(type="text")
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

    public function getCarsImg()
    {
        return $this->CarsImg;
    }

    public function setCarsImg($CarsImg): self
    {
        $this->CarsImg = $CarsImg;

        return $this;
    }

    public function getCarsDesc(): ?string
    {
        return $this->CarsDesc;
    }

    public function setCarsDesc(string $CarsDesc): self
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
