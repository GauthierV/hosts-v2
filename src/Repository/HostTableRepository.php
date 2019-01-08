<?php

namespace App\Repository;

use App\Entity\HostTable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HostTable|null find($id, $lockMode = null, $lockVersion = null)
 * @method HostTable|null findOneBy(array $criteria, array $orderBy = null)
 * @method HostTable[]    findAll()
 * @method HostTable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HostTableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HostTable::class);
    }

    public function getRandomTable()
    {
        $result = $this->findAll();
        $rand = array_rand($result);
        return $result[$rand];
    }

    public function findLimit()
    {
        return $this->createQueryBuilder('h')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return HostTable[] Returns an array of HostTable objects
    //  */
    /*

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HostTable
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
