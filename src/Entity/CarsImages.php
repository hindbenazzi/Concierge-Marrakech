<?php

namespace App\Entity;

use App\Repository\CarsImagesRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity(repositoryClass=CarsImagesRepository::class)
 * @Vich\Uploadable()
 */
class CarsImages
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
    private $ImageUrl;
    /**
     * @Vich\UploadableField(mapping="CarsImages",fileNameProperty="ImageUrl")
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
     * @ORM\ManyToOne(targetEntity=LuxuryCars::class, inversedBy="carsImages")
     */
    private $CarsId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $t;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->ImageUrl;
    }

    public function setImageUrl(?string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    public function getCarsId(): ?LuxuryCars
    {
        return $this->CarsId;
    }

    public function setCarsId(?LuxuryCars $CarsId): self
    {
        $this->CarsId = $CarsId;

        return $this;
    }

    public function getT(): ?string
    {
        return $this->t;
    }

    public function setT(string $t): self
    {
        $this->t = $t;

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
