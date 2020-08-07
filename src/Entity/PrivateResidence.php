<?php

namespace App\Entity;

use App\Repository\PrivateResidenceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity(repositoryClass=PrivateResidenceRepository::class)
 * @Vich\Uploadable()
 */
class PrivateResidence
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
    private $Name;

    /**
     * @ORM\Column(type="text")
     */
    private $Adress;

    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Facilities;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $MainImageUrl;

    /**
     * @Vich\UploadableField(mapping="Residences",fileNameProperty="Mainimageurl")
     */
    private $ImageUrlFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $Price;

    /**
     * @ORM\OneToMany(targetEntity=ResidenceImages::class, mappedBy="ResidenceId")
     */
    private $residenceImages;

    /**
     * @ORM\OneToMany(targetEntity=RequetePersonalisable::class, mappedBy="ResidenceId")
     */
    private $requetePersonalisables;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $size;

    

    public function __construct()
    {
        $this->residenceImages = new ArrayCollection();
        $this->requetePersonalisables = new ArrayCollection();
        $this->UpdatedAt=new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->Adress;
    }

    public function setAdress(string $Adress): self
    {
        $this->Adress = $Adress;

        return $this;
    }

    

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getFacilities(): ?string
    {
        return $this->Facilities;
    }

    public function setFacilities(?string $Facilities): self
    {
        $this->Facilities = $Facilities;

        return $this;
    }

    public function getMainImageUrl(): ?string
    {
        return $this->MainImageUrl;
    }

    public function setMainImageUrl(?string $MainImageUrl): self
    {
        $this->MainImageUrl = $MainImageUrl;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(?float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * @return Collection|ResidenceImages[]
     */
    public function getResidenceImages(): Collection
    {
        return $this->residenceImages;
    }

    public function addResidenceImage(ResidenceImages $residenceImage): self
    {
        if (!$this->residenceImages->contains($residenceImage)) {
            $this->residenceImages[] = $residenceImage;
            $residenceImage->setResidenceId($this);
        }

        return $this;
    }

    public function removeResidenceImage(ResidenceImages $residenceImage): self
    {
        if ($this->residenceImages->contains($residenceImage)) {
            $this->residenceImages->removeElement($residenceImage);
            // set the owning side to null (unless already changed)
            if ($residenceImage->getResidenceId() === $this) {
                $residenceImage->setResidenceId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RequetePersonalisable[]
     */
    public function getRequetePersonalisables(): Collection
    {
        return $this->requetePersonalisables;
    }

    public function addRequetePersonalisable(RequetePersonalisable $requetePersonalisable): self
    {
        if (!$this->requetePersonalisables->contains($requetePersonalisable)) {
            $this->requetePersonalisables[] = $requetePersonalisable;
            $requetePersonalisable->setResidenceId($this);
        }

        return $this;
    }

    public function removeRequetePersonalisable(RequetePersonalisable $requetePersonalisable): self
    {
        if ($this->requetePersonalisables->contains($requetePersonalisable)) {
            $this->requetePersonalisables->removeElement($requetePersonalisable);
            // set the owning side to null (unless already changed)
            if ($requetePersonalisable->getResidenceId() === $this) {
                $requetePersonalisable->setResidenceId(null);
            }
        }

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(?string $size): self
    {
        $this->size = $size;

        return $this;
    }
    public function getImageUrlFile(): ?UploadedFile
    {
        return $this->ImageUrlFile;
    }

    public function setImageUrlFile( $ImageUrlFile): self
    {
        $this->ImageUrlFile = $ImageUrlFile;


         if($ImageUrlFile){
            $this->UpdatedAt=new \DateTime();
         }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

        return $this;
    }
    public function __toString()
    {
        return $this->Name;
    }
    
}
