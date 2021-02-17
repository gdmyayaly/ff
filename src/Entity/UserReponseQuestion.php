<?php

namespace App\Entity;

use App\Repository\UserReponseQuestionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserReponseQuestionRepository::class)
 */
class UserReponseQuestion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userReponseQuestions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Questions::class, inversedBy="userReponseQuestions")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=ReponseQuestions::class, inversedBy="userReponseQuestions")
     */
    private $reponse;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="userReponseQuestions")
     */
    private $langue;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

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

    public function getReponse(): ?ReponseQuestions
    {
        return $this->reponse;
    }

    public function setReponse(?ReponseQuestions $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getLangue(): ?Langue
    {
        return $this->langue;
    }

    public function setLangue(?Langue $langue): self
    {
        $this->langue = $langue;

        return $this;
    }
}
