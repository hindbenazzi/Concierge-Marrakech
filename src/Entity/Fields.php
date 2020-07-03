<?php

namespace App\Entity;

use App\Repository\FieldsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldsRepository::class)
 * * @ORM\Table(name="Fields")
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

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Contenue;

    /**
     * @ORM\OneToMany(targetEntity=FieldImage::class, mappedBy="fields")
     */
    private $FieldImages;

    public function __construct()
    {
        $this->FieldImages = new ArrayCollection();
    }

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

    public function getContenue(): ?string
    {
        return $this->Contenue;
    }

    public function setContenue(?string $Contenue): self
    {
        $this->Contenue = $Contenue;

        return $this;
    }

    /**
     * @return Collection|FieldImage[]
     */
    public function getFieldImages(): Collection
    {
        return $this->FieldImages;
    }

    public function addFieldImage(FieldImage $fieldImage): self
    {
        if (!$this->FieldImages->contains($fieldImage)) {
            $this->FieldImages[] = $fieldImage;
            $fieldImage->setFields($this);
        }

        return $this;
    }

    public function removeFieldImage(FieldImage $fieldImage): self
    {
        if ($this->FieldImages->contains($fieldImage)) {
            $this->FieldImages->removeElement($fieldImage);
            // set the owning side to null (unless already changed)
            if ($fieldImage->getFields() === $this) {
                $fieldImage->setFields(null);
            }
        }

        return $this;
    }
}
