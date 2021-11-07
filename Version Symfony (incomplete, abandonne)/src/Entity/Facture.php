<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactureRepository::class)
 */
class Facture
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=voiture::class, inversedBy="factures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idVoiture;

    /**
     * @ORM\ManyToOne(targetEntity=utilisateur::class, inversedBy="factures")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUtilisateur;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbCommandes;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFin;

    /**
     * @ORM\Column(type="bigint")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatReglement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVoiture(): ?voiture
    {
        return $this->idVoiture;
    }

    public function setIdVoiture(?voiture $idVoiture): self
    {
        $this->idVoiture = $idVoiture;

        return $this;
    }

    public function getIdUtilisateur(): ?utilisateur
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?utilisateur $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getNbCommandes(): ?int
    {
        return $this->nbCommandes;
    }

    public function setNbCommandes(int $nbCommandes): self
    {
        $this->nbCommandes = $nbCommandes;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getEtatReglement(): ?string
    {
        return $this->etatReglement;
    }

    public function setEtatReglement(string $etatReglement): self
    {
        $this->etatReglement = $etatReglement;

        return $this;
    }
}
