<?php

namespace App\Entity;

use App\Repository\RequetePersonalisableRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RequetePersonalisableRepository::class)
 */
class RequetePersonalisable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
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
     * @ORM\ManyToOne(targetEntity=PrivateResidence::class, inversedBy="requetePersonalisables")
     */
    private $ResidenceId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $StartingON;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $FinishingON;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Message;

    /**
     * @ORM\ManyToOne(targetEntity=PrivatePalace::class, inversedBy="requetePersonalisables")
     */
    private $PalaceId;

    /**
     * @ORM\ManyToOne(targetEntity=LuxuryCars::class, inversedBy="requetePersonalisables")
     */
    private $CarId;

    /**
     * @ORM\ManyToOne(targetEntity=VIPTrips::class, inversedBy="requetePersonalisables")
     */
    private $TripId;

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

    public function getResidenceId(): ?PrivateResidence
    {
        return $this->ResidenceId;
    }

    public function setResidenceId(?PrivateResidence $ResidenceId): self
    {
        $this->ResidenceId = $ResidenceId;

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

    public function getMessage(): ?string
    {
        return $this->Message;
    }

    public function setMessage(?string $Message): self
    {
        $this->Message = $Message;

        return $this;
    }

    public function getPalaceId(): ?PrivatePalace
    {
        return $this->PalaceId;
    }

    public function setPalaceId(?PrivatePalace $PalaceId): self
    {
        $this->PalaceId = $PalaceId;

        return $this;
    }

    public function getCarId(): ?LuxuryCars
    {
        return $this->CarId;
    }

    public function setCarId(?LuxuryCars $CarId): self
    {
        $this->CarId = $CarId;

        return $this;
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
}
