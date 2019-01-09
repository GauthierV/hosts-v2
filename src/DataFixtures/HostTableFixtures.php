<?php

namespace App\DataFixtures;

use App\Entity\HostTable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\File;

class HostTableFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $imgname = 'dindemenu.jpg';

        for ($i = 0; $i < 10; $i++) {
            $table1 = new HostTable();
            $table1->setName('super table ' . $i);
            $table1->setAddress($i+1 . ' mail Pablo Picasso');
            $table1->setDescription('cest super de manger ici il ya trop d\'émotions incroyable');
            $table1->setMenu('entrée de php - plat de git - dessert de js');
            $table1->setPriceRange(2 * $i);
            $table1->setTown('Nantes');
            $table1->setZipCode(44000);
            $table1->setImage($imgname);
            $manager->persist($table1);
            $manager->flush();
        }

    }
}
