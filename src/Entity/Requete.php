<?php

namespace App\Entity;

use App\Repository\RequeteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RequeteRepository::class)
 */
class Requete
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     * @Assert\NotBlank(message="This value cannot be empty!")
     */
    private $FullName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 10,
     *      max = 10,
     *      allowEmptyString = false
     * )
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    private $Email;

    /**
     * @ORM\Column(type="text",nullable=true)
     */
    private $Message;

    /**
     * @ORM\ManyToOne(targetEntity=Service::class, inversedBy="requete")
     */
    private $service;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $StartingON;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $FinishingON;

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

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    public function getStartingON(): ?\DateTimeInterface
    {
        return $this->StartingON;
    }

    public function setStartingON(?\DateTimeInterface $StartingON): self
    {
        $this->StartingON = $StartingON;

        return $this;
    }

    public function getFinishingON(): ?\DateTimeInterface
    {
        return $this->FinishingON;
    }

    public function setFinishingON(?\DateTimeInterface $FinishingON): self
    {
        $this->FinishingON = $FinishingON;

        return $this;
    }
}
