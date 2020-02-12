<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\CategoryFeature;
use App\Entity\Feature;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setTitle("Project 1")
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());

        $manager->persist($project);

        $categoryA = new Category();
        $categoryA->setTitle("Global")
                 ->setCreatedAt(new \DateTime())
                 ->setUpdatedAt(new \DateTime())
                 ->setProject($project);

        $manager->persist($categoryA);

        $categoryB = new Category();
        $categoryB->setTitle("Progress")
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setProject($project);

        $manager->persist($categoryB);

        $feature = new Feature();
        $feature->setTitle("Feature 1")
                ->setDescription("Toto fait du vélo")
                ->setJobValue(8)
                ->setAcceptationValidation("Toto le boss")
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());

        $manager->persist($feature);

        $categoryFeatureA = new CategoryFeature();
        $categoryFeatureA->setCategory($categoryA)
                        ->setFeature($feature)
                        ->setCreatedAt(new \DateTime())
                        ->setUpdatedAt(new \DateTime());

        $manager->persist($categoryFeatureA);

        $categoryFeatureB = new CategoryFeature();
        $categoryFeatureB->setCategory($categoryB)
                        ->setFeature($feature)
                        ->setCreatedAt(new \DateTime())
                        ->setUpdatedAt(new \DateTime());

        $manager->persist($categoryFeatureB);
        $manager->flush();
    }
}
