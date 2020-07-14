<?php

namespace App\Repository;

use App\Entity\VIPTrips;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VIPTrips|null find($id, $lockMode = null, $lockVersion = null)
 * @method VIPTrips|null findOneBy(array $criteria, array $orderBy = null)
 * @method VIPTrips[]    findAll()
 * @method VIPTrips[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VIPTripsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VIPTrips::class);
    }

    // /**
    //  * @return VIPTrips[] Returns an array of VIPTrips objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VIPTrips
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
