<?php

namespace App\Repository;

use App\Entity\LuxuryCarsFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LuxuryCarsFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method LuxuryCarsFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method LuxuryCarsFR[]    findAll()
 * @method LuxuryCarsFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LuxuryCarsFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LuxuryCarsFR::class);
    }

    // /**
    //  * @return LuxuryCarsFR[] Returns an array of LuxuryCarsFR objects
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
    public function findOneBySomeField($value): ?LuxuryCarsFR
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
