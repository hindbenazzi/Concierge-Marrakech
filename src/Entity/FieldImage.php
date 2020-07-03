<?php

namespace App\Entity;

use App\Repository\FieldImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldImageRepository::class)
 */
class FieldImage
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
    private $Image;

    /**
     * @ORM\ManyToOne(targetEntity=Fields::class, inversedBy="FieldImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fields;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image): self
    {
        $this->Image = $Image;

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
