<?php

namespace App\Repository;

use App\Entity\ConciergeServiceFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConciergeServiceFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConciergeServiceFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConciergeServiceFR[]    findAll()
 * @method ConciergeServiceFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConciergeServiceFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConciergeServiceFR::class);
    }

    // /**
    //  * @return ConciergeServiceFR[] Returns an array of ConciergeServiceFR objects
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
    public function findOneBySomeField($value): ?ConciergeServiceFR
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
