<?php

namespace App\Entity;

use App\Repository\ReponseQuestionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=ReponseQuestionsRepository::class)
 */
class ReponseQuestions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user","admin"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user","admin"})
     */
    private $libeller;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user","admin"})
     */
    private $audio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"user","admin"})
     */
    private $image;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"user","admin"})
     */
    private $goodReponse;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="reponseQuestions")
     */
    private $question;

    /**
     * @ORM\OneToMany(targetEntity=UserReponseQuestion::class, mappedBy="reponse")
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

    public function getLibeller(): ?string
    {
        return $this->libeller;
    }

    public function setLibeller(string $libeller): self
    {
        $this->libeller = $libeller;

        return $this;
    }

    public function getAudio(): ?string
    {
        return $this->audio;
    }

    public function setAudio(?string $audio): self
    {
        $this->audio = $audio;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getGoodReponse(): ?bool
    {
        return $this->goodReponse;
    }

    public function setGoodReponse(bool $goodReponse): self
    {
        $this->goodReponse = $goodReponse;

        return $this;
    }

    public function getQuestion(): ?Questions
    {
        return $this->question;
    }

    public function setQuestion(?Questions $question): self
    {
        $this->question = $question;

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
            $userReponseQuestion->setReponse($this);
        }

        return $this;
    }

    public function removeUserReponseQuestion(UserReponseQuestion $userReponseQuestion): self
    {
        if ($this->userReponseQuestions->removeElement($userReponseQuestion)) {
            // set the owning side to null (unless already changed)
            if ($userReponseQuestion->getReponse() === $this) {
                $userReponseQuestion->setReponse(null);
            }
        }

        return $this;
    }
}
