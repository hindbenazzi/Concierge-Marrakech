<?php

namespace App\Repository;

use App\Entity\PrivatePalaceFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivatePalaceFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivatePalaceFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivatePalaceFR[]    findAll()
 * @method PrivatePalaceFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivatePalaceFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivatePalaceFR::class);
    }

    // /**
    //  * @return PrivatePalaceFR[] Returns an array of PrivatePalaceFR objects
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
    public function findOneBySomeField($value): ?PrivatePalaceFR
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
