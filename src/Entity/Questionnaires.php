<?php

namespace App\Entity;

use App\Repository\QuestionnairesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=QuestionnairesRepository::class)
 */
class Questionnaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"api"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Thematique::class, inversedBy="questionnaires")
     * 
     */
    private $thematique;

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $libeller = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $reponse1 = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $reponse2 = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $reponse3 = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $reponse4 = [];

    /**
     * @ORM\Column(type="array")
     * @Groups({"api"})
     */
    private $bonnereponse = [];

    /**
     * @ORM\OneToMany(targetEntity=UserReponseQuestion::class, mappedBy="question")
     */
    private $userReponseQuestions;

    public function __construct()
    {
        $this->userReponseQuestions = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getLibeller(): ?array
    {
        return $this->libeller;
    }

    public function setLibeller(array $libeller): self
    {
        $this->libeller = $libeller;

        return $this;
    }

    public function getReponse1(): ?array
    {
        return $this->reponse1;
    }

    public function setReponse1(array $reponse1): self
    {
        $this->reponse1 = $reponse1;

        return $this;
    }

    public function getReponse2(): ?array
    {
        return $this->reponse2;
    }

    public function setReponse2(array $reponse2): self
    {
        $this->reponse2 = $reponse2;

        return $this;
    }

    public function getReponse3(): ?array
    {
        return $this->reponse3;
    }

    public function setReponse3(array $reponse3): self
    {
        $this->reponse3 = $reponse3;

        return $this;
    }

    public function getReponse4(): ?array
    {
        return $this->reponse4;
    }

    public function setReponse4(array $reponse4): self
    {
        $this->reponse4 = $reponse4;

        return $this;
    }

    public function getBonnereponse(): ?array
    {
        return $this->bonnereponse;
    }

    public function setBonnereponse(array $bonnereponse): self
    {
        $this->bonnereponse = $bonnereponse;

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
