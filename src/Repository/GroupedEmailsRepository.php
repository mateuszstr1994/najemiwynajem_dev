<?php

namespace App\Repository;

use App\Entity\GroupedEmails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupedEmails|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupedEmails|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupedEmails[]    findAll()
 * @method GroupedEmails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupedEmailsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupedEmails::class);
    }

    // /**
    //  * @return GroupedEmails[] Returns an array of GroupedEmails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupedEmails
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
