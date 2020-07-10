<?php

namespace App\Entity;

use App\Repository\FieldImagesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldImagesRepository::class)
 */
class FieldImages
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
     * @ORM\ManyToOne(targetEntity=Fields::class, inversedBy="FieldImages")
     */
    private $fields;

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

    public function getFields(): ?Fields
    {
        return $this->fields;
    }

    public function setFields(?Fields $fields): self
    {
        $this->fields = $fields;

        return $this;
    }
}
