<?php

namespace App\Repository;

use App\Entity\EmailSendingPriority;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EmailSendingPriority|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmailSendingPriority|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmailSendingPriority[]    findAll()
 * @method EmailSendingPriority[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailSendingPriorityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EmailSendingPriority::class);
    }

    // /**
    //  * @return EmailSendingPriority[] Returns an array of EmailSendingPriority objects
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
    public function findOneBySomeField($value): ?EmailSendingPriority
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
