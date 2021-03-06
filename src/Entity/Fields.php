<?php

namespace App\Entity;

use App\Repository\FieldsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FieldsRepository::class)
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
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="fields")
     */
    private $Services;


    

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FieldPictureURL;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FieldFormImageURL;

    /**
     * @ORM\OneToMany(targetEntity=FieldImages::class, mappedBy="fields")
     */
    private $FieldImages;

    /**
     * @ORM\Column(type="text")
     */
    private $Contenue;

    /**
     * @ORM\Column(type="text")
     */
    private $fieldDesc;

    /**
     * @ORM\OneToMany(targetEntity=ServiceFR::class, mappedBy="fields")
     */
    private $serviceFRs;

    /**
     * @ORM\OneToMany(targetEntity=ServiceAR::class, mappedBy="fields")
     */
    private $serviceARs;

    public function __construct()
    {
        $this->Services = new ArrayCollection();
        $this->Requets = new ArrayCollection();
        $this->FieldImages = new ArrayCollection();
        $this->serviceFRs = new ArrayCollection();
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

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->Services;
    }

    public function addService(Service $service): self
    {
        if (!$this->Services->contains($service)) {
            $this->Services[] = $service;
            $service->setFields($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->Services->contains($service)) {
            $this->Services->removeElement($service);
            // set the owning side to null (unless already changed)
            if ($service->getFields() === $this) {
                $service->setFields(null);
            }
        }

        return $this;
    }

    

    

    

    

    public function getFieldPictureURL(): ?string
    {
        return $this->FieldPictureURL;
    }

    public function setFieldPictureURL(string $FieldPictureURL): self
    {
        $this->FieldPictureURL = $FieldPictureURL;

        return $this;
    }

    public function getFieldFormImageURL(): ?string
    {
        return $this->FieldFormImageURL;
    }

    public function setFieldFormImageURL(string $FieldFormImageURL): self
    {
        $this->FieldFormImageURL = $FieldFormImageURL;

        return $this;
    }

    /**
     * @return Collection|FieldImages[]
     */
    public function getFieldImages(): Collection
    {
        return $this->FieldImages;
    }

    public function addFieldImage(FieldImages $fieldImage): self
    {
        if (!$this->FieldImages->contains($fieldImage)) {
            $this->FieldImages[] = $fieldImage;
            $fieldImage->setFields($this);
        }

        return $this;
    }

    public function removeFieldImage(FieldImages $fieldImage): self
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

    public function getContenue(): ?string
    {
        return $this->Contenue;
    }

    public function setContenue(string $Contenue): self
    {
        $this->Contenue = $Contenue;

        return $this;
    }

    public function getFieldDesc(): ?string
    {
        return $this->fieldDesc;
    }

    public function setFieldDesc(string $fieldDesc): self
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
            $serviceFR->setFields($this);
        }

        return $this;
    }

    public function removeServiceFR(ServiceFR $serviceFR): self
    {
        if ($this->serviceFRs->contains($serviceFR)) {
            $this->serviceFRs->removeElement($serviceFR);
            // set the owning side to null (unless already changed)
            if ($serviceFR->getFields() === $this) {
                $serviceFR->setFields(null);
            }
        }

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
            $serviceAR->setFields($this);
        }

        return $this;
    }

    public function removeServiceAR(ServiceAR $serviceAR): self
    {
        if ($this->serviceARs->contains($serviceAR)) {
            $this->serviceARs->removeElement($serviceAR);
            // set the owning side to null (unless already changed)
            if ($serviceAR->getFields() === $this) {
                $serviceAR->setFields(null);
            }
        }

        return $this;
    }
}
