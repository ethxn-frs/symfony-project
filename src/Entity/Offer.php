<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $text = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $keyword = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_start = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_end = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creation_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $min_place = null;

    #[ORM\Column(nullable: true)]
    private ?int $order_num = null;

    #[ORM\Column]
    private ?int $status = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
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

    public function getdate_start(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setdate_start(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }
    
    public function getdate_end(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setdate_end(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }
    
    public function getcreation_date(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setcreation_date(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getMin_Place(): ?int
    {
        return $this->min_place;
    }

    public function setMin_Place(?int $min_place): self
    {
        $this->min_place = $min_place;

        return $this;
    }

    public function getOrder_Num(): ?int
    {
        return $this->order_num;
    }

    public function setOrder_Num(int $order_num): self
    {
        $this->order_num = $order_num;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
    public function getKeyword(): ?string
    {
        return $this->keyword;
    }
}
