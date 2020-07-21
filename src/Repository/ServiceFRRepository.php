<?php

namespace App\Repository;

use App\Entity\ServiceFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceFR[]    findAll()
 * @method ServiceFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceFR::class);
    }

    // /**
    //  * @return ServiceFR[] Returns an array of ServiceFR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceFR
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
