<?php

namespace App\Entity;

use App\Repository\TestimonialsARRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestimonialsARRepository::class)
 */
class TestimonialsAR
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
    private $Client;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ClientPosition;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Testimonial;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?string
    {
        return $this->Client;
    }

    public function setClient(string $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getClientPosition(): ?string
    {
        return $this->ClientPosition;
    }

    public function setClientPosition(string $ClientPosition): self
    {
        $this->ClientPosition = $ClientPosition;

        return $this;
    }

    public function getTestimonial(): ?string
    {
        return $this->Testimonial;
    }

    public function setTestimonial(?string $Testimonial): self
    {
        $this->Testimonial = $Testimonial;

        return $this;
    }
}
