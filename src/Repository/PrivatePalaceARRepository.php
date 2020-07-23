<?php

namespace App\Repository;

use App\Entity\PrivatePalaceAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivatePalaceAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivatePalaceAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivatePalaceAR[]    findAll()
 * @method PrivatePalaceAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivatePalaceARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivatePalaceAR::class);
    }

    // /**
    //  * @return PrivatePalaceAR[] Returns an array of PrivatePalaceAR objects
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
    public function findOneBySomeField($value): ?PrivatePalaceAR
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
