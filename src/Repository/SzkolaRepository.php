<?php

namespace App\Repository;

use App\Entity\Szkola;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Szkola|null find($id, $lockMode = null, $lockVersion = null)
 * @method Szkola|null findOneBy(array $criteria, array $orderBy = null)
 * @method Szkola[]    findAll()
 * @method Szkola[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SzkolaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Szkola::class);
    }

    // /**
    //  * @return Szkola[] Returns an array of Szkola objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Szkola
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
