<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Survey;
use App\Entity\Answer;
use App\Repository\SurveyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
*/

#[Route('/survey')]
class SurveyController extends AbstractController
{
    #[Route('/', name: 'survey_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager ): Response
    {
        $survey = new Survey();
        $survey->setQuestion('Hm Compt do u have ?');
        $survey->setStatus(1);

        $answer = new Answer();
        $answer->setText('1');

        // relates this answer to the survey
        $answer->setSurvey($survey);

        $entityManager->persist($survey);
        $entityManager->persist($answer);
        $entityManager->flush();

        return new Response(
            'Saved new answer with id: '.$answer->getId()
            .' and new survey with id: '.$survey->getId()
        );
    }

    #[Route('/test', name: 'survey_test', methods: ['GET'])]
    public function ShowSurvey(SurveyRepository  $surveyRepository): Response
    {
        $survey = $surveyRepository->findAll();

        $answers = $survey->getAnswers();
    }

}
