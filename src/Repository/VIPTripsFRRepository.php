<?php

namespace App\Repository;

use App\Entity\VIPTripsFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method VIPTripsFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method VIPTripsFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method VIPTripsFR[]    findAll()
 * @method VIPTripsFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VIPTripsFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VIPTripsFR::class);
    }

    // /**
    //  * @return VIPTripsFR[] Returns an array of VIPTripsFR objects
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
    public function findOneBySomeField($value): ?VIPTripsFR
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
