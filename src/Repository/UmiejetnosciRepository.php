<?php

namespace App\Repository;

use App\Entity\Umiejetnosci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Umiejetnosci|null find($id, $lockMode = null, $lockVersion = null)
 * @method Umiejetnosci|null findOneBy(array $criteria, array $orderBy = null)
 * @method Umiejetnosci[]    findAll()
 * @method Umiejetnosci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UmiejetnosciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Umiejetnosci::class);
    }

    // /**
    //  * @return Umiejetnosci[] Returns an array of Umiejetnosci objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Umiejetnosci
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
