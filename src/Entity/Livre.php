<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=LivreRepository::class)
 */
class Livre
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex("\97[89][- ]?[0-9]{1,5}[- ]?[0-9]+[- ]?[0-9]+[- ]?[0-9]$/")
     */
    private $isbn;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombre_pages;

    /**
     * @ORM\Column(type="date")
     */
    private $date_parution;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *             min = 0,
     *             max = 20,
     *             notInRangeMessage= "La valeur doit etre situer entre {{min}} et {{max}} "
     * )
     */
    private $note;

    /**
     * @ORM\ManyToMany(targetEntity=Autheur::class, inversedBy="livres")
     */
    private $autheurs;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="livres")
     */
    private $genres;

    public function __construct()
    {
        $this->autheurs = new ArrayCollection();
        $this->genres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getNombrePages(): ?int
    {
        return $this->nombre_pages;
    }

    public function setNombrePages(int $nombre_pages): self
    {
        $this->nombre_pages = $nombre_pages;

        return $this;
    }

    public function getDateParution(): ?\DateTimeInterface
    {
        return $this->date_parution;
    }

    public function setDateParution(\DateTimeInterface $date_parution): self
    {
        $this->date_parution = $date_parution;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    /**
     * @return Collection|Autheur[]
     */
    public function getAutheurs(): Collection
    {
        return $this->autheurs;
    }

    public function addAutheur(Autheur $autheur): self
    {
        if (!$this->autheurs->contains($autheur)) {
            $this->autheurs[] = $autheur;
        }

        return $this;
    }

    public function removeAutheur(Autheur $autheur): self
    {
        $this->autheurs->removeElement($autheur);

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genres->removeElement($genre);

        return $this;
    }
    public function __toString(){
        return $this->titre;
    }
}
