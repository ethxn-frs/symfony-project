<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnswerRepository::class)]
class Answer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'answers', targetEntity: Survey::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Survey $survey = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbVotes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbVotes(): ?int
    {
        return $this->nbVotes;
    }

    public function setNbVotes(?int $nbVotes): self
    {
        $this->nbVotes = $nbVotes;

        return $this;
    }

    public function getSurvey(): ?Survey
    {
        return $this->survey;
    }

    public function setSurvey(?Survey $survey): self
    {
        $this->survey = $survey;

        return $this;
    }

    public function __toString()
    {
        return $this->getText(); // retourne le texte de la réponse
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
