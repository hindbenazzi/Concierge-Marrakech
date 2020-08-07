<?php

namespace App\Entity;

use App\Repository\LuxuryCarsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich ;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass=LuxuryCarsRepository::class)
 * @Vich\Uploadable()
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
     * @Vich\UploadableField(mapping="Cars",fileNameProperty="ImgUrl")
     */
    private $ImageUrlFile;
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $UpdatedAt;
    /**
     * @ORM\OneToMany(targetEntity=RequetePersonalisable::class, mappedBy="CarId")
     */
    private $requetePersonalisables;

    public function __construct()
    {
        $this->requetePersonalisables = new ArrayCollection();
        $this->UpdatedAt=new \DateTime();
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

    public function setImgUrl(?string $ImgUrl): self
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
    public function __toString()
    {
        return $this->title;
    }
}
