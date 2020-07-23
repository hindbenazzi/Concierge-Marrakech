<?php

namespace App\Entity;

use App\Repository\ServiceARRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceARRepository::class)
 */
class ServiceAR
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
     * @ORM\ManyToOne(targetEntity=FieldsAR::class, inversedBy="serviceARs")
     */
    private $fieldsAR;

    /**
     * @ORM\ManyToOne(targetEntity=Fields::class, inversedBy="serviceARs")
     */
    private $fields;

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

    public function getFieldsAR(): ?FieldsAR
    {
        return $this->fieldsAR;
    }

    public function setFieldsAR(?FieldsAR $fieldsAR): self
    {
        $this->fieldsAR = $fieldsAR;

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
