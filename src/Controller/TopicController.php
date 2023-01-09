<?php

namespace App\Controller;

use App\Entity\Topic;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TopicController extends AbstractController
{
    #[Route('/topic', name: 'app_topic')]
    public function index(): Response
    {
        return $this->render('topic/index.html.twig', [
            'controller_name' => 'TopicController',
        ]);
    }

    #[Route('/new-topic', name: 'create_topic')]
    public function createTopic(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $topic = new Topic();
        $topic->setName('Keyboard');

        // tell Doctrine you want to (eventually) save the Topic (no queries yet)
        $entityManager->persist($topic);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new topic with id '.$topic->getId());
    }
}
