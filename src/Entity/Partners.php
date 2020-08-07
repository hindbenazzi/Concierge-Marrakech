<?php

namespace App\Entity;

use App\Repository\PartnersRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * @ORM\Entity(repositoryClass=PartnersRepository::class)
 * @Vich\Uploadable()
 */
class Partners
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
    private $PartnerName;

    /**
     * @ORM\Column(type="blob")
     */
    private $PartnerImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Website;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImageUrl;

    /**
     * @Vich\UploadableField(mapping="Partners",fileNameProperty="ImageUrl")
     */
    private $ImageUrlFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartnerName(): ?string
    {
        return $this->PartnerName;
    }

    public function setPartnerName(string $PartnerName): self
    {
        $this->PartnerName = $PartnerName;

        return $this;
    }

    public function getPartnerImage()
    {
        return $this->PartnerImage;
    }

    public function setPartnerImage($PartnerImage): self
    {
        $this->PartnerImage = $PartnerImage;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->Website;
    }

    public function setWebsite(string $Website): self
    {
        $this->Website = $Website;

        return $this;
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
