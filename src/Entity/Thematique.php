<?php

namespace App\Entity;

use App\Repository\ThematiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass=ThematiqueRepository::class)
 */
class Thematique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"api"})
     */
    private $nom;

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $media = [];

    /**
     * @ORM\OneToMany(targetEntity=Questionnaires::class, mappedBy="thematique")
     * @Groups({"api"})
     */
    private $questionnaires;

    public function __construct()
    {
        $this->questionnaires = new ArrayCollection();
    }

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

    public function getMedia(): ?array
    {
        return $this->media;
    }

    public function setMedia(array $media): self
    {
        $this->media = $media;

        return $this;
    }

    /**
     * @return Collection|Questionnaires[]
     */
    public function getQuestionnaires(): Collection
    {
        return $this->questionnaires;
    }

    public function addQuestionnaire(Questionnaires $questionnaire): self
    {
        if (!$this->questionnaires->contains($questionnaire)) {
            $this->questionnaires[] = $questionnaire;
            $questionnaire->setThematique($this);
        }

        return $this;
    }

    public function removeQuestionnaire(Questionnaires $questionnaire): self
    {
        if ($this->questionnaires->removeElement($questionnaire)) {
            // set the owning side to null (unless already changed)
            if ($questionnaire->getThematique() === $this) {
                $questionnaire->setThematique(null);
            }
        }

        return $this;
    }
}
