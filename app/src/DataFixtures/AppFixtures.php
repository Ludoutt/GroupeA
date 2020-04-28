<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Feature;
use App\Entity\Project;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $project = new Project();
        $project->setTitle("Site web pour toto")
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime());

        $manager->persist($project);

        $category = new Category();
        $category->setTitle("FinalValidation")
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setProject($project);

        $manager->persist($category);

        $categoryB = new Category();
        $categoryB->setTitle("WordInProgress")
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setProject($project);

        $manager->persist($categoryB);

        $categoryC = new Category();
        $categoryC->setTitle("Blocked")
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime())
            ->setProject($project);

        $manager->persist($categoryC);

        $feature = new Feature();
        $feature->setTitle("Create Database")
                ->setDescription("Créer la database pour le site web. Attention, faire la conception avec MCD avant.")
                ->setJobValue(1)
                ->setAcceptationValidation("Database creating")
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime())
                ->setCategory($categoryB);

        $manager->persist($feature);

        $user = new User();
        $hash = $this->encoder->encodePassword($user, "toto");
        $user->setEmail("admin@admin.com")
             ->setPassword($hash);

        $manager->persist($user);
        $manager->flush();
    }
}
