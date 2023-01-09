<?php

namespace App\DataFixtures;

use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomainFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // TODO: Enabling to fetch it from another source (e.g. config file, remote source), set the following as default.
        $names = ['Santé','Carrière','Finance','Juridique']; 

        foreach($names as &$name)
        {
            $domain = new Domaine();
            $domain->setName($name);
            $manager->persist($domain);
        }

        $manager->flush();
    }
}
