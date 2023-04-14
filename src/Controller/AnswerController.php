<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\AnswerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnswerController extends AbstractController
{
    #[Route('/answer/addvote', name: 'app_answer')]
    public function index(AnswerRepository $answerRepository): Response
    {
        $answerId = $_GET['answer'];
        $answer = $answerRepository->findBy(array('id'=> $answerId));
        foreach($answer as $item)
        {
            $item->setNbVotes($item->getNbVotes() + 1);
            $answerRepository->save($item, true);
        }
        return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
    }
}
