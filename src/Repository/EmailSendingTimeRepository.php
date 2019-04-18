<?php

namespace App\Repository;

use App\Entity\EmailSendingTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmailSendingTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailSendingTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailSendingTime[]    findAll()
 * @method EmailSendingTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailSendingTimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailSendingTime::class);
    }

    // /**
    //  * @return EmailSendingTime[] Returns an array of EmailSendingTime objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EmailSendingTime
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
