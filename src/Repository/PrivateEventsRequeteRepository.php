<?php

namespace App\Repository;

use App\Entity\PrivateEventsRequete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivateEventsRequete|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivateEventsRequete|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivateEventsRequete[]    findAll()
 * @method PrivateEventsRequete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivateEventsRequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivateEventsRequete::class);
    }

    // /**
    //  * @return PrivateEventsRequete[] Returns an array of PrivateEventsRequete objects
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
    public function findOneBySomeField($value): ?PrivateEventsRequete
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
