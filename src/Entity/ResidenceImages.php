<?php

namespace App\Entity;

use App\Repository\ResidenceImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=ResidenceImagesRepository::class)
 * @Vich\Uploadable()
 */
class ResidenceImages
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
    private $ImageURL;
    /**
     * @Vich\UploadableField(mapping="ResidencesImages",fileNameProperty="ImageURL")
     */
    private $ImageUrlFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;
    public function __construct()
    {
        $this->UpdatedAt=new \DateTime();
    }


    /**
     * @ORM\ManyToOne(targetEntity=PrivateResidence::class, inversedBy="residenceImages")
     */
    private $ResidenceId;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getResidenceId(): ?PrivateResidence
    {
        return $this->ResidenceId;
    }

    public function setResidenceId(?PrivateResidence $ResidenceId): self
    {
        $this->ResidenceId = $ResidenceId;

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
