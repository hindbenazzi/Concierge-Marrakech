<?php

namespace App\Entity;

use App\Repository\ConciergeServiceRequeteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConciergeServiceRequeteRepository::class)
 */
class ConciergeServiceRequete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumberPersons;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Start_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $End_Date;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $SpecialRequirements;

    /**
     * @ORM\ManyToOne(targetEntity=ConciergeService::class, inversedBy="conciergeServiceRequetes")
     */
    private $Service;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberPersons(): ?int
    {
        return $this->NumberPersons;
    }

    public function setNumberPersons(?int $NumberPersons): self
    {
        $this->NumberPersons = $NumberPersons;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->Start_date;
    }

    public function setStartDate(?\DateTimeInterface $Start_date): self
    {
        $this->Start_date = $Start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->End_Date;
    }

    public function setEndDate(?\DateTimeInterface $End_Date): self
    {
        $this->End_Date = $End_Date;

        return $this;
    }

    public function getSpecialRequirements(): ?string
    {
        return $this->SpecialRequirements;
    }

    public function setSpecialRequirements(?string $SpecialRequirements): self
    {
        $this->SpecialRequirements = $SpecialRequirements;

        return $this;
    }

    public function getService(): ?ConciergeService
    {
        return $this->Service;
    }

    public function setService(?ConciergeService $Service): self
    {
        $this->Service = $Service;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->FullName;
    }

    public function setFullName(string $FullName): self
    {
        $this->FullName = $FullName;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }
}
