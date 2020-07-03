<?php

namespace App\Repository;

use App\Entity\FieldImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FieldImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method FieldImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method FieldImage[]    findAll()
 * @method FieldImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FieldImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FieldImage::class);
    }

    // /**
    //  * @return FieldImage[] Returns an array of FieldImage objects
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
    public function findOneBySomeField($value): ?FieldImage
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
