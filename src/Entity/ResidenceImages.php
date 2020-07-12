<?php

namespace App\Entity;

use App\Repository\ResidenceImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ResidenceImagesRepository::class)
 */
class ResidenceImages
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
    private $ImageURL;

    /**
     * @ORM\ManyToOne(targetEntity=PrivateResidence::class, inversedBy="residenceImages")
     */
    private $ResidenceId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageURL(): ?string
    {
        return $this->ImageURL;
    }

    public function setImageURL(string $ImageURL): self
    {
        $this->ImageURL = $ImageURL;

        return $this;
    }

    public function getResidenceId(): ?PrivateResidence
    {
        return $this->ResidenceId;
    }

    public function setResidenceId(?PrivateResidence $ResidenceId): self
    {
        $this->ResidenceId = $ResidenceId;

        return $this;
    }
}
