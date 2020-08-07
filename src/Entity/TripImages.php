<?php

namespace App\Entity;

use App\Repository\TripImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=TripImagesRepository::class)
 * @Vich\Uploadable()
 */
class TripImages
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=VIPTrips::class, inversedBy="tripImages")
     */
    private $TripId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ImageURL;
    /**
     * @Vich\UploadableField(mapping="TripsImages",fileNameProperty="ImageURL")
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTripId(): ?VIPTrips
    {
        return $this->TripId;
    }

    public function setTripId(?VIPTrips $TripId): self
    {
        $this->TripId = $TripId;

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
