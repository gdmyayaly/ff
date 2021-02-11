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
     * @ORM\ManyToOne(targetEntity=Langue::class, inversedBy="userReponseQuestions")
     */
    private $langue;

    /**
     * @ORM\ManyToOne(targetEntity=Questionnaires::class, inversedBy="userReponseQuestions")
     */
    private $question;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datedebut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $datefin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reponse;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="userReponseQuestions")
     */
    private $user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duree;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getQuestion(): ?Questionnaires
    {
        return $this->question;
    }

    public function setQuestion(?Questionnaires $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): self
    {
        $this->reponse = $reponse;

        return $this;
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

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }
}
