<?php

namespace App\Entity;

use App\Repository\FieldsFRRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldsFRRepository::class)
 */
class FieldsFR
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $Contenue;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fieldDesc;

    /**
     * @ORM\OneToMany(targetEntity=ServiceFR::class, mappedBy="fieldsFR")
     */
    private $serviceFRs;

    public function __construct()
    {
        $this->serviceFRs = new ArrayCollection();
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

    public function getContenue(): ?string
    {
        return $this->Contenue;
    }

    public function setContenue(?string $Contenue): self
    {
        $this->Contenue = $Contenue;

        return $this;
    }

    public function getFieldDesc(): ?string
    {
        return $this->fieldDesc;
    }

    public function setFieldDesc(?string $fieldDesc): self
    {
        $this->fieldDesc = $fieldDesc;

        return $this;
    }

    /**
     * @return Collection|ServiceFR[]
     */
    public function getServiceFRs(): Collection
    {
        return $this->serviceFRs;
    }

    public function addServiceFR(ServiceFR $serviceFR): self
    {
        if (!$this->serviceFRs->contains($serviceFR)) {
            $this->serviceFRs[] = $serviceFR;
            $serviceFR->setFieldsFR($this);
        }

        return $this;
    }

    public function removeServiceFR(ServiceFR $serviceFR): self
    {
        if ($this->serviceFRs->contains($serviceFR)) {
            $this->serviceFRs->removeElement($serviceFR);
            // set the owning side to null (unless already changed)
            if ($serviceFR->getFieldsFR() === $this) {
                $serviceFR->setFieldsFR(null);
            }
        }

        return $this;
    }
}
