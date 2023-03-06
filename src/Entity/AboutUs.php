<?php

namespace App\Entity;

use App\Repository\AboutUsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AboutUsRepository::class)]
class AboutUs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(length: 255)]
    private ?string $Adminitrators = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAdminitrators(): ?string
    {
        return $this->Adminitrators;
    }

    public function setAdminitrators(string $Adminitrators): self
    {
        $this->Adminitrators = $Adminitrators;

        return $this;
    }
}
