<?php

namespace App\Entity;

use App\Repository\PartnersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PartnersRepository::class)
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

    public function setImageUrl(string $ImageUrl): self
    {
        $this->ImageUrl = $ImageUrl;

        return $this;
    }

    

    
}
