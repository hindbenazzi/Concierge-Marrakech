<?php

namespace App\Repository;

use App\Entity\PrivateResidenceFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateResidenceFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateResidenceFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateResidenceFR[]    findAll()
 * @method PrivateResidenceFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateResidenceFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateResidenceFR::class);
    }

    // /**
    //  * @return PrivateResidenceFR[] Returns an array of PrivateResidenceFR objects
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
    public function findOneBySomeField($value): ?PrivateResidenceFR
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
