<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
 */
class Offer
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
     *      minMessage = "Le titre doit faire au minimum 1 caractères de long",
     *      maxMessage = "Le titre ne doit pas dépasser les 255 caractères."
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(
     *      min = 1,
     *      minMessage = "La description doit faire au minimum 1 caractère de long"
     * )
     */
    private $description;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Job", inversedBy="offers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_job;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contract", inversedBy="offers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_contract;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Candidature", mappedBy="id_offer", orphanRemoval=true)
     */
    private $candidatures;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Competence", mappedBy="offers")
     * @ORM\JoinTable(name="competence_offer",
     *   joinColumns={
     *     @ORM\JoinColumn(name="offer_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="competence_id", referencedColumnName="id")
     *   }
     * )
     */
    private $competences;

    public function __construct()
    {
        $this->candidatures = new ArrayCollection();
        $this->competences = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIdJob(): ?job
    {
        return $this->id_job;
    }

    public function setIdJob(?job $id_job): self
    {
        $this->id_job = $id_job;

        return $this;
    }

    public function getIdContract(): ?contract
    {
        return $this->id_contract;
    }

    public function setIdContract(?contract $id_contract): self
    {
        $this->id_contract = $id_contract;

        return $this;
    }

    /**
     * @return Collection|Candidature[]
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): self
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures[] = $candidature;
            $candidature->setIdOffer($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): self
    {
        if ($this->candidatures->contains($candidature)) {
            $this->candidatures->removeElement($candidature);
            // set the owning side to null (unless already changed)
            if ($candidature->getIdOffer() === $this) {
                $candidature->setIdOffer(null);
            }
        }

        return $this;
    }

    public function __toString(){
        return $this->title;
    }

    /**
     * @return Collection|Competence[]
     */
    public function getCompetences(): Collection
    {
        return $this->competences;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->competences->contains($competence)) {
            $this->competences[] = $competence;
            $competence->addOffer($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->competences->contains($competence)) {
            $this->competences->removeElement($competence);
            $competence->removeOffer($this);
        }

        return $this;
    }
}
