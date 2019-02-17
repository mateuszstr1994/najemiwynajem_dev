<?php

namespace App\Repository\Main;

use App\Entity\Main\MembersOfCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MembersOfCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method MembersOfCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method MembersOfCompany[]    findAll()
 * @method MembersOfCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MembersOfCompanyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MembersOfCompany::class);
    }

    // /**
    //  * @return MembersOfCompany[] Returns an array of MembersOfCompany objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MembersOfCompany
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
