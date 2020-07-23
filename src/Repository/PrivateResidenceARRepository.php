<?php

namespace App\Repository;

use App\Entity\PrivateResidenceAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateResidenceAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateResidenceAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateResidenceAR[]    findAll()
 * @method PrivateResidenceAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateResidenceARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateResidenceAR::class);
    }

    // /**
    //  * @return PrivateResidenceAR[] Returns an array of PrivateResidenceAR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PrivateResidenceAR
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
