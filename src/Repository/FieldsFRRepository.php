<?php

namespace App\Repository;

use App\Entity\FieldsFR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FieldsFR|null find($id, $lockMode = null, $lockVersion = null)
 * @method FieldsFR|null findOneBy(array $criteria, array $orderBy = null)
 * @method FieldsFR[]    findAll()
 * @method FieldsFR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FieldsFRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FieldsFR::class);
    }

    // /**
    //  * @return FieldsFR[] Returns an array of FieldsFR objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FieldsFR
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
