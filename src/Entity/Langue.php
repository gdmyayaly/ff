<?php

namespace App\Entity;

use App\Repository\LangueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=LangueRepository::class)
 */
class Langue
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user","admin"})
     */
    private $audio;

    /**
     * @ORM\OneToMany(targetEntity=UserReponseQuestion::class, mappedBy="langue")
     */
    private $userReponseQuestions;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="langue")
     */
    private $users;

    public function __construct()
    {
        $this->userReponseQuestions = new ArrayCollection();
        $this->users = new ArrayCollection();
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
            $userReponseQuestion->setLangue($this);
        }

        return $this;
    }

    public function removeUserReponseQuestion(UserReponseQuestion $userReponseQuestion): self
    {
        if ($this->userReponseQuestions->removeElement($userReponseQuestion)) {
            // set the owning side to null (unless already changed)
            if ($userReponseQuestion->getLangue() === $this) {
                $userReponseQuestion->setLangue(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setLangue($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getLangue() === $this) {
                $user->setLangue(null);
            }
        }

        return $this;
    }
}
