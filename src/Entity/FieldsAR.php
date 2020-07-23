<?php

namespace App\Entity;

use App\Repository\FieldsARRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldsARRepository::class)
 */
class FieldsAR
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
     * @ORM\OneToMany(targetEntity=ServiceAR::class, mappedBy="fieldsAR")
     */
    private $serviceARs;

    public function __construct()
    {
        $this->serviceARs = new ArrayCollection();
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
     * @return Collection|ServiceAR[]
     */
    public function getServiceARs(): Collection
    {
        return $this->serviceARs;
    }

    public function addServiceAR(ServiceAR $serviceAR): self
    {
        if (!$this->serviceARs->contains($serviceAR)) {
            $this->serviceARs[] = $serviceAR;
            $serviceAR->setFieldsAR($this);
        }

        return $this;
    }

    public function removeServiceAR(ServiceAR $serviceAR): self
    {
        if ($this->serviceARs->contains($serviceAR)) {
            $this->serviceARs->removeElement($serviceAR);
            // set the owning side to null (unless already changed)
            if ($serviceAR->getFieldsAR() === $this) {
                $serviceAR->setFieldsAR(null);
            }
        }

        return $this;
    }
}
