<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Base;

class BaseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=1; $i<=10; $i++ ) {
            $base = new Base();
            $base->setName("nom de la base nautique n°$i")
                 ->setDescription("description de la base n°$i")
                 ->setAdresse("l'adresse de la base n°$i")
                 ->setCity("la city de la base n°$i")
                 ->setCodePostal("le code postale de la base n°$i");

            $manager->persist($base);


        }

        $manager->flush();
    }
}
