<?php

namespace App\Repository;

use App\Entity\PalaceImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PalaceImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method PalaceImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method PalaceImages[]    findAll()
 * @method PalaceImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PalaceImagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PalaceImages::class);
    }

    // /**
    //  * @return PalaceImages[] Returns an array of PalaceImages objects
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
    public function findOneBySomeField($value): ?PalaceImages
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
