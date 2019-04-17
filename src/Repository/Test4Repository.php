<?php

namespace App\Repository;

use App\Entity\Test4;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Test4|null find($id, $lockMode = null, $lockVersion = null)
 * @method Test4|null findOneBy(array $criteria, array $orderBy = null)
 * @method Test4[]    findAll()
 * @method Test4[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Test4Repository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Test4::class);
    }

    // /**
    //  * @return Test4[] Returns an array of Test4 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Test4
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
