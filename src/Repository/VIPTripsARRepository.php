<?php

namespace App\Repository;

use App\Entity\VIPTripsAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VIPTripsAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method VIPTripsAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method VIPTripsAR[]    findAll()
 * @method VIPTripsAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VIPTripsARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VIPTripsAR::class);
    }

    // /**
    //  * @return VIPTripsAR[] Returns an array of VIPTripsAR objects
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
    public function findOneBySomeField($value): ?VIPTripsAR
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
