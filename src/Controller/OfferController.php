<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offer;
use App\Form\OfferType;
use App\Repository\OfferRepository;

class OfferController extends AbstractController
{
    #[Route('/offers', name: 'app_offer')]
    public function index(OfferRepository $offerRepository): Response
    {
        return $this->render('offer/index.html.twig', [
            'controller_name' => 'OfferController',
            'permanantesOffers' =>  $offerRepository-> findBy(array('status' => '1')),
            'ponctualsOffers' =>  $offerRepository-> findBy(array('status' => '2')),
        ]);
    }

    
}
