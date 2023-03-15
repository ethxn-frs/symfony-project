<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;


class PartnershipController extends AbstractController
{
    #[Route('/partnership', name: 'partenaire')]
    public function index(): Response
    {
        return $this->render('partnership/index.html.twig', [
            'controller_name' => 'PartnershipController',
        ]);
    }
}
