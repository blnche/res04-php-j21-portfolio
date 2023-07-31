<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $test_project = new Project();
        $test_project->setNom('Test');
        $test_project->setPrincipalTech('Ruby');
        $test_project->setSecondaryTech('React.js');
        $test_project->setDescription('Ceci est une description');
        $manager->persist($test_project);

        $test2_project = new Project();
        $test2_project->setNom('Test2');
        $test2_project->setPrincipalTech('Vue.js');
        $test2_project->setDescription('Ceci est une description');
        $manager->persist($test2_project);

        $manager->flush();
    }
}
