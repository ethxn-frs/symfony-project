<?php

namespace App\Entity;

use App\Repository\NewsletterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsletterRepository::class)]
class Newsletter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function isPost(NewsletterRepository $newsletterRepository): self
    {
        if($_POST) 
        {
            $newsletter = new newsletter();
            $newsletter->setEmail($_POST['email']);
            $newsletterRepository->save($newsletter, true);

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);    
        }
    }
}
