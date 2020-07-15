<?php

namespace App\Repository;

use App\Entity\CarsImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CarsImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarsImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarsImages[]    findAll()
 * @method CarsImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarsImages::class);
    }

    // /**
    //  * @return CarsImages[] Returns an array of CarsImages objects
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
    public function findOneBySomeField($value): ?CarsImages
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
