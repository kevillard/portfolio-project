<?php
namespace App\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Creator;

class LoadCreator extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $names = array(
            'Sandrine (sandrineMathieu68)',
            'Développement mobile',
            'Graphisme',
            'Objet Connecté',
            'Intégration',
            'Réseau'
        );

        foreach ($names as $name) {
            $creator= new Creator();
            $creator->setName($name);

            $manager->persist($creator);
        }

        $manager->flush();
    }
}