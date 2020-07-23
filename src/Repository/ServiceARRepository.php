<?php

namespace App\Repository;

use App\Entity\ServiceAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ServiceAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceAR[]    findAll()
 * @method ServiceAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceAR::class);
    }

    // /**
    //  * @return ServiceAR[] Returns an array of ServiceAR objects
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
    public function findOneBySomeField($value): ?ServiceAR
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
