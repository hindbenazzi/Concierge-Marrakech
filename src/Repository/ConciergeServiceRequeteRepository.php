<?php

namespace App\Repository;

use App\Entity\ConciergeServiceRequete;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConciergeServiceRequete|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConciergeServiceRequete|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConciergeServiceRequete[]    findAll()
 * @method ConciergeServiceRequete[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConciergeServiceRequeteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConciergeServiceRequete::class);
    }

    // /**
    //  * @return ConciergeServiceRequete[] Returns an array of ConciergeServiceRequete objects
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
    public function findOneBySomeField($value): ?ConciergeServiceRequete
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
