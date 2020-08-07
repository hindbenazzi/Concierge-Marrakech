<?php

namespace App\Entity;

use App\Repository\ConciergeServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=ConciergeServiceRepository::class)
 * @Vich\Uploadable()
 */
class ConciergeService
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ImageURL;
    
     /**
     * @Vich\UploadableField(mapping="ConciergeServices",fileNameProperty="ImageUrl")
     */
     private $ImageUrlFile;

     /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    /**
     * @ORM\OneToMany(targetEntity=ConciergeServiceRequete::class, mappedBy="Service")
     */
    private $conciergeServiceRequetes;

    public function __construct()
    {
        $this->conciergeServiceRequetes = new ArrayCollection();
        $this->UpdatedAt=new \DateTime();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImageURL(): ?string
    {
        return $this->ImageURL;
    }

    public function setImageURL(?string $ImageURL): self
    {
        $this->ImageURL = $ImageURL;

        return $this;
    }

    /**
     * @return Collection|ConciergeServiceRequete[]
     */
    public function getConciergeServiceRequetes(): Collection
    {
        return $this->conciergeServiceRequetes;
    }

    public function addConciergeServiceRequete(ConciergeServiceRequete $conciergeServiceRequete): self
    {
        if (!$this->conciergeServiceRequetes->contains($conciergeServiceRequete)) {
            $this->conciergeServiceRequetes[] = $conciergeServiceRequete;
            $conciergeServiceRequete->setService($this);
        }

        return $this;
    }

    public function removeConciergeServiceRequete(ConciergeServiceRequete $conciergeServiceRequete): self
    {
        if ($this->conciergeServiceRequetes->contains($conciergeServiceRequete)) {
            $this->conciergeServiceRequetes->removeElement($conciergeServiceRequete);
            // set the owning side to null (unless already changed)
            if ($conciergeServiceRequete->getService() === $this) {
                $conciergeServiceRequete->setService(null);
            }
        }

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
}
