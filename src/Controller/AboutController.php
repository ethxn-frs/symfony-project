<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Content;
use App\Form\ContentType;
use App\Repository\ContentRepository;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(ContentRepository $contentRepository): Response
    {
        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'reglements' => $contentRepository-> findBy(array('page' => "AboutPage", 'section' => 'Reglement' )),
        ]);
    }
}
