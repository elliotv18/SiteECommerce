<?php

namespace App\Repository;

use App\Entity\BoutiqueECommerce;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoutiqueECommerce|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoutiqueECommerce|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoutiqueECommerce[]    findAll()
 * @method BoutiqueECommerce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueECommerceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoutiqueECommerce::class);
    }

    // /**
    //  * @return BoutiqueECommerce[] Returns an array of BoutiqueECommerce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BoutiqueECommerce
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
