<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Content;
use App\Form\ContentType;
use App\Repository\ContentRepository;
use App\Repository\MemberRepository;
use App\Repository\ActivityRepository;

class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(ContentRepository $contentRepository, MemberRepository 
    $memberRepository, ActivityRepository $activityRepository): Response
    {
        return $this->render('about/index.html.twig', [
            'reglements' => $contentRepository-> findBy(array('page' => "AboutPage", 'section' => 'Reglement' )),
            'members' => $memberRepository->findAll(),
            'activities' => $activityRepository->findAll()
        ]);
    }
}
