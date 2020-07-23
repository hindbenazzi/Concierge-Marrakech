<?php

namespace App\Repository;

use App\Entity\LuxuryCarsAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LuxuryCarsAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method LuxuryCarsAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method LuxuryCarsAR[]    findAll()
 * @method LuxuryCarsAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LuxuryCarsARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LuxuryCarsAR::class);
    }

    // /**
    //  * @return LuxuryCarsAR[] Returns an array of LuxuryCarsAR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LuxuryCarsAR
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
