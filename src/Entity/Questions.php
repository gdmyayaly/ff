<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuestionsRepository::class)
 */
class Questions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user","admin"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user","admin"})
     */
    private $libeller;

    /**
     * @ORM\ManyToOne(targetEntity=Thematique::class, inversedBy="questions")
     */
    private $thematique;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user","admin"})
     */
    private $audio;

    /**
     * @ORM\OneToMany(targetEntity=ReponseQuestions::class, mappedBy="question")
     * @Groups({"user","admin"})
     */
    private $reponseQuestions;

    /**
     * @ORM\OneToMany(targetEntity=UserReponseQuestion::class, mappedBy="question")
     */
    private $userReponseQuestions;

    public function __construct()
    {
        $this->reponseQuestions = new ArrayCollection();
        $this->userReponseQuestions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibeller(): ?string
    {
        return $this->libeller;
    }

    public function setLibeller(string $libeller): self
    {
        $this->libeller = $libeller;

        return $this;
    }

    public function getThematique(): ?Thematique
    {
        return $this->thematique;
    }

    public function setThematique(?Thematique $thematique): self
    {
        $this->thematique = $thematique;

        return $this;
    }

    public function getAudio(): ?string
    {
        return $this->audio;
    }

    public function setAudio(string $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * @return Collection|ReponseQuestions[]
     */
    public function getReponseQuestions(): Collection
    {
        return $this->reponseQuestions;
    }

    public function addReponseQuestion(ReponseQuestions $reponseQuestion): self
    {
        if (!$this->reponseQuestions->contains($reponseQuestion)) {
            $this->reponseQuestions[] = $reponseQuestion;
            $reponseQuestion->setQuestion($this);
        }

        return $this;
    }

    public function removeReponseQuestion(ReponseQuestions $reponseQuestion): self
    {
        if ($this->reponseQuestions->removeElement($reponseQuestion)) {
            // set the owning side to null (unless already changed)
            if ($reponseQuestion->getQuestion() === $this) {
                $reponseQuestion->setQuestion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|UserReponseQuestion[]
     */
    public function getUserReponseQuestions(): Collection
    {
        return $this->userReponseQuestions;
    }

    public function addUserReponseQuestion(UserReponseQuestion $userReponseQuestion): self
    {
        if (!$this->userReponseQuestions->contains($userReponseQuestion)) {
            $this->userReponseQuestions[] = $userReponseQuestion;
            $userReponseQuestion->setQuestion($this);
        }

        return $this;
    }

    public function removeUserReponseQuestion(UserReponseQuestion $userReponseQuestion): self
    {
        if ($this->userReponseQuestions->removeElement($userReponseQuestion)) {
            // set the owning side to null (unless already changed)
            if ($userReponseQuestion->getQuestion() === $this) {
                $userReponseQuestion->setQuestion(null);
            }
        }

        return $this;
    }
}
