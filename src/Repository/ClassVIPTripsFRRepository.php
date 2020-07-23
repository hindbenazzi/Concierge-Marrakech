<?php

namespace App\Repository;

use App\Entity\ClassVIPTripsFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassVIPTripsFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassVIPTripsFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassVIPTripsFR[]    findAll()
 * @method ClassVIPTripsFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassVIPTripsFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassVIPTripsFR::class);
    }

    // /**
    //  * @return ClassVIPTripsFR[] Returns an array of ClassVIPTripsFR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClassVIPTripsFR
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
