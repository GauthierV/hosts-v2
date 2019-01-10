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

        for ($i = 0; $i < 3; $i++) {
            $table1 = new HostTable();
            $table1->setName('super table ' . $i . ' de Nantes');
            $table1->setAddress($i+1 . ' mail Pablo Picasso');
            $table1->setDescription('cest super de manger ici il ya trop d\'émotions incroyable');
            $table1->setPriceRange(20 * ($i+1));
            $table1->setTown('Nantes');
            $table1->setZipCode('44000');
            $table1->setImage($imgname);
            $manager->persist($table1);
            $manager->flush();
        }
        for ($i = 0; $i < 3; $i++) {
            $table1 = new HostTable();
            $table1->setName('super table ' . $i . ' de Rennes');
            $table1->setAddress($i+1 . ' mrue de la paix');
            $table1->setDescription('cest super de manger ici il ya trop d\'émotions incroyable');
            $table1->setPriceRange(20 * ($i+1));
            $table1->setTown('Rennes');
            $table1->setZipCode('35000');
            $table1->setImage($imgname);
            $manager->persist($table1);
            $manager->flush();
        }
        for ($i = 0; $i < 3; $i++) {
            $table1 = new HostTable();
            $table1->setName('super table ' . $i . ' de Paris');
            $table1->setAddress($i+1 . ' mrue de la paix');
            $table1->setDescription('cest super de manger ici il ya trop d\'émotions incroyable');
            $table1->setPriceRange(20 * ($i+1));
            $table1->setTown('Paris');
            $table1->setZipCode('75000');
            $table1->setImage($imgname);
            $manager->persist($table1);
            $manager->flush();
        }

    }
}
