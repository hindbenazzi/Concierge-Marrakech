<?php

namespace App\Entity;

use App\Repository\PrivateEventsRequeteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrivateEventsRequeteRepository::class)
 */
class PrivateEventsRequete
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
    private $ServiceType;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $NumberOfPersons;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $StartDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $EndDate;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Transport;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Message;

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

    public function getServiceType(): ?string
    {
        return $this->ServiceType;
    }

    public function setServiceType(string $ServiceType): self
    {
        $this->ServiceType = $ServiceType;

        return $this;
    }

    public function getNumberOfPersons(): ?int
    {
        return $this->NumberOfPersons;
    }

    public function setNumberOfPersons(?int $NumberOfPersons): self
    {
        $this->NumberOfPersons = $NumberOfPersons;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->StartDate;
    }

    public function setStartDate(?\DateTimeInterface $StartDate): self
    {
        $this->StartDate = $StartDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(?\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }

    public function getTransport(): ?bool
    {
        return $this->Transport;
    }

    public function setTransport(?bool $Transport): self
    {
        $this->Transport = $Transport;

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
}
