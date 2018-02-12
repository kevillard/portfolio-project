<?php

namespace App\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Technology;

class LoadTechnology extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = array(
            'PHP',
            'MYSQL',
            'Javascript',
            'HTML',
            'CSS',
            'Photoshop',
            'Illustrator',
            'Symfony',
            'PostGreSQL',
            'VueJS',
            'Angular',
            'ReactJS',
            'ReactNative'
        );

        foreach ($names as $name) {
            $technology = new Technology();
            $technology->setName($name);

            $manager->persist($technology);
        }

        $manager->flush();
    }
}