<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\DateTrait;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
{
    // use DateTrait;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     * @Assert\Length(
     *      min = 1,
     *      max = 255,
     *      minMessage = "Le nom doit faire au minimum 1 caractère de long",
     *      maxMessage = "Le nom ne doit pas dépasser les 255 caractères."
     * )
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Offer", inversedBy="competences")
     */
    private $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function __toString(){
        return $this->name;
    }

    /**
     * @return Collection|Offer[]
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->contains($offer)) {
            $this->offers->removeElement($offer);
        }

        return $this;
    }
}
