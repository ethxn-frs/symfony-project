<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TicketOfficeController extends AbstractController
{
    #[Route('/ticketoffice', name: 'billeterie')]
    public function index(): Response
    {
        return $this->render('ticket_office/index.html.twig', [
            'controller_name' => 'TicketOfficeController',
        ]);
    }
}
