<?php

namespace App\DataFixtures;

use App\Entity\Topic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repository\DomaineRepository;

class TopicFixtures extends Fixture
{
    private DomaineRepository $domaineRepository;

    public function __construct(DomaineRepository $domaineRepository)
    {
        $this->domaineRepository = $domaineRepository;
    }

    public function load(ObjectManager $manager): void
    {
        $topics = [
            [
                'name' => 'Déménagement',
                'domaines' => ['Carrière', 'Finance', 'Juridique', 'Logement'],
            ],
        ];

        foreach($topics as &$infos) 
        {
            $topic = new Topic();
            $topic->setName($infos['name']);
            $topic->addDomaines($this->domaineRepository->findBy(['name' => [...$infos['domaines']]]));
            $manager->persist($topic);
        }

        $manager->flush();
    }

}
