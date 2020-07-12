<?php

namespace App\Repository;

use App\Entity\PrivatePalace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PrivatePalace|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrivatePalace|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrivatePalace[]    findAll()
 * @method PrivatePalace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrivatePalaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PrivatePalace::class);
    }

    // /**
    //  * @return PrivatePalace[] Returns an array of PrivatePalace objects
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
    public function findOneBySomeField($value): ?PrivatePalace
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
