<?php

namespace App\Repository;

use App\Entity\Lux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Lux|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lux|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lux[]    findAll()
 * @method Lux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LuxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lux::class);
    }

    // /**
    //  * @return Lux[] Returns an array of Lux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lux
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
