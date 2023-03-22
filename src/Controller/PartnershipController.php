<?php

namespace App\Controller;

use App\Entity\Partnership;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PartnershipRepository;


class PartnershipController extends AbstractController
{
    #[Route('/partnership', name: 'partenaire')]
    public function index(PartnershipRepository $partnerRepository): Response
    {
        return $this->render('partnership/index.html.twig', [
            'controller_name' => 'PartnershipController',
            'partners' => $partnerRepository->findAll()
        ]);
    }
}
