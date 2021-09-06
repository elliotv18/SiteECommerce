<?php

namespace App\Entity;

use App\Repository\LivreurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivreurRepository::class)
 */
class Livreur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephonePro;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailPro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephonePro(): ?string
    {
        return $this->telephonePro;
    }

    public function setTelephonePro(string $telephonePro): self
    {
        $this->telephonePro = $telephonePro;

        return $this;
    }

    public function getMailPro(): ?string
    {
        return $this->mailPro;
    }

    public function setMailPro(string $mailPro): self
    {
        $this->mailPro = $mailPro;

        return $this;
    }
}
