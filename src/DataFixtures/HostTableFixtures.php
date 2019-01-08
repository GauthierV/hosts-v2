<?php

namespace App\DataFixtures;

use App\Entity\HostTable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class HostTableFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $table1 = new HostTable();
            $table1->setName('super table ' . $i);
            $table1->setAddress($i . ' rue du champs');
            $table1->setDescription('cest super de manger ici il ya trop démotions incroyable');
            $table1->setMenu('entrée de php - plat de git - dessert de js');
            $table1->setPriceRange(2*$i);
            $table1->setTown('Paris');
            $table1->setZipCode(123456);
            $manager->persist($table1);

            $manager->flush();
        }

    }
}
