<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Survey;
use App\Entity\Answer;
use App\Form\SurveyType;
use App\Repository\SurveyRepository;
use App\Repository\AnswerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
* @IsGranted("ROLE_ADMIN")
*/

#[Route('/survey')]
class SurveyController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_survey_index', methods: ['GET'])]
    public function index(SurveyRepository  $surveyRepository, AnswerRepository $answerRepository): Response
    {
        return $this->render('survey/index.html.twig', [
            'surveys' => $surveyRepository->findAll()
        ]);
    }

    #[Route('/new', name: 'app_survey_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SurveyRepository $surveyRepository, AnswerRepository $answerRepository): Response
    {
        $survey = new Survey();
        $survey->addAnswer(new Answer());

        $form = $this->createForm(SurveyType::class, $survey);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $surveyRepository->save($survey, true);

            return $this->redirectToRoute('app_survey_show', ['id' => $survey->getId()]);
        }

        return $this->render('survey/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'app_survey_show', methods: ['GET'])]
    public function show(Survey $survey): Response
    {
        return $this->render('survey/show.html.twig', [
            'survey' => $survey,
        ]);
    }

        #[Route('/{id}/edit', name: 'app_survey_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Survey $survey, SurveyRepository $surveyRepository): Response
    {
        $form = $this->createForm(SurveyType::class, $survey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $surveyRepository->save($survey, true);

            return $this->redirectToRoute('app_survey_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('survey/edit.html.twig', [
            'survey' => $survey,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_survey_delete', methods: ['POST'])]
    public function delete(Request $request, Survey $survey, SurveyRepository $surveyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$survey->getId(), $request->request->get('_token'))) {
            $surveyRepository->remove($survey, true);
        }

        return $this->redirectToRoute('app_survey_index', [], Response::HTTP_SEE_OTHER);
    }
}