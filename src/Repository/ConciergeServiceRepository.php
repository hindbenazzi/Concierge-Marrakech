<?php

namespace App\Repository;

use App\Entity\ConciergeService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ConciergeService|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConciergeService|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConciergeService[]    findAll()
 * @method ConciergeService[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConciergeServiceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConciergeService::class);
    }

    // /**
    //  * @return ConciergeService[] Returns an array of ConciergeService objects
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
    public function findOneBySomeField($value): ?ConciergeService
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
