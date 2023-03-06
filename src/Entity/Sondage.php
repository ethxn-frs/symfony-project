<?php

namespace App\Entity;

use App\Repository\SondageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SondageRepository::class)]
class Sondage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_question = null;

    #[ORM\Column]
    private ?int $id_response = null;

    #[ORM\Column]
    private ?bool $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdQuestion(): ?int
    {
        return $this->id_question;
    }

    public function setIdQuestion(int $id_question): self
    {
        $this->id_question = $id_question;

        return $this;
    }

    public function getIdResponse(): ?int
    {
        return $this->id_response;
    }

    public function setIdResponse(int $id_response): self
    {
        $this->id_response = $id_response;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
