<?php

namespace App\Entity;

use App\Repository\VIPTripsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VIPTripsRepository::class)
 */
class VIPTrips
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TripName;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $PackPlanning;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $TripDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TripImageURL;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Price;

    /**
     * @ORM\OneToMany(targetEntity=RequetePersonalisable::class, mappedBy="TripId")
     */
    private $requetePersonalisables;

    /**
     * @ORM\OneToMany(targetEntity=TripImages::class, mappedBy="TripId")
     */
    private $tripImages;

    public function __construct()
    {
        $this->requetePersonalisables = new ArrayCollection();
        $this->tripImages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTripName(): ?string
    {
        return $this->TripName;
    }

    public function setTripName(?string $TripName): self
    {
        $this->TripName = $TripName;

        return $this;
    }

    public function getPackPlanning(): ?string
    {
        return $this->PackPlanning;
    }

    public function setPackPlanning(?string $PackPlanning): self
    {
        $this->PackPlanning = $PackPlanning;

        return $this;
    }

    public function getTripDescription(): ?string
    {
        return $this->TripDescription;
    }

    public function setTripDescription(?string $TripDescription): self
    {
        $this->TripDescription = $TripDescription;

        return $this;
    }

    public function getTripImageURL(): ?string
    {
        return $this->TripImageURL;
    }

    public function setTripImageURL(?string $TripImageURL): self
    {
        $this->TripImageURL = $TripImageURL;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(?string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    /**
     * @return Collection|RequetePersonalisable[]
     */
    public function getRequetePersonalisables(): Collection
    {
        return $this->requetePersonalisables;
    }

    public function addRequetePersonalisable(RequetePersonalisable $requetePersonalisable): self
    {
        if (!$this->requetePersonalisables->contains($requetePersonalisable)) {
            $this->requetePersonalisables[] = $requetePersonalisable;
            $requetePersonalisable->setTripId($this);
        }

        return $this;
    }

    public function removeRequetePersonalisable(RequetePersonalisable $requetePersonalisable): self
    {
        if ($this->requetePersonalisables->contains($requetePersonalisable)) {
            $this->requetePersonalisables->removeElement($requetePersonalisable);
            // set the owning side to null (unless already changed)
            if ($requetePersonalisable->getTripId() === $this) {
                $requetePersonalisable->setTripId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|TripImages[]
     */
    public function getTripImages(): Collection
    {
        return $this->tripImages;
    }

    public function addTripImage(TripImages $tripImage): self
    {
        if (!$this->tripImages->contains($tripImage)) {
            $this->tripImages[] = $tripImage;
            $tripImage->setTripId($this);
        }

        return $this;
    }

    public function removeTripImage(TripImages $tripImage): self
    {
        if ($this->tripImages->contains($tripImage)) {
            $this->tripImages->removeElement($tripImage);
            // set the owning side to null (unless already changed)
            if ($tripImage->getTripId() === $this) {
                $tripImage->setTripId(null);
            }
        }

        return $this;
    }
}
