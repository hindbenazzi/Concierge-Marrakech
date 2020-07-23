<?php

namespace App\Repository;

use App\Entity\FieldsAR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FieldsAR|null find($id, $lockMode = null, $lockVersion = null)
 * @method FieldsAR|null findOneBy(array $criteria, array $orderBy = null)
 * @method FieldsAR[]    findAll()
 * @method FieldsAR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FieldsARRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FieldsAR::class);
    }

    // /**
    //  * @return FieldsAR[] Returns an array of FieldsAR objects
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
    public function findOneBySomeField($value): ?FieldsAR
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
