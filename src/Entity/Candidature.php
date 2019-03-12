<?php

namespace App\Entity;

use App\Entity\DateTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatureRepository")
 */
class Candidature
{
    // use DateTrait;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Le nom de famille doit faire au minimum 1 caractère de long",
     *      maxMessage = "Le nom de famille ne doit pas dépasser les 255 caractères."
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Le prénom doit faire au minimum 1 caractère de long",
     *      maxMessage = "Le prénom ne doit pas dépasser les 255 caractères."
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 1,
     *      minMessage = "Le CV doit faire au minimum 1 caractères de long"
     * )
     */
    private $CV;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Offer", inversedBy="candidatures")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_offer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCV(): ?string
    {
        return $this->CV;
    }

    public function setCV(string $CV): self
    {
        $this->CV = $CV;

        return $this;
    }

    public function getIdOffer(): ?offer
    {
        return $this->id_offer;
    }

    public function setIdOffer(?offer $id_offer): self
    {
        $this->id_offer = $id_offer;

        return $this;
    }
}
