<?php

namespace App\Entity;

use App\Repository\ServiceFRRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceFRRepository::class)
 */
class ServiceFR
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
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity=FieldsFR::class, inversedBy="serviceFRs")
     */
    private $fieldsFR;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getFieldsFR(): ?FieldsFR
    {
        return $this->fieldsFR;
    }

    public function setFieldsFR(?FieldsFR $fieldsFR): self
    {
        $this->fieldsFR = $fieldsFR;

        return $this;
    }
}
