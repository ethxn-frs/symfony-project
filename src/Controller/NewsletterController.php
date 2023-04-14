<?php

namespace App\Controller;

use App\Repository\NewsletterRepository;
use App\Entity\Newsletter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsletterController extends AbstractController
{
    #[Route('/newsletter', name: 'app_newsletter')]
    public function index(NewsletterRepository $newsletterRepository): Response
    {
        $newsletter = new newsletter();
        $newsletter->setEmail($_GET['email']);
        $newsletterRepository->save($newsletter, true);

        return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
    }
}
