<?php

namespace App\Repository;

use App\Entity\FieldImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FieldImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method FieldImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method FieldImages[]    findAll()
 * @method FieldImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FieldImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FieldImages::class);
    }

    // /**
    //  * @return FieldImages[] Returns an array of FieldImages objects
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
    public function findOneBySomeField($value): ?FieldImages
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
