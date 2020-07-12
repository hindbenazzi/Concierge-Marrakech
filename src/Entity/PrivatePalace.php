<?php

namespace App\Entity;

use App\Repository\PrivatePalaceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrivatePalaceRepository::class)
 */
class PrivatePalace
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
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Area;

    /**
     * @ORM\Column(type="text")
     */
    private $NumberOfPieces;

    /**
     * @ORM\Column(type="text")
     */
    private $OtherCharacteristics;

    /**
     * @ORM\Column(type="text")
     */
    private $Address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $img_Url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getArea(): ?string
    {
        return $this->Area;
    }

    public function setArea(string $Area): self
    {
        $this->Area = $Area;

        return $this;
    }

    public function getNumberOfPieces(): ?string
    {
        return $this->NumberOfPieces;
    }

    public function setNumberOfPieces(string $NumberOfPieces): self
    {
        $this->NumberOfPieces = $NumberOfPieces;

        return $this;
    }

    public function getOtherCharacteristics(): ?string
    {
        return $this->OtherCharacteristics;
    }

    public function setOtherCharacteristics(string $OtherCharacteristics): self
    {
        $this->OtherCharacteristics = $OtherCharacteristics;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->Address;
    }

    public function setAddress(string $Address): self
    {
        $this->Address = $Address;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->img_Url;
    }

    public function setImgUrl(string $img_Url): self
    {
        $this->img_Url = $img_Url;

        return $this;
    }
}
