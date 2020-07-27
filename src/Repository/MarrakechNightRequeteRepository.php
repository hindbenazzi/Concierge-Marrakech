<?php

namespace App\Repository;

use App\Entity\MarrakechNightRequete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MarrakechNightRequete|null find($id, $lockMode = null, $lockVersion = null)
 * @method MarrakechNightRequete|null findOneBy(array $criteria, array $orderBy = null)
 * @method MarrakechNightRequete[]    findAll()
 * @method MarrakechNightRequete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarrakechNightRequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MarrakechNightRequete::class);
    }

    // /**
    //  * @return MarrakechNightRequete[] Returns an array of MarrakechNightRequete objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MarrakechNightRequete
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
