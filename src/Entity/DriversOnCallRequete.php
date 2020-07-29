<?php

namespace App\Entity;

use App\Repository\DriversOnCallRequeteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DriversOnCallRequeteRepository::class)
 */
class DriversOnCallRequete
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
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VehiculeType;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumberOfPerson;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ArrivalPlace;

    /**
     * @ORM\Column(type="datetime")
     */
    private $StartDate;

    /**
     * @ORM\Column(type="datetime")
     */
    private $EndDate;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Message;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getVehiculeType(): ?string
    {
        return $this->VehiculeType;
    }

    public function setVehiculeType(string $VehiculeType): self
    {
        $this->VehiculeType = $VehiculeType;

        return $this;
    }

    public function getNumberOfPerson(): ?int
    {
        return $this->NumberOfPerson;
    }

    public function setNumberOfPerson(int $NumberOfPerson): self
    {
        $this->NumberOfPerson = $NumberOfPerson;

        return $this;
    }

    public function getArrivalPlace(): ?string
    {
        return $this->ArrivalPlace;
    }

    public function setArrivalPlace(string $ArrivalPlace): self
    {
        $this->ArrivalPlace = $ArrivalPlace;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(?string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }
}
