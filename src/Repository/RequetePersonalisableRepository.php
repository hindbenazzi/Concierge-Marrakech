<?php

namespace App\Repository;

use App\Entity\RequetePersonalisable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RequetePersonalisable|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequetePersonalisable|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequetePersonalisable[]    findAll()
 * @method RequetePersonalisable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequetePersonalisableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RequetePersonalisable::class);
    }

    // /**
    //  * @return RequetePersonalisable[] Returns an array of RequetePersonalisable objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RequetePersonalisable
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
