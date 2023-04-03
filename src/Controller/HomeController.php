<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Content;
use App\Form\ContentType;
use App\Repository\ContentRepository;
use App\Entity\Offer;
use App\Entity\Survey;
use App\Entity\Answer;
use App\Repository\SurveyRepository;
use App\Repository\AnswerRepository;
use App\Form\OfferType;
use App\Repository\OfferRepository;
use App\Repository\PartnershipRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ContentRepository $contentRepository, OfferRepository $offerRepository, PartnershipRepository $partnerRepository, SurveyRepository $surveyRepository, AnswerRepository $answerRepository) : Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'presentation' => $contentRepository-> findBy(array('page' => 'HomePage', 'section' => "presentation" )),
            'ponctualOffers' => $offerRepository-> findBy(array('status' => '2')),
            'perpetualsOffers' => $offerRepository-> findBy(array('status' => '1')),
            'survey' => $surveyRepository->findBy(array('status'=> '1')),
            'partners' => $partnerRepository->findBy(
                array(),
                array('id' => 'DESC'),
                4,
                0
            )
        ]);
    }
    
}
