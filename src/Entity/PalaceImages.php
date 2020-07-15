<?php

namespace App\Entity;

use App\Repository\PalaceImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PalaceImagesRepository::class)
 */
class PalaceImages
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
     * @ORM\ManyToOne(targetEntity=PrivatePalace::class, inversedBy="palaceImages")
     */
    private $PalaceId;

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

    public function getPalaceId(): ?PrivatePalace
    {
        return $this->PalaceId;
    }

    public function setPalaceId(?PrivatePalace $PalaceId): self
    {
        $this->PalaceId = $PalaceId;

        return $this;
    }
}
