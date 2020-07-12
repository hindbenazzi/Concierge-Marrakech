<?php

namespace App\Repository;

use App\Entity\PrivateResidence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateResidence|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateResidence|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateResidence[]    findAll()
 * @method PrivateResidence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateResidenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateResidence::class);
    }

    // /**
    //  * @return PrivateResidence[] Returns an array of PrivateResidence objects
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
    public function findOneBySomeField($value): ?PrivateResidence
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
