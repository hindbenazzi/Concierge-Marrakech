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

    

    
}
