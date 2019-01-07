<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $macron = new User();
        $macron->setPassword($this->encoder->encodePassword($macron, 'macron'));
        $macron->setEmail('macron@macron.com');
        $macron->setTelephone(0606060606);
        $manager->persist($macron);

        $trump = new User();
        $trump->setPassword($this->encoder->encodePassword($trump, 'trump'));
        $trump->setEmail('trump@trump.com');
        $trump->setTelephone(0202020202);
        $manager->persist($trump);

        $validmir = new User();
        $validmir->setPassword($this->encoder->encodePassword($validmir, 'vladimir'));
        $validmir->setEmail('vladimir@vladimir.com');
        $validmir->setTelephone(0303030303);
        $manager->persist($validmir);

        $kim = new User();
        $kim->setPassword($this->encoder->encodePassword($kim, 'kim'));
        $kim->setEmail('kim@kim.com');
        $kim->setTelephone(0606060606);
        $manager->persist($kim);

        $manager->flush();
    }
}
