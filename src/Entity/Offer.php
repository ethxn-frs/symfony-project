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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $end_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_at = null;

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

    public function getStart_Date(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStart_Date(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }
    
    public function getEnd_Date(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEnd_Date(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

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
}
