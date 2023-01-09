<?php

namespace App\Controller;

use App\Entity\Topic;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DomaineController extends AbstractController
{
    #[Route('/domaine', name: 'app_domaine')]
    public function index(): Response
    {
        return $this->render('domaine/index.html.twig', [
            'controller_name' => 'DomaineController',
        ]);
    }

    #[Route('/new-domain', name: 'create_domain')]
    public function createTopic(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $topic = new Topic();
        // tell Doctrine you want to (eventually) save the Topic (no queries yet)
        $entityManager->persist($topic);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new topic with id '.$topic->getId());
    }
}
