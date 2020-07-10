<?php

namespace App\Repository;

use App\Entity\Ruequete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ruequete|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ruequete|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ruequete[]    findAll()
 * @method Ruequete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RuequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ruequete::class);
    }

    // /**
    //  * @return Ruequete[] Returns an array of Ruequete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ruequete
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
