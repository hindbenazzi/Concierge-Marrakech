<?php

namespace App\Entity;

use App\Repository\LuxuryCarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LuxuryCarsRepository::class)
 */
class LuxuryCars
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="blob")
     */
    private $CarsImg;

    /**
     * @ORM\Column(type="text")
     */
    private $CarsDesc;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ImgUrl;

    /**
     * @ORM\OneToMany(targetEntity=RequetePersonalisable::class, mappedBy="CarId")
     */
    private $requetePersonalisables;

    public function __construct()
    {
        $this->requetePersonalisables = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarsImg()
    {
        return $this->CarsImg;
    }

    public function setCarsImg($CarsImg): self
    {
        $this->CarsImg = $CarsImg;

        return $this;
    }

    public function getCarsDesc(): ?string
    {
        return $this->CarsDesc;
    }

    public function setCarsDesc(string $CarsDesc): self
    {
        $this->CarsDesc = $CarsDesc;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->ImgUrl;
    }

    public function setImgUrl(string $ImgUrl): self
    {
        $this->ImgUrl = $ImgUrl;

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
            $requetePersonalisable->setCarId($this);
        }

        return $this;
    }

    public function removeRequetePersonalisable(RequetePersonalisable $requetePersonalisable): self
    {
        if ($this->requetePersonalisables->contains($requetePersonalisable)) {
            $this->requetePersonalisables->removeElement($requetePersonalisable);
            // set the owning side to null (unless already changed)
            if ($requetePersonalisable->getCarId() === $this) {
                $requetePersonalisable->setCarId(null);
            }
        }

        return $this;
    }
    
}
