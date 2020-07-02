<?php

namespace App\Entity;

use App\Repository\FieldsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldsRepository::class)
 * * @ORM\table(name="Fields")
 */
class Fields
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
    private $FieldName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FieldDesc;

    /**
     * @ORM\Column(type="blob")
     */
    private $FieldPicture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFieldName(): ?string
    {
        return $this->FieldName;
    }

    public function setFieldName(string $FieldName): self
    {
        $this->FieldName = $FieldName;

        return $this;
    }

    public function getFieldDesc(): ?string
    {
        return $this->FieldDesc;
    }

    public function setFieldDesc(string $FieldDesc): self
    {
        $this->FieldDesc = $FieldDesc;

        return $this;
    }

    public function getFieldPicture()
    {
        return $this->FieldPicture;
    }

    public function setFieldPicture($FieldPicture): self
    {
        $this->FieldPicture = $FieldPicture;

        return $this;
    }
}
