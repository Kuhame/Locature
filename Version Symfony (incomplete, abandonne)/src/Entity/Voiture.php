<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="voitures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idLoueur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $modele;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbVoitures;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $caracteristiques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatLocation;

    /**
     * @ORM\OneToMany(targetEntity=Facture::class, mappedBy="idVoiture", orphanRemoval=true)
     */
    private $factures;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    public function __construct()
    {
        $this->factures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdLoueur(): ?Utilisateur
    {
        return $this->idLoueur;
    }

    public function setIdLoueur(?Utilisateur $idLoueur): self
    {
        $this->idLoueur = $idLoueur;
        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNbVoitures(): ?int
    {
        return $this->nbVoitures;
    }

    public function setNbVoitures(int $nbVoitures): self
    {
        $this->nbVoitures = $nbVoitures;

        return $this;
    }

    public function getCaracteristiques(): ?string
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(string $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getEtatLocation(): ?string
    {
        return $this->etatLocation;
    }

    public function setEtatLocation(string $etatLocation): self
    {
        $this->etatLocation = $etatLocation;

        return $this;
    }

    /**
     * @return Collection|Facture[]
     */
    public function getFactures(): Collection
    {
        return $this->factures;
    }

    public function addFacture(Facture $facture): self
    {
        if (!$this->factures->contains($facture)) {
            $this->factures[] = $facture;
            $facture->setIdVoiture($this);
        }

        return $this;
    }

    public function removeFacture(Facture $facture): self
    {
        if ($this->factures->removeElement($facture)) {
            // set the owning side to null (unless already changed)
            if ($facture->getIdVoiture() === $this) {
                $facture->setIdVoiture(null);
            }
        }

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }
}
