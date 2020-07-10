<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceRepository::class)
 */
class Service
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
    private $title;


    /**
     * @ORM\ManyToOne(targetEntity=Fields::class, inversedBy="Services")
     */
    private $fields;

    /**
     * @ORM\OneToMany(targetEntity=Requete::class, mappedBy="service")
     */
    private $requete;

    public function __construct()
    {
        $this->requete = new ArrayCollection();
    }

    

    public function getId(): ?int
    {
        return $this->id;
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

    

    public function getFields(): ?Fields
    {
        return $this->fields;
    }

    public function setFields(?Fields $fields): self
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * @return Collection|Requete[]
     */
    public function getRequete(): Collection
    {
        return $this->requete;
    }

    public function addRequete(Requete $requete): self
    {
        if (!$this->requete->contains($requete)) {
            $this->requete[] = $requete;
            $requete->setService($this);
        }

        return $this;
    }

    public function removeRequete(Requete $requete): self
    {
        if ($this->requete->contains($requete)) {
            $this->requete->removeElement($requete);
            // set the owning side to null (unless already changed)
            if ($requete->getService() === $this) {
                $requete->setService(null);
            }
        }

        return $this;
    }

    
}
